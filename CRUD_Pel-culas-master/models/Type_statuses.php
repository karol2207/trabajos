<?php 

class type_statuses
{
	private $id;
	private $name;
	private $pdo;

	public function __construct()
    {
    	try {
    		$this->pdo = new Database;
	    } catch (PDOException $e) {
	    	die($e->getMessage());
	    }    
    }

    public function getAll()
    {
    	try {
    		$strSql = "SELECT * FROM type_statuses";
    		$query = $this->pdo->select($strSql);
    		return $query;
	    } catch (PDOException $e) {
	    	die($e->getMessage());
	    } 
    }

    public function newStatus($data)
    {
        try {
            $this->pdo->insert('type_statuses', $data);
        } catch (PDOException $e) {
            die($e->getMessage());
        } 
    }
    public function getById($id)
    {
        try {
            $strSql = "SELECT * FROM type_statuses WHERE id = :id";
            $arrayData = ['id' => $id];
            $query = $this->pdo->select($strSql, $arrayData);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }    
    }

    public function editTypeStatus($data)
    {
        try {
            $strWhere = 'id = ' . $data['id'];
            $this->pdo->update('type_statuses', $data, $strWhere); 
        } catch (PDOException $e) {
            die($e->getMessage());
        } 
    }
    public function deleteTypeStatus($data)
    {
        try {
            $strWhere = 'id = ' . $data['id'];
            $this->pdo->delete('type_statuses', $strWhere); 
        } catch (PDOException $e) {
            die($e->getMessage());
        }    
    }
}


