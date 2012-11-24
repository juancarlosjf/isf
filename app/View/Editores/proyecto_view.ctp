<div class="row-fluid">
	<div class="span12 page-header">
		<h3><?php echo $proyecto['Proyecto']['titulo'];?></h3>
		<span>Un proyecto de <?php echo $this->Html->link($proyecto['Usuario']['full_nombre'],array('controller'=>'Editores','action'=>'detalle_usuario',$proyecto['Usuario']['id']));?></span>
	</div>
</div>

<div class="row-fluid">
	<div class="span8">
		<div class="proyecto-img">
			<?php echo $this->Html->image('estudiantes-universitarios.jpg',array('class'=>'img-polaroid'));?>
		</div>
	</div>
	<div class="span4">
		<div class="well">
			<div align="center">
			<?php if(empty($colaboradordelproyecto)): ?>
				<?php echo $this->Html->link('Unirse al Proyecto',array('controller' => 'Editores', 'action' => 'proyecto_colaborador',$proyecto['Proyecto']['id'] ),array('class'=>'btn btn-success'));?>
			<?php else:?>
				<?php echo $this->Html->link('Eres colaborador de este proyecto!','#',array('class'=>'btn btn-primary'));?>
			<?php endif;?>
			</div>
		</div>
		
		<div class="projectby">
				<a class="alignleft" href="#">
				<img alt="" src="../assets/news_1.jpg">
			</a>
			<strong>Autor: </strong><?php echo $usuario['Usuario']['full_nombre'];?><br>
			<strong>Email: </strong><?php echo $usuario['Usuario']['email'];?><br>
			<strong>País: </strong><?php echo $usuario['Paise']['nombre_pais'];?>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#descripcion"><h4>Descripción</h4></a></li>
					<li><a href="#colaboradores"><h4>Colaboradores</h4></a></li>
					<li><a href="#comentarios"><h4>Comentarios</h4></a></li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="descripcion">
						<h4>Categoría del Proyecto</h4>
						<p>
							<?php echo $proyecto['Categoria']['categoria']?>
						</p>
						<h4>Descripción del Proyecto</h4>
						<p>
							<?php echo $proyecto['Proyecto']['descripcion']?>
						</p>
						<h4>¿Dónde puede saber más sobre el proyecto?</h4>
						<p>
							<?php if(!empty($proyecto['Proyecto']['pagina_web'])):
								echo $proyecto['Proyecto']['pagina_web'];
								else:
								echo "No hay ningún enlace disponible.";	
								endif;
							?>
						</p>
						
					</div>
					<div class="tab-pane" id="colaboradores">
						<div class="span11 chat-box">
							<ul class="thumbnails">
							<?php foreach ($colaboradores as $colaborador): ?>
								<li class="me">
									<div class="thumbnail">
										<img src="../../img/pp.jpg" >
									</div>
									<div class="message">
										<span class="name"><?php echo $colaborador['Usuario']['full_nombre'];?></span>
										<span class="time"><?php echo $colaborador['Colaboradore']['fecha'];?></span>
									</div>
								</li>
							<?php endforeach;?>
							</ul>		
						</div>
					</div>
					<div class="tab-pane" id="comentarios">
					<?php echo $this->Form->create('Comentario',array('url'=>'/Editores/comentario_add','class'=>'form-horizontal'));?>
					<?php
						$id = $proyecto['Proyecto']['id'];
						echo $this->Form->hidden('proyecto_id',array('value'=>$id));
						echo $this->Form->textarea('comentario', array('required','class'=>'span11','rows'=>'5'));
						echo '<div class="form-action">';
						echo $this->Form->button('Enviar comentario',array('type'=>'submit','class'=>'btn btn-primary'));	
						echo '</div>';
						echo $this->Form->end();
					?>
						<div class="span11 chat-box">
							<ul class="thumbnails">
							<?php foreach ($comentarios as $comentario): ?>
								<li class="me">
									<div class="thumbnail">
										<img src="../../img/pp.jpg" >
									</div>
									<div class="message">
										<span class="name"><?php echo $comentario['Usuario']['full_nombre'];?></span>
										<?php echo $comentario['Comentario']['comentario'];?>
										<span class="time"><?php echo $comentario['Comentario']['fecha'];?></span>
									</div>
								</li>
							<?php endforeach;?>
							</ul>		
						</div>
					</div>
				</div>
	</div>
</div>
    
<script type="text/javascript">
	$('#myTab a').click(function (e) {
    	e.preventDefault();
    	$(this).tab('show');
    })
</script>
<?php //print_r($colaboradordelproyecto);?>	