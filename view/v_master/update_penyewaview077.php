
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entri Data Penyewa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin_C/index') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Penyewa_C077/index') ?>">Data Penyewa</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Penyewa</li>
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
                            <h3 class="card-title">Form Edit Data Penyewa</h3>
                        </div>

                        <form action="<?= base_url('Penyewa_C077/UpdatePenyewa') ?>"
                            method="post"
                            enctype="multipart/form-data">

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="user_plg077">Username Penyewa</label>
                                    <input type="text"
                                        name="user_plg077"
                                        id="user_plg077"
                                        class="form-control"
                                        value="<?= htmlspecialchars($penyewa['user_plg077']) ?>"
                                        readonly>
                                </div>

                                <div class="form-group">
                                    <label for="Sandi077">Password</label>
                                    <input type="text"
                                        name="Sandi077"
                                        id="Sandi077"
                                        class="form-control"
                                        value="<?= htmlspecialchars($penyewa['Sandi077']) ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="Nik077">NIK</label>
                                    <input type="text"
                                        name="Nik077"
                                        id="Nik077"
                                        class="form-control"
                                        value="<?= htmlspecialchars($penyewa['Nik077']) ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="nm_lngkp077">Nama Lengkap</label>
                                    <input type="text"
                                        name="nm_lngkp077"
                                        id="nm_lngkp077"
                                        class="form-control"
                                        placeholder="Masukkan nama lengkap"
                                        value="<?= htmlspecialchars($penyewa['nm_lngkp077']) ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp077">Nomor HP</label>
                                    <input type="text"
                                        name="no_hp077"
                                        id="no_hp077"
                                        class="form-control"
                                        placeholder="Masukkan nomor HP"
                                        value="<?= htmlspecialchars($penyewa['no_hp077']) ?>"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="almt_lngkp077">Alamat Lengkap</label>
                                    <textarea name="almt_lngkp077"
                                        id="almt_lngkp077"
                                        class="form-control"
                                        rows="3"
                                        placeholder="Masukkan alamat lengkap"
                                        required><?= htmlspecialchars($penyewa['almt_lngkp077']) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="ft_ktp">Foto KTP</label>
                                    <input type="file"
                                        name="ft_ktp"
                                        id="ft_ktp"
                                        class="form-control"
                                        accept="image/jpeg,image/png">

                                    <input type="hidden"
                                        name="ft_ktp_asli"
                                        value="<?= htmlspecialchars($penyewa['ft_ktp']) ?>">

                                    <?php if (!empty($penyewa['ft_ktp'])): ?>
                                        <p class="mt-2">Foto KTP saat ini:</p>
                                        <img src="<?= base_url('img/' . $penyewa['ft_ktp']) ?>"
                                            width="150" alt="Foto KTP">
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="ft_sim_a">Foto SIM A</label>
                                    <input type="file"
                                        name="ft_sim_a"
                                        id="ft_sim_a"
                                        class="form-control"
                                        accept="image/jpeg,image/png">

                                    <input type="hidden"
                                        name="ft_sim_a_asli"
                                        value="<?= htmlspecialchars($penyewa['ft_sim_a']) ?>">

                                    <?php if (!empty($penyewa['ft_sim_a'])): ?>
                                        <p class="mt-2">Foto SIM A saat ini:</p>
                                        <img src="<?= base_url('img/' . $penyewa['ft_sim_a']) ?>"
                                            width="150" alt="Foto SIM A">
                                    <?php endif; ?>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>

                                <a href="<?= base_url('Penyewa_C077/index') ?>"
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
