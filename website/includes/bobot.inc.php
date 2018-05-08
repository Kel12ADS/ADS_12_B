<?php
class Bobot{
	
	private $conn;
	private $table_name = "ads12_bobot";
	
	public $id;
	public $ib;
	public $alt;
	public $kt;
	public $hs;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?,0)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->bindParam(2, $this->kt);
		
		if($stmt->execute()){
			return true;
		}else{
			print_r($this->conn->errorCode());
			return false;
		}
		
	}

	function insert2($a,$b){
		
		$query = "update ".$this->table_name." set hasil_bobot = '$a' where id_kriteria = '$b'";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." a, ads12_kriteria b where a.id_kriteria=b.id_kriteria ORDER BY a.id_kriteria ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function countAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_kriteria ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt->rowCount();
	}
	
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_bobot=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['id_kriteria'];
		$this->kt = $row['nilai_bobot'];
	}
	
	function readSum(){
		
		$query = "SELECT sum(nilai_bobot) as hasilbb FROM " . $this->table_name . " LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->hs = $row['hasilbb'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nilai_bobot = :kt
				WHERE
					id_kriteria = :id";

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
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_bobot = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function hapusell($ax){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_kriteria in $ax";
		
		$stmt = $this->conn->prepare($query);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>