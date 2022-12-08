<?php
    session_start();

    $archive = fopen('../../../app_help_desk/arquivo.hd', 'a');

    $title = str_replace('#', '-', $_POST['title']);
    $category = str_replace('#', '-', $_POST['category']);
    $description = str_replace('#', '-', $_POST['description']);

    $text = $_SESSION['id'] .'#'. $title .'#'. $category .'#'. $description . PHP_EOL;

    fwrite($archive, $text);

    fclose($archive);

    header('Location: ../abrir_chamado.php?status=success');
?>