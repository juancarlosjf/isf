<div class="row-fluid">
	<div class="span12 page-header">
		<h3>Descubre proyectos</h3>
		<span>Explora los proyectos, encuentra a los mejores candidatos y ¡apóyalos! </span>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<?php echo $this->Form->create('Publicacione',array('url'=>'/Editores/publicacion_add','class'=>'form-horizontal'));?>
		<?php
			echo $this->Form->input('categoria_id',array('label'=>'Categoría','required','class'=>'span4','div'=>'control-group','between'=>'<div class="controls">','after'=>'</div>'));	
			echo $this->Form->end();
		?>
	</div>
</div>
	<div id="proyect">
			<?php if(!empty($proyectos)):?>
				<?php foreach ($proyectos as $proyecto):?>
				<div class="proyect-box well">
					<div class="project-card">
						<img alt="" src="../img/photo-little.jpg">
						<div class="projectinfo">
							<?php $id = $proyecto['Proyecto']['id'];?>
							<a href="../Editores/proyecto_view/<?php echo $id;?>" class="titulo"><?php echo $proyecto['Proyecto']['titulo']; ?></a>
							<span class="project_owner"><?php echo $proyecto['Usuario']['full_nombre']; ?></span>
							<p>
						 		<?php echo $proyecto['Proyecto']['descripcion']; ?>
							</p>	 
						</div>
					</div>
				</div>
			
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
