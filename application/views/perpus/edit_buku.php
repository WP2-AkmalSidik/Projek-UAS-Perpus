<div class="container-fluid">
    <h3> <i class="fas fa-edit"><?= $title ?></i> </h3>
    <?php foreach ($buku as $bk) : ?>
        <form method="post" action="<?= base_url('perpus/update') ?>">
            <div class="for-group">
                <label for="">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" value="<?= $bk->judul_buku ?>">
            </div>
            <div class="for-group">
                <label for="">Keterangan</label>
                <input type="hidden" name="id" class="form-control" value="<?= $bk->id ?>">
                <input type="text" name="keterangan" class="form-control" value="<?= $bk->keterangan ?>">
            </div>
            <div class="for-group">
                <label for="">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= $bk->kategori ?>">
            </div>
            <div class="for-group">
                <label for="">Stok</label>
                <input type="text" name="stok" class="form-control" value="<?= $bk->stok ?>">
            </div>
            <button type="submit" class="btn btn-success btn-sm mt-2">Save</button>
            <button type="back" class="btn btn-primary btn-sm mt-2">Cancel</button>
        </form>
    <?php endforeach; ?>
</div>
</div>