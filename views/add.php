<?php require ROOT.'/views/nav.php' ?>
<body>
        <form class="new-form" action="<?= URL ?>/update/<?=$account->id ?>" method="post">
            <input type="text" name="fname" value="<?=$account->fname?>"readonly></input>
            <input type="text" name="lname" value="<?=$account->lname?>"readonly></input>
            <input type="text" name="balance" value="<?=$account->balance?>"readonly></input>
                <div class="form-container">
                    <input type="number" name="add" placeholder="Įveskite suma"></input>
                    <button type="submit" class="btn btn-primary d-block">Pridėti</button>
                </div>
        </form>
</body>
</html>