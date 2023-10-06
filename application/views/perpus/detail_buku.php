<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3> <i class="fas fa-edit"><?= $title ?></i> </h3>
            <p>Detail Buku</p>
        </div>
        <div class="card-body">
            <?php foreach ($buku as $bk) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url('./assets/img/upload/') . $bk->gambar ?>" class="card-img-top" >
                    </div>
                    <div class="col-md-8">
                        <table class="table" >
                            <tr>
                                <td>Nama Prodak</td>
                                <td> <strong><?= $bk->judul_buku ?></strong> </td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td> <strong><?= $bk->keterangan ?></strong> </td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td> <strong><?= $bk->kategori ?></strong> </td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td> <strong><?= $bk->stok ?></strong> </td>
                            </tr>
                        </table>
                        <?= anchor('perpus/daftarbuku/','<div class="btn btn-sm btn-primary">Kembali</div>') ?>
                        <?= anchor('perpus/daftarbuku/','<div class="btn btn-sm btn-success">Ajukan Pinjam</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>