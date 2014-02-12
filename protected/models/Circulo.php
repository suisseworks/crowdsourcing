<?php

/**
 * This is the model class for table "{{circulo}}".
 *
 * The followings are the available columns in table '{{circulo}}':
 * @property integer $idnw_circulo
 * @property string $nombre
 * @property string $descripcion
 * @property integer $idlider
 * @property integer $idpais
 * @property integer $idprovincia
 */
class Circulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{circulo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idlider, idpais, idprovincia', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nombre, descripcion', 'safe', 'on'=>'search'),
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
            'idpais'      => array(self::BELONGS_TO, 'Pais', 'id'),
            'lider'       => array(self::BELONGS_TO, 'Afiliado', 'idlider')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */




	public function attributeLabels()
	{
		return array(
			'idnw_circulo' => 'ID del Círculo',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'idlider' => 'Líder',
			'idpais' => 'País',
			'idprovincia' => 'Provincia',
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

		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idlider',$this->idlider);
		$criteria->compare('idpais',$this->idpais);
		$criteria->compare('idprovincia',$this->idprovincia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Circulo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    static public function getNombre($idcirculo)
    {
        $circulo = self::model()->find(array("condition"=>"idnw_circulo = $idcirculo"));
        return ($circulo != null) ? $circulo["nombre"] : "";



    }


}

