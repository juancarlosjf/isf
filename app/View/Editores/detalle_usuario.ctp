<div>
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link('Panel','/Editores/home');?> <span class="divider">/</span></li>
        <li class="active">Perfil</li>
    </ul>
</div>

<div class="row-fluid">
	<div class="profile">
		<div class="clearfix">
			<div class="profile-head clearfix">
				<div class="profile-info">
					<h1 class="profile-username"><?php echo $usuario['Usuario']['full_nombre']; ?></h1>
					<ul class="profile-attributes">
						<li>
						<i class="icon-home"></i><?php echo $usuario['Paise']['nombre_pais'] ?>
						</li>
					</ul>
				</div>
				<div class="btn-toolbar pull-right">
					<?php echo $this->Html->link('<i class="icon-envelope"></i> Enviar mensaje',array('controller'=>'Editores','action'=>'mensaje_add',$usuario['Usuario']['id']),array('escape'=>false,'class'=>'btn btn-primary')); ?>
				</div>
			</div>

			<div class="profile-sidebar">
				<div class="thumbnail">
					<?php echo $this->Html->image('p7.jpg');?>
				</div>
				<ul class="nav nav-tabs nav-stacked">
					<li class="active">
						<a href="#"><i class="icon-hand-right"></i> <?php echo $usuario['Usuario']['facebook'];?></a>
					</li>
					<li class="active">
						<a href="#"><i class="icon-hand-right"></i> <?php echo $usuario['Usuario']['twitter'];?></a>
					</li>
				</ul>
			</div>

			<div class="profile-content">
				<div class="tab-content">
					<div class="tab-content">
						<h4 class="sub">
							<span>Acerca de mi</span>
						</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus faucibus tortor, eu imperdiet libero feugiat ut. Proin imperdiet, lectus ut rutrum adipiscing, velit nisl pharetra justo, at egestas quam ante sed ligula. Morbi ac cursus ligula. Curabitur dolor felis, dignissim a consequat lobortis, semper laoreet ante. Aliquam erat volutpat.</p>
						
						<h4 class="sub">
							<span>Contactame</span>
						</h4>
						<p>
							<?php echo $usuario['Usuario']['email'];?>
						</p>

						<h4 class="sub">
							<span>Proyectos creados</span>
						</h4>
						<p>
							
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php print_r($usuario);?>