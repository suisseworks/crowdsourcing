<?php

class AfiliadoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admincolumn2';


    public function init()
    {
        Yii::app()->theme = 'classic';


       // Registrar script para el bubbletip
       $baseUrl = Yii::app()->baseUrl;
       $js = Yii::app()->getClientScript();
       $js->registerScriptFile($baseUrl.'/js/jquery.qtip-1.0.0-rc3.min.js');
       //$js->registerScriptFile($baseUrl.'/js/application.js');

    }

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			/*'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			*/
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','selectespecialidades', 'selectprovincias', 'actionAjaxFillTree', 'actionDatosAfiliado'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Afiliado;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Afiliado']))
		{
			$model->attributes=$_POST['Afiliado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idnw_afiliado));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{

        $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Afiliado']))
		{
			$model->attributes=$_POST['Afiliado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idnw_afiliado));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


    public function actionPreferencias($id)
    {
        Yii::app()->theme = 'crowdsourcing';
        $this->layout= '//layouts/column1';
        $this->titulo = "Preferencias";

        $model=$this->loadModel($id);
        $this->render("preferencias", array("model"=>$model));

    }

    public function actionMensajes($id)
    {
        Yii::app()->theme = 'crowdsourcing';
        $this->layout= '//layouts/column1';
        $this->titulo = "Mensajes";

        $model=$this->loadModel($id);
        $this->render("mensajes", array("model"=>$model));
    }


    public function actionCuenta($id)
    {
        Yii::app()->theme = 'crowdsourcing';
        $this->layout= '//layouts/column1';
        $this->titulo = "Mi Cuenta";

        $model=$this->loadModel($id);
        $this->render("cuenta", array("model"=>$model));
    }



    public function actionPerfil($id)
    {
        Yii::app()->theme = 'crowdsourcing';
        $this->layout= '//layouts/column1';

        $model=$this->loadModel($id);
        if(isset($_POST['Afiliado']))
        {
            $model->attributes=$_POST['Afiliado'];
   //Realizamos el upload de la foto

            if ($model->validate())
            {
                //Yii::app()->myhelper->toConsole($model->avatar);

                $file = CUploadedFile::getInstance($model,'avatar');
                if ($file != null)
                {

                    if ($file->getExtensionName()== "jpg" or $file->getExtensionName()== "png") {
                        $fname = Yii::app()->user->name . ($file->getName());
                        $file->saveAs(Yii::getPathOfAlias("webroot") ."/uploads/avatars/" . $fname);
                        $model->avatar = $fname;
                        if (isset(Yii::app()->user->avatar))
                            Yii::app()->user->avatar = $model->avatar;
                        else
                            Yii::app()->user->setState('avatar', $model->avatar);
                    }
                    else{
                        Yii::app()->user->setFlash('avatar_invalido', "Avatar seleccionado no es válido!" );
                    }
                }


                if($model->save()){
                    Yii::app()->user->setFlash('registro_actualizado', "Los cambios han sido guardados!" );
                }
            }

        }

        $this->titulo = "Mi Pefil";
        $this->render("perfil", array("model"=>$model));
    }



    /**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Afiliado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Afiliado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Afiliado']))
			$model->attributes=$_GET['Afiliado'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


    public function actionRegistrar()
    {
        Yii::app()->theme = 'crowdsourcing';
        $this->layout = "simple";
        $model=new Afiliado;

        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='afiliado-registrar-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if(isset($_POST['Afiliado']))
        {
            Yii::app()->clientScript->registerScript('removeEffect','$("#registrar").removeClass(" element-animation");');
            $model->attributes=$_POST['Afiliado'];
            if($model->validate())
            {
                /// FECHA de REGISTRO
                $model->fecha_ingreso = new CDbExpression('NOW()');
                $model->save();
                // Ir al Segundo paso del registro
                $this->redirect(array("afiliado/escogercirculo",'id'=>$model->idnw_afiliado));
                return;
            }
        }
        $this->render('registrar',array('model'=>$model));
    }


    public function actionEscogerCirculo($id)
    {
        Yii::app()->theme = 'crowdsourcing';
        $this->layout = "simple";
        $model=$this->loadModel($id);
        $model->scenario = "escogercirculo";

        if(isset($_POST['Afiliado']))
        {
            $model->attributes=$_POST['Afiliado'];
            if($model->validate())
            {
                // Salvar circuloafiliado al menos que se haya sugerido un Circulo Nuevo
                if ($model->idcirculo != -1)
                {
                    $circuloafiliado = new CirculoAfiliado();
                    if (!$circuloafiliado->model()->exists(array("condition"=>"idafiliado = $model->idnw_afiliado and idcirculo = $model->idcirculo")))
                    {
                        $circuloafiliado->idcirculo = $model->idcirculo;
                        $circuloafiliado->idafiliado = $model->idnw_afiliado;
                        $circuloafiliado->save(true);
                        $model->nuevocirculo = "";
                    }
                }
                $model->save();
                // Enviar correo de Bienvenida
                Yii::app()->myhelper->enviarMensajeSistema($model->idnw_afiliado,
                    "CrowdSourcing - Bienvenido a Bordo",
                    'Bienvenido a CrowdSourcing!',
                    MyGlobals::MENSAJE_TIPO_NOTIFICACION,
                    $this->renderPartial('/afiliado/mails/_bienvenido',
                        array('nombre'=>$model->nombre,
                            'categoria'=>$model->categoria['nombre'],
                            'idcategoria'=>$model->categoria['idnw_categoria'],
                            'nuevacategoria'=>$model->nuevacategoria,
                            'especialidad'=>$model->especialidad['nombre'],
                            'idespecialidad'=>$model->especialidad['idnw_especialidad'],
                            'nuevaespecialidad'=>$model->nuevaespecialidad,
                            'idcirculo'=>$model->idcirculo,
                            'circulo'=>$model->circulo['nombre'],
                            'nuevocirculo'=>$model->nuevocirculo,
                        ), true));

                Yii::app()->user->setFlash('registro_exitoso', "Felicidades por formar parte de CrowdSourcing!" . "<br/>" . "Ya puedes Ingresar al sistema!!");
                $this->redirect(array("site/login"));
                return;
            }
        }
        $this->render('registrar_paso2',array('model'=>$model));
    }


    protected function formatData($person)
    {
        return array('text'=> "<a href='#' id='" . $person['name'] . "'>" .  $person['name'] . "</a>" ,'id'=>$person['id'],'hasChildren'=>isset($person['parents']));
    }


    protected function getDataFormatted($data)
    {

        foreach($data as $k=>$person)
        {
            $personFormatted[$k]=$this->formatData($person);
            $parents=null;
            if(isset($person['parents']))
            {
                $parents=$this->getDataFormatted($person['parents']);
                $personFormatted[$k]['children']=$parents;
            }
        }
        return $personFormatted;
    }


    protected function crearArbolCirculosBACKUP($idpais,$idcategoria,$idespecialidad)
    {

        $provincias = Provincia::model()->findAll(array('select'=>'idprovincia, nombre','condition'=>"idpais = $idpais ",'order'=>'nombre'));
        $provinciaFormatted = array();
        foreach($provincias as $k=>$provincia)
        {
            $idprovincia = $provincia['idprovincia'];
            $provinciaFormatted[$k] = array("id"=>$idprovincia, "text"=>$provincia['nombre']);
            // Hay Circulos en la provincia??
            $circuloFormatted = array();
            $circulos = Circulo::model()->findAll(array('select'=>'idnw_circulo, nombre, descripcion','condition'=>"idprovincia = $idprovincia ",'order'=>'nombre'));
            if (count($circulos) == 0) { $provinciaFormatted[$k] = null; continue; }
            foreach($circulos as $l=>$circulo)
            {
                $idcirculo = $circulo['idnw_circulo'];
                // Obtener Afiliados 'primarios' del circulos
                $circuloafiliados = CirculoAfiliado::model()->findAll(array('select'=>'idafiliado','condition'=>"idcirculo = $idcirculo and tipo='primario'"));
                $circulo_nombre = $circulo['nombre'];
                $circulo_descripcion = $circulo['descripcion'];
                $circulo_miembros = count($circuloafiliados);

                // Circulo vacío
                count($circuloafiliados) == 0 ?
                    $circuloFormatted[$l] = array("id"=>$idcirculo, "text"=>"<a
                                                        data-disponible
                                                        data-idcirculo=$idcirculo
                                                        data-nombrecirculo = '$circulo_nombre'
                                                        data-descripcioncirculo='$circulo_descripcion'
                                                        data-miembros= $circulo_miembros
                                                        class='tree-circulo btn btn-blue'>"
                        . $circulo['nombre'] . "</a>--Vacío")
                    :
                    $circuloFormatted[$l] = array("id"=>$idcirculo, "text"=>"<a
                                                        data-disponible data-idcirculo=$idcirculo
                                                        data-idcirculo=$idcirculo
                                                        data-nombrecirculo = '$circulo_nombre'
                                                        data-descripcioncirculo='$circulo_descripcion'
                                                         data-miembros= $circulo_miembros
                                                        class='tree-circulo btn btn-blue'>" . $circulo['nombre'] . "</a>");

                $afiliadoFormatted = array();
                foreach($circuloafiliados as $m=>$circuloafiliado)
                {

                    $idafiliado = $circuloafiliado['idafiliado'];
                    $afiliado = Afiliado::model()->find(array('select'=>'idnw_afiliado, nombre, apellido, idcategoria, idespecialidad','condition'=>"idnw_afiliado = $idafiliado ",'order'=>'nombre'));
                    if ($afiliado == null) continue;
                    if ($afiliado['idcategoria'] == $idcategoria and $idcategoria != -1  and $afiliado['idespecialidad'] == $idespecialidad and $idespecialidad != -1)
                    {
                        $circuloFormatted[$l] = array("id"=>$idcirculo, "text"=>"<a
                                                        data-idcirculo=$idcirculo
                                                        data-nombrecirculo = '$circulo_nombre'
                                                        data-descripcioncirculo='$circulo_descripcion'
                                                        data-miembros= $circulo_miembros
                                                class='tree-circulo-no-disponible''>" . $circulo['nombre'] . "</a>");
                    }
                    $afiliadoFormatted[$m] = array("id"=>$idafiliado,
                        "text"=>"<a


                        tooltip='" .
                            $this->getNombreCategoria($afiliado['idcategoria']) . "</span> <br/>" .
                            $this->getNombreEspecialidad($afiliado['idespecialidad'])
                            .  "'>" . $afiliado['nombre'] . " " . $afiliado['apellido'] . "</a>");

                    $circuloFormatted[$l]['children'] = $afiliadoFormatted;
                }




                $provinciaFormatted[$k]['children']=$circuloFormatted;
            }
        }
        //print_r($provinciaFormatted);

        return $provinciaFormatted;
    }




    protected function crearArbolCirculos($idpais,$idcategoria,$idespecialidad)
    {

        $provincias = Provincia::model()->findAll(array('select'=>'idprovincia, nombre','condition'=>"idpais = $idpais ",'order'=>'nombre'));
        $provinciaFormatted = array();
        foreach($provincias as $k=>$provincia)
        {
            $idprovincia = $provincia['idprovincia'];
            $provinciaFormatted[$k] = array("id"=>$idprovincia, "text"=>$provincia['nombre']);
            // Hay Circulos en la provincia??
            $circuloFormatted = array();
            $circulos = Circulo::model()->findAll(array('select'=>'idnw_circulo, nombre, descripcion','condition'=>"idprovincia = $idprovincia ",'order'=>'nombre'));
            if (count($circulos) == 0) { $provinciaFormatted[$k] = null; continue; }
            foreach($circulos as $l=>$circulo)
            {
                $idcirculo = $circulo['idnw_circulo'];

                $afiliados = Afiliado::model()->findAll(array('select'=>'idnw_afiliado,  nombre, apellido, idcategoria, idespecialidad','condition'=>"idcirculo = $idcirculo",'order'=>'nombre'));

                $circulo_nombre = $circulo['nombre'];
                $circulo_descripcion = $circulo['descripcion'];
                $circulo_miembros = count($afiliados);


                // Circulo vacío
                count($afiliados) == 0 ?
                    $circuloFormatted[$l] = array("id"=>$idcirculo, "text"=>"<a
                                                        data-disponible
                                                        data-idcirculo=$idcirculo
                                                        data-nombrecirculo = '$circulo_nombre'
                                                        data-descripcioncirculo='$circulo_descripcion'
                                                        data-miembros= $circulo_miembros
                                                        class='tree-circulo btn btn-blue'>" . $circulo['nombre'] . "</a>--Vacío")
                    :
                    $circuloFormatted[$l] = array("id"=>$idcirculo, "text"=>"<a
                                                        data-disponible data-idcirculo=$idcirculo
                                                        data-idcirculo=$idcirculo
                                                        data-nombrecirculo = '$circulo_nombre'
                                                        data-descripcioncirculo='$circulo_descripcion'
                                                         data-miembros= $circulo_miembros
                                                        class='tree-circulo btn btn-blue'>" . $circulo['nombre'] . "</a>");

                $afiliadoFormatted = array();

                foreach($afiliados as $m=>$afiliado)
                {

                    $idafiliado = $afiliado['idnw_afiliado'];

                    if ($afiliado['idcategoria'] == $idcategoria and $idcategoria != -1  and $afiliado['idespecialidad'] == $idespecialidad and $idespecialidad != -1)
                    {
                        $circuloFormatted[$l] = array("id"=>$idcirculo, "text"=>"<a
                                                        data-idcirculo=$idcirculo
                                                        data-nombrecirculo = '$circulo_nombre'
                                                        data-descripcioncirculo='$circulo_descripcion'
                                                        data-miembros= $circulo_miembros
                                                class='tree-circulo-no-disponible''>" . $circulo['nombre'] . "</a>");
                    }

                    $afiliadoFormatted[$m] = array("id"=>$idafiliado,
                        "text"=>"<a
                        tooltip='" .
                           $this->getNombreCategoria($afiliado['idcategoria']) . "</span> <br/>" .
                            $this->getNombreEspecialidad($afiliado['idespecialidad'])
                            .  "'>" . $afiliado['nombre'] . " " . $afiliado['apellido'] . "</a>");


                    $circuloFormatted[$l]['children'] = $afiliadoFormatted;
                }
                $provinciaFormatted[$k]['children']=$circuloFormatted;
            }
        }


       return $provinciaFormatted;
    }

    private function getNombreCategoria($idcategoria)
    {
        if ($idcategoria == null) return;
        $cat = Categoria::model()->find(array('select'=>'nombre','condition'=>"idnw_categoria = $idcategoria"));
        if ($cat == null) return "";
        return $cat['nombre'];
    }

    private function getNombreEspecialidad($idespecialidad)
    {
        if ($idespecialidad== null) return;
        $cat = Especialidad::model()->find(array('select'=>'nombre','condition'=>"idnw_especialidad = $idespecialidad"));
        if ($cat == null) return "";
        return $cat['nombre'];
    }


    /*
 *  En la segunda parte del registro, se muestran los círculos de acuerdo al país selecionado...
 */
    public function actionMostrarCirculos()
    {


        $idpais = $_POST['idpais'];
        $idcategoria = $_POST['idcategoria'];
        $idespecialidad = $_POST['idespecialidad'];


        if ($idpais == null){
            echo "Escoga un país";return;
        }

        $this->registerScriptSeleccionarCirculo();
        $this->registerScriptMostrarDetalleCirculo();
        $this->registerScriptShowToolTips();

        $data = $this->crearArbolCirculos($idpais, $idcategoria, $idespecialidad);
        $this->renderPartial('_circulos', array('data'=>$data),false, true);

    }


    protected function registerScriptShowToolTips()
    {
        $baseUrl = Yii::app()->baseUrl;
        $js = Yii::app()->getClientScript();
        $js->registerScriptFile($baseUrl.'/js/jquery.qtip-1.0.0-rc3.min.js');
        $js->registerScriptFile($baseUrl.'/js/bindtooltips.js');
    }



    protected function registerScriptMostrarDetalleCirculo()
    {
        Yii::app()->clientScript->registerScript('detalleCirculo',
            "$('ul#yw0 li a[data-nombrecirculo]').click(function (e) {
              var nombrecirculo = $(this).attr('data-nombrecirculo');
              $('#nombrecirculo').html(nombrecirculo);

             var descripcioncirculo =  $(this).attr('data-descripcioncirculo');
             $('#descripcioncirculo').html(descripcioncirculo);

            var miembros = $(this).attr('data-miembros');
            $('#miembroscirculo').html(miembros);

            //alert(nombrecirculo);

            /*
                var idcirculo = $(this).attr('data-idcirculo');
                $('#Afiliado_idcirculo').val(idcirculo);

                $('ul#yw0 li a').removeClass('tree-circulo-seleccionado');
                $(this).addClass('tree-circulo-seleccionado');
                */
                }
            );"
        );
    }



    protected function registerScriptSeleccionarCirculo()
    {
       Yii::app()->clientScript->registerScript('seleccionarCirculo',
           "$('ul#yw0 li a[data-disponible]').click(function (e) {
               var idcirculo = $(this).attr('data-idcirculo');
               $('#Afiliado_idcirculo').val(idcirculo);

               // quitar a todos la clase
               $('ul#yw0 li a').removeClass('tree-circulo-seleccionado');
                $('ul#yw0 li a').removeClass('btn-lg btn-gold');

               $(this).addClass('tree-circulo-seleccionado');
               $(this).addClass('btn-lg btn-gold');
               }
           );"
       );
    }










    /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Afiliado the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Afiliado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Afiliado $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='afiliado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



    public function actionSelectespecialidades()
    {
        $idcategoria = $_POST['Afiliado']['idcategoria'];
        if ($idcategoria == -1) {
            echo CHtml::tag('option',array('value'=>-1),CHtml::encode("--Otro--"), true);
            return;
        }
        $especialidades = Especialidad::model()->findAll(array('select'=>'idnw_especialidad, nombre','condition'=>"idcategoria = $idcategoria or idnw_especialidad=-1",'order'=>'nombre'));
        $lista = CHtml::listData($especialidades,'idnw_especialidad','nombre');

        echo CHtml::tag('option',array('value'=>''),'Seleccione una especialidad', true);
        foreach ($lista as $id => $nombre)       {
            echo CHtml::tag('option',array('value'=>$id),CHtml::encode($nombre), true);
        }
    }


    public function actionSelectespecialidadesyCirculos()
    {
        $idcategoria = $_POST['Afiliado']['idcategoria'];

        $idpais = 5;

        //$idpais = $_POST['Afiliado']['idpais'];

        $strespecialidades = "";
        if ($idcategoria == -1) {
            echo CHtml::tag('option',array('value'=>-1),CHtml::encode("--Otro--"), true);
            return;
        }
        $especialidades = Especialidad::model()->findAll(array('select'=>'idnw_especialidad, nombre','condition'=>"idcategoria = $idcategoria or idnw_especialidad=-1",'order'=>'nombre'));

        $strespecialidades .= CHtml::tag('option',array('value'=>''),'Seleccione una especialidad', true);
        foreach ($especialidades as $especialidad)       {
            $strespecialidades .= CHtml::tag('option',array('value'=>$especialidad['idnw_especialidad']),CHtml::encode($especialidad['nombre']), true);
        }

        // circulos

        // Obtenemos círculos asociados al país seleccionado
        /*
        $strcirculos = "";
        $circulos = Circulo::model()->findAll(array('condition'=>"idpais= $idpais or  idnw_circulo=-1", 'order'=>'nombre'));
        $strcirculos .= CHtml::tag('option',array('value'=>''),'Seleccione un círculo', true);
        foreach ($circulos as $circulo)
        {
            $strcirculos .= CHtml::tag('option',array('value'=>$circulo['idnw_circulo']),CHtml::encode($circulo['nombre']), true);
        }
        */
        //$result = array('especialidades'=>$strespecialidades);
        $result = array('especialidades'=>$idpais);

        echo json_encode($result);
    }





    public function actionSelectprovincias()
    {
       $idpais = $_POST['Afiliado']['idpais'];
       $provincias = Provincia::model()->findAll(array('condition'=>"idpais= $idpais", 'order'=>'nombre'));
       $lista = CHtml::listData($provincias,'idprovincia','nombre');

       echo CHtml::tag('option',array('value'=>''),'Seleccione una provincia', true);
       foreach ($lista as $id => $nombre)
       {
           echo CHtml::tag('option',array('value'=>$id),CHtml::encode($nombre), true);
       }

    }

    public function actionSelectCirculos()
    {
        $idpais = $_POST['Afiliado']['idpais'];
        $idespecialidad = $_POST['Afiliado']['idespecialidad'];

        $res = CHtml::tag('option',array('value'=>''),'Seleccione un círculo', true);

        // Obtenemos círculos asociados al país seleccionado

        $circulos = Circulo::model()->findAll(array('select'=>'idnw_circulo, nombre', 'condition'=>"idpais = $idpais or  idnw_circulo=-1", 'order'=>'nombre'));
        foreach($circulos as $circulo)
        {
            if (!$this->existeEspecialidad($circulo['idnw_circulo'],$idespecialidad))
                $res .= CHtml::tag('option',array('value'=>$circulo['idnw_circulo']),$circulo['nombre'], true);
        }


        echo $res;
    }


    protected function existeEspecialidad($idcirculo,$idespecialidad)
    {
        $afiliado = Afiliado::model()->find(array('condition'=>"idcirculo = $idcirculo and idespecialidad = $idespecialidad"));
        if (count($afiliado) >0) return true;
        return false;
    }




    public function actionSelectprovinciasycirculos()
    {
        $idpais = $_POST['Afiliado']['idpais'];
        if ($idpais == null)
            $idpais = -1;

        $strprovincias = "";
        $strcirculos = "";

        // Obtenemos Provincias asociadas al país seleccionado
        $provincias = Provincia::model()->findAll(array('condition'=>"idpais= $idpais", 'order'=>'idpais'));
        $lista = CHtml::listData($provincias,'idprovincia','nombre');

        $strprovincias .= CHtml::tag('option',array('value'=>''),'Seleccione una provincia', true);
        foreach ($lista as $id => $nombre)
        {
            $strprovincias .= CHtml::tag('option',array('value'=>$id),CHtml::encode($nombre), true);
        }

        // Obtenemos círculos asociados al país seleccionado
        $circulos = Circulo::model()->findAll(array('condition'=>"idpais= $idpais or  idnw_circulo=-1", 'order'=>'nombre'));
        $lista = CHtml::listData($circulos,'idnw_circulo','nombre');

        $strcirculos .= CHtml::tag('option',array('value'=>''),'Seleccione un círculo', true);
        foreach ($lista as $id => $nombre)
        {
            $strcirculos .= CHtml::tag('option',array('value'=>$id),CHtml::encode($nombre), true);
        }


        $result = array('provincias'=>$strprovincias,'circulos'=>$strcirculos);


        echo json_encode($result);

    }




    public function actionDatosAfiliado()
    {
        $id =  $_GET['id'];
        if ($id == null) return;
        $model=$this->loadModel($id);

        $result = array(
            'nombre'=>CHtml::encode($model['nombre'] . " " . CHtml::encode($model['apellido'])),
            'especialidad' => $model->categoria['nombre'] . "/ ". $model->especialidad['nombre'],
            'pais' => $model->pais['nombre'],
            'provincia' => $model->provincia['nombre'],
            'email' => $model['email'],
            'biografia' =>  $model['biografia'],
            'avatar'=> Yii::app()->myhelper->myAvatarURL($model)

        );

        echo json_encode($result);

    }








}
