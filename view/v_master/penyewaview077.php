
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Penyewa</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('Admin_C/index') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Penyewa
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a href="<?= base_url('Penyewa_C077/create_penyewa') ?>"
                               class="btn btn-primary mb-3">
                                Tambah Data
                            </a>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>User Penyewa</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>No. HP</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Foto KTP</th>
                                        <th>Foto SIM A</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($datapenyewa as $p) : ?>
                                        <tr>

                                            <td>
                                                <?= htmlspecialchars($p['user_plg077']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($p['Nik077']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($p['nm_lngkp077']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($p['no_hp077']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($p['almt_lngkp077']) ?>
                                            </td>

                                            <!-- Foto KTP -->
                                            <td>
                                                <?php if (!empty($p['ft_ktp'])) : ?>
                                                    <img
                                                        src="<?= base_url('img/' . $p['ft_ktp']) ?>"
                                                        style="width:100px;height:70px;object-fit:cover;"
                                                        alt="Foto KTP"
                                                        onerror="this.style.display='none';">
                                                <?php else : ?>
                                                    Tidak ada foto
                                                <?php endif; ?>
                                            </td>

                                            <!-- Foto SIM A -->
                                            <td>
                                                <?php if (!empty($p['ft_sim_a'])) : ?>
                                                    <img
                                                        src="<?= base_url('img/' . $p['ft_sim_a']) ?>"
                                                        style="width:100px;height:70px;object-fit:cover;"
                                                        alt="Foto SIM A"
                                                        onerror="this.style.display='none';">
                                                <?php else : ?>
                                                    Tidak ada foto
                                                <?php endif; ?>
                                            </td>

                                            <!-- Aksi -->
                                            <td>
                                                <a href="<?= base_url('Penyewa_C077/edit/' . $p['user_plg077']) ?>"
                                                   class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <a href="<?= base_url('Penyewa_C077/hapus/' . $p['user_plg077']) ?>"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Yakin ingin menghapus data penyewa ini?')">
                                                    Hapus
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
