<?php
if(!isset($_GET['id']) && !isset($_POST['id']))
{
	header("Location: clientes_abm.php");	
}
else
{
	if(isset($_GET['id']))
	{
		$id_cliente = $_GET['id'];
	}
	else
	{
		$id_cliente = $_POST['id'];
	}
}

include_once('menu.php');
include_once($route['models'].'m_cliente.php');

$cliente			= new m_cliente();
$cliente_array		= $cliente->get_registros('id_cliente ='.$id_cliente);

foreach ($cliente_array as $fila) 
{
	$row = $fila;
}
 
/*----------------------------------------------------------------------------
		Cargar archivo
----------------------------------------------------------------------------*/


if(isset($_FILES['imagen_perfil']))
{
	$name		= $row['id_cliente'];
	if($_FILES['imagen_perfil']['name'] != "")
	{
		$extension	= pathinfo($_FILES['imagen_perfil']['name']);
		$tipo		= $extension['extension']; 
		$extension	= ".".$extension['extension'];	
	}
	else
	{
		$tipo = 'Error';
	}
	
	
	if( $tipo == 'jpg' || $tipo == 'png' || $tipo == 'gif' )
	{
		$archivo = $name.".".$tipo;
		
		if(
		file_exists($route['doc'].$route['img_perfil'].$name.'jpg') ||
		file_exists($route['doc'].$route['img_perfil'].$name.'png') ||
		file_exists($route['doc'].$route['img_perfil'].$name.'gif') 
		)
		{
			unlink($route['doc'].$row['img_perfil']);	
		}
		else
		{
			$mensaje = set_alert($language['archivo_delete'], 'warning');	
		}
		
		//copy($archivo, $route['doc'].$route['img_perfil'].$archivo);
		move_uploaded_file($_FILES['imagen_perfil']['tmp_name'], $route['doc'].$route['img_perfil'].$archivo);
		
		$datos = array(
			'img_perfil'	=> $route['img_perfil'].$archivo,
			'tipo'			=> $_FILES['imagen_perfil']['type'],
			'size'			=> $_FILES['imagen_perfil']['size']
		);
		
		$cliente->update($datos, $_POST['id']);
		
		$mensaje = set_alert($language['upload_ok']);
		
		if($_FILES['imagen_perfil']['size'] > 200000)
		{
			$mensaje .= set_alert($language['control_size'], 'warning');
		}
	}
	else
	if($tipo == 'Error')
	{
		$mensaje = set_alert($language['no_archivos'], 'danger');
	}
	else
	{
		$mensaje = set_alert($language['extension_error'], 'danger');
	}	
}

$cliente_array		= $cliente->get_registros('id_cliente ='.$id_cliente);

foreach ($cliente_array as $fila) 
{
	$row = $fila;
}

?>
<div class='row'>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo get_panel_heading();	?>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="imagen_perfil.php" method="post" enctype="multipart/form-data">
					<div class="col-md-6" style="height: 65%;">	
						<?php 
						echo "<center><img src='".$route['doc'].$row['img_perfil']."' class='img-responsive img-rounded' alt='Responsive image'></center>";
						?>
					</div>
					<div class="col-md-6 well">
						<h4><?php echo $language['subir'] ?></h4>
						<input type="file" name="imagen_perfil">
						<input type="hidden" name="id" value="<?php echo $row['id_cliente']?>">
					    <br>
						<button type="submit" class ="btn btn-default">
							<?php echo $language['subir'] ?>
						</button>
					</div>
					<div class="col-md-6 well">
						<a href="clientes_abm.php" class ="btn btn-default btn-lg">
							<?php echo $language['volver'] ?>
						</a>
					</div>
					</form>
				</div>
				<?php
				if(isset($mensaje))
				{
					echo '<div class="row">
					<br>
					<div class="col-md-12">';	
					echo $mensaje;
					echo '</div></div>';
				}
				?>
			</div>
		</div>
	</div>
</div>


<?php
include_once('footer.php');
?>