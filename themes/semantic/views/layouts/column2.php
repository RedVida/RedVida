<?php $this->beginContent('//layouts/main'); ?>

<div class="ui grid">

<div class="twelve  wide column">
	<div id="content">
		<?php echo $content; ?>
	</div>
</div>

	<div class="four wide column">
		<br>
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
				'htmlOptions'=>array('class'=>'blue item ui blue label','id'=>'column2clase'),
			));
		?>
		<?php
			$this->endWidget();
		?>
		</div>
	</div>

</div>
<?php $this->endContent(); 