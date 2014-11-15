<?php 
	$this->beginContent('//layouts/'.Yii::app()->layout); 
?>

<?php	
	if(Yii::app()->user->isSuperAdmin)
		echo Yii::app()->user->ui->superAdminNote();
?>

<div class="ui grid">
	<div class="twelve wide column ">
		<div id="content">
			<?php echo $content; ?>
		</div>
	</div>

	<?php if(Yii::app()->user->checkAccess('admin')) { ?>	
	<div class="four wide column">

		<div class="ui vertical menu">
		 		<a class="active blue item" style="pointer-events:none">		
						<?php	$this->beginWidget('zii.widgets.CPortlet', array(
									'title'=>ucfirst(CrugeTranslator::t("Administración de Usuarios")),
								));
						?>
				</a>
						<?php
								$this->widget('zii.widgets.CMenu', array(
									'items'=>Yii::app()->user->ui->adminItems,
									'htmlOptions'=>array('class'=>'blue item ui blue label','id'=>'column2clase'),
								));
						?>
						<?php   $this->endWidget(); } ?>
		</div>
	</div>
</div>
<?php $this->endContent(); ?>