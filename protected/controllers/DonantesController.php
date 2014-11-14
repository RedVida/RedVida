<?php

class DonantesController extends Controller
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
				'actions'=>array('admin','delete','donar','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','registraenfermedad','registrarenfermedad'),
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
	public function actionCreate()
	{
		$model=new Donantes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Donantes']))
		{
			$model->attributes=$_POST['Donantes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
    
    	public function actionRegistrarEnfermedad($id)
	{
		//asignamos de alguna manera la enfermedad al donante con id = $id (parametro)
		$model_tiene_enfermedad = new TieneEnfermedad;
		$model = new Enfermedades;

		if (isset($_POST['Enfermedades'])) {
			$model_tiene_enfermedad->id_donante = $id;
			$model_tiene_enfermedad->id_enfermedad = $_POST['Enfermedades']['id'];
			if ($model_tiene_enfermedad->save()) {
				$this->redirect(array('admin'));
			}else
			{
				echo 'No se pudo insertar! id:'.$id.' y id_enfermedad:'.$model_tiene_enfermedad->id_enfermedad;
				Yii::app()->end();
			}
		}

		$this->render('asignaenfermedad',array('model'=>$model));
	}

	public function actionRegistraEnfermedad()
	{
		$model = new Donantes;
		$this->render('registraenfermedad', array('model'=>$model));
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

		if(isset($_POST['Donantes']))
		{
			$model->attributes=$_POST['Donantes'];
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
		$dataProvider=new CActiveDataProvider('Donantes');
        if(isset($_GET['pdf'])){
          
	        $this->layout="//layouts/pdf";
			$mPDF1 = Yii::app()->ePdf->mpdf();
			//$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/clinica3.jpg' ).''.CHtml::image(Yii::getPathOfAlias('webroot.css') . '/text.png'));
			$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/semantic.css');
            $mPDF1->WriteHTML($stylesheet, true);
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/nn.png' ));
			$mPDF1->WriteHTML($this->render('index',array('dataProvider'=>$dataProvider),true));
			$mPDF1->Output('Mi archivo',"I"); // i = visualizar en el navegador
       }

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function actionDonar()
	{
	
		$model=new Donantes('search');
		$k=new Donantes();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Donantes']))
			$model->attributes=$_GET['Donantes'];

		$this->render('donar',array(
			'model'=>$model,
		));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Donantes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Donantes']))
			$model->attributes=$_GET['Donantes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	
	




	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Donantes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Donantes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Donantes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='donantes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
