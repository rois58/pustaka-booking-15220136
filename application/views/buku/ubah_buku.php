<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Flash Message -->
    <?= $this->session->flashdata('pesan'); ?>

    <div class="row">
        <div class="col-lg-8 mx-auto">

            <!-- Validation Errors -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- Book Update Form -->
            <?php foreach ($buku as $b) : ?>
                <form action="<?= base_url('buku/ubahBuku'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <!-- Book Details Form -->
                        <div class="col-sm-9">

                            <!-- Book Title -->
                            <div class="form-group row">
                                <label for="judul_buku" class="col-sm-3 col-form-label">Judul Buku</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" id="id" value="<?= $b['id']; ?>">
                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?= $b['judul_buku']; ?>">
                                </div>
                            </div>

                            <!-- Book Category -->
                            <div class="form-group row">
                                <label for="id_kategori" class="col-sm-3 col-form-label">Kategori Buku</label>
                                <div class="col-sm-9">
                                    <select name="id_kategori" class="form-control">
                                        <option value="">Pilih Kategori Buku...</option>
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id_kategori']; ?>" <?= $k['id_kategori'] == $b['id_kategori'] ? 'selected' : ''; ?>>
                                                <?= $k['nama_kategori']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Author Name -->
                            <div class="form-group row">
                                <label for="pengarang" class="col-sm-3 col-form-label">Nama Pengarang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan Nama Pengarang" value="<?= $b['pengarang']; ?>">
                                </div>
                            </div>

                            <!-- Publisher Name -->
                            <div class="form-group row">
                                <label for="penerbit" class="col-sm-3 col-form-label">Nama Penerbit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Nama Penerbit" value="<?= $b['penerbit']; ?>">
                                </div>
                            </div>

                            <!-- Year of Publication -->
                            <div class="form-group row">
                                <label for="tahun_terbit" class="col-sm-3 col-form-label">Tahun Terbit</label>
                                <div class="col-sm-9">
                                    <select name="tahun" class="form-control">
                                        <option value="<?= $b['tahun_terbit']; ?>">Pilih Tahun Terbit...</option>
                                        <?php for ($i = date('Y'); $i > 1000; $i--) : ?>
                                            <option value="<?= $i; ?>" <?= $i == $b['tahun_terbit'] ? 'selected' : ''; ?>><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- ISBN -->
                            <div class="form-group row">
                                <label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan ISBN" value="<?= $b['isbn']; ?>">
                                </div>
                            </div>

                            <!-- Book Stock -->
                            <div class="form-group row">
                                <label for="stok" class="col-sm-3 col-form-label">Stok Buku</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Nominal Stok" value="<?= $b['stok']; ?>">
                                </div>
                            </div>

                            <!-- Book Image Upload -->
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Gambar Buku</label>
                                <div class="col-sm-9">
                                    <?php if (isset($b['image'])) : ?>
                                        <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['image']; ?>">
                                        <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="img-thumbnail mb-3" alt="Current Image" width="100">
                                    <?php endif; ?>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>

                        </div>

                        <!-- Form Buttons -->
                        <div class="col-sm-12 mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-2" onclick="window.history.back()">Kembali</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </form>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->