<?= $this->extend('inc/snippet.php') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Admin Dashboard</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <div class="card">
            <div class="card-body" style="width:18rem;">
                User's List
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>