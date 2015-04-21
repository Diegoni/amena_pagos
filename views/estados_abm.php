<?php
include_once('menu.php');
include_once($route['models'].'m_estados_transferencia.php');

$estados		= new m_Estados_transferencia();
 
/*----------------------------------------------------------------------------
		Insert registro
----------------------------------------------------------------------------*/

if(isset($_POST['insert']))
{
	$datos = array(
		'estado'		=> $_POST['estado'],
		'descripcion'	=> $_POST['descripcion'],
		'compensacion'	=> $_POST['compensacion'],
	);
	
	$id_insert = $estados->insert($datos);
	$mensaje = set_alert($language['insert_ok']);
}
  
/*----------------------------------------------------------------------------
		Delete registro
----------------------------------------------------------------------------*/

if(isset($_GET['delete']))
{
	$datos = array(
		'delete'		=> 1
	);
	
	$estados->update($datos, $_GET['delete']);
	$mensaje = set_alert($language['delete_ok']);
}
  
/*----------------------------------------------------------------------------
		Uodate registro
----------------------------------------------------------------------------*/

if(isset($_POST['volver']) || isset($_POST['update']))
{
	$datos = array(
		'estado'		=> $_POST['estado'],
		'descripcion'	=> $_POST['descripcion'],
		'compensacion'	=> $_POST['compensacion'],
	);
	
	$estados->update($datos, $_POST['id_estado']);
	$mensaje = set_alert($language['update_ok']);	
}
  
/*----------------------------------------------------------------------------
		Get Registros
----------------------------------------------------------------------------*/

if(isset($_GET['edit']) && !(isset($_POST['volver'])))
{
	$estados_array	= $estados->get_registros('`id_estado` = '.$_GET['edit']);
	foreach($estados_array as $row)
	{
		$datos = $row;
	}
}
else
{
	$estados_array	= $estados->get_registros('`delete` = 0');	
}


?>

<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				
				<?php 
				if(isset($_GET['edit']) && !(isset($_POST['volver'])))
				{				
				?>

<!----------------------------------------------------------------------------
		Edit registro
----------------------------------------------------------------------------->
	
				<form class="form-horizontal" method="post" onsubmit="return validar_config();">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['estado'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="estado" name="estado" value="<?php echo $datos['estado']?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['descripcion'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="descripcion" name="descripcion" value="<?php echo $datos['descripcion']?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['compensacion'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="compensacion" name="compensacion" value="<?php echo $datos['compensacion']?>" required>
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
						</label>
						<div class="col-sm-10">
							<input type="hidden" name="id_estado" value="<?php echo $datos['id_estado']?>">
							<button type="submit" value="1" name="update" class="btn btn-primary btn-lg"><?php echo $language['editar'] ?></button>
							<button type="submit" value="1" name="volver" class="btn btn-primary btn-lg"><?php echo $language['editar'] ?> & <?php echo $language['volver'] ?></button>
							<a href="<?php echo BASE_URL.'views/estados_abm.php'; ?>" onclick="return confirm('<?php echo $language['confirm_volver']?>')" class="btn btn-danger btn-lg"><?php echo $language['volver'] ?></a>
						</div>
					</div>
				</form>	
				<?php
				}
				else
				{
				?>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-list"></i> <?php echo $language['general'] ?></a></li>
    				<li><a href="#tab2" data-toggle="tab"><i class="fa fa-plus-square"></i> <?php echo $language['nuevo'] ?></a></li>
    			</ul>
    			
    			<div class="tab-content">
					
				<div class="tab-pane active" id="tab1">

<!----------------------------------------------------------------------------
		Tabla de registros
----------------------------------------------------------------------------->

				<table class="table table-striped table-hover" id="datatable">
					<thead>
						<tr>
							<th class='col-md-3'><?php echo $language['estado'];?></th>
							<th class='col-md-3'><?php echo $language['descripcion'];?></th>
							<th class='col-md-3'><?php echo $language['compensacion'];?></th>
							<th class='col-md-3'><?php echo $language['opciones'];?></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					foreach($estados_array as $row)
					{
						echo "<tr>";
						echo "<td class='col-md-3'>".$row['estado']."</td>";
						echo "<td class='col-md-3'>".$row['descripcion']."</td>";
						echo "<td class='col-md-3'>".$row['compensacion']."</td>";?>
						<td class='col-md-3'>
							<a href="<?php echo BASE_URL.'views/estados_abm.php?edit='.$row['id_estado'] ?>" class='btn btn-primary' "<?php echo $language['editar']; ?>">
								<i class='fa fa-pencil-square-o'></i>
							</a>
							<a href="<?php echo BASE_URL.'views/estados_abm.php?delete='.$row['id_estado'] ?>" class='btn btn-danger' onclick="return confirm('<?php echo $language['confirm_eliminar']?>')" title="<?php echo $language['borrar']; ?>">
								<i class='fa fa-trash-o'></i>
							</a>
						</td>
					<?php
						echo "</tr>";
					}
					?>
					</tbody>
				</table>
				</div>
				
				<div class="tab-pane" id="tab2">

<!----------------------------------------------------------------------------
		Nuevo registo
----------------------------------------------------------------------------->

					<form class="form-horizontal" method="post" onsubmit="return validar_config();">
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['estado'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="estado" name="estado" placeholder="<?php echo $language['ingrese']." ".$language['estado']?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['descripcion'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="descripcion" name="descripcion" placeholder="<?php echo $language['ingrese']." ".$language['descripcion']?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
							<?php echo $language['compensacion'] ?>
						</label>
						<div class="col-sm-10">
							<input class="form-control" id="compensacion" name="compensacion" placeholder="<?php echo $language['ingrese']." ".$language['compensacion']?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
						</label>
						<div class="col-sm-10">
							<button type="submit" value="1" name="insert" class="btn btn-primary btn-lg" ><?php echo $language['guardar'] ?></button>
						</div>
					</div>
					</form>	
				</div>
				<?php	
				}
				?>

<!----------------------------------------------------------------------------
		Mensaje 
----------------------------------------------------------------------------->

				<?php 	
				if(isset($mensaje))
				{
					echo $mensaje;
				}
				?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include_once('footer.php');
?>