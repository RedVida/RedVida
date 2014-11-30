<?php

/**
 * This is the model class for table "paciente".
 *
 * The followings are the available columns in table 'paciente':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $rut
 * @property string $afiliacion
 * @property string $grado_urgencia
 * @property string $necesidad_transplante
 * @property string $tipo_sangre
 * @property integer $id_centro_medico
 *
 * The followings are the available model relations:
 * @property CentroMedico $idCentroMedico
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
			array('nombre','required','message' => 'El Nombre es requerido'),
            array('nombre',
                'length',
                'min' => 3,
                'tooShort' => 'Minimo 3 caracteres',
                'max' => 50,
                'tooLong' => 'maximo 50 caracteres'),
                  
            array('apellido','required','message' => 'El Apellido es requerido'),
            array('apellido',
                'length',
                'min' => 3,
                'tooShort' => 'Minimo 3 caracteres',
                'max' => 50,
                'tooLong' => 'maximo 50 caracteres'),
            array('nombre,apellido', 'match','pattern' => '/^[a-zA-Z\s]+$/','message'=>'El campo {attribute} sólo puede ser texto.'),
            array('rut','required','message' => 'El Rut es requerido'),
            array('rut','unique','message' => 'Este Rut ya esta registrado'),
            array(
                'afiliacion',
                'required',
                'message' => 'La afiliacion es requerida',
            ),
            array(
                'grado_urgencia',
                'required',
                'message' => 'El grado de urgencia es requerido',
            ),
            array(
                'necesidad_transplante',
                'required',
                'message' => 'La necesidad de transplante es requerida',
            ),
            array(
                'tipo_sangre',
                'required',
                'message' => 'El tipo de sangre es requerido',
            ),
            array(
                'id_centro_medico',
                'required',
                'message' => 'El centro medico es requerido',
            ),
            array(
            	'fecha_nacimiento',
            	'required',
            	'message' => 'La fecha de nacimiento es requerida'
           	),
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
			'idCentroMedico' => array(self::BELONGS_TO, 'CentroMedico', 'id_centro_medico'),
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
			'afiliacion' => 'Afiliacion',
			'grado_urgencia' => 'Grado Urgencia',
			'necesidad_transplante' => 'Necesidad Transplante',
			'tipo_sangre' => 'Tipo Sangre',
			'id_centro_medico' => 'Id Centro Medico',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'fecha_ingreso' => 'Fecha De Ingreso',
			'edad' => 'Edad',
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
		$criteria->compare('afiliacion',$this->afiliacion,true);
		$criteria->compare('grado_urgencia',$this->grado_urgencia,true);
		$criteria->compare('necesidad_transplante',$this->necesidad_transplante,true);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);
		$criteria->compare('id_centro_medico',$this->id_centro_medico);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso);
		$criteria->compare('edad',$this->edad);

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
