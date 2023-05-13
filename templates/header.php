<?php 
require_once("./utils/helper.php");
require_once("./Models/Messages.php");
$data = [];
if(isset($_SESSION["data"])){
    $data = $_SESSION["data"];

}else{
    $data = [];
}

$message = new Message($BASE_URL);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>VSCO</title>
</head>
<body>
    <header class="header flex items-center justify-between py-5 px-20">
    <a href="<?= $BASE_URL ?>" class="logo text-2xl uppercase tracking-widest">
        <h2>VSCO</h2>
    </a>

    <nav class="navbar flex gap-20">
        <?php if(!isset($_SESSION["userislogged"]) || !$_SESSION["userislogged"]): ?>
        <a href="<?= $BASE_URL ?>signup.php">Cadastro</a>
        <a href="<?= $BASE_URL ?>signin.php">Entrar</a>
        <?php else: ?>
        <a href="<?= $BASE_URL ?>dashboard.php">Dashboard</a>
        <a href="<?= $BASE_URL ?>">Sua conta</a>
        <?php endif; ?>
    </nav>
    </header>
<?php if(isset($_SESSION["msg"])): ?>
    <div class="h-8 p-2 text-white <?= $_SESSION["type_message"] ?> flex justify-center items-center"> 
        <span><?= $_SESSION["msg"] ?></span>
    </div>
    <?php $message->clearMessage(); ?>
<?php endif; ?>