<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahbuku"> <i class="fas fa-plus fa-sm"></i> Tambah Data</button>
    <div class="col-lg-8">
        <?= $this->session->flashdata('message') ?>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>Judul Buku</th>
            <th>Keterangan</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($buku as $bk) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td> <?= $bk->judul_buku ?></td>
                <td> <?= $bk->keterangan ?></td>
                <td> <?= $bk->kategori ?></td>
                <td> <?= $bk->stok ?></td>
                <td>
                    <?= anchor('perpus/detail/' . $bk->id, '<div class="btn btn-success btn-sm"> <i class="fas fa-search-plus"></i> </div>') ?>
                </td>
                <td>
                    <?= anchor('perpus/edit/' . $bk->id, '<div class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </div>') ?>
                </td>
                <td>
                <?php echo anchor('perpus/hapus/' . $bk->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>', 'onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"') ?>
                    <!-- <?= anchor('perpus/hapus/' . $bk->id, '<div class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </div>') ?> -->
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahbuku" tabindex="-1" aria-labelledby="tambahbukuexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahbukuexampleModalLabel">Form Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('perpus/tambahaksi') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" name="judul_buku" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" name="kategori" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Buku</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
<!-- <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menghapu Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah Anda Yakin ingin Menghapus Data?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('perpus/databuku') ?>">Hapus</a>
            </div>
        </div>
    </div>
</div -->