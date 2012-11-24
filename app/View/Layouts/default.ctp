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
	<?php echo $this->Html->meta('icon', $this->Html->url('../img/favicon.ico')); ?>
	<!-- Le styles -->
    <?php echo $this->Html->css(array('bootstrap','web','bootstrap-responsive.min')); 
		  echo $this->Html->script(array('jquery','bootstrap.min'));
	?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php echo $scripts_for_layout;?>
</head>
<body>
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="span4">
					<div id="logo">
						<h4>INFORMATICOS SIN FRONTERAS</h4>
					</div>
				</div>
				<div class="span8">
					<div class="navbar">
				          <div class="nav-collapse collapse">
				            <ul class="nav menu-top">
				              <li class="active"><a href="#">Home</a></li>
				              <li><a href="#contact">¿Quienes somos?</a></li>
				              <li><a href="#about">Proyectos</a></li>
				              <li><a href="#contact">Tutoriales</a></li>
				              <li><a href="#about">Videotutoriales</a></li>
				              <li><a href="#about">Contacto</a></li>
				            </ul>
				          </div><!--/.nav-collapse -->
				    </div>
				</div>
			</div>
		</div><!-- /inner -->
	</header>

	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $content_for_layout; ?>
	</div>

	<footer>
		© 2012 Proyecto Informaticos sin Fronteras <br />
		Proyectos de Informática, Sistemas y Computación con Orientación Internacional<br />
		admin@informaticos.com 
	</footer>
	
</body>

	<script type="text/javascript">
		$('#carousel').elastislide({
			imageW 	: 180,
			minItems	: 5
		});
		
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
	    })
	</script>

</html>
