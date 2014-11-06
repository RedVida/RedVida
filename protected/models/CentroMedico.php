<?php

/**
 * This is the model class for table "centro_medico".
 *
 * The followings are the available columns in table 'centro_medico':
 * @property integer $id
 * @property string $nombre
 * @property string $direccion
 * @property integer $contacto
 * @property string $director
 * @property string $especialidad
 * @property string $gubernamental
 *
 * The followings are the available model relations:
 * @property Donantes[] $donantes
 */
class CentroMedico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'centro_medico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contacto', 'numerical', 'integerOnly'=>true),
			array('nombre, direccion, director, especialidad, gubernamental', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, direccion, contacto, director, especialidad, gubernamental', 'safe', 'on'=>'search'),
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
			'donantes' => array(self::HAS_MANY, 'Donantes', 'id_centro_medico'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'contacto' => 'Contacto',
			'director' => 'Director',
			'especialidad' => 'Especialidad',
			'gubernamental' => 'Gubernamental',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('contacto',$this->contacto);
		$criteria->compare('director',$this->director,true);
		$criteria->compare('especialidad',$this->especialidad,true);
		$criteria->compare('gubernamental',$this->gubernamental,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CentroMedico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getCentroMedico(){
 		return CHtml::listData(CentroMedico::model()->findAll(),'id','nombre');
 	}
}