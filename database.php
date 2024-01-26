<?php
class Database {
	
	public $connection;
	
	public $statement;
	
	public function __construct($config, $username = "userus", $password = "Password123")
	{
		
		
		$dsn = 'mysql:' . http_build_query($config, '', ';');
		
		//$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
		$this -> connection = new PDO($dsn, $username, $password, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
	
	public function query($query, $params = [])
	{
		
		$this->statement = $this->connection->prepare($query);
		$this->statement->execute($params);
		//return $this->statement;
		return $this;
	}
	
	public function find()
	{
		
		return $this->statement->fetch();
		
	}
	
	public function findAll()
	{
		
		return $this->statement->fetchAll();
		
	}
	
	public function findOrFail()
	{
		$result = $this->find();
		
		if(! $result){
			
			abort();
		}
		
		return $result;
		
	}
}
?>