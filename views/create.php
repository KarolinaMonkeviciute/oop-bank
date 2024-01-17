<?php require ROOT.'/views/nav.php' ?>
<form class="new-form"action="<?= URL ?>/store" method="post">
    <input type="text" name="fname" placeholder="Vardas">
    <input type="text" name="lname" placeholder="Pavardė">
    <input type="text" name="number" placeholder="Sąskaitos numeris" value="<?='LT'.rand(100000000000000000, 999999999999999999)?>"readonly>
    <input type="text" name="code" placeholder="Asmens kodas">
    <button type="submit">Sukurti</button>
</form>