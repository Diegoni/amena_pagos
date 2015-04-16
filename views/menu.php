<?php 
include_once('../config/includes.php');

if($config['environment'] == 'development')
{
	error_reporting(E_ALL);
	ini_set("display_errors", 1);	
}
else
if($config['environment'] == 'testing' || $config['environment'] == 'production')
{
	error_reporting(0);	
}

include_once('control_usuario.php');
?>
 
<!----------------------------------------------------------------------------
		Head
----------------------------------------------------------------------------->

<title><?php echo $config['title'] ?></title>

<META NAME="keywords" CONTENT="">
<META NAME="description" CONTENT="<?php echo $config['title'] ?>">
<META NAME="rating" CONTENT="General">
<META NAME="ROBOTS" CONTENT="ALL">
<META http-equiv="Content-type" content="text/html; charset=<?php echo $config['charset'];?>" />

<!-- Iconos -->
<link type="image/x-icon" href="<?php echo $route['doc'].$config['icono']?>" rel="icon" />
<link type="image/x-icon" href="<?php echo $route['doc'].$config['icono']?>" rel="shortcut icon" />

 
<!----------------------------------------------------------------------------
		Menu
----------------------------------------------------------------------------->


<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only"><?php echo $config['title'] ?></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><?php echo $language['config']?></a>
	</div>
  
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-th-list"></i> <?php echo $language['transacciones'] ?><b class="caret"></b>
				</a>
        		<ul class="dropdown-menu">
        			<?php echo item_menu(BASE_URL.'views/transacciones.php', $language['transacciones']);?>
        			<?php echo item_menu(BASE_URL.'views/sumas.php', $language['sumas']);?>
        			<?php echo item_menu(BASE_URL.'views/preconfeccion.php', $language['pre-confeccion']);?>
        			<?php echo item_menu(BASE_URL.'views/transaccion_manual.php', $language['transaccion']." ".$language['manual']);?>
        			<?php echo item_menu(BASE_URL.'views/interbanking.php', $language['interbanking']);?>
        		</ul>
      		</li>
      		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bar-chart"></i> <?php echo $language['reporte'] ?><b class="caret"></b>
				</a>
        		<ul class="dropdown-menu">
        			<?php echo item_menu(BASE_URL.'views/reporte_interbanking.php', $language['reporte']);?>        			
        			<?php echo item_menu(BASE_URL.'views/estados_transferencias.php', $language['estado']);?>
        			<?php echo item_menu(BASE_URL.'views/estados_transferencias_incremental.php', $language['estado']." ".$language['incremental']);?>
        			<?php echo item_menu(BASE_URL.'views/cierre_comunidades.php', $language['cierre']." ".$language['comunidad']);?>
        		</ul>
      		</li>
      		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-cogs"></i> <?php echo $language['config'] ?><b class="caret"></b>
				</a>
        		<ul class="dropdown-menu">
        			<?php echo item_menu(BASE_URL.'views/config_general.php', $language['config']);?>
        			<?php echo item_menu(BASE_URL.'views/estados_abm.php', $language['estado']);?>
        		</ul>
      		</li>
    	</ul>
    	<ul class="nav navbar-nav navbar-right">
			<li class="">
				<a class="brand" rel='tooltip' title="Cerrar sessión de usuario" href="logout.php">
					<?php echo $_SESSION['nombre']?> <i class="fa fa-sign-out"></i>
				</a>
			</li>
		</ul>
	</div>
</nav>

<div class="container">