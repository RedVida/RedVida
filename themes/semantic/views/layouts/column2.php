<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>



<div class="ui grid">

<div class="twelve  wide column">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>





	<div class="four wide column">
		

		<div class="ui vertical menu">
		 

		 <a class="active blue item" style="pointer-events:none">
	    <?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operaciones',
			));

		?>
	  	</a>

		

		<?php
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'blue item ui blue label'),
			));
		?>






		<?php
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>

</div>
<?php $this->endContent(); 