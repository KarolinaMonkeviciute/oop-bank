<?php require ROOT.'/views/nav.php' ?>
<h1>Visos sąskaitos</h1>
<ul class="list-group list-group-flush mt-3">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                    <b>Vardas</b>
                    </div>
                    <div class="col-2">
                    <b>Pavardė</b>
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
        <?php print_r($account); ?>
         <li class="list-group-item">
            <div class="container">
                <div class="row">
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
                    <a href="<?= URL ?>/edit/<?= $account->id ?>" class="btn btn-warning mb-1">Pridėti</a>
                        <form action="<?= URL ?>/destroy/<?= $account->id ?>" method="post">
                            <button class="btn btn-danger">Ištrinti</button>
                        </form>
                    </div>
                </div>
            </div>
        </li>
   <?php endforeach ?>  
</ul> 