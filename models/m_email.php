<?php
class m_Email extends My_Model
{
	protected $_tablename	= 'emails';
	protected $_id_table	= 'id_email';
	protected $_name		= 'destinatario';
	protected $_order		= 'destinatario';
	protected $_data_model	= array(
		'id_cliente'	=> array(),
		'remitente'		=> array(),
		'destinatario'	=> array(),
		'asunto'		=> array(),
		'contenido'		=> array(),
		'date_add'		=> array(),
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

