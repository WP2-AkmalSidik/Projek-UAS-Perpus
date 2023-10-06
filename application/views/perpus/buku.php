<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url('assets/img/dashboard/p1.jpg') ?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/img/dashboard/p2.jpg') ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/img/dashboard/p3.jpg') ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url('assets/img/dashboard/p4.jpg') ?>" alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container-fluid">
    <div class="row text-center mt-2 ">
        <?php foreach ($buku as $bk) : ?>
            <div class="card ml-2" style="width: 14rem;">
                <img src="<?php echo base_url() . './assets/img/upload/' . $bk->gambar ?>" class="card-img-top mb-3" alt="..."">
                <div class=" card-body">
                <h5 class="card-title mb-1"><?= substr($bk->judul_buku,0,30). ''; ?></h5>
                <small><?= substr($bk->keterangan, 0, 40) . '<u><i> raed more</i></u>'; ?></small>
                <p class="card-text"></p>
                <a href="#" class="btn btn-sm btn-primary">Ajukan Pinjaman</a>
                <?= anchor('perpus/detail_buku/'. $bk->id, '<div class="btn btn-sm btn-success">Detail</div>') ?>
                <!-- <a href="" class="btn btn-sm btn-success">Detail</a> -->
            </div>
    </div>
<?php endforeach; ?>
</div>
</div>