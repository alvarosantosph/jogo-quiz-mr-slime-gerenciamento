public function inserirPergunta() {

try {
	$pdo = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO pessoa(nome, email) VALUES(?, ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(1,”Nome da Pessoa”);
	$stmt->bindParam(2,”email@email.com”);
	$stmt->execute(); 
} catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
  }
 
}