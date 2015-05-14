<?php
/*
 * @version $Id: computer.php 22656 2014-02-12 16:15:25Z moyo $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2014 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

/** @file
* @brief
*/

define('GLPI_ROOT', '..');
include (GLPI_ROOT . "/inc/includes.php");

Session::checkLoginUser();

if ($_SESSION["glpiactiveprofile"]["interface"] == "helpdesk") {
   Html::helpHeader($LANG['title'][10],'',$_SESSION["glpiname"]);
} else {
   Html::header($LANG['title'][10],'',"maintain","ticket");
}

/*
include ('../../inc/includes.php');

Session::checkRight("computer", READ);

Html::header(Computer::GetTypeName(2), $_SERVER['PHP_SELF'], "assets", "computer");
*/
include_once('../config/config_db.php');

$db = new DB() ;
                
mysql_connect($db->dbhost, $db->dbuser, $db->dbpassword);
@mysql_select_db($db->dbdefault) or die( "No pude conectarme a la base de datos");

if(isset($_GET['add']))
{
	mysql_query("INSERT INTO `glpi_users` (
				name,
				realname,
				firstname,
				mobile,
				phone,
				phone2,
				comment)
			VALUES (
				'$_GET[name]',
				'$_GET[realname]',
				'$_GET[firstname]',
				'$_GET[mobile]',
				'$_GET[phone]',
				'$_GET[phone2]',
				'$_GET[comment]'
				)	
			") or die(mysql_error());
	$id_users = mysql_insert_id();
	
	mysql_query("INSERT INTO `glpi_profiles_users` (
				users_id,
				profiles_id
				)
			VALUES (
				'$id_users',
				1
				)	
				") or die(mysql_error());
	
	mysql_query("INSERT INTO `glpi_useremails` (
				users_id,
				is_default,
				email
				)
			VALUES (
				'$id_users',
				1,
				'$_GET[email]'
				)	
				") or die(mysql_error());
	
}

$query="SELECT users_id, name
		FROM glpi_users gu
		INNER JOIN 
		glpi_profiles_users gpu
		ON(gu.id = gpu.users_id) 
		WHERE is_active = 1 
		AND gpu.profiles_id = 1 
		GROUP BY `name`
						";
$result = mysql_query($query);

$query2 = "SELECT users_id, name  
			FROM glpi_users gu
			INNER JOIN
			glpi_profiles_users gpu
			ON(gu.id = gpu.users_id) 
			WHERE is_active = 1 
			AND gpu.profiles_id >= 2 
			AND is_deleted = 0 
			GROUP BY `name`";
$result2 = mysql_query($query2);

?>
<link rel="stylesheet" href="../lib/chosen/chosen.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script src="../lib/chosen/chosen.jquery.js" type="text/javascript"></script>

<form name="Tickets" action="FormularioTickets.php" method="get">  
<?php
	if(isset($_GET['add']))
	{
		echo "El usuario fue creado con éxito";
	}
?>
<table class="tab_cadre_fixe" >
	<tbody>
		<tr class="tab_bg_1">
			<td>Cliente</td>
			<td class="left">
				<select name='user' class="chosen-select" style="width: 100%;">
				<?php
				if(isset($_GET['add']))
				{
					while ($query_data = mysql_fetch_array($result)) {
						if($id_users == $query_data["users_id"])
						{
							echo "<option value = ".$query_data["users_id"]." selected>";	
						}
						else
						{
							echo "<option value = ".$query_data["users_id"].">";
						}
						echo $query_data["name"] ;
						echo "</option>";
					}
				}
				else
				{
					while ($query_data = mysql_fetch_array($result)) {
						echo "<option value = ".$query_data["users_id"].">";
						echo $query_data["name"] ;
						echo "</option>";
					}
				}

				
					
				?>
				</select>
			</td>
			<td><a class="show_hide" style="cursor: pointer">Agregar usuario</a></td>
			<td>Firma</td>
			<td class="left">
				<select name='tmsuser' class="chosen-select" style="width: 100%;">
				<?php
					while ($query_data2 = mysql_fetch_array($result2)) {
						echo "<option value = ".$query_data2["users_id"].">";
						echo ($query_data2["name"]);
						echo "</option>";
					}
				?>
			</select>
			</td>
			<td class="left">
				<input type="submit" value="Enviar" class="submit">
			</td>
		</tr>		
	</tbody>
</table>
</form>

<script>
$(document).ready(function(){
        $(".slidingDiv").hide();
        $(".show_hide").show();
 
    $('.show_hide').click(function(){
    $(".slidingDiv").slideToggle();
    });
});	
</script>

<div class="slidingDiv">
<form name="Tickets" action="ingreso.php" method="get">
<table class="tab_cadre_fixe" >
<tbody>
	<tr>
		<th colspan="2">Nuevo usuario</th>
		<th colspan="2"></th>
	</tr>
	<tr class="tab_bg_1">
		<td>Usuario:</td>
		<td><input type="text" name="name" value="" size="40"></td>
		<td rowspan="5" class="middle">Comentarios:</td>
		<td class="" rowspan="5">
			<textarea cols="45" rows="8" name="comment"></textarea>
		</td>
	</tr>
	<tr class="tab_bg_1">
		<td>Apellido:</td>
		<td><input type="text" name="realname" value="" size="40"></td>
	</tr>
	<tr class="tab_bg_1">
		<td>Nombre:</td>
		<td><input type="text" name="firstname" value="" size="40"></td>
	</tr>
	<tr class="tab_bg_1">
		<td>Celular:</td>
		<td><input type="text" name="mobile" value="" size="40"></td>
	</tr>
	<tr class="tab_bg_1">
		<td class="top">Email:</td>
		<td><input type="email" name="email" value="" size="40" required></td>
		
	</tr>
	<tr class="tab_bg_1">
		<td>Teléfono:</td>
		<td><input type="text" name="phone" value="" size="40"></td>
	</tr>
	<tr class="tab_bg_1">
		<td>Teléfono 2:</td>
		<td><input type="text" name="phone2" value="" size="40"></td>
	</tr>
	<tr class="tab_bg_1">
		<td></td>
		<td></td>
		<td>
			<input type="submit" name="add" value="Agregar" class="submit">
		</td>
	</tr>
</tbody>
</table>
</form>
</div>



  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
<?php mysql_close(); ?>

<?php
Html::footer();
?>