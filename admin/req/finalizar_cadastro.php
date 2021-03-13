<?php
session_start();
require_once("../../config.php");

$cnpj = mysqli_escape_string($conn, htmlspecialchars($_POST["cnpj"]));
$nome = mysqli_escape_string($conn, htmlspecialchars($_POST["nome"]));
$url = mysqli_escape_string($conn, htmlspecialchars($_POST["url"]));
$logo = $_FILES["logo"];
$fundo = $_FILES["fundo"];
$sobre = mysqli_escape_string($conn, htmlspecialchars($_POST["sobre"]));
$telefone = mysqli_escape_string($conn, htmlspecialchars($_POST["telefone"]));
$facebook = mysqli_escape_string($conn, htmlspecialchars($_POST["facebook"]));
$instagram = mysqli_escape_string($conn, htmlspecialchars($_POST["instagram"]));
$endereco = mysqli_escape_string($conn, htmlspecialchars($_POST["endereco"]));

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



$dirfundo = '../../img/fundos';
$dirlogo = '../../img/logos';

$uploadfundo = $dirfundo.basename($_FILES['fundo']['name']);
$uploadlogo = $dirlogo.basename($_FILES['logo']['name']);

move_uploaded_file($_FILES['fundo']['tmp_name'], $uploadfundo);
move_uploaded_file($_FILES['logo']['tmp_name'], $uploadlogo);