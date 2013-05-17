<script type="text/javascript">
  $(document).ready(function(){
    
    $('#confirm-password').focusout(function(){
      if($('#CustomerPassword').val() != $(this).val()){       
          $('#error-password').html('Las contraseñas no coinciden');    
      }
      else
        $('#error-password').html('');
    });

    $('#CustomerPassword').focusout(function(){
      if($('#confirm-password').val() != null && $('#confirm-password').val() != ""){
          if($(this).val() != $('#confirm-password').val())       
              $('#error-password').html('Las contraseñas no coinciden');    
      }
      else
        $('#error-password').html('');
    });

    $('#send').click(function(event){

      if($('#CustomerPassword').val() != $('#confirm-password').val()){
        event.preventDefault();
        $('#error-password').html('Las contraseñas no coinciden');    
      }

      if($('#CustomerRfc').val() != "" && !alphanumeric($('#CustomerRfc').val())){
        $('#error-rfc').html('Solo se aceptan caracteres Alfanumericos');    
      }

      if($('#CustomerCurp').val() != "" && !alphanumeric($('#CustomerCurp').val())){
        $('#error-curp').html('Solo se aceptan caracteres Alfanumericos');    
      }

      if( $('#AddressCustomerZipcode').val() != "" && isNaN($('#AddressCustomerZipcode').val()))
        $('#error-zipcode').html('Escribe un codigo postal valido');

    });
  });

  function alphanumeric(val){
    var regex=/^[0-9A-Za-z]+$/;
    if(regex.test(val)){
      return true;
    } 
    else {
      return false;
    }
}
</script>
<div class="content content_24"> <!--Content -->
  <div class="grid_20 prefix_2">
      <?php  echo $this->Form->create('Customer', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'label' => false,
        'div' => false
    ))); ?>

        <span class="title"><h4>Cuenta</h4></span>
        <div class="control-group">
          <label class="control-label">Correo Electronico</label>
          <div class="controls">
            <?php  echo $this->Form->input('Customer.email',array('placeholder'=>'Ej: serick@outlook.com','autocomplete'=>'off','required')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Contraseña</label>
          <div class="controls">
            <?php  echo $this->Form->input('Customer.password',array('placeholder'=>'*****************','required')); ?>
          </div>        
        </div>
        <div class="control-group">
          <label class="control-label">Comfirmar Contraseña</label>
          <div class="controls">
            <input type="password" id="confirm-password" name="confirm-password" placeholder="*****************" required><label id="error-password" class="error"></label>
          </div>        
        </div>
        <span class="title"><h4>Nombre</h4></span>
        <div class="control-group">
          <label class="control-label">Nombre(s)</label>
          <div class="controls controls-row">
            <?php  echo $this->Form->input('Customer.firstname',array('class'=>'span2','placeholder'=>'Ej: Erick','required')); ?>  <label class="label-2" >Apellidos</label>            
            <?php  echo $this->Form->input('Customer.surnames',array('class'=>'span4','placeholder'=>'Ej: Sánchez Rumbo','required')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">RFC</label>
          <div class="controls">
            <?php  echo $this->Form->input('Customer.rfc',array('placeholder'=>'Ej: SARE900621E82')); ?>
            <label id="error-rfc" class="error"></label>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">CURP</label>
          <div class="controls">
            <?php  echo $this->Form->input('Customer.curp',array('placeholder'=>'Ej: SARE900621HMMN07')); ?>
            <label id="error-curp" class="error"></label>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Telefono</label>
          <div class="controls">
            <?php  echo $this->Form->input('Customer.telephone',array('placeholder'=>'Ej: 4431338489','type' => 'tel')); ?>  
          </div>
          
        </div>
        <span class="title"><h4>Direción</h4></span>
        <div class="control-group">
          <label class="control-label">Estado</label>
          <div class="controls controls-row">
            <?php  echo $this->Form->input('AddressCustomer.state',array('placeholder'=>'Ej: Michoacan')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Ciudad</label>
          <div class="controls controls-row">
            <?php  echo $this->Form->input('AddressCustomer.city',array('placeholder'=>'Ej: Morelia')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Municipio</label>
          <div class="controls controls-row">
            <?php  echo $this->Form->input('AddressCustomer.town',array('placeholder'=>'Ej: Morelia')); ?>
          </div>
        </div>
         <div class="control-group">
          <label class="control-label">Direción</label>
          <div class="controls controls-row">
            <?php  echo $this->Form->input('AddressCustomer.address',array('placeholder'=>'Ej: Socialismo #238')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Codigo Postal</label>
          <div class="controls controls-row">
            <?php  echo $this->Form->input('AddressCustomer.zipcode',array('placeholder'=>'Ej: 58130','required')); ?>
            <label id="error-zipcode" class="error"></label>
          </div>
        </div>
        
        <div class="control-group">
          <div class="controls">
            <button type="submit" id="send" class="btn">Registro</button>
            <button type="reset" class="btn">Limpiar campos</button>
          </div>
        </div>
      <?php  echo $this->Form->end(); ?>
    </div>
</div><!--End Content -->