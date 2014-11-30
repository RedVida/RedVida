<?php

class DonacionSangreController extends Controller
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
				'actions'=>array('create','update', 'mostrar'),
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


		$model=new DonacionSangre;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DonacionSangre']))
		{			
			$model->attributes=$_POST['DonacionSangre'];
		
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

		if(isset($_POST['DonacionSangre']))
		{
			$model->attributes=$_POST['DonacionSangre'];
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
		$dataProvider=new CActiveDataProvider('DonacionSangre');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	public function actionMostrar()
	{


		$model_donante = Donantes::model()->findByAttributes(array('nombres'=>'Wendy Sulca'));
		$arreglo = Yii::app()->db->createCommand()->select('nombres, rut')->from('donantes')->where('nombres = "hector"')->queryAll();
		$this->render('mostrar', array('model'=>$arreglo));


	}



	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DonacionSangre('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DonacionSangre']))
			$model->attributes=$_GET['DonacionSangre'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionInforme(){
	// Odernar por: Edad, Tipo de sangre, Centro medico, Fecha de ingreso

		$model = new Donantes;
		if(isset($_POST['Donantes'])){
       		$model = new Donantes;
            $this->layout="//layouts/pdf";
            $mPDF1 = Yii::app()->ePdf->mpdf();
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/nn.png' ));
			$mPDF1->WriteHTML('<br>');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/line2.png' ));
			$mPDF1->WriteHTML('<br> ');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/informe_donantes.png' ));
			$where_array = array();
			$from_array = array();
			$OK = true;
			if($_POST['Donantes']['edad_inicial']!=''){ // edad inicial
		        if(is_numeric($_POST['Donantes']['edad_inicial'])){
            		$where_array[]=('d.edad >= '.$_POST['Donantes']['edad_inicial']);
            	}
            	else{
            		$model->addError('nombre','Edad Inicio: No es valido, porfavor ingrese un numero ');
					$OK = false;	
            	}
		    }
		    if($_POST['Donantes']['edad_final']!=''){ // edad final
		    	if(is_numeric($_POST['Donantes']['edad_final'])){
            		$where_array[]=('d.edad <= '.$_POST['Donantes']['edad_final']);
            	}else{
            		$model->addError('nombre','Edad Termino: No es valido, porfavor ingrese un numero ');
					$OK = false;	
            	}
		    }
            if($_POST['Donantes']['id_centro_medico']!=''){ // centro medico
            	$where_array[]=('d.id_centro_medico = '.$_POST['Donantes']['id_centro_medico']);
		    }
		    if($_POST['Donantes']['tipo_sangre']!=''){ // Tipo de sangre
		    	$length = (string)($_POST['Donantes']['tipo_sangre']);
            	$where_array[]=('d.tipo_sangre = '."'$length'");
		    }
		    if($_POST['Donantes']['desde']!=''){ // Tipo de sangre
		    	if(strtotime($_POST['Donantes']['desde']) && 1 === preg_match('~[0-9]~', $_POST['Donantes']['desde'])){
			    	$desde = (string)($_POST['Donantes']['desde']);
	            	$where_array[]=('d.fecha_ingreso >= '."'$desde'");
            	}else{
            		$model->addError('nombre','Fecha de Inicio: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		     if($_POST['Donantes']['hasta']!=''){ // Fecha
		     	if(strtotime($_POST['Donantes']['desde']) && 1 === preg_match('~[0-9]~', $_POST['Donantes']['desde'])){
			    	$hasta = (string)($_POST['Donantes']['hasta']);
	            	$where_array[]=('d.fecha_ingreso <= '."'$hasta'");
	            }else{
            		$model->addError('nombre','Fecha de Termino: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		    if($_POST['Donantes']['alergia']!=''){ // Alergia
		    	$length = (string)($_POST['Donantes']['alergia']);
		    	$modelo = Alergias::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
		    	if(!$modelo){
				   $model->addError('nombre','Alergia : El nombre de la Alergia ingresada no existe ');
				   $OK = false;
				}else{
            	$where_array[]=('ta.id_alergia= '.$modelo[0]->id.' AND ta.id_donante = d.id');
            	$from_array[]=('tiene_alergia ta');
                }
		    }
		    if($_POST['Donantes']['enfermedad']!=''){ // Enfermedades
		    	$length = (string)($_POST['Donantes']['enfermedad']);
		    	$modelo = Enfermedades::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
		    	if(!$modelo){
				   $model->addError('nombre','Enfermedad : El nombre de la Enfermedad ingresada no existe ');
				   $OK = false;
				}else{
            	$where_array[]=('te.id_enfermedad= '.$modelo[0]->id.' AND te.id_donante = d.id');
            	$from_array[]=('tiene_enfermedad te');
                }
		    }
		    $form = implode(", ", $from_array);	 
		    $where = implode(" AND ", $where_array);	
            $results = Yii::app()->db->createCommand()->
	            select('*')->
	            from('donantes d, '.$form)->
	            where($where)->
	            queryAll();
	        if(!$OK)$results =null;
            if($results){
				$mPDF1->WriteHTML($this->render('_informe',array('results'=>$results),true));
				$mPDF1->Output('Informe Dontantes',"I"); // i = visualizar en el navegador
		    }
		    else{ $model->addError('nombre','No se han encontrado donantes con esos datos ');}
        }
        $this->render('informe',array(
			'model'=>$model,
		));
	}




	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DonacionSangre the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DonacionSangre::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DonacionSangre $model the model to be validated
	 */

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='donacion-sangre-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
