<?php require_once("./templates/header.php"); ?>

<main class="main flex flex-col items-center justify-center">
    <?php if(!isset($_SESSION["userislogged"]) || !$_SESSION["userislogged"]): ?>
    
        <h2 class="logo logo_text text-2xl uppercase tracking-widest">Crie uma conta e poste seus momentos!</h2>
   
    <?php else: ?>
        <div class="flex item-center justify-around gap-20">
        <div class="user_container flex flex-col gap-5 justify-center items-center">
        <div class="user bg-gray-300 flex justify-center items-center w-20 h-20 rounded-full">
            <?php if(!isset($_SESSION["userislogged"]) && !$_SESSION["userislogged"] || !$_SESSION["userdata"]["profile"]): ?>
                    <img src="<?php $BASE_URL ?>assets/images/user.png" name="profile_user" alt="Profile user" class="profile" id="profile_image" />
                <?php else: ?>
                    <img src="./profiles/<?= $_SESSION["userdata"]["profile"] ?>" alt="Profile user" class="profile" id="profile_image" />
            <?php endif; ?>
        </div>
        <form action="./upprofile.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 justify-center items-center">
            <label for="profile" class="txt-xl cursor-pointer">Selecionar nova foto de perfil</label>
            <input type="file" name="profile_upload" id="profile" class="hidden" required accept="image/x-png,image/gif,image/jpeg" />
            <input class="bg-gray-800 p-3 text-white cursor-pointer" type="submit" value="Atualizar foto de perfil" />
        </form>
        </div>

           
    <form action="./authphotos.php" method="POST" enctype="multipart/form-data" class="flex gap-3 flex-col text-center justify-end" />
        <label for="image" class="text-white p-2 bg-gray-900 hover:bg-black cursor-pointer text-xl rounded-full"><i class="fa-solid fa-plus"></i></label>
        <input type="file" name="image" id="image" class="hidden" required accept="image/x-png,image/gif,image/jpeg" />
        <div id="result" class="hidden"></div>
        <input class="cursor-pointer" type="submit" name="submit" value="Postar">
    </form>
    </div>

    <?php endif; ?>
</main>
<script src="https://kit.fontawesome.com/5f166de9b4.js" crossorigin="anonymous"></script>
<script src="<?= $BASE_URL ?>js/script.js"></script>
</body>
</html>