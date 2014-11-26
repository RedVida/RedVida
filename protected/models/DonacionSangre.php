<?php

/**
 * This is the model class for table "donacion_sangre".
 *
 * The followings are the available columns in table 'donacion_sangre':
 * @property integer $id
 * @property string $rut_donante
 * @property string $created
 * @property string $modified
 * @property string $tipo_sangre
 * @property integer $cantidad
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
			array('cantidad', 'numerical', 'integerOnly'=>true),
			array('cantidad', 'length', 'max'=>100),
            array('tipo_sangre', 'length', 'max'=>3),
			array('created, modified', 'safe'),	
			array('rut_donante', 'required', 'message'=>'Debe Ingresar Rut Valido.'),
			array('tipo_sangre', 'required','message'=>'Debe Seleccionar un Tipo de Sangre.'),
			array('modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
        	
        	array('created,modified','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, rut_donante, created, modified, tipo_sangre, cantidad', 'safe', 'on'=>'search'),
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
			'created' => 'Fecha de Ingreso',
			'modified' => 'Fecha de Modificación',
			'tipo_sangre' => 'Tipo de Sangre',
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
		$criteria->compare('rut_donante',$this->rut_donante,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);
		$criteria->compare('cantidad',$this->cantidad);

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
