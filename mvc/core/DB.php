<?php

class DB{
    public $con;

    private $pdo; //database handler
	private $stmt;
    public function __construct()
	{
        $dbconfig = parse_ini_file(".env");
		// data source name
		$dsn = 'mysql:host=' . $dbconfig["DB_HOST"] . ';dbname='. $dbconfig["DB_DATABASE"];

		// $option = [
		// 	PDO::ATTR_PERSISTENT => true,
		// 	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		// ];

		try{
			$this->pdo = new PDO($dsn, $dbconfig["DB_USERNAME"], $dbconfig["DB_PASSWORD"]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
    public function query($query)
	{
		$this->stmt = $this->pdo->prepare($query);
	}
    
    public function execute()
	{
		$this->stmt->execute();
        return true;
	}

	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

    public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
    
    public function singleField()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_COLUMN);
	}

	public function rowCount()
	{
		return $this->stmt->rowCount();
	}

}
?>
