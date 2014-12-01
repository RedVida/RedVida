<?php

/**
 * This is the model class for table "trasplante".
 *
 * The followings are the available columns in table 'trasplante':
 * @property integer $id
 * @property string $detalle
 * @property string $created
 * @property string $modified
 * @property integer $id_tipo_trasplante
 * @property integer $id_centro_medico
 * @property integer $id_donacion
 * @property integer $id_paciente
 *
 * The followings are the available model relations:
 * @property TipoTrasplante $idTipoTrasplante
 * @property CentroMedico $idCentroMedico
 * @property Donacion $idDonacion
 * @property Paciente $idPaciente
 */
class Trasplante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trasplante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo_trasplante, id_centro_medico, id_donacion, id_paciente', 'numerical', 'integerOnly'=>true),
			array('detalle, created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, detalle, created, modified, id_tipo_trasplante, id_centro_medico, id_donacion, id_paciente', 'safe', 'on'=>'search'),
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
			'idTipoTrasplante' => array(self::BELONGS_TO, 'TipoTrasplante', 'id_tipo_trasplante'),
			'idCentroMedico' => array(self::BELONGS_TO, 'CentroMedico', 'id_centro_medico'),
			'idDonacion' => array(self::BELONGS_TO, 'Donacion', 'id_donacion'),
			'idPaciente' => array(self::BELONGS_TO, 'Paciente', 'id_paciente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'detalle' => 'Detalle',
			'created' => 'Created',
			'modified' => 'Modified',
			'id_tipo_trasplante' => 'Id Tipo Trasplante',
			'id_centro_medico' => 'Id Centro Medico',
			'id_donacion' => 'Id Donacion',
			'id_paciente' => 'Id Paciente',
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
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('id_tipo_trasplante',$this->id_tipo_trasplante);
		$criteria->compare('id_centro_medico',$this->id_centro_medico);
		$criteria->compare('id_donacion',$this->id_donacion);
		$criteria->compare('id_paciente',$this->id_paciente);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Trasplante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
