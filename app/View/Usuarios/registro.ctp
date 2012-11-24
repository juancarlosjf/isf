<div id="login-ribbon"><i class="icon-lock"></i></div>
<div id="login-inner">
	<div id="login-circle">
		<section class="login-inner-form active">
			<h1>Registro</h1>
				<?php echo $this->Form->create('Usuario',array('action'=>'registro','class'=>'form-vertical'));?>
				<?php
					echo $this->Form->input('full_nombre',array('label'=>'Nombre completo','required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
					echo $this->Form->input('email',array('label'=>'Email','required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
					echo $this->Form->input('usuario',array('label'=>'Usuario','required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
					echo $this->Form->input('password',array('label'=>'Password','required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
					echo '<div class="form-actions">';
					echo $this->Form->button('Registrar',array('type'=>'submit','class'=>'btn btn-danger btn-block btn-large'));	
					echo $this->Form->end(); 
				?>
		</section>
	</div>
</div>
