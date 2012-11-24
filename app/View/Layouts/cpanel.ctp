<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Informáticos sin fronteras</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="Informáticos sin fronteras" />
	<meta name="author" content="" />

    <?php echo $this->Html->css(array('bootstrap','cpanel','style','bootstrap-responsive.min')); 
		  echo $this->Html->script(array('jquery','bootstrap.min','jquery.dataTables'));
	?>
	
	<?php echo $scripts_for_layout;?>
</head>
<body>
<?php $menu = $this->params['controller'];
	  $action = $this->params['action'];?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a href="#" class="brand">Panel de Administración</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li <?php if(($menu == 'Editores' or $menu == 'editores') and $action == 'home'): ?> class="active" <?php endif;?> >
							<?php echo $this->Html->link('Panel','/Editores/home');?>
					</li>
					<li <?php if(($menu == 'Editores' or $menu == 'editores') and $action == 'proyectos'): ?> class="active" <?php endif;?> >
							<?php echo $this->Html->link('Mis proyectos','/Editores/proyectos');?>
					</li>
					<li <?php if(($menu == 'Editores' or $menu == 'editores') and $action == 'publicaciones'): ?> class="active" <?php endif;?> >
							<?php echo $this->Html->link('Mis publicaciones','/Editores/publicaciones');?>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>

<!-- container -->	
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="member-box round-all">
				<a href="#">
					<?php echo $this->Html->image('michael.jpg',array('class'=>'member-box-avatar'));?>
				</a>
				<span class="member-box-links">
            		<a href="#">John Doe</a> | <?php echo $this->Html->link('Salir',array('controller'=>'Usuarios','action'=>'logout'));?>
        		</span> 
			</div>
			
			<div id="sidebar" class="accordion">
				<div class="accordion-group">
					<div class="accordion-heading btn-info-light">
						<?php echo $this->Html->link('<i class="icon-user icon-white"></i> Mi Perfil','/Editores/perfil',array('escape'=>false,'class'=>'accordion-toggle btn btn-info dashboard')); ?>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading btn-info-light">
						<?php echo $this->Html->link('<i class="icon-list-alt icon-white"></i> Nuevo proyecto','/Editores/proyecto_add',array('escape'=>false,'class'=>'accordion-toggle btn btn-info dashboard')); ?>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading btn-info-light">
						<?php echo $this->Html->link('<i class="icon-file icon-white"></i> Nueva publicacion','/Editores/publicacion_add',array('escape'=>false,'class'=>'accordion-toggle btn btn-info dashboard')); ?>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<?php echo $this->Html->link('<i class="icon-envelope"></i> Mis Mensajes','#collapseTwo',array('escape'=>false,'class'=>'accordion-toggle elements btn btn-info open','data-toggle'=>'collapse')); ?>
					</div>
					<div id="collapseTwo" class="collapse">
						<div class="accordion-inner">
							<ul class="unstyled">
								<li>
									<?php echo $this->Html->link('Mensajes enviados','/Editores/mensajes_enviados');?>
								</li>
								<li>
									<?php echo $this->Html->link('Mensajes recibidos','/Editores/mensajes_recibidos');?>
								</li>
								<li>
									<?php echo $this->Html->link('Comentarios','/Editores/comentarios');?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
									
		</div>

		<div class="span9">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
	</div>

	<footer>
		© 2012 Proyectos de Informática, Sistemas y Computación con Orientación Internacional<br />
		Copyright © Proyecto Informáticos sin fronteras - versión 2.0<br />
		Proyectos Internacionales
	</footer>			
</div>
<?php echo $this->Html->script(array('funciones')); ?>
</body>
</html>