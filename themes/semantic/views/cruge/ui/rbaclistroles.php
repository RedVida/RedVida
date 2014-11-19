<br/>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Roles </h1>
</div>

<div class='auth-item-create-button'>
<?php echo CHtml::link(CrugeTranslator::t("Crear Nuevo Rol")
	,Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE));?>
</div>

<?php $this->renderPartial('_listauthitems',array('dataProvider'=>$dataProvider),false);?>