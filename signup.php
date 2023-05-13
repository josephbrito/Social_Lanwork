<?php require_once("./templates/header.php"); ?>
    <main class="main flex flex-col items-center justify-center">
<form action="./authuser.php" method="POST" class="flex flex-col justify-center gap-5">
    <h1 class="text-3xl uppercase tracking-widest">Cadastre sua conta</h1>
<input type="hidden" name="type" value="register" />
  <label for="name">
    Name
</label>
<input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
  focus:outline-none
"
placeholder="Ex: João"
autocomplete="off"
required/>
  <label for="email">
    Email
</label>
<input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
  focus:outline-none
"
placeholder="Ex: joao123@gmail.com"

autocomplete="off"

required/>
  <label for="password">
    Password
</label>
<input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
  focus:outline-none
"
placeholder="Ex: ****"
required/>

<input type="submit" class="text-white p-3 bg-gray-900 hover:bg-black cursor-pointer"/>
</form>
    </main>
</body>
</html>