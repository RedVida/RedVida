<?php

class TransfusionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(array('CrugeAccessControlFilter'));
	}
	public function getCM_user(){

		if(!Yii::app()->user->isGuest){
			$centro_medico_user=TieneCentroMedico::model()->find('id_user='.Yii::app()->user->id);
			$centro_medico=CentroMedico::model()->find('id='.$centro_medico_user->id_centro_medico); 
			return $centro_medico->id;
		}
		else return 0;  
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new Transfusion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transfusion']))
		{


			$model->attributes=$_POST['Transfusion'];
			if($model->save())
			{


				$results= Yii::app()->db->createCommand('select * from banco_sangre where tipo=:tipo_sangre')->bindValue('tipo_sangre',$model->tipo_sangre)->queryAll();
				$resul = $results[0]['cantidad'];
				$val = $resul - $model->cantidad;

				if($val>=0){
			
							$this->redirect(array('view','id'=>$model->id));




										}else{



					echo $form->errorSummary($model,'Your message goes here'); 
				}

			}


		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Transfusion']))
		{
			$model->attributes=$_POST['Transfusion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Transfusion();
		$values= array();
		$transfusion=Transfusion::model()->findAll();
		foreach($transfusion as $r){
        	if($donante=Donantes::model()->find('rut='."'$r->rut_paciente'")){
        		if($donante->id_centro_medico==$this->getCM_user())$values[]=$r->id;
        	}

        }
		$criteria = new CDbCriteria();
		$criteria->addInCondition('id',$values,'OR');
		$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Transfusion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Transfusion']))
			$model->attributes=$_GET['Transfusion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Transfusion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Transfusion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Transfusion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='transfusion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTransfusionSangre($id,$id_p)
	{

		$model=new Transfusion;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Transfusion']))
		{
			$model->attributes=$_POST['Transfusion'];
			if($model->validate()){
			$connection=Yii::app()->db;
			$model->cantidad+=1;
			$sql = 'UPDATE banco_sangre SET cantidad = (cantidad -'.$model->cantidad.') WHERE id='.$_GET['id'];
			$command = $connection->createCommand($sql);
			$command->execute();

			$paciente=Paciente::model()->find('rut='."'$model->rut_paciente'");
			$necesidad=NecesidadSangre::model()->find('id_paciente='.$paciente->id);

			if($model->cantidad==$necesidad->cantidad){
				$connection=Yii::app()->db;
				$sql = 'DELETE FROM necesidad_sangre WHERE id='.$necesidad->id.' AND cantidad='.$model->cantidad;
				$command = $connection->createCommand($sql);
				$command->execute();
			}
			else if($model->cantidad < $necesidad->cantidad){
				$connection=Yii::app()->db;
				$sql = 'UPDATE necesidad_sangre SET cantidad = (cantidad -'.$model->cantidad.') WHERE id='.$necesidad->id;
				$command = $connection->createCommand($sql);
				$command->execute();
			}

			}
			if($model->save())
				$this->redirect(array('index'));
		}
		$this->render('transfusionSangre',array(
			'model'=>$model,
		));
	}
}
