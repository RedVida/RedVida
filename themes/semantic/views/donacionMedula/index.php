<?php
$this->menu=array(
	array('label'=>'Registrar Donación', 'url'=>array('/donantes/donar')),
	array('label'=>'Administrar Donación de Médula', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Donación de Médula </h1>
</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">
	
	</div>

	<div class="twelve wide column">

	<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	)); ?>

	</div>
	
</div>

<hr class="style-two ">

