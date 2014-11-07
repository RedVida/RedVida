<?php

/**
 * This is the model class for table "paciente".
 *
 * The followings are the available columns in table 'paciente':
 * @property integer $id
 * @property string $nombrePaciente
 * @property string $apellidoPaciente
 * @property string $rutPaciente
 * @property string $afiliacionPaciente
 * @property string $enfermedadPaciente
 * @property string $gradoUrgenciaPaciente
 * @property string $necesidadTrasplantePaciente
 * @property string $centroMedicoPaciente
 */
class Paciente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'paciente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombrePaciente, apellidoPaciente, rutPaciente', 'required'),
			array('nombrePaciente, apellidoPaciente, afiliacionPaciente, gradoUrgenciaPaciente, necesidadTrasplantePaciente', 'length', 'max'=>20),
			array('rutPaciente', 'length', 'max'=>12),
			array('enfermedadPaciente, centroMedicoPaciente', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombrePaciente, apellidoPaciente, rutPaciente, afiliacionPaciente, enfermedadPaciente, gradoUrgenciaPaciente, necesidadTrasplantePaciente, centroMedicoPaciente', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nombrePaciente' => 'Nombre Paciente',
			'apellidoPaciente' => 'Apellido Paciente',
			'rutPaciente' => 'Rut Paciente',
			'afiliacionPaciente' => 'Afiliacion Paciente',
			'enfermedadPaciente' => 'Enfermedad Paciente',
			'gradoUrgenciaPaciente' => 'Grado Urgencia Paciente',
			'necesidadTrasplantePaciente' => 'Necesidad Trasplante Paciente',
			'centroMedicoPaciente' => 'Centro Medico Paciente',
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
		$criteria->compare('nombrePaciente',$this->nombrePaciente,true);
		$criteria->compare('apellidoPaciente',$this->apellidoPaciente,true);
		$criteria->compare('rutPaciente',$this->rutPaciente,true);
		$criteria->compare('afiliacionPaciente',$this->afiliacionPaciente,true);
		$criteria->compare('enfermedadPaciente',$this->enfermedadPaciente,true);
		$criteria->compare('gradoUrgenciaPaciente',$this->gradoUrgenciaPaciente,true);
		$criteria->compare('necesidadTrasplantePaciente',$this->necesidadTrasplantePaciente,true);
		$criteria->compare('centroMedicoPaciente',$this->centroMedicoPaciente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Paciente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
