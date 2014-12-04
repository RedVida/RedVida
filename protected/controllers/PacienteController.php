<?php

class PacienteController extends Controller
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
	function yes_or_no($val){
 return $val == 1 ? 'yes' : 'no';
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
				'actions'=>array('admin','delete','asignar'),
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
		$model=new Paciente;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Paciente']))
		{
			$model->attributes=$_POST['Paciente'];
			if($model->validate()){
				$date1 = new DateTime(date('Y-m-d'));
				$date2 = new DateTime($model->fecha_nacimiento);
				$interval = $date1->diff($date2);
				
				$model->edad = $interval->y;
				$model->fecha_ingreso = new CDbExpression('NOW()');
				if($model->save())
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionRegistrarEnfermedad($id)
	{
		//asignamos de alguna manera la enfermedad al donante con id = $id (parametro)
		$model_tiene_enfermedad = new EnfermedadPaciente;
		$model = new Enfermedades;

		if (isset($_POST['Enfermedades']) && ($_POST['Enfermedades']['id']!=null)) {
				$length = (string)($_POST['Enfermedades']['id']);
				$modelo = Enfermedades::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
				if(!$modelo){
				   $model->addError('nombre','Nombre : El nombre de la Enfermedad ingresada no existe ');
				}
				else{
				$modelo = Enfermedades::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
				$list= Yii::app()->db->createCommand('select * from enfermedad_paciente where id_paciente = '."'$id'".' AND id_enfermedad = '.$modelo[0]->id)->queryAll();   
	            $cont = 0;
	            foreach($list as $item){$cont++;}
	            if($cont>0){
                   $model->addError('nombre','El Paciente ya posee registrada esta Enfermedad ('.$_POST['Enfermedades']['id'].'), porfavor ingrese otro nombre.');
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

	public function actionRegistrarAlergia($id)
	{
		//asignamos de alguna manera la enfermedad al donante con id = $id (parametro)
		$model_tiene_alergia = new AlergiaPaciente;
		$model = new Alergias;

		if (isset($_POST['Alergias']) && ($_POST['Alergias']['id']!=null)) {
				$length = (string)($_POST['Alergias']['id']);
				$modelo = Alergias::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
				if(!$modelo){
				   $model->addError('nombre','Nombre : El nombre de la Alergia ingresada no existe ');
				}
				else{
				$modelo = Alergias::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
				$list= Yii::app()->db->createCommand('select * from alergia_paciente where id_paciente = '."'$id'".' AND id_alergia = '.$modelo[0]->id)->queryAll();   
	            $cont = 0;
	            foreach($list as $item){$cont++;}
	            if($cont>0){
                   $model->addError('nombre','El Paciente ya posee registrada esta Alergia ('.$_POST['Alergias']['id'].'), porfavor ingrese otro nombre.');
	            }
	            else{
		            $model_tiene_alergia->id_paciente = $id;
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

		$this->render('asignaalergia',array('model'=>$model));
	}


	 	public function actionRegistrar_necesidad_organo($id)
	{
		//asignamos de alguna manera la enfermedad al donante con id = $id (parametro)
		$model_necesita_organo = new NecesidadOrgano;
		$model = new Organo;
    
		if (isset($_POST['Organo']) && ($_POST['Organo']['id']!=null) && ($_POST['Organo']['grado_urgencia']!=null)) {
				$length = (string)($_POST['Organo']['id']);
				$modelo = Organo::model()->findAll(array('select'=>'idOrgano,nombreOrgano','condition'=>'nombreOrgano='."'$length'"));
				if(!$modelo){
				   $model->addError('nombre','Nombre : El nombre del Organo ingresado no existe ');
				}
				else{
				$modelo = Organo::model()->findAll(array('select'=>'idOrgano,nombreOrgano','condition'=>'nombreOrgano='."'$length'"));
				$list= Yii::app()->db->createCommand('select * from necesidad_organo where id_paciente = '."'$id'".' AND id_organo = '.$modelo[0]->idOrgano)->queryAll();   
	            $cont = 0;
	            foreach($list as $item){$cont++;}
	            if($cont>0){
                   $model->addError('nombre','El Paciente ya posee registrada este Organo ('.$_POST['Organo']['id'].'), porfavor ingrese otro nombre.');
	            }
	            else{
	            	$model_necesita_organo->grado_urgencia = $_POST['Organo']['grado_urgencia'];
		            $model_necesita_organo->id_paciente = $id;
					$model_necesita_organo->id_organo = $modelo[0]->idOrgano;
					$model_necesita_organo->fecha = new CDbExpression('NOW()');
		 
					if ($model_necesita_organo->save()) {
						$this->redirect(array('view&id='.$id));
					}
			  	}
			  }
	   }
	   else if(isset($_POST['Organo'])){
	    	   if($_POST['Organo']['id']==null)$model->addError('nombre','Nombre : Se requiere ingresar un Organo ');
	    	   if($_POST['Organo']['grado_urgencia']==null)$model->addError('nombre','Grado Urgencia : Se requiere ingresar un Grado de Urgencia ');
	    }

		$this->render('asigna_necesidad_organo',array('model'=>$model));
	}

	public function actionRegistra_Organo()
	{
		$model = new Paciente;
		$this->render('registra_necesidad_organo', array('model'=>$model));
	}

	 	public function actionRegistrar_necesidad_medula($id)
	{
		//asignamos de alguna manera la enfermedad al donante con id = $id (parametro)
		$model_necesita_medula = new NecesidadMedula;
		$model = new Medula;
    
		if (isset($_POST['Medula']) && ($_POST['Medula']['id']!=null) && ($_POST['Medula']['grado_urgencia']!=null)) {
				$length = (string)($_POST['Medula']['id']);
				$modelo = Medula::model()->findAll(array('select'=>'idMedula,nombreMedula','condition'=>'nombreMedula='."'$length'"));
				if(!$modelo){
				   $model->addError('nombre','Nombre : El nombre del Medula ingresado no existe ');
				}
				else{
				$modelo = Medula::model()->findAll(array('select'=>'idMedula,nombreMedula','condition'=>'nombreMedula='."'$length'"));
				$list= Yii::app()->db->createCommand('select * from necesidad_medula where id_paciente = '."'$id'".' AND id_medula = '.$modelo[0]->idMedula)->queryAll();   
	            $cont = 0;
	            foreach($list as $item){$cont++;}
	            if($cont>0){
                   $model->addError('nombre','El Paciente ya posee registrada este Medula ('.$_POST['Medula']['id'].'), porfavor ingrese otro nombre.');
	            }
	            else{
	            	$model_necesita_medula->grado_urgencia = $_POST['Medula']['grado_urgencia'];
		            $model_necesita_medula->id_paciente = $id;
					$model_necesita_medula->id_medula = $modelo[0]->idMedula;
					$model_necesita_medula->fecha = new CDbExpression('NOW()');
		 
					if ($model_necesita_medula->save()) {
						$this->redirect(array('view&id='.$id));
					}
			  	}
			  }
	   }
	   else if(isset($_POST['Medula'])){
	    	   if($_POST['Medula']['id']==null)$model->addError('nombre','Nombre : Se requiere ingresar un Medula ');
	    	   if($_POST['Medula']['grado_urgencia']==null)$model->addError('nombre','Grado Urgencia : Se requiere ingresar un Grado de Urgencia ');
	    }

		$this->render('asigna_necesidad_medula',array('model'=>$model));
	}

	public function actionRegistra_Medula()
	{
		$model = new Paciente;
		$this->render('registra_necesidad_medula', array('model'=>$model));
	}

	public function actionUrgenciasnacionales(){
		$model=new Paciente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Paciente']))
			$model->attributes=$_GET['Paciente'];

		$this->render('urgenciasnacionales',array(
			'model'=>$model,
		));
	}

	public function actionDisponibilidad($sangre)
	{
		$donadores= Yii::app()->db->createCommand('select * from donantes where tipo_sangre = '."'$sangre'")->queryAll();

		$this->render('disponibilidad',array('donadores'=>$donadores));
		
	}

	public function actionInforme(){
	// Odernar por: Edad, Tipo de sangre, Centro medico, Fecha de ingreso
		$model = new Paciente;
		if(isset($_POST['Paciente'])){
       		$model = new Paciente;
            $this->layout="//layouts/pdf";
            $mPDF1 = Yii::app()->ePdf->mpdf();
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/nn.png' ));
			$mPDF1->WriteHTML('<br>');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/line2.png' ));
			$mPDF1->WriteHTML('<br> ');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/informe_pacientes.png' ));
			$where_array = array();
			$from_array = array();
			$OK = true;
			if($_POST['Paciente']['desde']!=''){ // Tipo de sangre
		    	if(strtotime($_POST['Paciente']['desde']) && 1 === preg_match('~[0-9]~', $_POST['Paciente']['desde'])){
			    	$desde = (string)($_POST['Paciente']['desde']);
	            	$where_array[]=('p.fecha_ingreso >= '."'$desde'");
            	}else{
            		$model->addError('nombre','Fecha de Inicio: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		    if($_POST['Paciente']['hasta']!=''){ // Fecha
		     	if(strtotime($_POST['Paciente']['desde']) && 1 === preg_match('~[0-9]~', $_POST['Paciente']['desde'])){
			    	$hasta = (string)($_POST['Paciente']['hasta']);
	            	$where_array[]=('p.fecha_ingreso <= '."'$hasta'");
	            }else{
            		$model->addError('nombre','Fecha de Termino: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
			if($_POST['Paciente']['edad_inicial']!=''){ // edad inicial
		        if(is_numeric($_POST['Paciente']['edad_inicial'])){
            		$where_array[]=('p.edad >= '.$_POST['Paciente']['edad_inicial']);
            	}
            	else{
            		$model->addError('nombre','Edad Inicio: No es valido, porfavor ingrese un numero ');
					$OK = false;	
            	}
		    }
		    if($_POST['Paciente']['edad_final']!=''){ // edad final
		    	if(is_numeric($_POST['Paciente']['edad_final'])){
            		$where_array[]=('p.edad <= '.$_POST['Paciente']['edad_final']);
            	}else{
            		$model->addError('nombre','Edad Termino: No es valido, porfavor ingrese un numero ');
					$OK = false;	
            	}
		    }
            if($_POST['Paciente']['id_centro_medico']!=''){ // centro medico
            	$where_array[]=('p.id_centro_medico = '.$_POST['Paciente']['id_centro_medico']);
		    }
		    if($_POST['Paciente']['tipo_sangre']!=''){ // Tipo de sangre
		    	$length = (string)($_POST['Paciente']['tipo_sangre']);
            	$where_array[]=('p.tipo_sangre = '."'$length'");
		    }
		    if($_POST['Paciente']['afiliacion']!=''){ // Tipo de sangre
		    	$length = (string)($_POST['Paciente']['afiliacion']);
            	$where_array[]=('p.afiliacion = '."'$length'");
		    }
		    if($_POST['Paciente']['alergia']!=''){ // Alergia
		    	$length = (string)($_POST['Paciente']['alergia']);
		    	$modelo = Alergias::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
		    	if(!$modelo){
				   $model->addError('nombre','Alergia : El nombre de la Alergia ingresada no existe ');
				   $OK = false;
				}else{
	            	$where_array[]=('ta.id_alergia= '.$modelo[0]->id.' AND ta.id_paciente= p.id');
	            	$from_array[]=('alergia_paciente ta');
                }
		    }
		    if($_POST['Paciente']['enfermedad']!=''){ // Enfermedades
		    	$length = (string)($_POST['Paciente']['enfermedad']);
		    	$modelo = Enfermedades::model()->findAll(array('select'=>'id,nombre','condition'=>'nombre='."'$length'"));
		    	if(!$modelo){
				   $model->addError('nombre','Enfermedad : El nombre de la Enfermedad ingresada no existe ');
				   $OK = false;
				}else{
	            	$where_array[]=('te.id_enfermedad= '.$modelo[0]->id.' AND te.id_paciente = p.id');
	            	$from_array[]=('enfermedad_paciente te');
                }
		    }
		    $from = implode(", ", $from_array);	 
		    $where = implode(" AND ", $where_array);	
            $results = Yii::app()->db->createCommand()->
	            select('*')->
	            from('paciente p, '.$from)->
	            where($where)->
	            queryAll();
	        if(!$OK)$results =null;
            if($results){
				$mPDF1->WriteHTML($this->render('_informe',array('results'=>$results),true));
				$mPDF1->Output('Informe Paciente',"I"); // i = visualizar en el navegador
		    }
		    else{ $model->addError('nombre','No se han encontrado paciente con esos datos ');}
        }
        $this->render('informe',array(
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

		if(isset($_POST['Paciente']))
		{
			$model->attributes=$_POST['Paciente'];
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
		
		$organo = Organo::model()->findAll(array('select'=>'nombreOrgano'));
		$dataProvider=new CActiveDataProvider('Paciente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Paciente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Paciente']))
			$model->attributes=$_GET['Paciente'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAsignar()
	{	


	  if (isset($_POST['Asignar']))
	  {
	        if (isset($_POST['id']))
	        {
	            foreach ($_POST['id'] as $id)
	            {
	                $comment = $this->loadModel($id);
	                $this->redirect(Yii::App()->request->baseUrl.'/index?r=trasplante/create&id='.$id);
	            }
	        }
	  }

		$model=new Paciente('search');
		$k=new Paciente();
		$model->unsetAttributes();
		if(isset($_GET['Paciente']))
			$model->attributes=$_GET['Paciente'];

		$this->render('asignar',array(
			'model'=>$model,
		));
	}




	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Paciente the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Paciente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Paciente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='paciente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPacienteList($id)
    {
        $criterio = new CDbCriteria;
        $cdtns = array();
        $resultado = array();
        
        if(empty($_GET['term'])) return $resultado;
        
        $cdtns[] = "LOWER(nombre) like :busq OR LOWER(apellido) like :busq OR LOWER(tipo_sangre) like :busq";

        
        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->limit = 10;
        
        $data = Paciente::model()->findAll($criterio);
        
        foreach($data as $item) {  

        	$donacion=NecesidadMedula::model()->find('id_paciente='.$item->id);
        	$donante = Donantes::model()->find('id='.$id);
	        	if($donacion && $donante->tipo_sangre == $item->tipo_sangre){
		            $resultado[] = array (
		                'nombre' => $item->nombre.' '.$item->apellido,
		                'rut' => $item->rut,
		                'sangre' => $item->tipo_sangre,
		            );
        	}

        }
        
        echo CJSON::encode($resultado);
    }
}
