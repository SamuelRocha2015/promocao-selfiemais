<?php


$email = $_POST['email'];

define('USUARIO',"codes475_admin");
define('SENHA',"Admin@ti");
define('HOST',"www.codeshouse.com.br");
define('BD',"codes475_selfiemais");


$mysqli = new mysqli(HOST,USUARIO,SENHA,BD);
if($mysqli)
	
// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) {
	 die('ERRO DE APLICACAO: ' . mysqli_connect_error());
    	exit();
}

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');


if ($sql = $mysqli->prepare(
	"INSERT INTO `codes475_selfiemais`.`site_promocao` (`email`,`dt_inscricao`) VALUES (?,?);")) {


  $sql->bind_param('ss', $email,$date);

  
  $sql->execute();

  $sql->close();
}

$mysqli->close();

echo "<script>alert('Email cadastrado com sucesso. Agora basta compartilhar nosso post nas suas redes sociais');window.location='https://www.facebook.com/selfiemaisoficial/photos/a.1736418210010272.1073741828.1731747027144057/1744259832559443/?type=3&theater';</script>";


?>