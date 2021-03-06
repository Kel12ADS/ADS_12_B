<?php
class Rangking{
	
	private $conn;
	private $table_name = "ads12_rangking";
	private $table_name2 = "ads12_pengguna";
	
	public $ia;
	public $id;
	public $nim;
	public $rnim;
	public $rnim2;
	public $ik;
	public $nn;
	public $nn2;
	public $nn3;
	public $nn4;
	public $mnr1;
	public $mnr2;
	public $has1;
	public $has2;
	public $SESSION_ID;
	
	public function __construct($db){
		$this->conn = $db;
		$this->SESSION_ID = $_SESSION['id_pengguna'];
	}
	
	function readNim(){

		$query = "SELECT * FROM " . $this->table_name2 . " WHERE id_pengguna=".$this->SESSION_ID." LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?,?,?,0)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nim);
		$stmt->bindParam(2, $this->ia);
		$stmt->bindParam(3, $this->ik);
		$stmt->bindParam(4, $this->nn);
		
		if($stmt->execute()){
			return true;
		}else{
			print_r ($this->conn->errorCode());
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name;
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function countAll(){

		$query = "SELECT * FROM ".$this->table_name;
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt->rowCount();
	}
	
	function readKhusus(){

		$query = "SELECT * FROM ads12_alternatif a, ads12_kriteria b, ads12_rangking c, ads12_pengguna d where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria and d.id_pengguna=c.id_pengguna order by a.id_alternatif asc";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readOnly(){

		$query = "SELECT * FROM ads12_alternatif a, ads12_kriteria b, ads12_rangking c, ads12_pengguna d where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria and c.id_pengguna=".$this->SESSION_ID." and d.id_pengguna=c.id_pengguna order by a.id_alternatif asc";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readR($a){

		$query = "SELECT * FROM ads12_alternatif a, ads12_kriteria b, ads12_rangking c, ads12_bobot d where b.id_kriteria=d.id_kriteria and a.id_alternatif=c.id_alternatif and a.id_pengguna=c.id_pengguna and b.id_kriteria=c.id_kriteria and c.id_alternatif='$a'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readMax(){
		
		$query = "SELECT sum(vektor_s) as mnr1 FROM ads12_alternatif";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	function readHasil1($a){
		
		$query = "SELECT EXP(SUM(LOG(coalesce(nilai_normalisasi,1)))) as bbn FROM " . $this->table_name . " WHERE id_alternatif='$a' limit 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_alternatif=? and id_kriteria=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->ia = $row['id_alternatif'];
		$this->ik = $row['id_kriteria'];
		$this->nn = $row['nilai_rangking'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nilai_rangking = :nn
				WHERE
					id_alternatif = :ia 
				AND
					id_kriteria = :ik";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nn', $this->nn);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function normalisasi1(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nilai_normalisasi = :nn4
				WHERE
					id_alternatif = :ia 
				AND
					id_kriteria = :ik
				AND 
					id_pengguna = ".$this->SESSION_ID."";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nn4', $this->nn4);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function normalisasi2(){

		$query = "UPDATE 
					ads12_alternatif
				SET 
					vektor_s = :nn2,
					vektor_v = :nn3
				WHERE
					id_alternatif = :ia 
				AND
					id_kriteria = :ik
				AND
					id_pengguna = ".$this->SESSION_ID."";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nn2', $this->nn2);
		$stmt->bindParam(':nn3', $this->nn3);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function hasil1(){

		$query = "UPDATE 
					ads12_alternatif
				SET 
					vektor_s = :has1
				WHERE
					id_alternatif = :ia AND id_pengguna = ".$this->SESSION_ID."";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':has1', $this->has1);
		$stmt->bindParam(':ia', $this->ia);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
		
	function hasil2(){

		$query = "UPDATE 
					ads12_alternatif
				SET 
					vektor_v = :has2
				WHERE
					id_alternatif = :ia AND id_pengguna = ".$this->SESSION_ID."";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':has2', $this->has2);
		$stmt->bindParam(':ia', $this->ia);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_alternatif = ? and id_kriteria = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>