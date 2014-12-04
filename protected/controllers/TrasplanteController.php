<?php
class TrasplanteController extends Controller
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
				'actions'=>array('admin','delete','update'),
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

		$model=new Trasplante;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Trasplante']))
		{
			$model->attributes=$_POST['Trasplante'];
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
		if(isset($_POST['Trasplante']))
		{
			$model->attributes=$_POST['Trasplante'];
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
	 * Lists all mode<ls.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Trasplante');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            
   
		$model=new Trasplante('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Trasplante']))
			$model->attributes=$_GET['Trasplante'];
		$this->render('admin',array(
			'model'=>$model,
		));
	
	}
public function actionPacienteList()
    {
        $criterio = new CDbCriteria;
        $cdtns = array();
        $resultado = array();
        
        if(empty($_GET['term'])) return $resultado;
        
        $cdtns[] = "LOWER(nombre) like LOWER(:busq)";
        
        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->limit = 10;
        
        $data = Paciente::model()->findAll($criterio);
        
        foreach($data as $item) {  
            $resultado[] = array (
            	'id' => $item->id,
                'nombre'    => $item->nombre,
                'apellido' => $item->apellido,
                'rut' => $item->rut,
            );
        }
        
        echo CJSON::encode($resultado);
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Trasplante the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Trasplante::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Trasplante $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='trasplante-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTrasplanteOrgano($id_d,$id_p)
	{

		$model=new Trasplante;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Trasplante']))
		{
			$model->attributes=$_POST['Trasplante'];
			if($model->validate()){
		    $donante=Donantes::model()->find('id='.$_GET['id_d']);
		    $paciente=Paciente::model()->find('id='.$_GET['id_p']);
            $donacion_organo = DonacionOrgano::model()->find('id='.$model->id_donacion);
            $model->nombre = $donacion_organo->nombre;
	        $model->tipo = 'Organo';

			$connection=Yii::app()->db;
			$sql = 'UPDATE donacion_organo SET estado = 0 WHERE id='.$model->id_donacion;
			$command = $connection->createCommand($sql);
			$command->execute();

			$organo=Organo::model()->find('nombreOrgano='."'$donacion_organo->nombre'");
			
			$connection=Yii::app()->db;
			$sql = 'DELETE FROM necesidad_organo WHERE id_paciente='.$model->id_paciente.' AND id_organo='.$organo->idOrgano;
			$command = $connection->createCommand($sql);
			$command->execute();

			}
			if($model->save())
				$this->redirect(array('index'));
		}
		$this->render('trasplanteorgano',array(
			'model'=>$model,
		));
	}

	public function actionTrasplanteMedula($id_d,$id_p)
	{

		$model=new Trasplante;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Trasplante']))
		{
			$model->attributes=$_POST['Trasplante'];
			if($model->validate()){
		    $donante=Donantes::model()->find('id='.$_GET['id_d']);
		    $paciente=Paciente::model()->find('id='.$_GET['id_p']);
		    $donacion=DonacionMedula::model()->find('id_paciente='.$_GET['id_p'].' AND id_donante'.$_GET['id_d']);
		    $model->nombre = 'Medula';
		    $model->tipo = 'Osea';
		    $model->id_donacion = $donacion->id;

			$connection=Yii::app()->db;
			$sql = 'UPDATE donacion_medula SET estado = 0 WHERE id_donante='.$_GET['id_d'].' AND id_paciente='.$_GET['id_p'];
			$command = $connection->createCommand($sql);
			$command->execute();

			$paciente=Paciente::model()->find('id='.$_GET['id_p']);

			$connection=Yii::app()->db;
			$sql = 'DELETE FROM necesidad_medula WHERE id_paciente='.$_GET['id_p'];
			$command = $connection->createCommand($sql);
			$command->execute();

			}
			if($model->save())
				$this->redirect(array('index'));
		}
		$this->render('trasplantemedula',array(
			'model'=>$model,
		));
	}

	public function actionInforme(){
	// Odernar por: Edad, Tipo de sangre, Centro medico, Fecha de ingreso

		$model = new Trasplante;
		if(isset($_POST['Trasplante'])){
       		$model = new Trasplante;
            $this->layout="//layouts/pdf";
            $mPDF1 = Yii::app()->ePdf->mpdf();
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/nn.png' ));
			$mPDF1->WriteHTML('<br>');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/line2.png' ));
			$mPDF1->WriteHTML('<br> ');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/informe_trasplante.png' ));
			$where_array = array();
			$from_array = array();

			$OK = true;
            if($_POST['Trasplante']['id_centro_medico']!=''){ // centro medico
            	$where_array[]=('id_centro_medico = '.$_POST['Trasplante']['id_centro_medico']);
		    }
		    if($_POST['Trasplante']['id_tipo_trasplante']!=''){ // centro medico
            	$where_array[]=('id_tipo_trasplante = '.$_POST['Trasplante']['id_tipo_trasplante']);
		    }
		    if($_POST['Trasplante']['desde']!=''){ // Tipo de sangre
		    	if(strtotime($_POST['Trasplante']['desde']) && 1 === preg_match('~[0-9]~', $_POST['Trasplante']['desde'])){
			    	$desde = (string)($_POST['Trasplante']['desde']);
	            	$where_array[]=('created >= '."'$desde'");
            	}else{
            		$model->addError('nombre','Fecha de Inicio: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		     if($_POST['Trasplante']['hasta']!=''){ // Fecha
		     	if(strtotime($_POST['Trasplante']['hasta']) && 1 === preg_match('~[0-9]~', $_POST['Trasplante']['hasta'])){
			    	$hasta = (string)($_POST['Trasplante']['hasta']);
	            	$where_array[]=('created <= '."'$hasta'");
	            }else{
            		$model->addError('nombre','Fecha de Termino: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		    $where = implode(" AND ", $where_array);	
            $results = Yii::app()->db->createCommand()->
	            select('*')->
	            from('trasplante')->
	            where($where)->
	            queryAll();
	        if(!$OK)$results = null;
            if($results){
				$mPDF1->WriteHTML($this->render('_informe',array('results'=>$results),true));
				$mPDF1->Output('Informe Trasplantes',"I"); // i = visualizar en el navegador
		    }
		    else{ $model->addError('nombre','No se han encontrado donantes con esos datos ');}
        }
        $this->render('informe',array(
			'model'=>$model,
		));
	}

}