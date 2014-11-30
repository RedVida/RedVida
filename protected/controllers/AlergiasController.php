<?php

class AlergiasController extends Controller
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

	public function actionAlergiaList()
    {
        $criterio = new CDbCriteria;
        $cdtns = array();
        $resultado = array();
        
        if(empty($_GET['term'])) return $resultado;
        
        $cdtns[] = "LOWER(nombre) like LOWER(:busq)";

        
        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->limit = 10;
        
        $data = Alergias::model()->findAll($criterio);
        
        foreach($data as $item) {  
            $resultado[] = array (
                'nombre'    => $item->nombre,

            );
        }
        
        echo CJSON::encode($resultado);
    }

	public function actionCreate()
	{
		$model=new Alergias;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
			if(isset($_POST['Alergias']))
		{
			$model->attributes=$_POST['Alergias'];
			$model->fecha_ingreso = new CDbExpression('NOW()');
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

		if(isset($_POST['Alergias']))
		{
			$model->attributes=$_POST['Alergias'];
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
		$dataProvider=new CActiveDataProvider('Alergias');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Alergias('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Alergias']))
			$model->attributes=$_GET['Alergias'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Alergias the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Alergias::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Alergias $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='alergias-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionInforme(){

		$model = new Alergias;
		if(isset($_POST['Alergias'])){

            $this->layout="//layouts/pdf";
            $mPDF1 = Yii::app()->ePdf->mpdf();
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/nn.png' ));
			$mPDF1->WriteHTML('<br>');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/line2.png' ));
			$mPDF1->WriteHTML('<br> ');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/informe_alergias.png' ));
			$where_array = array();
			$OK = true;
		    if($_POST['Alergias']['desde']!=''){ 
            	if(strtotime($_POST['Alergias']['desde']) && 1 === preg_match('~[0-9]~', $_POST['Alergias']['desde'])){
			    	$desde = (string)($_POST['Alergias']['desde']);
            		$where_array[]=('fecha_ingreso >= '."'$desde'");
	            }else{
            		$model->addError('nombre','Fecha de Inicio: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		     if($_POST['Alergias']['hasta']!=''){ 
            	if(strtotime($_POST['Alergias']['hasta']) && 1 === preg_match('~[0-9]~', $_POST['Alergias']['hasta'])){
			    	$hasta = (string)($_POST['Alergias']['hasta']);
            		$where_array[]=('fecha_ingreso <= '."'$hasta'");
	            }else{
            		$model->addError('nombre','Fecha de Termino: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }

		    $where = implode(" AND ", $where_array);	
            $results = Yii::app()->db->createCommand()->
	            select('*')->
	            from('alergias')->
	            where($where)->
	            queryAll();
	        if(!$OK)$results=null;
            if($results){
				$mPDF1->WriteHTML($this->render('_informe',array('results'=>$results),true));
				$mPDF1->Output('Informe Alergias',"I"); // i = visualizar en el navegador
		    }
		    else{ $model->addError('nombre','No se han encontrado Alergia(s) con esos datos ');}
        }
        $this->render('informe',array(
			'model'=>$model,
		));
	}
}
