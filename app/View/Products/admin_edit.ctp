<div class="products form">	
	<?php echo $this->Form->create('Product',array('type'=>'file')); ?>
		<div style="display:none;">
			<input type="hidden" name="_method" value="POST">
		</div>
		<fieldset>
			<legend>New Product</legend>

			<?php echo $this->Form->input('id'); ?>
			<div class="input select">
				<label for="ProductBrandId">Brand</label>
				<select name="data[Product][brand_id]" id="ProductBrandId">
					<?php foreach ($brands as $value) {
						if($brand_id == $value['Brand']['id'])
							$selected='selected';
						else
							$selected='';
						echo '<option value="'.$value['Brand']['id'].'"" '.$selected.'>'.$value['Brand']['name'].'</option>';
					}?>
				</select>
			</div>

		    <?php echo $this->Form->input('name'); ?>
		    <?php echo $this->Form->input('description'); ?>
		    <?php echo $this->Form->input('quantity'); ?>
		    <?php echo $this->Form->input('model'); ?>

			<input type="hidden" name="data[Product][img]" value="<?php echo $this->request->data['Product']['image'];?>">

		    <?php echo $this->Form->input('image',array('type'=>'file')); ?>
		    <?php echo $this->Form->input('price'); ?>
		    <?php echo $this->Form->input('status'); ?>
		    <?php //echo $this->Form->input('Categorie.Categorie'); 

		    if(isset($this->request->data['Categorie']['Categorie']))
			    foreach ($this->request->data['Categorie']['Categorie'] as $value) {
			    	$ids[] = $value;
			    }
			else
		    	if(isset($this->request->data['Categorie']))
			    	foreach ($this->request->data['Categorie'] as  $value) {
			    		$ids[] = $value['id'];
			    	}
		    ?>
			<div class="input select">
				<label for="CategorieCategorie">Categorie</label>
				<input type="hidden" name="data[Categorie][Categorie]" value="" id="CategorieCategorie_">
				<select name="data[Categorie][Categorie][]" multiple="multiple" id="CategorieCategorie">
					<?php foreach ($categories as $value) {
						if(in_array($value['Categorie']['id'],$ids))
							$selected='selected';
						else
							$selected='';
						echo '<option value="'.$value['Categorie']['id'].'" '.$selected.'>'.$value['Categorie']['name'].'</option>';
					}?>
				</select>
			</div>
		</fieldset>
	<?php echo $this->Form->end(__d('cake', 'Submit')); ?>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><a href="/Walmart/admin/products">List Products</a></li>
		<li><a href="/Walmart/admin/brands">List Brands</a></li>
		<li><a href="/Walmart/admin/brands/add">New Brand</a></li>
		<li><a href="/Walmart/admin/specials">List Specials</a></li>
		<li><a href="/Walmart/admin/specials/add">New Special</a></li>
		<li><a href="/Walmart/admin/categories">List Categories</a></li>
		<li><a href="/Walmart/admin/categories/add">New Categorie</a></li>
	</ul>
</div>