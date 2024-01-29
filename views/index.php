<?php require ROOT.'/views/nav.php' ?>

<form method="post" action="<?= URL ?>/accounts">
    <label for="selectedDB">DB:</label>
    <select name="selectedDB">
        <option value="file">File</option>
        <option value="maria">MariaDB</option>
    </select>
    <button type="submit">Ok</button>
</form>
<h1 class="index">Visos sąskaitos</h1>

<ul class="list-group list-group-flush mt-3">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                    <b>Vardas</b>
                    </div>
                    <div class="col-2">
                        <form action="<?= URL ?>/accounts/" method="get">
                            <input type="hidden" name="sort" value="<?= $sortValue ?>">
                            <button type="submit" class="sort">Pavardė</button>
                        </form>
                    </div>
                    <div class="col-2">
                    <b>Sąskaitos numeris</b>
                    </div>
                    <div class="col-2">
                    <b>Asmens kodas</b>
                    </div>
                    <div class="col-3">
                    <b>Likutis</b>
                    </div>
                </div>
            </div>
        </li>
      <?php foreach ($accounts as $account) : ?>
         <li class="list-group-item">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-2">
                        <?= $account->fname; ?>
                    </div>
                    <div class="col-2">
                        <?= $account->lname; ?>
                    </div>
                    <div class="col-2">
                        <?= $account->number; ?>
                    </div>
                    <div class="col-2">
                        <?= $account->code; ?>
                    </div>
                    <div class="col-2">
                        <?= $account->balance; ?> EUR
                    </div>
                    <div class="col-2">
                    <a href="<?= URL ?>/edit/<?= $account->id ?>" class="btn btn-success mb-1 py-1"><span class="material-symbols-outlined">add</span></a>
                    <a href="<?= URL ?>/withdraw/<?= $account->id ?>" class="btn btn-warning mb-1 py-1"><span class="material-symbols-outlined">remove</span></a>
                        <form action="<?= URL ?>/destroy/<?= $account->id ?>" method="post" class="d-inline">
                            <button class="btn btn-danger py-1"><span class="material-symbols-outlined">close</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </li>
   <?php endforeach ?>  
</ul> 