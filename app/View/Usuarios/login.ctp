<div id="login-ribbon"><i class="icon-lock"></i></div>
<div id="login-inner">
	<div id="login-circle">
		<section id="login-form" class="login-inner-form active">
			<h1>Login</h1>
			<?php echo $this->Session->flash('auth'); ?>
			<?php echo $this->Form->create('Usuario',array('action'=>'login','class'=>'login-inner-form active')); ?>
			<div class="control-group">
				<input name="data[Usuario][usuario]" type="text" placeholder="Usuario" id="input-username" class="big"/>
				<input name="data[Usuario][password]" type="password" placeholder="Contraseña" id="input-password" class="big"/>
			</div>
			<?php
				echo '<div class="form-actions">';
				echo $this->Form->button('Iniciar Sesión',array('type'=>'submit','class'=>'btn btn-success btn-block btn-large'));	
				echo '</div>';
				echo $this->Form->end();
			?>
		</section>
	</div>
</div>