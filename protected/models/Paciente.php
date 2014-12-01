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
            array('nombre','validateText'),
            array('nombre','validateText2'),     
            array('apellido','required','message' => 'El Apellido es requerido'),
            array('apellido',
                'length',
                'min' => 3,
                'tooShort' => 'Minimo 3 caracteres',
                'max' => 50,
                'tooLong' => 'maximo 50 caracteres'),
            array('apellido','validateText'),
            array('apellido','validateText2'), 
            array('nombre,apellido', 'match','pattern' => '/^[a-zA-Z\s]+$/','message'=>'El campo {attribute} sólo puede ser texto.'),
            array('rut','required','message' => 'El Rut es requerido'),
            array('rut','unique','message' => 'Este Rut ya esta registrado'),
			array('rut', 'validateRut'),
            array('rut','validateRutCaracter'),
            array('rut',
                'length',
                'min' => 11,
                'tooShort' => 'El Rut ingresado no es valido',
                'max' => 12,
                'tooLong' => 'El Rut ingresado no es valido'),
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
            array('fecha_nacimiento','validateFechaNacimiento'),
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
			'necesidad_medula' => 'Necesidad Medula',
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
		$criteria->compare('necesidad_medula',$this->necesidad_medula,true);
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

	public function validateRut($attribute, $params) {
	 	$rut = str_split($this->$attribute);
	 	$array_rut = array();
	    for($i=0; $i< strlen($this->$attribute); $i++) {

	    	if($rut[$i]!='.'){
	    	  $array_rut[]=$rut[$i];	
			}
	    }
	    
	    $rut_attribute = implode("", $array_rut);

        if (strpos($rut_attribute, "-") == false) {
            $data[0] = substr($rut_attribute, 0, -1);
            $data[1] = substr($rut_attribute, -1);
        } else {
            $data = explode('-', $rut_attribute);
        }
        $evaluate = strrev(str_replace(".", "", trim($data[0])));
        $multiply = 2;
        $store = 0;
        for ($i = 0; $i < strlen($evaluate); $i++) {
            $store += $evaluate[$i] * $multiply;
            $multiply++;
            if ($multiply > 7)
                $multiply = 2;
        }
        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
        $result = 11 - ($store % 11);
        if ($result == 10)
            $result = 'k';
        if ($result == 11)
            $result = 0;
        if ($verifyCode != $result)
            $this->addError($attribute,'El Rut ingresado no es valido');
    }
    public function validateRutCaracter($attribute, $params) {
    	$rut = str_split($this->$attribute);
    	$array_rut = array();
	    for($i=0; $i< strlen($this->$attribute); $i++) {

	    	if($rut[$i]!='.'){
	    	  $array_rut[]=$rut[$i];	
			}
	    }
	    $rut_attribute = implode("", $array_rut);

        $pattern = '/^([0-9.]+\-+[0-9kK]{1}+)$/';
        $pattern2 = '/^([0-9.]{1}+\-+[0-9kK]{1}+)$/';
        $pattern3 = '/^([0.]+\-+[0-9kK]{1}+)$/';
        if (!preg_match($pattern, $rut_attribute) OR preg_match($pattern2, $rut_attribute) OR preg_match($pattern3, $rut_attribute))
            $this->addError($attribute, 'El Rut ingresado no es valido');
    }
    public function validateFechaNacimiento($attribute, $params) {
    	if($this->$attribute!=""){	
			if(strtotime($this->$attribute) && 1 === preg_match('~[0-9]~', $this->$attribute)){
			    $date1 = new DateTime(date('Y-m-d'));
				$date2 = new DateTime($this->$attribute);
				$interval = $date1->diff($date2);
				if(($interval->y) < 18){
				    $this->addError($attribute,'Fecha de Nacimiento: Solo se pueden ingresar Donantes Mayores de 18 Años');
				}
			}else{
				$this->addError($attribute,'Fecha de Nacimiento: Ingrese una fecha valida');
			}
	    }
    }
    public function validateContacto($attribute, $params) {
        $pattern = '/^([\+]*[0-9]+)$/';
        if($this->$attribute!=""){
	        if (!preg_match($pattern, $this->$attribute))
	            $this->addError($attribute, 'Contacto: No válido, la forma es Ej; +5698142785 o 98142785');
   		}
    }
    public function validateText($attribute, $params) {
        $pattern = '/^([a-zA-ZñÑÁÉÍÓÚáéíóú]+([[:space:]]{0,2}[a-zA-ZñÑÉÍÓÚáéíóú]+)*)$/';
	        if($this->$attribute!=""){	
		        if (!preg_match($pattern, $this->$attribute))
		            $this->addError($attribute, $attribute.': Error sólo letras o verifique que no tenga espacios al final');
	    	}
    	}
    
    public function validateText2($attribute, $params) {
        $pattern2 = '/(a{3}|e{3}|i{4}|o{3}|u{3}|b{3}|c{3}|d{3}|f{3}|g{3}|h{3}|j{3}|k{3}|l{4}|m{3}|n{3}|ñ{3}|p{3}|q{3}|r{3}|s{3}|t{3}|v{3}|w{4}|x{3}|y{3}|z{3}|º{2}|°{2}|\.{2}|\'{2}|\"{2}|\){2}|\({2}|\,{2}|\-{2}|\@{2}|\:{2}|\/{3}|\+{2})/i';
        $pattern3 = '/(A{3}|E{3}|I{4}|O{3}|U{3}|B{3}|C{3}|D{3}|F{3}|G{3}|H{3}|J{3}|K{3}|L{4}|M{3}|N{3}|Ñ{3}|P{3}|Q{3}|R{3}|S{3}|T{3}|V{3}|W{4}|X{3}|Y{3}|Z{3})/i';
        $pattern4 = '/(á{3}|Á{3}|é{3}|É{3}|í{3}|Í{3}|ó{3}|Ó{3}|ú{3}|Ú{3})/i';
        $pattern5 = '/([0-9]{13})/i';
        if($this->$attribute!=""){
	        if (preg_match($pattern2, $this->$attribute) OR preg_match($pattern3, $this->$attribute) OR preg_match($pattern4, $this->$attribute))
	            $this->addError($attribute, $attribute.': Verifique que no este repetidos continuamente los caracteres');
	        if (preg_match($pattern5, $this->$attribute))
	            $this->addError($attribute, $attribute.': No puede haber un número superior a 9999999999999');
    	}
    }
}
