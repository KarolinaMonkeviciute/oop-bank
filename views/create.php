<?php require ROOT.'/views/nav.php' ?>
<form class="new-form"action="<?= URL ?>/store" method="post">
    <input type="text" name="fname" placeholder="Vardas" requred>
    <input type="text" name="lname" placeholder="Pavardė" requred>
    <input type="text" name="number" placeholder="Sąskaitos numeris" value="<?='LT'.rand(100000000000000000, 999999999999999999)?>"readonly>
    <input type="number" name="code" placeholder="Asmens kodas" requred>
    <button type="submit" class="btn btn-primary d-block">Sukurti</button>
</form>