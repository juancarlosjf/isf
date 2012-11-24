<div>
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link('Panel','/Editores/home');?> <span class="divider">/</span></li>
        <li class="active">Proyectos</li>
    </ul>
</div>

<div class="row-fluid">
	<div class="span12 widget">
		<div class="widget-header">
			<span class="title">
				<i class="icon-tag"></i>
				Mis proyectos
			</span>
		</div>
			<div class="widget-content">
				<table id="datatable" class="table table-striped table-bordered bootstrap-datatable dataTable">
					<thead>
						<th>Id</th>
						<th>Titulo</th>
						<th>Fecha</th>
						<th>Categoría</th>
						<th>Acciones</th>
					</thead> 
					<tbody>
						<?php foreach ($proyectos as $proyecto):?>
						<tr>
							<td><?php echo $proyecto['Proyecto']['id']; ?></td>
							<td><?php echo $proyecto['Proyecto']['titulo']; ?></td>
							<td><?php echo $proyecto['Proyecto']['fecha']; ?></td>
							<td><?php echo $proyecto['Categoria']['categoria']; ?></td>
							<td align="center">
								<?php echo $this->Html->link('<i class="icon-edit icon-white"></i>',array('action'=>'proyecto_edit',$proyecto['Proyecto']['id']),array('title'=>'Editar','escape'=>false,'class'=>'btn btn-info'));?>

								<?php echo $this->Form->postLink('<i class="icon-trash icon-white"></i>',
									array('action' => 'proyecto_delete', $proyecto['Proyecto']['id']),
									array('class'=>'btn btn-danger','title'=>'Eliminar','escape'=>false,'confirm' => '¿Está seguro que desea eliminar?')); ?>
            				</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
	</div>
</div>