<?php

/**
 * This is the model class for table "trasplante".
 *
 * The followings are the available columns in table 'trasplante':
 * @property integer $id
 * @property string $id_donante
 * @property string $id_paciente
 * @property string $tipo_donacion
 * @property string $id_donacion
 * @property string $compatibilidad
 * @property string $detalle
 * @property string $grado_urgencia
 * @property string $centro_medico
 * @property string $created
 * @property string $modified
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
			array('id_donante, id_paciente, tipo_donacion, id_donacion,grado_urgencia', 'required'),
			array('id_donante, id_paciente', 'length', 'max'=>12),
			array('tipo_donacion, id_donacion, compatibilidad, grado_urgencia, centro_medico', 'length', 'max'=>255),
			array('detalle, created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_donante, id_paciente, tipo_donacion, id_donacion, compatibilidad, detalle, grado_urgencia, centro_medico, created, modified', 'safe', 'on'=>'search'),
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
			'id_donante' => 'Id Donante',
			'id_paciente' => 'Id Paciente',
			'tipo_donacion' => 'Tipo Donacion',
			'id_donacion' => 'Id Donacion',
			'compatibilidad' => 'Compatibilidad',
			'detalle' => 'Detalle',
			'grado_urgencia' => 'Grado Urgencia',
			'centro_medico' => 'Centro Medico',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('id_donante',$this->id_donante,true);
		$criteria->compare('id_paciente',$this->id_paciente,true);
		$criteria->compare('tipo_donacion',$this->tipo_donacion,true);
		$criteria->compare('id_donacion',$this->id_donacion,true);
		$criteria->compare('compatibilidad',$this->compatibilidad,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('grado_urgencia',$this->grado_urgencia,true);
		$criteria->compare('centro_medico',$this->centro_medico,true);
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
	 * @return Trasplante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}