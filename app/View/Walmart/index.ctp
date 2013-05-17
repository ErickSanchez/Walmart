<div class="grid_19">
	   <?php 
	   		//echo $this->Html->image('banners/gametime_HP_POV.jpg',array('class'=>'banner')); 
	   foreach ($products as  $value) { //="110" ="110"
	   	echo $this->Html->image('products/'.$value['Product']['image'],array('width'=>'158','height'=>'158'));
	   }
	   ?>
</div>
