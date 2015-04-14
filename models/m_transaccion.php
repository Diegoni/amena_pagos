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
		
		$query = "SELECT sum(importe) as suma 
					FROM `transacciones` 
					WHERE
					DATE_FORMAT(fechapago, '%Y-%m') > '$inicio' AND
					DATE_FORMAT(fechapago, '%Y-%m') <= '$final'";
		
		$result = $this->_db->query($query);
		
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_array())
			{
				$rows[] = $row;
			}
			
			return $rows;	
		}
		else
		{
			return 0;	
		}
	}
}

