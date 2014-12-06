<?php

class BancoSangreController extends Controller
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
	public function actionCreate()
	{
		$model=new BancoSangre;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BancoSangre']))
		{
			$model->attributes=$_POST['BancoSangre'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['BancoSangre']))
		{
			$model->attributes=$_POST['BancoSangre'];
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
		$dataProvider=new CActiveDataProvider('BancoSangre');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BancoSangre('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BancoSangre']))
			$model->attributes=$_GET['BancoSangre'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


public function actionInforme(){
	// Odernar por: Edad, Tipo de sangre, Centro medico, Fecha de ingreso

		$model = new BancoSangre;
		if(isset($_POST['BancoSangre'])){
       		$model = new BancoSangre;
            $this->layout="//layouts/pdf";
            $mPDF1 = Yii::app()->ePdf->mpdf();
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/nn.png' ));
			$mPDF1->WriteHTML('<br>');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/line2.png' ));
			$mPDF1->WriteHTML('<br> ');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/informe_banco_sangre.png' ));
			$where_array = array();
			$from_array = array();
			$OK = true;
			
		    if($_POST['BancoSangre']['tipo']!=''){ // Tipo de sangre
		    	$length = (string)($_POST['BancoSangre']['tipo']);
            	$where_array[]=('d.tipo = '."'$length'");
		    }
		   
		    $form = implode(", ", $from_array);	 
		    $where = implode(" AND ", $where_array);	
            $results = Yii::app()->db->createCommand()->
	            select('*')->
	            from('banco_sangre d, '.$form)->
	            where($where)->
	            queryAll();
	        if(!$OK)$results =null;
            if($results){
				$mPDF1->WriteHTML($this->render('_informe',array('results'=>$results),true));
				$mPDF1->Output('Informe de Banco de Sangre',"I"); // i = visualizar en el navegador
		    }
		    else{ $model->addError('tipo','No se han encontrado banco de sangre con esos datos ');}
        }
        $this->render('informe',array(
			'model'=>$model,
		));
	}




	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BancoSangre the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BancoSangre::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BancoSangre $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='banco-sangre-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTransfusion_sanguinea($id)
	{
		$model=new BancoSangre('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BancoSangre']))
			$model->attributes=$_GET['BancoSangre'];
			$this->render('transfusion_sanguinea',array(
			'model'=>$model,
		));
   }
}
