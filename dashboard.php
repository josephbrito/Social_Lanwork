<?php 
require_once "./utils/helper.php";
require_once "./dao/PhotosDAO.php";
require_once "./templates/header.php";
require_once "./db.php";

$photos = [];

if(isset($_SESSION["userdata"])){
$photosDAO = new PhotosDAO($conn);
$photosDAO->fetchPhotosFromUser($_SESSION["userdata"]["id"]);
}

if(isset($_SESSION["photosfromuser"])){
    $photos = array_column($_SESSION["photosfromuser"], "filename");
    
} else {
    $photos = [];
}



?>

<main class="main flex items-center justify-center gap-10">
    <?php if(!isset($_SESSION["userdata"]) || !$_SESSION["userislogged"]):; ?>
        <?php header("Location: index.php") ?>
    <?php endif; ?>
    <?php if(!count($photos) || !isset($_SESSION["photosfromuser"])): ?>
        <div class="flex flex-col items-center justify-center">

            <h1>Sem postagens</h1>
            <a href="<?= $BASE_URL ?>" class="text-cyan-600">Clique aqui para fazer uma postagem</a>
        </div>
    <?php else: ?>
        
        <?php foreach($photos as $photo): ?>
            <div class="post_container">
            <img src="<?= $BASE_URL ?>images/<?= $photo ?>" alt="post" />
        </div>
       
        <?php endforeach; ?>
    <?php endif; ?>
</main>