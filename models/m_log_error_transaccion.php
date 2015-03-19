<?php
class m_log_error_Transaccion extends My_Model
{
	protected $_tablename	= 'log_error_transacciones';
	protected $_id_table	= 'id_error';
	protected $_name		= 'cuil';
	protected $_order		= 'date_add';
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
}

