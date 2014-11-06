<?php

/**
 * This is the model class for table "donacion_organo".
 *
 * The followings are the available columns in table 'donacion_organo':
 * @property integer $id
 * @property string $rut_donante
 * @property string $created
 * @property string $modified
 * @property string $nombre
 * @property integer $estado
 */
class DonacionOrgano extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'donacion_organo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('estado', 'numerical', 'integerOnly'=>true),
			array('rut_donante', 'length', 'max'=>12),
			array('nombre', 'length', 'max'=>128),
			array('created, modified', 'safe'),
			array('rut_donante', 'required', 'message'=>'Debe Ingresar Rut Valido.'),
			array('nombre', 'required','message'=>'Debe Seleccionar un Organo.'),
			array('estado', 'required','message'=>'Debe Marcar un Estado.'),
			array('modified','default',
	          'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
        	
        	array('created,modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rut_donante, created, modified, nombre, estado', 'safe', 'on'=>'search'),
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
			'rut_donante' => 'Rut Donante',
			'created' => 'Created',
			'modified' => 'Modified',
			'nombre' => 'Nombre',
			'estado' => 'Estado',
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
		$criteria->compare('rut_donante',$this->rut_donante,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DonacionOrgano the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
