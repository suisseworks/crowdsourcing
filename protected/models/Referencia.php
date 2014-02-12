<?php

/**
 * This is the model class for table "{{referencia}}".
 *
 * The followings are the available columns in table '{{referencia}}':
 * @property integer $idnw_referencia
 * @property integer $idreferido
 * @property integer $idreferidor
 * @property string $comentario
 * @property string $nombre_completo
 * @property string $email
 * @property string $telefono
 * @property string $fecha
 * @property integer $estado
 */
class Referencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{referencia}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idreferido, idreferidor, estado', 'numerical', 'integerOnly'=>true),
			array('nombre_completo, email', 'length', 'max'=>100),
			array('telefono', 'length', 'max'=>45),


            array('nombre_completo,email, idreferido, idreferidor','required','on'=>'insert'),

            array('email','email'),

			array('comentario, fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idreferido, idreferidor, comentario, nombre_completo, email, telefono, fecha, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'referido' => array(self::BELONGS_TO, 'Afiliado', 'idreferido'),
            'referidor' => array(self::BELONGS_TO, 'Afiliado', 'idreferidor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idnw_referencia' => 'Idnw Referencia',
			'idreferido' => 'Referido',
			'idreferidor' => 'Idreferidor',
			'comentario' => 'Comentario',
			'nombre_completo' => 'Nombre Completo',
			'email' => 'Email',
			'telefono' => 'Telefono',
			'fecha' => 'Fecha',
			'estado' => 'Estado',
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

		$criteria->compare('idnw_referencia',$this->idnw_referencia);
		$criteria->compare('idreferido',$this->idreferido);
		$criteria->compare('idreferidor',$this->idreferidor);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('nombre_completo',$this->nombre_completo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Referencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
