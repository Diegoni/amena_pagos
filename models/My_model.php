<?php
include_once('Model.php');

class MY_Model extends Model
{
	protected $_tablename	= '';
	protected $_id			= '';
	protected $_order		= '';
	protected $_name		= '';
	protected $_data_model	= array();

	function __construct(
				$tablename = null, 
				$id = null,
				$order = null, 
				$name = null,
				$data_model =null 
				)
	{
		$this->_tablename	= $tablename;
		$this->_id			= $id;
		$this->_order		= $order;
		$this->_name		= $name;
		$this->_data_model	= $data_model;
		parent::__construct();
	}
	
	public function get_registros()
    {
		$result = $this->_db->query('SELECT * FROM '.$this->_tablename.' ');
        $users	= $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }
	
		
	function insert($data)
	{
		$campos = '(';
		$datos	= ' VALUES (';
		foreach ($data as $key => $value) {
			$campos .= $key.' ,';
			$datos	.= $value.' ,';
		}
		$campos = trim($campos, ',');
		$datos	= trim($datos, ',');
		$campos	.= ')';
		$datos	.= ')';
		
		$query = "INSERT INTO 
					$this->_tablename 
					$campos
					$datos";
		echo ($query);
		$this->_db->query($query);
		printf ("Nuevo registro con el id %d.\n", $this->_db->insert_id);
	}
}

