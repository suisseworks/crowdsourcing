<?php

/**
 * This is the model class for table "{{preferencias}}".
 *
 * The followings are the available columns in table '{{preferencias}}':
 * @property integer $idnw_preferencias
 * @property integer $idafiliado
 * @property integer $notificaciones_por_correo
 * @property string $skin
 */
class Preferencias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{preferencias}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idafiliado, notificaciones_por_correo', 'numerical', 'integerOnly'=>true),
			array('skin', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idnw_preferencias, idafiliado, notificaciones_por_correo, skin', 'safe', 'on'=>'search'),
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
			'idnw_preferencias' => 'Idnw Preferencias',
			'idafiliado' => 'Idafiliado',
			'notificaciones_por_correo' => 'Notificaciones Por Correo',
			'skin' => 'Skin',
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

		$criteria->compare('idnw_preferencias',$this->idnw_preferencias);
		$criteria->compare('idafiliado',$this->idafiliado);
		$criteria->compare('notificaciones_por_correo',$this->notificaciones_por_correo);
		$criteria->compare('skin',$this->skin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Preferencias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
