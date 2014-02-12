<?php

class ProyectoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';


    public function init()
    {
        Yii::app()->theme = 'crowdsourcing';
    }


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','crear', 'editar'),
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
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Proyecto');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /*
        CREAMOS UN NUEVO PROYECTO
     */
    public function actionCrear()
    {
        $proyecto=new Proyecto;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Proyecto']))
        {
            $proyecto->attributes=$_POST['Proyecto'];
            if ($proyecto->validate()) {
                $file = CUploadedFile::getInstance($proyecto,'logo');
                if ($file != null)
                {
                    if ($file->getExtensionName()== "jpg" or $file->getExtensionName()== "png") {
                        $fname = Yii::app()->user->name . '-' . $proyecto->idcs_proyecto . '-' . ($file->getName());
                        $file->saveAs(Yii::getPathOfAlias("webroot") ."/uploads/logos/" . $fname);
                        $proyecto->logo = $fname;
                    }
                    else{
                        Yii::app()->user->setFlash('logo_invalido', "Logo seleccionado no es válido!" );
                    }
                }
                /// FECHA de CREACION
                $proyecto->fecha_creacion = new CDbExpression('NOW()');
                if($proyecto->save())
                    $this->redirect(array('editar','id'=>$proyecto->idcs_proyecto));
            }
        }

        $this->render('crear',array(
            'proyecto'=>$proyecto,
        ));
    }


    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new Proyecto;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Proyecto']))
        {
            $model->attributes=$_POST['Proyecto'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->idcs_proyecto));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
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
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEditar($id)
    {
        $proyecto=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Proyecto']))
        {
            $proyecto->attributes=$_POST['Proyecto'];
            // REMOVES SIGNO DOLAR para evitar error a la hora de salvar
            $proyecto->inversion_total_requerida = str_replace("$","",$proyecto->inversion_total_requerida);
            $proyecto->inversion_minima = str_replace("$","",$proyecto->inversion_minima);


            if ($proyecto->validate())
            {
                $file = CUploadedFile::getInstance($proyecto,'logo');
                if ($file != null)
                {
                    if ($file->getExtensionName()== "jpg" or $file->getExtensionName()== "png") {
                        $fname = Yii::app()->user->name . '-' . $proyecto->idcs_proyecto . '-' . ($file->getName());
                        $file->saveAs(Yii::getPathOfAlias("webroot") ."/uploads/logos/" . $fname);
                        $proyecto->logo = $fname;
                    }
                    else{
                        Yii::app()->user->setFlash('logo_invalido', "Logo seleccionado no es válido!" );
                    }
                }

                /// FECHA de MODIFICACION
                $proyecto->fecha_ultima_modificacion = new CDbExpression('NOW()');
                if ($proyecto->save()) {
                    Yii::app()->user->setFlash('registro_actualizado', "Los cambios han sido guardados!" );
                }
            }

        }

        $this->render('editar',array(
            'proyecto'=>$proyecto,
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

		if(isset($_POST['Proyecto']))
		{
			$model->attributes=$_POST['Proyecto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idcs_proyecto));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Proyecto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Proyecto']))
			$model->attributes=$_GET['Proyecto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Proyecto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Proyecto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Proyecto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='proyecto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
