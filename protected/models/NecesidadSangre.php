<?php

/**
 * This is the model class for table "necesidad_sangre".
 *
 * The followings are the available columns in table 'necesidad_sangre':
 * @property integer $id
 * @property string $grado_urgencia
 * @property string $fecha
 * @property integer $id_paciente
 * @property integer $id_banco_sangre
 * @property integer $cantidad
 *
 * The followings are the available model relations:
 * @property Paciente $idPaciente
 * @property BancoSangre $idBancoSangre
 */
class NecesidadSangre extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'necesidad_sangre';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad', 'required'),
			array('id_paciente, id_banco_sangre, cantidad', 'numerical', 'integerOnly'=>true),
			array('grado_urgencia', 'length', 'max'=>20),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, grado_urgencia, fecha, id_paciente, id_banco_sangre, cantidad', 'safe', 'on'=>'search'),
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
			'idPaciente' => array(self::BELONGS_TO, 'Paciente', 'id_paciente'),
			'idBancoSangre' => array(self::BELONGS_TO, 'BancoSangre', 'id_banco_sangre'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'grado_urgencia' => 'Grado Urgencia',
			'fecha' => 'Fecha',
			'id_paciente' => 'Id Paciente',
			'id_banco_sangre' => 'Id Banco Sangre',
			'cantidad' => 'Cantidad',
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
		$criteria->compare('grado_urgencia',$this->grado_urgencia,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('id_paciente',$this->id_paciente);
		$criteria->compare('id_banco_sangre',$this->id_banco_sangre);
		$criteria->compare('cantidad',$this->cantidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NecesidadSangre the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
