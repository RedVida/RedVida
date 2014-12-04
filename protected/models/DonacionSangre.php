<?php

/**
 * This is the model class for table "donacion_sangre".
 *
 * The followings are the available columns in table 'donacion_sangre':
 * @property integer $id
 * @property integer $id_donante
 * @property string $tipo_sangre
 * @property integer $cantidad
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Donantes $idDonante
 */
class DonacionSangre extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'donacion_sangre';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad','required','message' => 'Se debe ingresar cantidad de sangre'),
			array('id_donante, cantidad', 'numerical', 'integerOnly'=>true),
			array('tipo_sangre', 'length', 'max'=>3),
			array('created, modified', 'safe'),
			array('modified','default',
	          'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert and update'),
        	
        	array('created','default',
              'value'=> date('y-m-d'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_donante, tipo_sangre, cantidad, created, modified', 'safe', 'on'=>'search'),
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
			'idDonante' => array(self::BELONGS_TO, 'Donantes', 'id_donante'),
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
			'tipo_sangre' => 'Tipo Sangre',
			'cantidad' => 'Cantidad',
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
		$criteria->compare('id_donante',$this->id_donante);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);
		$criteria->compare('cantidad',$this->cantidad);
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
	 * @return DonacionSangre the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
