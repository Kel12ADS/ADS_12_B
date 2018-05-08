<?php
class Alternatif{
	
	private $conn;
	private $table_name = "ads12_alternatif";
	private $table_name2 = "ads12_pengguna";
	
	public $id;
	public $kt;
	public $nim;
	public $SESSION_ID;
	
	
	public function __construct($db){
		$this->conn = $db;
		$this->SESSION_ID = $_SESSION['id_pengguna'];
	}
	
	function readNim(){

		$query = "SELECT nim_mhs FROM " . $this->table_name2 . " WHERE id_pengguna=".$this->SESSION_ID." LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,'','')";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nim);
		$stmt->bindParam(2, $this->kt);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function rangking(){

		$query = "SELECT * FROM ".$this->table_name." WHERE nim_mhs=".$this->nim." ORDER BY id_alternatif ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_alternatif ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readKhusus(){

		$query = "SELECT * FROM ads12_alternatif a, ads12_pengguna b where a.id_pengguna=b.id_pengguna order by a.id_alternatif asc";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readOnly(){

		$query = "SELECT * FROM ads12_alternatif a, ads12_pengguna b where a.id_pengguna=".$this->SESSION_ID." and a.id_pengguna=b.id_pengguna order by a.id_alternatif asc";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function countAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_alternatif ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt->rowCount();
	}
	
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_alternatif=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['id_alternatif'];
		$this->kt = $row['nama_alternatif'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nama_alternatif = :kt
				WHERE
					id_alternatif = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':kt', $this->kt);
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
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_alternatif = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function hapusell($ax){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_alternatif in $ax";
		
		$stmt = $this->conn->prepare($query);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>