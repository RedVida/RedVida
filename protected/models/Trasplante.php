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
			array('detalle','required','message' => 'Se Requiere ingresar Un detalle sobre el trasplante' ),
				array('detalle','validateText2'),
				array('detalle','validateText3'),
			array('id_centro_medico','required','message' => 'Se Requiere ingresar El Centro Medico en donde se realizo el trasplante' ),	
				array('id_centro_medico, id_donacion, id_paciente', 'numerical', 'integerOnly'=>true),
				array('detalle, created, modified', 'safe'),
				array('modified','default',
	          'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
        	
        	array('created,modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, detalle, created, modified,nombre,tipo, id_centro_medico, id_donacion, id_paciente', 'safe', 'on'=>'search'),
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
			'id_centro_medico' => 'Id Centro Medico',
			'id_donacion' => 'Id Donacion',
			'id_paciente' => 'Id Paciente',
			'nombre'=>'nombre',
			'tipo'=>'tipo',
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
		$criteria->compare('id_centro_medico',$this->id_centro_medico);
		$criteria->compare('id_donacion',$this->id_donacion);
		$criteria->compare('id_paciente',$this->id_paciente);
		$criteria->compare('nombre',$this->nombre);
		$criteria->compare('tipo',$this->tipo);


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

	 public function validateText2($attribute, $params) {
        $pattern = '/^([a-zA-ZñÑÁÉÍÓÚáéíóú0-9º°\.\,\'\"\)\(\-\@\:\/\+]+([[:space:]]{0,2}[a-zA-ZñÑÁÉÍÓÚáéíóú0-9º°\.\,\'\"\)\(\-\@\:\/\+]+)*)$/';
        $pattern2 = '/^([0-9º°\.\,\'\"\)\(\-\@\:\/\+]+)$/';
        if($this->$attribute!=""){
	        if (!preg_match($pattern, $this->$attribute))
	            $this->addError($attribute, $attribute.': Se deben ingresar letras o letras y números, verifique que no tenga espacios al final o en medio.');
	        if (preg_match($pattern2, $this->$attribute))
	            $this->addError($attribute, $attribute.': Error No puede ser solo números o caracteres especiales');
    	}
    }
    public function validateText3($attribute, $params) {
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
