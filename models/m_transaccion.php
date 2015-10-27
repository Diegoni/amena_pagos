<?php
class m_Transaccion extends My_Model
{
	protected $_tablename	= 'transacciones';
	protected $_id_table	= 'id_transaccion';
	protected $_name		= 'cuit';
	protected $_order		= 'cuit';
	protected $_data_model	= array(
		'cuit'		=> array(),
		'importe'	=> array(),
		'periodo'	=> array(),
		'fechapago'	=> array(),
		'comprob'	=> array(),
		'token'		=> array(),
	);
	
	function __construct()
	{
		parent::__construct(
				$tablename		= $this->_tablename, 
				$id_table		= $this->_id_table, 
				$name			= $this->_name, 
				$order			= $this->_order, 
				$data_model		= $this->_data_model 
		);
	}
	
	
	
	function suma_transacciones($inicio, $final)
	{
		$inicio			= date('Y-m', strtotime($inicio));
		$final			= date('Y-m', strtotime($final));
		
		$query = "SELECT 
					sum(importe) as suma 
					FROM `transacciones` 
					WHERE 
					DATE_FORMAT(fechapago, '%Y-%m') > '2015-09' AND 
					DATE_FORMAT(fechapago, '%Y-%m') <= '2015-10' AND 
					`transacciones`.`delete` = '0' AND
					`transacciones`.`conciliacion` = '1' ";
							
		$result = $this->_db->query($query);
		
		if($result->num_rows > 0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
			
			return $rows;	
		} else {
			return 0;	
		}
	}
	
	
	
	function get_transacciones($opcion = null)
	{
		if($opcion == 1){
			$condicion = "`transacciones`.`delete` = 0  AND `transacciones`.`conciliacion` = 0";	
		}else if($opcion == 2){
			$condicion = "`transacciones`.`delete` = 0  AND `transacciones`.`conciliacion` = 1";
		}else if($opcion == 4){
			$condicion = "`transacciones`.`delete` = 1";
		}else{
			$condicion = " 1 ";
		}
		
		
		$query = "SELECT 
						*,
						`transacciones`.`delete` as eliminado 
				FROM 
					`transacciones` 
				LEFT JOIN 
					`clientes` ON(`transacciones`.`cuit` = `clientes`.`cuil`) 
				WHERE ".$condicion;
		
		
		
		$result = $this->_db->query($query);
		
		if($result->num_rows > 0){
			while($row = $result->fetch_array()){
				$rows[] = $row;
			}
			
			return $rows;	
		} else {
			return 0;	
		}
	}
	
	
	
	function delete($id)
	{
		$fecha = date('Y/m/d H:i:s');
		$query = "UPDATE
					`transacciones`
				SET
					`transacciones`.`delete` = 1,
					`transacciones`.`date_upd` = '$fecha'
				WHERE 
					`transacciones`.`id_transaccion` = '$id'";
		
		$result = $this->_db->query($query);
	}
	
	
	
	function conciliar($id)
	{
		$fecha = date('Y/m/d H:i:s');
		$query = "UPDATE
					`transacciones`
				SET
					`transacciones`.`conciliacion` = 1,
					`transacciones`.`date_upd` = '$fecha'
				WHERE 
					`transacciones`.`id_transaccion` = '$id'";
		
		$result = $this->_db->query($query);
	}
}