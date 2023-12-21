<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">E-commerce Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Mobile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Fashion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beauty, Toy&More</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <?php if (session()->user_type == 'admin'): ?>
                        ""
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><img
                                    src="<?= ASSET_URL . 'public/images/shopping-cart-1.png' ?>"
                                    style="height:20px;width:20px" alt=""></a>
                        </li>
                    <?php endif ?>
                    <?php if (session()->loggedin == 'loggedin'): ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?= base_url('admin/') ?><?= session()->user_type == 'admin' ? "admin_dashboard" : "" ?>">
                                <img src="<?= ASSET_URL . 'public/images/user-1.png' ?>" style="height:14px;width:14px"
                                    alt="">
                                <?= ucfirst(session()->name); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('logout') ?>">
                                Sign-Out </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('login') ?>">
                                <img src="<?= ASSET_URL . 'public/images/user-1.png' ?>" style="height:14px;width:14px"
                                    alt="">
                                Sign-In</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</div>