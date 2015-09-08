<?php
class m_log_config extends My_Model
{
	protected $_tablename	= 'log_config';
	protected $_id_table	= 'id_log_config';
	protected $_name		= 'Accion';
	protected $_order		= 'date';
	protected $_data_model	= array();
	
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

