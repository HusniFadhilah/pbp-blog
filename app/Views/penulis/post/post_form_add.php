<?= $this->extend('templates/penulis/template') ?>
<?= $this->section('contentpenulis') ?>

<!-- ISI KONTEN -->
<!-- Taruh konten di bawah sini -->
<div class="container mb-5">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Tambah Post</h1>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/post/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group row">
                            <label for="judul" class="col-lg-3 col-form-label">Judul Post <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control <?= $validation->hasError('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul') ?>">
                                <span class="invalid-feedback"><?= $validation->getError('judul') ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="idpenulis" class="col-lg-3 col-form-label">Author <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="idpenulis" name="idpenulis" value="<?= $user["nama"] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="idkategori" class="col-lg-3 col-form-label">Kategori <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select name="idkategori" id="idkategori" class="form-control <?= $validation->hasError('idkategori') ? 'is-invalid' : '' ?>">
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach ($kategori as $k) {
                                    ?>
                                        <option value="<?= $k["idkategori"] ?>" <?= old("idkategori") == $k["idkategori"] ? "selected" : null ?>>
                                            <?= ucfirst($k['nama']) ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="invalid-feedback"><?= $validation->getError('idkategori') ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file_gambar" class="col-lg-3 col-form-label">Thumbnail</label>
                            <div class="col-lg-4 mb-2">
                                <img src="/assets/img/post/default.jpg" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-lg-5">
                                <div class="custom-file">
                                    <input type="file" id="file_gambar" name="file_gambar" onchange="previewImg()">
                                    <label class="custom-file-label" for="file_gambar">Pilih gambar</label>
                                    <span class="invalid-feedback"><?= $validation->getError('file_gambar') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="isi_post" class="col-lg-3 col-form-label">Isi Post <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <textarea class="form-control <?= $validation->hasError('isi_post') ? 'is-invalid' : '' ?>" id="texteditor" name="isi_post" rows="4"><?= old('isi_post') ?></textarea>
                                <span class="invalid-feedback"><?= $validation->getError('isi_post') ?></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus mr-2"></i>Tambahkan</button>
                        <a href="/post/data" class="btn btn-warning"><i class="fa fa-times mr-2"></i>Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AKHIR ISI KONTEN -->

<?= $this->endSection() ?>