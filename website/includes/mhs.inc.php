
<?php
class MHS{
	
	private $conn;
	private $table_name = "ads12_mhs";
	
	public $id;
	public $nama;
	public $nim;
	public $SESSION_ID;
	
	public function __construct($db){
		$this->conn = $db;
		$this->SESSION_ID = $_SESSION['id_pengguna'];
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nama);
		$stmt->bindParam(2, $this->nim);
		
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

		$query = "SELECT * FROM " . $this->table_name2 . " WHERE id_pengguna=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->nim = $row['nim_mhs'];
	}
	
	function readNim(){

		$query = "SELECT nim_mhs FROM " . $this->table_name . " WHERE id_pengguna=".$this->SESSION_ID." LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_pengguna=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['id_pengguna'];
		$this->nama = $row['nama_mhs'];
		$this->nim = $row['nim_mhs'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nama_mhs = :nm, 
					nim_mhs = :nim, 
					password = :ps
				WHERE
					id_pengguna = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nm', $this->nama);
		$stmt->bindParam(':nim', $this->nim);
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
