<?php

/**
 * This is the model class for table "necesidad_medula".
 *
 * The followings are the available columns in table 'necesidad_medula':
 * @property integer $id
 * @property string $grado_urgencia
 * @property string $fecha
 * @property integer $id_paciente
 * @property integer $id_medula
 *
 * The followings are the available model relations:
 * @property Paciente $idPaciente
 * @property Medula $idMedula
 */
class NecesidadMedula extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'necesidad_medula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_paciente, id_medula', 'numerical', 'integerOnly'=>true),
			array('grado_urgencia', 'length', 'max'=>20),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, grado_urgencia, fecha, id_paciente, id_medula', 'safe', 'on'=>'search'),
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
			'idPaciente' => array(self::BELONGS_TO, 'Paciente', 'id_paciente'),
			'idMedula' => array(self::BELONGS_TO, 'Medula', 'id_medula'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'grado_urgencia' => 'Grado Urgencia',
			'fecha' => 'Fecha',
			'id_paciente' => 'Id Paciente',
			'id_medula' => 'Id Medula',
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
		$criteria->compare('grado_urgencia',$this->grado_urgencia,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('id_paciente',$this->id_paciente);
		$criteria->compare('id_medula',$this->id_medula);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NecesidadMedula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
