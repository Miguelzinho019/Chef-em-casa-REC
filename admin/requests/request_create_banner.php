<?php
session_start();

include_once ('../../helpers/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
   

    //  Configuração para o upload da imagem
    $targetDir = "../../src/img/banner";
    $randomName = uniqid() . "_" . basename($_FILES['image']['name']);
    $targetFile = $targetDir . $randomName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Validação da imagem

    if(!getimagesize($_FILES['image']['tmp_name']) || file_exists($targetFile) || $_FILES['image']['size'] > 500000){
        $_SESSION['message'] = "Desculpe, a sua imagem deve ter no máximo 5MB.";
        $_SESSION['message_type'] = "danger";
        $uploadOk = 0;
        header("Location: ../creat_banner.php");
    }

    if($uploadOk == 1 && move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)){
        // Conecta no banco de dados
        $connection = connectDatabase();
        
        $title = mysqli_real_escape_string($connection, $title);
        
        // Obtém o id usuário logado
        $user_id = $_SESSION['user_id'];

        $image = "src/img/banner" . $randomName;

        $query = "INSERT INTO banner (user_id, title, image_banner) VALUES ('$user_id', '$title', '$image')";

        if(mysqli_query($connection, $query)){
            $_SESSION['message'] = "Sua postagem foi publicada com sucesso";
            $_SESSION['message_type'] = "success";
            header("Location: ../banner.php");
        }else{
            $_SESSION['message'] = "Ocorreu um erro ao cadastrar sua postagem";
            $_SESSION['message_type'] = "danger";
            header("Location: ../creat_banner.php");
        }
    }




}