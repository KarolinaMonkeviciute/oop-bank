<?php require ROOT.'/views/nav.php' ?>
<body>
        <form class="new-form" action="<?= URL ?>/withdrawupd/<?=$account->id ?>" method="post">
            <input type="text" name="fname" value="<?=$account->fname?>"readonly></input>
            <input type="text" name="lname" value="<?=$account->lname?>"readonly></input>
            <input type="text" name="balance" value="<?=$account->balance?>"readonly></input>
                <div class="form-container">
                    <input type="number" name="withdraw" placeholder="Įveskite suma"></input>
                    <button type="submit">Nuskaičiuoti</button>
                </div>
        </form>
</body>
</html>