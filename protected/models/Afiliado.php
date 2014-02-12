<?php

/**
 * This is the model class for table "{{afiliado}}".
 *
 * The followings are the available columns in table '{{afiliado}}':
 * @property integer $idnw_afiliado
 * @property string $email
 * @property string $usuario
 * @property string $clave
 * @property string $nombre
 * @property string $apellido
 * @property integer $idcategoria
 * @property integer $idespecialidad
 * @property string $fecha_ingreso
 * @property integer $idpais
 * @property integer $idprovincia
 * @property string $ciudad
 * @property string $domicilio
 * @property string $biografia
 * @property integer $estatus
 * @property string $tipo
 * @property string $genero
 * @property string $avatar
 * @property string $idcirculo
 * @property string $nuevacategoria
 * @property string $nuevaespecialidad
 * @property string $nuevocirculo
 *
 */
class Afiliado extends CActiveRecord
{
    public $clave2;
    //public $nuevacategoria;
    public $nombrecompleto;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{afiliado}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{


		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcategoria, idespecialidad, idpais, idprovincia,  estatus', 'numerical', 'integerOnly'=>true),

            // CAMPOS REQUERIDOS
            array('clave, clave2, email, nombre, apellido, usuario, genero', 'required', 'on'=>'insert'),

            // CAMPOS REQUERIDOS SOLO A LA HORA DE SELECCIONAR CIRCULO (PARTE 2 DEL REGISTRO)

            array('idcategoria, idpais, idprovincia', 'required', 'on'=>'update'),
            // AGREGAR REGLAS PARA QUE CAMPOS COMO NOMBRE Y CORREO SEAN REQUERIDOS DURANTE EL UPDATE DESDE EL PERFIL (AGREGAR UN ESCENARIO)
            // 'on' =>'perfil'

            array('idcategoria, idespecialidad, idpais, idprovincia, idcirculo', 'required', 'on'=>'escogercirculo'),

            // Convertir nombre de usuario a minúsculas
            array('usuario', 'filter', 'filter'=>'strtolower'),

            // Contraseña entre 6 y 45 caracteres
            array('clave','length','max'=>45, 'min'=>6),

            // Comparar contraseñas
            array('clave', 'compare', 'compareAttribute'=>'clave2', 'on'=>'insert'),

            //CAMPOS UNICOS
            array('email, usuario','unique'),

            array('email', 'email'),
            array('email', 'length', 'max'=>100),
			array('usuario, clave, nombre, apellido, tipo', 'length', 'max'=>45),
			array('fecha_ingreso, domicilio, biografia, ciudad, link_facebook, link_twitter, link_linkedin, genero, avatar, nuevacategoria, nuevaespecialidad, nuevocirculo' , 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('circulo, nombrecompleto, especialidad, categoria, pais, provincia,  email, usuario, nombre, apellido, genero', 'safe', 'on'=>'search'),
		);
	}



    public function beforeSave()
    {
        if ($this->isNewRecord)
        {
            $pass = md5($this->clave);
            $this->clave = $pass;
        }
        return true;
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(


            'categoria' => array(self::BELONGS_TO, 'Categoria', 'idcategoria'),
            'especialidad' => array(self::BELONGS_TO, 'Especialidad', 'idespecialidad'),
            'pais'      =>  array(self::BELONGS_TO, 'Pais', 'idpais'),
            'provincia'      =>  array(self::BELONGS_TO, 'Provincia', 'idprovincia'),
            'circulo'       => array(self::BELONGS_TO, 'Circulo', 'idcirculo'),

            'mensajesRecibidos' => array(self::HAS_MANY,   'Mensaje',    'para'),
            'mensajesEnviados'   => array(self::HAS_MANY,   'Mensaje',    'de'),



		);


	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idnw_afiliado' => 'Idnw Afiliado',
			'email' => 'Correo Electrónico',
			'usuario' => 'Usuario',
			'clave' => 'Contaseña',
            'clave2' => 'Ingresa de nuevo tu Contaseña',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'idcategoria' => 'Profesión/Categoría',
			'idespecialidad' => 'Especialidad',
			'fecha_ingreso' => 'Fecha Ingreso',
			'idpais' => 'País',
			'idprovincia' => 'Provincia',
			'ciudad' => 'Ciudad',
			'domicilio' => 'Domicilio',
            'biografia' => 'Reseña Biográfica',
			'estatus' => 'Estatus',
			'tipo' => 'Tipo',
            'link_facebook' => 'Mi Facebook',
            'link_twitter' => 'Mi Twitter',
            'link_linkedin' => 'Mi LinkedIn',
            'genero'=>'Género',
            'avatar'=>'Foto/Avatar',

            /*******/
            'idcirculo'=>'Círculo',
            'nuevacategoria'=>'nuevacategoria',
            'nuevaespecialidad'=>'nuevaespecialidad',
            'nuevocirculo'=>'Indique un nombre para el nuevo Círculo'





		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;


		$criteria->compare('email',$this->email,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);


        //  AGREGAR LOS JOINS ACÁ... <==
        $criteria->with = array('categoria','especialidad','pais','provincia','circulo');


        $criteria->compare('categoria.nombre',$this->categoria,true);
        $criteria->compare('especialidad.nombre',$this->especialidad,true);
        $criteria->compare('pais.nombre',$this->pais,true);
        $criteria->compare('provincia.nombre',$this->provincia,true);


        $criteria->compare('circulo.nombre',$this->circulo,false);



        $criteria->compare('CONCAT(t.nombre," ", t.apellido)',$this->nombrecompleto,true);



		$criteria->compare('idespecialidad',$this->idespecialidad);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('idpais',$this->idpais);
		$criteria->compare('idprovincia',$this->idprovincia);
        $criteria->compare('idcirculo',$this->idcirculo);
		$criteria->compare('ciudad',$this->ciudad);
		$criteria->compare('domicilio',$this->domicilio,true);
		$criteria->compare('estatus',$this->estatus);
		$criteria->compare('tipo',$this->tipo,true);
        $criteria->compare('genero',$this->genero,true);


        $sort = new CSort;
        $sort->attributes = array(
            'nombrecompleto'=>array(
                'asc' => 't.nombre, t.apellido',
                'desc'=> 't.nombre DESC, t.apellido DESC'

            ),

            'circulo'=>array(
                'asc' => 'circulo.nombre',
                'desc' => 'circulo.nombre DESC'
            ),

            'categoria' => array(

                //agrego categoria porque nombre es una columna ambigua: Existe en Afiliado y en Categoria.

                'asc' => 'categoria.nombre',
                'desc' => 'categoria.nombre DESC'
            ),

            'especialidad'=>array(
                'asc' => 'especialidad.nombre',
                'desc' => 'especialidad.nombre DESC'
            ),
            'pais'=>array(
                'asc' => 'pais.nombre',
                'desc' => 'pais.nombre DESC'
            ),
            'provincia'=>array(
                'asc' => 'provincia.nombre',
                'desc' => 'provincia.nombre DESC'
            ),
            '*',
        );



		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Afiliado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}





}
