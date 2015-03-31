<?php
class m_Usuario extends My_Model
{
	protected $_tablename	= 'usuarios';
	protected $_id_table	= 'id_usuario';
	protected $_name		= 'nombre';
	protected $_order		= 'nombre';
	protected $_data_model	= array(
		'nombre'	=> array(),
		'clave'		=> array(),
		'email'		=> array(),
		'last_login'=> array(),
		'active'	=> array(),
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

