<div class="content grid_19">


	<?php 
	if(count($products) <= 0 ){
		echo "<center><h3>No hay resultados para mostrar</h3></center>";
	}
	else
	foreach ($products as $value) {
	
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
	<?php } ?>
	<center>
	<div class="pagination">
        <ul>
        	<li><a href="">«</a></li>
        	<?php 
        		for($i = 1; $i <= $pages; $i++) {
        			if($page == $i)
        				$disabled = array('class'=>'disabled');
        			else
        				$disabled = null;
        			echo '<li>'.$this->Html->link($i,'/search?dep='.$dep.'&page='.$i.'&s='.$s,$disabled).'</li>';
        		}
        	?>            
            <li><?php echo $this->Html->link('»','/search?dep='.$dep.'&page='.($i-1).'&s='.$s)?>
            </a></li>
        </ul>
    </div>
    </center>
</div>