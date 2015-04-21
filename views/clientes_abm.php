<?php
include_once('menu.php');
include_once($route['models'].'m_cliente.php');

$registos		= new m_cliente();
$id_registro	= $registos->getID();
$url_abm		= 'clientes_abm.php';
 
/*----------------------------------------------------------------------------
		Insert registro
----------------------------------------------------------------------------*/

if(isset($_POST['insert']))
{
	$datos = array(
		'cuil'			=> $_POST['cuil'],
		'nombre'		=> $_POST['nombre'],
		'apellido'		=> $_POST['apellido'],
		'alias'			=> $_POST['alias'],
		'telefono'		=> $_POST['telefono'],
		'email'			=> $_POST['email'],
		'direccion'		=> $_POST['direccion'],
	);
	
	$id_insert = $registos->insert($datos);
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
	
	$registos->update($datos, $_GET['delete']);
	$mensaje = set_alert($language['delete_ok']);
}
  
/*----------------------------------------------------------------------------
		Uodate registro
----------------------------------------------------------------------------*/

if(isset($_POST['volver']) || isset($_POST['update']))
{
	$datos = array(
		'cuil'			=> $_POST['cuil'],
		'nombre'		=> $_POST['nombre'],
		'apellido'		=> $_POST['apellido'],
		'alias'			=> $_POST['alias'],
		'telefono'		=> $_POST['telefono'],
		'email'			=> $_POST['email'],
		'direccion'		=> $_POST['direccion'],
	);
	
	$registos->update($datos, $_POST['id']);
	$mensaje = set_alert($language['update_ok']);	
}
  
/*----------------------------------------------------------------------------
		Get Registros
----------------------------------------------------------------------------*/

if(isset($_GET['edit']) && !(isset($_POST['volver'])))
{
	$registos_array	= $registos->get_registros('`id_cliente` = '.$_GET['edit']);
	
	foreach($registos_array as $row)
	{
		$datos = $row;
	}
}
else
{
	$registos_array	= $registos->get_registros('`delete` = 0');	
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
						<?php echo label_helper_horizontal($language['cuil']); ?>
						<?php echo input_helper_horizontal('cuil', $datos['cuil'], NULL, $language['ingrese']." ".$language['cuil'])?>
					</div>
					
					<div class="form-group">
						<?php echo label_helper_horizontal($language['nombre']); ?>
						<?php echo input_helper_horizontal('nombre', $datos['nombre'], NULL, $language['ingrese']." ".$language['nombre']); ?>
					</div>
					
					<div class="form-group">
						<?php echo label_helper_horizontal($language['apellido']); ?>
						<?php echo input_helper_horizontal('apellido', $datos['apellido'], NULL, $language['ingrese']." ".$language['apellido']); ?>
					</div>
					
					<div class="form-group">
						<?php echo label_helper_horizontal($language['alias']); ?>
						<?php echo input_helper_horizontal('alias', $datos['alias'], NULL, $language['ingrese']." ".$language['alias']); ?>
					</div>
					
					<div class="form-group">
						<?php echo label_helper_horizontal($language['telefono']); ?>
						<?php echo input_helper_horizontal('telefono', $datos['telefono'], NULL, $language['ingrese']." ".$language['telefono']); ?>
					</div>
					
					<div class="form-group">
						<?php echo label_helper_horizontal($language['email']); ?>
						<?php echo input_helper_horizontal('email', $datos['email'], NULL, $language['ingrese']." ".$language['email']); ?>
					</div>
										
					<div class="form-group">
						<?php echo label_helper_horizontal($language['direccion']); ?>
						<?php echo input_helper_horizontal('direccion', $datos['direccion'], NULL, $language['ingrese']." ".$language['direccion']); ?>
					</div>				
					
					<div class="form-group">
						<label class="col-sm-2 control-label">
						</label>
						<div class="col-sm-10">
							<input type="hidden" name="id" value="<?php echo $datos[$id_registro]?>">
							<button type="submit" value="1" name="update" class="btn btn-primary btn-lg"><?php echo $language['editar'] ?></button>
							<button type="submit" value="1" name="volver" class="btn btn-primary btn-lg"><?php echo $language['editar'] ?> & <?php echo $language['volver'] ?></button>
							<a href="<?php echo BASE_URL.'views/'.$url_abm; ?>" onclick="return confirm('<?php echo $language['confirm_volver']?>')" class="btn btn-danger btn-lg"><?php echo $language['volver'] ?></a>
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
							<th><?php echo $language['cuil'];?></th>
							<th><?php echo $language['nombre'];?></th>
							<th><?php echo $language['apellido'];?></th>
							<th><?php echo $language['alias'];?></th>
							<th><?php echo $language['imagen'];?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if($registos_array)
					{
						foreach($registos_array as $row)
						{
							echo "<tr>";
							echo "<td>".$row['cuil']."</td>";
							echo "<td>".$row['nombre']."</td>";
							echo "<td>".$row['apellido']."</td>";
							echo "<td>".$row['alias']."</td>";
							echo "<td><a href='imagen_perfil.php?id=".$row['id_cliente']."'><center><img class='img-thumbnail' width='40px' height='40px' src='".$route['doc'].$row['img_perfil']."'></center></a></td>";
							
							?>
							<td>
								<a href="<?php echo BASE_URL.'views/'.$url_abm.'?edit='.$row[$id_registro] ?>" class='btn btn-primary' "<?php echo $language['editar']; ?>">
									<i class='fa fa-pencil-square-o'></i>
								</a>
								<a href="<?php echo BASE_URL.'views/'.$url_abm.'?delete='.$row[$id_registro] ?>" class='btn btn-danger' onclick="return confirm('<?php echo $language['confirm_eliminar']?>')" title="<?php echo $language['borrar']; ?>">
									<i class='fa fa-trash-o'></i>
								</a>
							</td>
						<?php
							echo "</tr>";
						}
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
							<?php echo label_helper_horizontal($language['cuil']); ?>
							<?php echo input_helper_horizontal('cuil', NULL, NULL, $language['ingrese']." ".$language['cuil']); ?>
						</div>
						
						<div class="form-group">
							<?php echo label_helper_horizontal($language['nombre']); ?>
							<?php echo input_helper_horizontal('nombre', NULL, NULL, $language['ingrese']." ".$language['nombre']); ?>
						</div>
						
						<div class="form-group">
							<?php echo label_helper_horizontal($language['apellido']); ?>
							<?php echo input_helper_horizontal('apellido', NULL, NULL, $language['ingrese']." ".$language['apellido']); ?>
						</div>
						
						<div class="form-group">
							<?php echo label_helper_horizontal($language['alias']); ?>
							<?php echo input_helper_horizontal('alias', NULL, NULL, $language['ingrese']." ".$language['alias']); ?>
						</div>
						
						<div class="form-group">
							<?php echo label_helper_horizontal($language['telefono']); ?>
							<?php echo input_helper_horizontal('telefono', NULL, NULL, $language['ingrese']." ".$language['telefono']); ?>
						</div>
						
						<div class="form-group">
							<?php echo label_helper_horizontal($language['email']); ?>
							<?php echo input_helper_horizontal('email', NULL, NULL, $language['ingrese']." ".$language['email']); ?>
						</div>
											
						<div class="form-group">
							<?php echo label_helper_horizontal($language['direccion']); ?>
							<?php echo input_helper_horizontal('direccion', NULL, NULL, $language['ingrese']." ".$language['direccion']); ?>
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