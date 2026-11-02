<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page Novi - Entri Data Mobil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin_C/index') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Mobil_C/index') ?>">Data Mobil</a>
                        </li>
                        <li class="breadcrumb-item active">Entri Mobil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Entri Data Mobil</h3>
                        </div>

                        <form action="<?= base_url('Mobil_C/UpdateMobil') ?>"
                            method="post"
                            enctype="multipart/form-data">

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="no_plat">Nomor Plat</label>
                                    <input type="text" name="no_plat"
                                        id="no_plat" class="form-control"
                                        placeholder="Masukkan nomor plat"
                                        value="<?= $mobil['no_plat'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nm_mobil">Nama Mobil</label>
                                    <input type="text" name="nm_mobil"
                                        id="nm_mobil" class="form-control"
                                        placeholder="Masukkan nama mobil"
                                        value="<?= $mobil['nm_mobil'] ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nkursi">Jumlah Kursi</label>
                                            <input type="text" name="nkursi"
                                                id="nkursi" class="form-control"
                                                placeholder="Masukkan jumlah kursi"
                                                value="<?= $mobil['nkursi'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nbagasi">Jumlah Bagasi</label>
                                            <input type="text" name="nbagasi"
                                                id="nbagasi" class="form-control"
                                                placeholder="Masukkan jumlah bagasi"
                                                value="<?= $mobil['nbagasi'] ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jns_mobil">Jenis Mobil</label>
                                            <select name="jns_mobil" class="form-control" required>
                                                <option value="Sedan" <?= $mobil['jns_mobil'] == 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                                                <option value="Hatchback" <?= $mobil['jns_mobil'] == 'Hatchback' ? 'selected' : '' ?>>Hatchback</option>
                                                <option value="MPV" <?= $mobil['jns_mobil'] == 'MPV' ? 'selected' : '' ?>>MPV</option>
                                                <option value="SUV" <?= $mobil['jns_mobil'] == 'SUV' ? 'selected' : '' ?>>SUV</option>
                                                <option value="Pickup" <?= $mobil['jns_mobil'] == 'Pickup' ? 'selected' : '' ?>>Pickup</option>
                                                <option value="Minibus" <?= $mobil['jns_mobil'] == 'Minibus' ? 'selected' : '' ?>>Minibus</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transmisi">Transmisi</label>
                                            <input type="text" name="transmisi"
                                                id="transmisi" class="form-control"
                                                placeholder="Masukkan jenis transmisi"
                                                value="<?= $mobil['transmisi'] ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="thn_buat">Tahun Pembuatan</label>
                                    <input type="text" name="thn_buat"
                                        id="thn_buat" class="form-control"
                                        placeholder="Masukkan tahun pembuatan"
                                        value="<?= $mobil['thn_buat'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="ft_depan">Foto Depan Mobil</label>
                                    <input type="file" name="ft_depan"
                                        id="ft_depan" class="form-control"
                                        accept="image/jpeg,image/png">
                                    <input type="text" name="ft_depan_asli" value="<?= $mobil['ft_depan'] ?>" hidden>
                                </div>

                                <div class="form-group">
                                    <label for="ft_blkng">Foto Belakang Mobil</label>
                                    <input type="file" name="ft_blkng"
                                        id="ft_blkng" class="form-control"
                                        accept="image/jpeg,image/png">
                                    <input type="text" name="ft_blkng_asli" value="<?= $mobil['ft_blkng'] ?>" hidden>
                                </div>

                                <div class="form-group">
                                    <label for="ft_interior">Foto Interior Mobil</label>
                                    <input type="file" name="ft_interior"
                                        id="ft_interior" class="form-control"
                                        accept="image/jpeg,image/png">
                                    <input type="text" name="ft_interior_asli" value="<?= $mobil['ft_interior'] ?>" hidden>
                                </div>

                                <div class="form-group">
                                    <label for="hrg_hari">Biaya Sewa Per Hari (Rp)</label>
                                    <input type="text" name="hrg_hari"
                                        id="hrg_hari" class="form-control"
                                        placeholder="Masukkan harga sewa per hari"
                                        value="<?= $mobil['hrg_hari'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="cttn_unit">Catatan Unit</label>
                                    <textarea name="cttn_unit" id="cttn_unit"
                                        class="form-control" rows="3"
                                        placeholder="Masukkan catatan unit"><?= $mobil['cttn_unit'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status_unit">Status Unit</label>
                                    <input type="text" name="status_unit"
                                        id="status_unit" class="form-control"
                                        placeholder="Masukkan status unit"
                                        value="<?= $mobil['status_unit'] ?>" required>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan
                                </button>

                                <a href="<?= base_url('Mobil_C/index') ?>"
                                    class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->