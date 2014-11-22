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

		if (isset($_POST['Enfermedades']) && ($_POST['Enfermedades']['id']!=null)) {
				$length = (string)($_POST['Enfermedades']['id']);
				$modelo = Enfermedades::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
				if(!$modelo){
				   $model->addError('nombre','Nombre : El nombre de la Enfermedad ingresada no existe ');
				}
				else{
				$modelo = Enfermedades::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
				$list= Yii::app()->db->createCommand('select * from tiene_enfermedad where id_donante = '."'$id'".' AND id_enfermedad = '.$modelo[0]->id)->queryAll();   
	            $cont = 0;
	            foreach($list as $item){$cont++;}
	            if($cont>0){
                   $model->addError('nombre','El donantes ya posee registrada esta Enfermedad ('.$_POST['Enfermedades']['id'].'), porfavor ingrese otro nombre.');
	            }
	            else{
		            $model_tiene_enfermedad->id_donante = $id;
					$model_tiene_enfermedad->id_enfermedad = $modelo[0]->id;
					$model_tiene_enfermedad->fecha = new CDbExpression('NOW()');
		 
					if ($model_tiene_enfermedad->save()) {
						$this->redirect(array('view&id='.$id));
					}
			  	}
			  }
	   }
	   else if(isset($_POST['Enfermedades'])){
	    	   $model->addError('nombre','Nombre : Se requiere ingresar una Enfermedad ');
	    }
 
		$this->render('asignaenfermedad',array('model'=>$model));
	}

	public function actionRegistraEnfermedad()
	{
		$model = new Donantes;
		$this->render('registraenfermedad', array('model'=>$model));
	}
	

	 	public function actionRegistrar_Alergia($id)
	{
		//asignamos de alguna manera la enfermedad al donante con id = $id (parametro)
		$model_tiene_alergia = new TieneAlergia;
		$model = new Alergias;

		if (isset($_POST['Alergias']) && ($_POST['Alergias']['id']!=null)) {
				$length = (string)($_POST['Alergias']['id']);
				$modelo = Alergias::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
				if(!$modelo){
				   $model->addError('nombre','Nombre : El nombre de la Alergia ingresada no existe ');
				}
				else{
				$modelo = Alergias::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
				$list= Yii::app()->db->createCommand('select * from tiene_alergia where id_donante = '."'$id'".' AND id_alergia = '.$modelo[0]->id)->queryAll();   
	            $cont = 0;
	            foreach($list as $item){$cont++;}
	            if($cont>0){
                   $model->addError('nombre','El donantes ya posee registrada esta Alergia ('.$_POST['Alergias']['id'].'), porfavor ingrese otro nombre.');
	            }
	            else{
		            $model_tiene_alergia->id_donante = $id;
					$model_tiene_alergia->id_alergia = $modelo[0]->id;
					$model_tiene_alergia->fecha = new CDbExpression('NOW()');
		 
					if ($model_tiene_alergia->save()) {
						$this->redirect(array('view&id='.$id));
					}
			  	}
			  }
	   }
	   else if(isset($_POST['Alergias'])){
	    	   $model->addError('nombre','Nombre : Se requiere ingresar una Alergia ');
	    }

		$this->render('asigna_alergia',array('model'=>$model));
	}

	public function actionRegistra_Alergia()
	{
		$model = new Donantes;
		$this->render('registra_alergia', array('model'=>$model));
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
