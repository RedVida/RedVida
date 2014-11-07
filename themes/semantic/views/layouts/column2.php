<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>



<div class="ui grid">

<div class="thirteen  wide column">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>


<div class="three wide column" border="2px" border-radius="25px">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operaciones',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'ui link list'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>

</div>
<?php $this->endContent(); 