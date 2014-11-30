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
			array('nombre','required','message' => 'El Nombre es requerido'),
                    array('nombre',
                    'length',
                    'min' => 3,
                    'tooShort' => 'Mínimo 3 caracteres',
                    'max' => 50,
                    'tooLong' => 'máximo 50 caracteres'),
                    array('nombre','validateText'),
                    array('nombre','validateText3'),
                    array('nombre','unique','message' => 'Este Centro Medico ya esta registrado'),
            array('especialidad','required','message' => 'El Nombre es requerido'),
                    array('especialidad',
                    'length',
                    'min' => 3,
                    'tooShort' => 'Mínimo 3 caracteres',
                    'max' => 50,
                    'tooLong' => 'máximo 50 caracteres'),
                    array('especialidad','validateText'),
                    array('especialidad','validateText3'),
            array('director','required','message' => 'El Nombre es requerido'),
                    array('director',
                    'length',
                    'min' => 3,
                    'tooShort' => 'Mínimo 3 caracteres',
                    'max' => 50,
                    'tooLong' => 'máximo 50 caracteres'),
                    array('director','validateText'),
                    array('director','validateText3'),        
            array('direccion','required','message' => 'La Direccion debe ser requerida'),
            		array('direccion','unique','message' => 'Esta Direccion ya esta registrada'),
                    array('direccion',
                            'length',
                             'min' => 5,
                             'tooShort' => 'Minimo 5 caracteres',
                             'max' => 50,
                             'tooLong' => 'maximo 50 caracteres'),
                    array('direccion','validateText2'),
                    array('direccion','validateText3'),
                    array('direccion','unique','message' => 'La direccion ya esta ingresada'),
            array('contacto',
                        'required',
                        'message' => 'El Numero de Contacto es requerido',
                        ),
            		array('contacto','unique','message' => 'Este Contato ya esta registrado'),
                    array('contacto','validateContacto'),
                    array('contacto',
                            'length',
                             'min' => 6,
                             'tooShort' => 'El numero ingresado no es valido',
                             'max' => 13,
                             'tooLong' => 'El numero ingresado no es valido'),
            array('gubernamental','required','message' => 'Se requiere saber si el centro medico es Gubernamental o no'),        
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
 	public function validateContacto($attribute, $params) {
        $pattern = '/^([\+]*[0-9]+)$/';
        if (!preg_match($pattern, $this->$attribute))
            $this->addError($attribute, 'No es válido, la forma es Ej; +5698142785 o 98142785');
    }
 	public function validateText($attribute, $params) {
        $pattern = '/^([a-zA-ZñÑÁÉÍÓÚáéíóú]+([[:space:]]{0,2}[a-zA-ZñÑÉÍÓÚáéíóú]+)*)$/';
        if (!preg_match($pattern, $this->$attribute))
            $this->addError($attribute, 'Error sólo letras o verifique que no tenga espacios al final');
    }

	public function validateText2($attribute, $params) {
        $pattern = '/^([a-zA-ZñÑÁÉÍÓÚáéíóú0-9º°\.\,\'\"\)\(\-\@\:\/\+]+([[:space:]]{0,2}[a-zA-ZñÑÁÉÍÓÚáéíóú0-9º°\.\,\'\"\)\(\-\@\:\/\+]+)*)$/';
        $pattern2 = '/^([0-9º°\.\,\'\"\)\(\-\@\:\/\+]+)$/';
        if (!preg_match($pattern, $this->$attribute))
            $this->addError($attribute, 'Se deben ingresar letras o letras y números, verifique que no tenga espacios al final o muchos en medio.');
        if (preg_match($pattern2, $this->$attribute))
            $this->addError($attribute, 'Error No puede ser solo números o caracteres especiales');
    }
    public function validateText3($attribute, $params) {
        $pattern2 = '/(a{3}|e{3}|i{4}|o{3}|u{3}|b{3}|c{3}|d{3}|f{3}|g{3}|h{3}|j{3}|k{3}|l{4}|m{3}|n{3}|ñ{3}|p{3}|q{3}|r{3}|s{3}|t{3}|v{3}|w{4}|x{3}|y{3}|z{3}|º{2}|°{2}|\.{2}|\'{2}|\"{2}|\){2}|\({2}|\,{2}|\-{2}|\@{2}|\:{2}|\/{3}|\+{2})/i';
        $pattern3 = '/(A{3}|E{3}|I{4}|O{3}|U{3}|B{3}|C{3}|D{3}|F{3}|G{3}|H{3}|J{3}|K{3}|L{4}|M{3}|N{3}|Ñ{3}|P{3}|Q{3}|R{3}|S{3}|T{3}|V{3}|W{4}|X{3}|Y{3}|Z{3})/i';
        $pattern4 = '/(á{3}|Á{3}|é{3}|É{3}|í{3}|Í{3}|ó{3}|Ó{3}|ú{3}|Ú{3})/i';
        $pattern5 = '/([0-9]{13})/i';
        if (preg_match($pattern2, $this->$attribute) OR preg_match($pattern3, $this->$attribute) OR preg_match($pattern4, $this->$attribute))
            $this->addError($attribute, 'Error, verifique que no este repetidos continuamente los caracteres');
        if (preg_match($pattern5, $this->$attribute))
            $this->addError($attribute, 'Error, no puede haber un número superior a 9999999999999');
    }
}
