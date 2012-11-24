<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
	<title>Informáticos sin fronteras</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="Informáticos sin fronteras" />
	<meta name="author" content="" />
	
	<?php
		echo $this->Html->css(array('bootstrap-login.min','login.min','style'));
	?>
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php echo $scripts_for_layout;?>

  </head>
<body> 
	<div id="login-wrap">
			<!-- contenido -->
				<?php echo $this->Session->flash(); ?>
				<?php echo $content_for_layout; ?>			
			<!-- fin contenido -->		
	</div>
</body>
</html>
