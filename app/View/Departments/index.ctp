<div class="content grid_19">

	<?php foreach ($products as $value) {
	
	?>
	<div class="grid_19 alpha omega sp">
		<div class="grid_5 alpha">
			<a href="" onclick="" >
			<?php echo $this->Html->image('products/'.$value['Product']['image'],array('height'=>'150', 'width'=>'150')); ?>				
			</a>
		</div>
		<div class="grid_14 omega font_2">
			<div class="grid_8 alpha">
				<a  href=""><?php echo $value['Product']['name']?></a>

				<p><?php 

					$list = explode('*',$value['Product']['description']);
					foreach ($list as  $li) {
						if($li)
						echo '* '.$li.'<br/>';
					}

				?></p>
			</div>
			<div class="grid_6 omega">
				<h4 class="price"><?php echo $value['Brand']['name'];?></h4>
				<h4 class="price"><?php echo $value['Product']['model'];?></h4>
				<h4 class="price">&nbsp;</h4>
				<h4 class="price"><span>$ <?php echo $value['Product']['price']?></span></h4>
				<h4 class="available">Disponibles (<?php echo $value['Product']['quantity']?>)</h4>
				<a href="" class="btn  btn-warning add-cart "><span class="shopping-cart"></span>Agregar al Carrito</a>
			</div>
		</div>
	</div>
	<p class="clear"><!-- --></p>
	<?php } 
	?>
	<center>
	<div class="pagination">
        <ul>
        	<li><a href="">«</a></li>
        	<?php 
        		for($i = 1; $i <= $pages; $i++) {
        			echo '<li>'.$this->Html->link($i,'/departments/'.$dep.'/'.$cat.'?page='.$i).'</li>';
        		}
        	?>            
            <li><?php echo $this->Html->link('»','/departments/'.$dep.'/'.$cat.'?page='.($i-1))?>
            </a></li>
        </ul>
    </div>
    </center>

</div>