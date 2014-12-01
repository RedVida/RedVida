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


		$model=new DonacionSangre;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DonacionSangre']))
		{			
			$model->attributes=$_POST['DonacionSangre'];
			$model_banco = BancoSangre::model()->findAll(array('select'=>'id','condition'=>'tipo='."'$model->tipo_sangre'"));
			$var= (int) $model_banco[0]["id"];


			$model->id_banco=$var;

			//if
			$var_b = BancoSangre::model()->findAll(array('select'=>'cantidad','condition'=>'id='."'$var'"));
			$var_a = $var_b[0]['cantidad'];


			if(($var_a + $model->cantidad) >= 0){

			$update = Yii::app()->db->createCommand()
				    ->update('banco_sangre', 
				        array(
				            'cantidad'=>new CDbExpression('cantidad + :cantidad', array(':cantidad'=>$model->cantidad))
				        ),
				        'id=:id',
				        array(':id'=>$var)
				    );

				if($model->save())
				$this->redirect(array('view','id'=>$model->id));



			}else{
				

	    	   $model->addError('ERROR','Los parametros del Banco de Sangre no Permiten ingresar Donaciones');


			}
			//endif
				

			
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

		$model_update = DonacionSangre::model()->find("id=$id");;

		if(isset($_POST['DonacionSangre']))
		{
			$model->attributes=$_POST['DonacionSangre'];

			$var = $model_update->cantidad-$model->cantidad;

			if( $var >= 0 ){




					$var_b = BancoSangre::model()->findAll(array('select'=>'cantidad','condition'=>'id='."'$model->id_banco'"));
					$var_b = $var_b[0]['cantidad'];
					$k = $var_b - $var;
					if( $k >= 0 ){

					$update = Yii::app()->db->createCommand()
						    ->update('banco_sangre', 
						        array(
						            'cantidad'=>new CDbExpression('cantidad - :cantidad', array(':cantidad'=>$var))
						        ),
						        'id=:id',
						        array(':id'=>$model_update->id_banco)
						    );

					if($model->save())
						$this->redirect(array('view','id'=>$model->id));


					}else{


							    	   $model->addError('ERROR','Los parametros del Banco de Sangre no Permiten Actualizar Donaciones');

					}

			}else{
				

					$var_b = BancoSangre::model()->findAll(array('select'=>'cantidad','condition'=>'id='."'$model->id_banco'"));
					$var_b = $var_b[0]['cantidad'];
					$k = $var_b - $var;


					if( $k >= 0 ){


					$update = Yii::app()->db->createCommand()
						    ->update('banco_sangre', 
						        array(
						            'cantidad'=>new CDbExpression('cantidad - :cantidad', array(':cantidad'=>$var))
						        ),
						        'id=:id',
						        array(':id'=>$model_update->id_banco)
						    );




					if($model->save())
						$this->redirect(array('view','id'=>$model->id));


					}else{


							    	   $model->addError('ERROR','Los parametros del Banco de Sangre no Permiten Actualizar Donaciones');

					}

			}





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

			$model_delete = DonacionSangre::model()->find("id=$id");

			$var = BancoSangre::model()->findAll(array('select'=>'cantidad','condition'=>'id='."'$model_delete->id_banco'"));
			$var_a=$var[0]['cantidad'];


			if(($var_a - $model_delete->cantidad)>=0){

								$update = Yii::app()->db->createCommand()
							    ->update('banco_sangre', 
							        array(
							            'cantidad'=>new CDbExpression('cantidad - :cantidad', array(':cantidad'=>$model_delete->cantidad))
							        ),
							        'id=:id',
							        array(':id'=>$model_delete->id_banco)
							    );
			}else{

								$update = Yii::app()->db->createCommand()
							    ->update('banco_sangre', 
							        array(
							            'cantidad'=>new CDbExpression('cantidad = :cantidad', array(':cantidad'=>0))
							        ),
							        'id=:id',
							        array(':id'=>$model_delete->id_banco)
							    );
			}


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

		$model = new DonacionSangre;
		if(isset($_POST['DonacionSangre'])){
       		$model = new DonacionSangre;
            $this->layout="//layouts/pdf";
            $mPDF1 = Yii::app()->ePdf->mpdf();
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/nn.png' ));
			$mPDF1->WriteHTML('<br>');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/line2.png' ));
			$mPDF1->WriteHTML('<br> ');
			$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/informe_donaciones.png' ));
			$where_array = array();
			$from_array = array();
			$OK = true;
			
		    if($_POST['DonacionSangre']['tipo_sangre']!=''){ // Tipo de sangre
		    	$length = (string)($_POST['DonacionSangre']['tipo_sangre']);
            	$where_array[]=('d.tipo_sangre = '."'$length'");
		    }
		    if($_POST['DonacionSangre']['desde']!=''){ // Tipo de sangre
		    	if(strtotime($_POST['DonacionSangre']['desde']) && 1 === preg_match('~[0-9]~', $_POST['DonacionSangre']['desde'])){
			    	$desde = (string)($_POST['DonacionSangre']['desde']);
	            	$where_array[]=('d.created >= '."'$desde'");
            	}else{
            		$model->addError('nombre','Fecha de Inicio: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		     if($_POST['DonacionSangre']['hasta']!=''){ // Fecha
		     	if(strtotime($_POST['DonacionSangre']['desde']) && 1 === preg_match('~[0-9]~', $_POST['DonacionSangre']['desde'])){
			    	$hasta = (string)($_POST['DonacionSangre']['hasta']);
	            	$where_array[]=('d.created <= '."'$hasta'");
	            }else{
            		$model->addError('nombre','Fecha de Termino: La Fecha ingresada no es valida ');
				   	$OK = false;
            	}
		    }
		   
		    $form = implode(", ", $from_array);	 
		    $where = implode(" AND ", $where_array);	
            $results = Yii::app()->db->createCommand()->
	            select('*')->
	            from('donacion_sangre d, '.$form)->
	            where($where)->
	            queryAll();
	        if(!$OK)$results =null;
            if($results){
				$mPDF1->WriteHTML($this->render('_informe',array('results'=>$results),true));
				$mPDF1->Output('Informe de Donaciones de Sangre',"I"); // i = visualizar en el navegador
		    }
		    else{ $model->addError('tipo_sangre','No se han encontrado donaciones de sangre con esos datos ');}
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
