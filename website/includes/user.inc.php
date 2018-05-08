<?php
class User{
	
	private $conn;
	private $table_name = "ads12_pengguna";
	
	public $id;
	public $nl;
	public $un;
	public $pw;
	public $nim;
	public $SESSION_ID;
	
	public function __construct($db){
		$this->conn = $db;
		$this->SESSION_ID = $_SESSION['id_pengguna'];
	}
	
	function readNim(){

		$query = "SELECT * FROM " . $this->table_name . " WHERE id_pengguna=".$this->SESSION_ID." LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nim);
		$stmt->bindParam(2, $this->nl);
		$stmt->bindParam(3, $this->un);
		$stmt->bindParam(4, $this->pw);
		
		if($stmt->execute()){
			return true;
		}else{
			print_r($stmt->errorInfo());
			return false;
		}
		
	}
	
	function insert_vektor(){
		
		$query = "insert into ads12_vektormhs (nim_mhs) values(?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nim);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_pengguna ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readMhs(){

		$query = "SELECT * FROM " . $this->table_name . " WHERE id_pengguna=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->nim = $row['nim_mhs'];
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_pengguna=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['id_pengguna'];
		$this->nl = $row['nama_lengkap'];
		$this->un = $row['username'];
		$this->pw = $row['password'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nama_lengkap = :nm, 
					username = :un, 
					password = :ps
				WHERE
					id_pengguna = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nm', $this->nl);
		$stmt->bindParam(':un', $this->un);
		$stmt->bindParam(':ps', $this->pw);
		$stmt->bindParam(':id', $this->id);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_pengguna = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function countAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_pengguna ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt->rowCount();
	}
	function hapusell($ax){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_pengguna in $ax";
		
		$stmt = $this->conn->prepare($query);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
