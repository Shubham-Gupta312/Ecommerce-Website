<?= $this->extend('inc/snippet.php') ?>
<?= $this->section('content') ?>

<div class="container mt-3">
    <h2 class="text-center">
        <u><strong>Sign-In</strong></u>
    </h2>

    <form action="<?= base_url('login')?>" method="post">
        <div class="form-group mt-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                placeholder="Enter email">
                <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'email') : ""; ?>
            </span>
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'password') : ""; ?>
            </span>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    Create account <a href="<?= base_url('register') ?>">Sign-up</a>
</div>

<?= $this->endSection() ?>