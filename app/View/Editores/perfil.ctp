<div>
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link('Panel','');?> <span class="divider">/</span></li>
        <li class="active">Mi Perfil</li>
    </ul>
</div>

<div class="row-fluid">
	<div class="span12 widget">
		<div class="widget-header">
			<span class="title">
				<i class="icon-tag"></i>
				Perfil
			</span>
		</div>
			<div class="widget-content form-container">
				<div>
					<?php echo $this->Form->create('Usuario',array('url'=>'/Editores/perfil','class'=>'form-horizontal'));?>
					<?php
						echo $this->Form->hidden('id');
						echo $this->Form->input('full_nombre',array('label'=>'Nombre completo','required','class'=>'span9','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>')); 
						echo $this->Form->input('email',array('label'=>'Email','required','class'=>'span8','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));	
						echo $this->Form->input('facebook',array('label'=>'Facebook','class'=>'span6','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('twitter',array('label'=>'Twitter','class'=>'span6','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('paise_id',array('label'=>'País','class'=>'span5','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('usuario',array('label'=>'Usuario','required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));
						echo $this->Form->input('password_new',array('label'=>'Contraseña','required','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));

						echo '<div class="form-actions">';
						echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-success'));	
						echo $this->Form->button('Reestablecer',array('type'=>'reset','class'=>'btn btn-info'));
						echo '</div>';
						echo $this->Form->end();
					?>
				</div>	
			</div>
	</div>
</div>