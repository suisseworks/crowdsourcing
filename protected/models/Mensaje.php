<?php

/**
 * This is the model class for table "{{mensaje}}".
 *
 * The followings are the available columns in table '{{mensaje}}':
 * @property integer $de
 * @property integer $para
 * @property string $asunto
 * @property string $mensaje
 * @property integer $tipo
 * @property integer $estado
 */
class Mensaje extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mensaje}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, estado', 'numerical', 'integerOnly'=>true),
			array('asunto', 'length', 'max'=>100),
			array('mensaje', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('de, para, para_idafiliado  asunto, mensaje, tipo, estado, fecha', 'safe', 'on'=>'search'),
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
			'idnw_mensaje' => 'Idnw Mensaje',
			'de' => 'De',
			'para' => 'Para',
			'asunto' => 'Asunto',
			'mensaje' => 'Mensaje',
			'tipo' => 'Tipo',
			'estado' => 'Estado',
            'fecha' => 'Fecha'
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

		$criteria->compare('idnw_mensaje',$this->idnw_mensaje);
		$criteria->compare('de',$this->de,true);
		$criteria->compare('para',$this->para,true);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('estado',$this->estado);
        $criteria->compare('fecha',$this->fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mensaje the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
