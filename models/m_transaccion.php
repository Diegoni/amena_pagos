<?php
class m_Transaccion extends My_Model
{
	protected $_tablename	= 'transacciones';
	protected $_id_table	= 'id_transaccion';
	protected $_name		= 'cuil';
	protected $_order		= 'fechapago';
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

