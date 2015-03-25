<?php
class m_config extends My_Model
{
	protected $_tablename	= 'config';
	protected $_id_table	= 'id_config';
	protected $_name		= 'id_config';
	protected $_order		= 'id_config';
	protected $_data_model	= array(
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

