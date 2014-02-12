<?php

/**
 * This is the model class for table "{{spotlight}}".
 *
 * The followings are the available columns in table '{{spotlight}}':
 * @property integer $idnw_spotlight
 * @property integer $idafiliado
 * @property integer $tipo
 * @property string $titular
 * @property string $mensaje
 * @property string $fecha
 * @property integer $estatus
 */
class Spotlight extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{spotlight}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idafiliado, tipo, estatus', 'numerical', 'integerOnly'=>true),
			array('titular', 'length', 'max'=>45),
			array('mensaje, fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idnw_spotlight, idafiliado, tipo, titular, mensaje, fecha, estatus', 'safe', 'on'=>'search'),
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
           'afiliado' => array(self::BELONGS_TO, 'Afiliado', 'idafiliado'),


		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idnw_spotlight' => 'Idnw Spotlight',
			'idafiliado' => 'Idafiliado',
			'tipo' => 'Tipo',
			'titular' => 'Titular',
			'mensaje' => 'Mensaje',
			'fecha' => 'Fecha',
			'estatus' => 'Estatus',
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

		$criteria->compare('idnw_spotlight',$this->idnw_spotlight);
		$criteria->compare('idafiliado',$this->idafiliado);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('titular',$this->titular,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Spotlight the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
