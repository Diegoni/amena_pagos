<?php
class m_Cliente extends My_Model
{
	protected $_tablename	= 'clientes';
	protected $_id_table	= 'id_cliente';
	protected $_name		= 'nombre';
	protected $_order		= 'nombre';
	protected $_data_model	= array(
		'nombre'		=> array(),
		'apellido'		=> array(),
		'alias'			=> array(),
		'telefono'		=> array(),
		'email'			=> array(),
		'direccion'		=> array(),
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

