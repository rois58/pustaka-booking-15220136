<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Display flash messages -->
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-message <?= $this->session->flashdata('alert_class'); ?>" role="alert">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-4">

            <!-- Form validation and redirection on error -->
            <?php if (validation_errors()) : ?>
                <?php $this->session->set_flashdata('pesan', 'Nama Kategori tidak boleh Kosong'); ?>
                <?php $this->session->set_flashdata('alert_class', 'alert-danger'); ?>
                <?php redirect('buku/ubahkategori/' . $k['id_kategori']); ?>
            <?php endif; ?>

            <!-- Form for updating the category -->
            <?php foreach ($kategori as $k) : ?>
                <form id="kategoriForm" action="<?= base_url('buku/ubahKategori'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_kategori">Kategori Buku</label>
                        <input type="hidden" name="id_kategori" id="id_kategori" value="<?= $k['id_kategori']; ?>">
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Kategori Buku" value="<?= $k['nama_kategori']; ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary mt-3" onclick="window.history.back()">Kembali</button>
                        <button type="submit" class="btn btn-success mt-3">Simpan</button>
                    </div>
                </form>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- JavaScript for client-side validation -->
<script>
    document.getElementById('kategoriForm').onsubmit = function() {
        var namaKategori = document.getElementById('nama_kategori').value.trim();
        if (namaKategori === '') {
            alert('Nama Kategori tidak boleh Kosong');
            return false;
        }
        return true;
    }
</script>