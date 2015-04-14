<?php
class m_Estados_transferencia extends My_Model
{
	protected $_tablename	= 'estados_transaccion';
	protected $_id_table	= 'id_estado';
	protected $_name		= 'descripcion';
	protected $_order		= 'descripcion';
	protected $_data_model	= array(
		'estado'		=> array(),
		'descripcion'	=> array(),
		'compensacion'	=> array(),
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

