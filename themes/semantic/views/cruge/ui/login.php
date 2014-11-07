<h1>&nbsp&nbsp<?php echo CrugeTranslator::t('logon',"Login"); ?></h1>

<?php if(Yii::app()->user->hasFlash('loginflash')): ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('loginflash'); ?>
</div>
<?php else: ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'logon-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<?php Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
    CClientScript::POS_READY
); ?>

<div class="ui two column relaxed grid">
  <div class="column">
    <div class="ui fluid form segment">
      <div class="field">
    <h4>Usuario</h4>
    <div class="ui left labeled icon input">
      <?php echo $form->textField($model,'username'); ?>
      <i class="user icon"></i>
      <div class="errors">	
	  <?php echo $form->error($model,'username',array('class' => 'ui small red pointing above ui label')); ?> 
      </div>
      <div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
    </div>
  </div>
       <div class="field">
    <h4>Contraseña</h4>
    <div class="ui left labeled icon input">
      <?php echo $form->passwordField($model,'password'); ?>
      <i class="lock icon"></i>
     <div class="errors">	 	
     <?php echo $form->error($model,'password',array('class' => 'ui small red pointing above ui label')); ?> 
      </div>
      <div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
    </div>
  </div>
       <div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	   </div>
       <p>
	<div class="row buttons">
		<?php echo CHtml::submitButton(CrugeTranslator::t('login', "Login"),array("class"=>"ui blue submit button")); ?>
		<p></p>
		<?php echo Yii::app()->user->ui->passwordRecoveryLink; ?>
		<br>
		<?php 
			if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
				echo Yii::app()->user->ui->registrationLink;
		?>
	</br>
    </div>
  </div>
	<?php
		//	si el componente CrugeConnector existe lo usa:
		//
		if(Yii::app()->getComponent('crugeconnector') != null){
		if(Yii::app()->crugeconnector->hasEnabledClients){ 
	?>
	<div class='crugeconnector'>
		<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
		<ul>
		<?php 
			$cc = Yii::app()->crugeconnector;
			foreach($cc->enabledClients as $key=>$config){
				$image = CHtml::image($cc->getClientDefaultImage($key));
				echo "<li>".CHtml::link($image,
					$cc->getClientLoginUrl($key))."</li>";
			}
		?>
		</ul>
	</div>
	<?php }} ?>
	

<?php $this->endWidget(); ?>
</div>
<?php endif; ?>
