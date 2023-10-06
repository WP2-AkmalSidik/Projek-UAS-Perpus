                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <idv class="row">
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message') ?>
                        </div>
                    </idv>
                    <div class="card" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img class="card-img" src="<?= base_url('assets/img/profile/'). $user['image']; ?>" alt="Card image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body style="width: 18rem; height: 400px;">
                                    <h5 class="card-title"><?=$user['name'] ?></h5>
                                    <p class="card-text"><?= $user['email'] ?></p>
                                    <p class="card-text" > <small class="text-muted" >Aktif member sejak <?= date('d F Y', $user['date_create']); ?> </small> </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
