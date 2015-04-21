<?php
class m_Certificado extends My_Model
{
	protected $_tablename	= 'certificados';
	protected $_id_table	= 'id_certificado';
	protected $_name		= 'certificado';
	protected $_order		= 'certificado';
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

