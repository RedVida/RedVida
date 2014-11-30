<?php

/**
 * This is the model class for table "transfusion".
 *
 * The followings are the available columns in table 'transfusion':
 * @property integer $id
 * @property string $rut_paciente
 * @property string $tipo_sangre
 * @property string $cantidad
 * @property string $created
 * @property string $modified
 */
class Transfusion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transfusion';
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
			array('tipo_sangre, cantidad', 'length', 'max'=>255),
			array('created, modified', 'safe'),
			array('cantidad', 'numerical', 'integerOnly'=>true),
			array('cantidad', 'length', 'min'=>1,'max'=>100),
			array('cantidad, tipo_sangre', 'required'),
			array('modified','default',
	          'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
        	
        	array('created,modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rut_paciente, tipo_sangre, cantidad, created, modified', 'safe', 'on'=>'search'),
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
			'rut_paciente' => 'Rut Paciente',
			'tipo_sangre' => 'Tipo Sangre',
			'cantidad' => 'Cantidad',
			'created' => 'Created',
			'modified' => 'Modified',
			'nombre_p' => 'Paciente',
			'rut_p' => 'Rut Paciente',

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
		$criteria->compare('rut_paciente',$this->rut_paciente,true);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);
		$criteria->compare('cantidad',$this->cantidad,true);
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
	 * @return Transfusion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
