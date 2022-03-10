<form action="<?= base_url('login') ?>" method="post" autocomplete="off"><br>
    <center><img src="<?= base_url('assets/logo.jpg') ?>" alt="" class="rounded-top" height="100px" width="100px" style=" margin-top: -8px"></center>
    <div class="card-body">
        <div class="form-group mb-3">
            <div class="form-floating">
                <input class="form-control" name="username" id="inputEmail" type="text" value="<?= set_value('username') ?>" />
                <label for="inputEmail">Username</label>
                <?= form_error('username'); ?>
            </div>
        </div>
        <div class="form-group mb-3">
            <div class="form-floating">
                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                <label for="inputPassword">Password</label>
                <?= form_error('password'); ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">LOGIN</button>
    </div>
</form>