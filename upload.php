<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Verificar si el archivo ya existe
if (file_exists($target_file)) {
 echo "Disculpa, el archivo ya existe.";
 $uploadOk = 0;
}
// Verificar la longitud del archivo
if ($_FILES["fileToUpload"]["size"] > 5000000) {
 echo "Disculpa, el archivo es muy grande.";
 $uploadOk = 0;
}
// Permitir ciertos formatos de archivo
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
 echo "Disculpa, solo archivos JPG, PNG & PDF son permitidos.";
 $uploadOk = 0;
}
// Verificar si $uploadOk es 0 debido a algún error previo
if ($uploadOk == 0) {
 echo "Disculpa, el archivo no se ha subido.";
// if everything is ok, try to upload file
} else {
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " ha sido subido.";
 } else {
 echo "Disculpa, hubo un error al subir el archivo.";
 }
}
?>