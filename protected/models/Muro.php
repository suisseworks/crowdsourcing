<?php

/**
 * This is the model class for table "{{muro}}".
 *
 * The followings are the available columns in table '{{muro}}':
 * @property integer $idnw_muro
 * @property string $fecha
 * @property integer $idafiliado
 * @property string $asunto
 * @property string $mensaje
 * @property integer $estado
 */
class Muro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{muro}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idafiliado, estado', 'numerical', 'integerOnly'=>true),
			array('asunto', 'length', 'max'=>145),
			array('fecha, mensaje', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idnw_muro, fecha, idafiliado, asunto, mensaje, estado', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idnw_muro' => 'Idnw Muro',
			'fecha' => 'Fecha',
			'idafiliado' => 'Idafiliado',
			'asunto' => 'Asunto',
			'mensaje' => 'Mensaje',
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

		$criteria->compare('idnw_muro',$this->idnw_muro);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('idafiliado',$this->idafiliado);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Muro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
