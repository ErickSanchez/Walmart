<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Walmart</title>
	<?php
		echo $this->Html->css('960/reset');
		echo $this->Html->css('960/960_24_col');
		echo $this->Html->css('bootstrap/bootstrap');
		echo $this->Html->css('style');
		echo $this->Html->script('jquery-1.9.1.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<div class="container_24">
		<header class="content_24"> <!--Header -->
			<div class="grid_5 logo"> 
				<a href="<?php echo $this->Html->url('/',true);?>">
					<?php echo $this->Html->image('walmart.png'); ?>
				</a>	
			</div>
			<div class="grid_19 signin"> 
				<div class = "grid_7 prefix_12 font_1 alpha omega">
					<?php echo $this->Html->link('Regístrate','/customers/singup');?> | 
					<?php echo $this->Html->link('Iniciar sesion','/customers/singin');?> | 
					<?php echo $this->Html->link('Ayuda','Customers/singup');?>
				</div>
			</div>
			<div class="grid_19 menu"> 
				<ul class="grid_13 font_2 alpha">
					<li><a href="">Oferta del Dia</a></li> |
					<li><?php echo $this->Html->link('Buscador de Tiendas','/search');?></li> |
					<li><?php echo $this->Html->link('Registro','/customers/singup');?></li>
				</ul>
				<ul class="grid_5 font_1 omega">
					<li><span class="shopping-cart">
						<?php echo $this->Html->link('Carrito (9999)','/shopping_carts');?>
						</span></li> |
					<li><?php echo $this->Html->link('Mi Cuenta','/customers');?></li>
				</ul>
			</div>
			<div class="grid_5 space-search alpha">
				
			</div>			
			<div class="grid_19 search omega"> 
				<form class="push_1" action="<?php echo $this->Html->url('/search',true)?>">
					<?php 
					if(isset($departments)){				
						?>
					<input type="hidden" name="page" value="1">
					<select name="dep">
						<option value="all">Todos los departamentos</option>						
						<?php foreach ($departments as $value) {
							print_r($value);
							if($dep == $value['Department']['id'])
								$selected = "selected";
							else
								$selected = '';

							echo '<option value="'.$value['Department']['id'].'" '.$selected.'>'.$value['Department']['name'].'</option>';
						}?>
					</select>
					<?php } ?>
					<input typ="text" name="s" placeHolder="Buscar" value="<?php if(isset($s)) echo $s;?>">
					<input type="submit" value="Ir">
				</form>
			</div>
		</header><!--End Header -->
		<div class="clear"></div>
		<div class="content_24"> <!--Content -->
			<?php if(!empty($departments)){ ?>
			<div class="grid_5 department font_3 alpha">
				<ul>
					<?php 
					foreach ($departments as $dep) {
						echo '<li>'.$this->Html->link($dep['Department']['name'],'/departments/'.$dep['Department']['url']);
						if(!empty($categories) ){
							echo '<ul class="font_2">';
								foreach ($categories as $cat) {
									if($cat['Categorie']['department_id'] == $dep['Department']['id'])
									echo '<li>'.$this->Html->link('- '.$cat['Categorie']['name'],'/departments/'.$dep['Department']['url'].'/'.$cat['Categorie']['id']).'</li>';
								}
							echo "</ul>";
						}		
						echo '</li>';
					}?>
				</ul>	
			</div>
			<?php } echo $this->fetch('content'); ?>
		</div><!--End Content -->
		<div class="clear"></div>
		<footer class="content_24"> <!--Footer -->
			<div id="page-footer">
			    <div id="footer-top">			   
			    	<div class="left" style="float:left; width:230px">
    
		<a href="<?php echo $this->Html->url('/');?>" class="logo">
			<?php echo $this->Html->image('WmMxCa.png'); ?>
		</a>
    		
	</div>
    <div style="float:left">
    	<?php echo $this->Html->image('LnVe.jpg')?>
    </div>
    <div style="float:left; width:230px">
    	
        	<li class="TitFooter">Walmart</li>        	
            <li class="LnkFooter"><a href="" title="Términos y condiciones">Términos y condiciones</a></li>
            <li class="LnkFooter"><a href="" title="Aviso de Privacidad">Aviso de Privacidad</a></li>            
			<li class="LnkFooter"><a href="" title="Sitio 100% Seguro">Sitio 100% Seguro</a></li>
					    
            <li class="TitFooter">Servicios Financieros</li>   
            <li class="LnkFooter"><a href="" target="_blank" title="Banco Wal-Mart">Banco Wal-Mart</a></li> 
            <li class="LnkFooter"><a href="" title="Facturación Electrónica">Facturación Electrónica</a></li>
            
           
        
        </div>
        
        <div style="float:left">
    	<?php echo $this->Html->image('LnVe.jpg')?>
   		</div>
    
        <div style="float:left; width:230px">
           
            <li class="TitFooter">Ayuda</li> 
     	    <li class="LnkFooter"><a href="" title="Servicios">Servicios</a></li>
            <li class="LnkFooter"><a href="" title="Acerca de nosotros">Acerca de nosotros</a></li>
            <li class="LnkFooter"><a href="" title="Contáctanos">Contáctanos</a></li>
            
            <li class="TitFooter">Nuestras Redes Sociales<br><br></li>
            <li class="LnkFooter"><a href="" target="_blank">
            	<?php echo $this->Html->image('fb.jpg')?>
            </a>&nbsp;&nbsp;&nbsp;
             <a href="http://twitter.com/WalmartComMx" target="_blank">
                 <?php echo $this->Html->image('tw.jpg')?>
             </a>
             </li>   
					    
       </div>       
       
       
 
		<div style="float:left">
    	<?php echo $this->Html->image('LnVe.jpg')?>
   		</div>
        <div style="float:left; width:230px">   
            <li class="TitFooter">Tiendas y Empresas</li> 
            <li class="LnkFooter"><a href="" title="Cambiar de tienda">Buscador de Tiendas</a></li>                
			<li class="LnkFooter"><a href="" target="_blank" title="Corporativo">Corporativo</a></li>
			 <li class="LnkFooter"><a href="" target="_blank" title="Bolsa de Trabajo">Bolsa de Trabajo</a></li>
             
             </div>
</div>
</div>
		</footer><!--End Footer -->
	</div>
</body>
</html>