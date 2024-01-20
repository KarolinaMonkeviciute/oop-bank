<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-5">
            <form action="<?= URL ?>/login" method="post">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Prisijungimas</h1>
                    </div>
                    <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">El. paštas</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slaptažodis</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Prisijugnti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require ROOT. 'views/message.php' ?>