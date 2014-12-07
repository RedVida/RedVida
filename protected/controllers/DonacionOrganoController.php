<?php

class DonacionOrganoController extends Controller
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
   
   public function getCM_Donador($id_donante){

		if(!Yii::app()->user->isGuest){
			$centro_medico_user=TieneCentroMedico::model()->find('id_user='.Yii::app()->user->id);
			$centro_medico=CentroMedico::model()->find('id='.$centro_medico_user->id_centro_medico);
			$donante=Donantes::model()->find('id='.$id_donante);
			if($donante->id_centro_medico==$centro_medico->id) return true;
			else false;
		}
		else return 0;  
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
		$model=new DonacionOrgano;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DonacionOrgano']))
		{
			$model->attributes=$_POST['DonacionOrgano'];
			if($model->validate()){
				$model->estado=1;
			}
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

		if(isset($_POST['DonacionOrgano']))
		{
			$model->attributes=$_POST['DonacionOrgano'];
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
		$model = new DonacionOrgano();
		$values= array();
		$donacion_organo=DonacionOrgano::model()->findAll();
		foreach($donacion_organo as $r){

			if($this->getCM_Donador($r->id_donante))$values[]=$r->id;
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
		$model=new DonacionOrgano('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DonacionOrgano']))
			$model->attributes=$_GET['DonacionOrgano'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DonacionOrgano the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DonacionOrgano::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DonacionOrgano $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='donacion-organo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionInforme(){

		$model = new DonacionOrgano;
		if(isset($_POST['DonacionOrgano'])){

            $this->layout="//layouts/pdf";
            $mPDF1 = Yii::app()->ePdf->mpdf();
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/nn.png' ));
			$mPDF1->WriteHTML('<br>');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/line2.png' ));
			$mPDF1->WriteHTML('<br> ');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/informe_donaciones.png' ));
			$where_array = array();
			$OK = true;
		    if($_POST['DonacionOrgano']['desde']!=''){ 
            	if(strtotime($_POST['DonacionOrgano']['desde']) && 1 === preg_match('~[0-9]~', $_POST['DonacionOrgano']['desde'])){
			    	$desde = (string)($_POST['DonacionOrgano']['desde']);
            		$where_array[]=('fecha_ingreso >= '."'$desde'");
	            }else{
            		$model->addError('nombre','Fecha de Inicio: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		     if($_POST['DonacionOrgano']['hasta']!=''){ 
            	if(strtotime($_POST['DonacionOrgano']['hasta']) && 1 === preg_match('~[0-9]~', $_POST['DonacionOrgano']['hasta'])){
			    	$hasta = (string)($_POST['DonacionOrgano']['hasta']);
            		$where_array[]=('fecha_ingreso <= '."'$hasta'");
	            }else{
            		$model->addError('nombre','Fecha de Termino: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		     if($_POST['DonacionOrgano']['nombre']!=''){ 

			    	$nombre = (string)($_POST['DonacionOrgano']['nombre']);
            		$where_array[]=('nombre = '."'$nombre'");
		    }
		     if($_POST['DonacionOrgano']['estado']!=''){ 

			    	$estado = (string)($_POST['DonacionOrgano']['estado']);
            		$where_array[]=('estado = '."'$estado'");
		    }

		    $where = implode(" AND ", $where_array);	
            $results = Yii::app()->db->createCommand()->
	            select('*')->
	            from('donacion_organo')->
	            where($where)->
	            queryAll();
	        if(!$OK)$results=null;
            if($results){
				$mPDF1->WriteHTML($this->render('_informe',array('results'=>$results),true));
				$mPDF1->Output('Informe DonacionOrgano',"I"); // i = visualizar en el navegador
		    }
		    else{ $model->addError('nombre','No se han encontrado Donaciones de Organos con esos datos ');}
        }
        $this->render('informe',array(
			'model'=>$model,
		));
	}
}
