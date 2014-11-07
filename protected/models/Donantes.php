<?php

/**
 * This is the model class for table "donantes".
 *
 * The followings are the available columns in table 'donantes':
 * @property integer $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $rut
 * @property string $tipo_sangre
 * @property string $email
 * @property string $direccion
 * @property integer $num_contacto
 * @property integer $id_centro_medico
 *
 * The followings are the available model relations:
 * @property CentroMedico $idCentroMedico
 * @property TieneEnfermedad[] $tieneEnfermedads
 */
class Donantes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'donantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('nombres','required','message' => 'El Nombre es requerido'),
                    array('nombres',
                    'length',
                    'min' => 4,
                    'tooShort' => 'Minimo 5 caracteres',
                    'max' => 50,
                    'tooLong' => 'maximo 50 caracteres'),
                  
                    array('apellidos','required','message' => 'El Apellido es requerido'),
                    array('apellidos',
                            'length',
                             'min' => 5,
                             'tooShort' => 'Minimo 5 caracteres',
                             'max' => 50,
                             'tooLong' => 'maximo 50 caracteres'),
                    array('email','unique','message' => 'Este Email ya esta registrado'),
                    array(
                          'email',
                          'required',
                          'message' => 'El Email requerido' ),
                    array(
                        'email',
                        'email',
                        'message' => 'El formato de email introducido no es correcto'
                    ),
                    array(
                        'email',
                        'length',
                        'min' => '8',
                        'tooShort' => 'Minimo 8 caracteres',
                        'max' => '70',
                        'tooLong' => 'Maximo 70 caracteres'
                    ),
                    array('rut','required','message' => 'El Rut es requerido'),
                    array('rut','unique','message' => 'Este Rut ya esta registrado'),
                    array(
                        'num_contacto',
                        'required',
                        'message' => 'El Numero de Contacto es requerido',
                        ),
                    array(
                        'num_contacto',
                        'match',
                        'pattern' => '/[0-9]/',
                        'message' => 'El tipo de dato que se desea enviar no es valido'),
                   // validar Centro Medico
                    array(
                        'num_contacto',
                        'required',
                        'message' => 'Este campo es requerido',
                    ),
                    array('num_contacto','unique','message' => 'El numero ya esta registrado'),
                    array('direccion','required','message' => 'La Direccion debe ser requerida'),
                    array('direccion',
                            'length',
                             'min' => 5,
                             'tooShort' => 'Minimo 5 caracteres',
                             'max' => 50,
                             'tooLong' => 'maximo 50 caracteres'),
                    array('tipo_sangre','required','message' => 'El Tipo de Sangre debe ser requerida'),
                    array('id_centro_medico','required','message' => 'Se requiere ingresar un Centro Medico'),
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
			'tieneEnfermedads' => array(self::HAS_MANY, 'TieneEnfermedad', 'id_donante'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'rut' => 'Rut',
			'tipo_sangre' => 'Tipo Sangre',
			'email' => 'Email',
			'direccion' => 'Direccion',
			'num_contacto' => 'Num Contacto',
			'id_centro_medico' => 'Id Centro Medico',
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
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('rut',$this->rut,true);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('num_contacto',$this->num_contacto);
		$criteria->compare('id_centro_medico',$this->id_centro_medico);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Donantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
