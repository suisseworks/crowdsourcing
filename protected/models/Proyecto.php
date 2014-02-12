<?php

/**
 * This is the model class for table "{{proyecto}}".
 *
 * The followings are the available columns in table '{{proyecto}}':
 * @property integer $idcs_proyecto
 * @property integer $idafiliado
 * @property string $nombre
 * @property string $descripcion
 * @property integer $idcategoriaproyecto
 * @property string $fecha_creacion
 * @property string $logo
 * @property string $fecha_envio
 * @property string $fecha_aprobacion
 * @property string $estado
 * @property double $roi
 * @property string $nivel_riesgo
 * @property integer $plazo
 * @property integer $inversion_total_requerida
 * @property string $inversion_minima
 * @property string $video
 * @property string $tags
 * @property string $especialidades
 * @property string $fecha_ultima_modificacion
 */
class Proyecto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{proyecto}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idafiliado, idcategoriaproyecto, plazo', 'numerical', 'integerOnly'=>true),
            array('roi, inversion_total_requerida, inversion_minima', 'numerical'),
			array('nombre, estado, nivel_riesgo, inversion_minima', 'length', 'max'=>45),
			array('logo', 'length', 'max'=>145),
			array('descripcion, fecha_creacion, fecha_envio, fecha_aprobacion, fecha_ultima_modificacion, video, tags, especialidades, logo', 'safe'),

            // CAMPOS REQUERIDOS AL CREAR
            array('nombre, descripcion', 'required', 'on'=>'insert'),

            // CAMPOS REQUERIDOS AL EDITAR
            array('nombre, descripcion', 'required', 'on'=>'update'),



			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idcs_proyecto, idafiliado, nombre, descripcion, idcategoriaproyecto, fecha_creacion, fecha_ultima_modificacion, logo, fecha_envio, fecha_aprobacion, estado, roi, nivel_riesgo, plazo, inversion_total_requerida, inversion_minima, video, tags, especialidades', 'safe', 'on'=>'search'),
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
			'idcs_proyecto' => 'Idcs Proyecto',
			'idafiliado' => 'Idafiliado',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'idcategoriaproyecto' => 'Categoría',
			'fecha_creacion' => 'Fecha Creación',
			'logo' => 'Logo',
			'fecha_envio' => 'Fecha Envio',
			'fecha_aprobacion' => 'Fecha Aprobación',
            'fecha_ultima_modificacion'=> 'Última Modificación',
            'estado' => 'Estado',
            'roi' => 'ROI',
			'nivel_riesgo' => 'Nivel de Riesgo',
			'plazo' => 'Plazo',
			'inversion_total_requerida' => 'Inversión Total Requerida',
			'inversion_minima' => 'Inversión Minima',
			'video' => 'Video',
			'tags' => 'Tags',
			'especialidades' => 'Especialidades'
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

		$criteria->compare('idcs_proyecto',$this->idcs_proyecto);
		$criteria->compare('idafiliado',$this->idafiliado);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idcategoriaproyecto',$this->idcategoriaproyecto);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('fecha_envio',$this->fecha_envio,true);
		$criteria->compare('fecha_aprobacion',$this->fecha_aprobacion,true);
        $criteria->compare('fecha_ultima_modificacion',$this->fecha_ultima_modificacion,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('roi',$this->roi);
		$criteria->compare('nivel_riesgo',$this->nivel_riesgo,true);
		$criteria->compare('plazo',$this->plazo);
		$criteria->compare('inversion_total_requerida',$this->inversion_total_requerida);
		$criteria->compare('inversion_minima',$this->inversion_minima,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('especialidades',$this->especialidades,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proyecto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
