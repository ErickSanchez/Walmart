
<div class="<?php echo $pluralVar; ?> form">
<?php
	echo $this->Form->create(array('class'=>'form-horizontal','type'=>'file'));
	echo $this->Form->inputs($scaffoldFields, array('created', 'modified', 'updated'));
	echo $this->Form->end(__d('cake', 'Submit'));
?>
</div>