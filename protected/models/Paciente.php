<?php

/**
 * This is the model class for table "paciente".
 *
 * The followings are the available columns in table 'paciente':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $rut
 * @property string $sexo
 * @property double $peso
 * @property double $altura
 * @property integer $edad
 * @property string $afiliacion
 * @property string $tipo_sangre
 * @property integer $id_centro_medico
 * @property string $fecha_ingreso
 * @property string $fecha_nacimiento
 *
 * The followings are the available model relations:
 * @property AlergiaPaciente[] $alergiaPacientes
 * @property EnfermedadPaciente[] $enfermedadPacientes
 * @property NecesidadMedula[] $necesidadMedulas
 * @property NecesidadOrgano[] $necesidadOrganos
 * @property CentroMedico $idCentroMedico
 * @property Trasplante[] $trasplantes
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
			array('edad, id_centro_medico', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, afiliacion', 'length', 'max'=>20),
			array('rut', 'length', 'max'=>12),
			array('sexo', 'length', 'max'=>3),
			array('tipo_sangre', 'length', 'max'=>10),
			array('fecha_ingreso, fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido, rut, sexo, edad, afiliacion, tipo_sangre, id_centro_medico, fecha_ingreso, fecha_nacimiento', 'safe', 'on'=>'search'),
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
			'alergiaPacientes' => array(self::HAS_MANY, 'AlergiaPaciente', 'id_paciente'),
			'enfermedadPacientes' => array(self::HAS_MANY, 'EnfermedadPaciente', 'id_paciente'),
			'necesidadMedulas' => array(self::HAS_MANY, 'NecesidadMedula', 'id_paciente'),
			'necesidadOrganos' => array(self::HAS_MANY, 'NecesidadOrgano', 'id_paciente'),
			'idCentroMedico' => array(self::BELONGS_TO, 'CentroMedico', 'id_centro_medico'),
			'trasplantes' => array(self::HAS_MANY, 'Trasplante', 'id_paciente'),
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
			'apellido' => 'Apellido',
			'rut' => 'Rut',
			'sexo' => 'Sexo',
			'afiliacion' => 'Afiliacion',
			'tipo_sangre' => 'Tipo Sangre',
			'id_centro_medico' => 'Id Centro Medico',
			'fecha_ingreso' => 'Fecha Ingreso',
			'fecha_nacimiento' => 'Fecha Nacimiento',
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
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('edad',$this->edad);
		$criteria->compare('afiliacion',$this->afiliacion,true);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);
		$criteria->compare('id_centro_medico',$this->id_centro_medico);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);

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
