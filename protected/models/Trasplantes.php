<?php

/**
 * This is the model class for table "trasplante".
 *
 * The followings are the available columns in table 'trasplante':
 * @property integer $id_transplante
 * @property string $rut_paciente
 * @property string $urgencia_medica
 * @property string $enfermedad
 * @property string $detalle
 * @property string $created
 * @property string $modified
 */
class Trasplantes extends CActiveRecord
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
			array('rut_paciente', 'length', 'max'=>12),
			array('rut_paciente, urgencia_medica, enfermedad, detalle', 'required'),
			array('rut_paciente','validateRut'),
			array('rut_paciente','validaRutCaracter'),
			array('enfermedad','valida_enfermedadChar'),
			array('urgencia_medica, enfermedad', 'length', 'max'=>128),
			array('detalle, created, modified', 'safe'),
			array('modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
        	
        	array('created,modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
        	
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_transplante, rut_paciente, urgencia_medica, enfermedad, detalle, created, modified', 'safe', 'on'=>'search'),
		);
	}


    public function validateRut($attribute, $params) {

        if (strpos($this->$attribute, "-") == false) {
            $data[0] = substr($this->$attribute, 0, -1);
            $data[1] = substr($this->$attribute, -1);
        } else {

            $data = explode('-', $this->$attribute);
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
            $this->addError($attribute, 'El Rut no es válido');
    }



    public function validaRutCaracter($attribute, $params) {
        $pattern = '/^([0-9.]+\-+[0-9kK]{1}+)$/';
        $pattern2 = '/^([0-9.]{1}+\-+[0-9kK]{1}+)$/';
        $pattern3 = '/^([0.]+\-+[0-9kK]{1}+)$/';

        if (!preg_match($pattern, $this->$attribute) OR preg_match($pattern2, $this->$attribute) OR preg_match($pattern3, $this->$attribute))
            $this->addError($attribute, 'El Rut no es válido');
    }

    public function valida_enfermedadChar($attribute, $params) {
        $pattern = '/^([a-zA-ZñÑÁÉÍÓÚáéíóú]+([[:space:]]{0,2}[a-zA-ZñÑÁÉÍÓÚáéíóú]+)*)$/';

        if (!preg_match($pattern, $this->$attribute))
            $this->addError($attribute, 'Error este campo soló debe poseer letras.');
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
			'id_transplante' => 'Id Transplante',
			'rut_paciente' => 'Rut Paciente',
			'urgencia_medica' => 'Urgencia Medica',
			'enfermedad' => 'Enfermedad',
			'detalle' => 'Detalle',
			'created' => 'Creado',
			'modified' => 'Modificado',
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

		$criteria->compare('id_transplante',$this->id_transplante);
		$criteria->compare('rut_paciente',$this->rut_paciente,true);
		$criteria->compare('urgencia_medica',$this->urgencia_medica,true);
		$criteria->compare('enfermedad',$this->enfermedad,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Trasplantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
