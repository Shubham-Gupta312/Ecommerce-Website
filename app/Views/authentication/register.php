<?= $this->extend('inc/snippet.php') ?>
<?= $this->section('content') ?>

<div class="container mt-3">
    <h2 class="text-center">
        <u><strong>Sign-Up</strong></u>
    </h2>

    <form action="<?= base_url('register') ?>" method="post">
        <?php
        if (!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>
                    <?= session()->getFlashdata('fail'); ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

        <?php
        if (!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>
                    <?= session()->getFlashdata('success'); ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>

        <div class="form-group mt-3">
            <label for="username">Full Name</label>
            <input type="text" class="form-control" name="name" id="username" placeholder="Enter Your Full Name">
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'name') : ""; ?>
            </span>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                else.</small><br>
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'email') : ""; ?>
            </span>
        </div>
        <div class="form-group mt-3">
            <label for="email">Contact Number</label>
            <input type="phone" class="form-control" name="phone" id="phone" placeholder="Enter Contact number">
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'phone') : ""; ?>
            </span>
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'password') : ""; ?>
            </span>
        </div>
        <div class="form-group mt-3">
            <label for="password">Confrim Password</label>
            <input type="password" class="form-control" name="cpassword" id="password" placeholder="Password">
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'cpassword') : ""; ?>
            </span>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    Already have an Account <a href="<?= base_url('login') ?>">Sign-in</a>
</div>

<?= $this->endSection() ?>