<?php
/* @var $this OrganoController */
/* @var $data Organo */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->idOrgano), array('view', 'id'=>$data->idOrgano)); ?>

	<?php echo CHtml::encode($data->nombreOrgano); ?>
	<br />


</div>