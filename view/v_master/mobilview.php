  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page Novi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Admin_C/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <a href="<?= base_url('Mobil_C/create_mobil') ?>"
                  class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table table-bordered table-striped">
<<<<<<< HEAD
                    <thead>
                        <tr>
                            <th>No. Plat</th>
                            <th>Nama Mobil</th>
                            <th>Jumlah Kursi</th>
                            <th>Jumlah Bagasi</th>
                            <th>Jenis Mobil/<br>Transmisi</th>
                            <th>Tahun</th>
                            <th>Foto</th>
                            <th>Biaya Perhari</th>
                            <th>Cartatan Unit</th>
                            <th>Status Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datamobil as $m) : ?>
                            <tr>
                                <td><?= $m['no_plat'] ?></td>
                                <td><?= $m['nm_mobil'] ?></td>
                                <td><?= $m['nkursi'] ?></td>
                                <td><?= $m['nbagasi'] ?></td>
                                <td><?= $m['jns_mobil'] . '<br>' . $m['transmisi'] ?></td>
                                <td><?= $m['thn_buat'] ?></td>
                                <td><?= $m['ft_depan'] . '<br>' . $m['ft_blkg'] . '<br>' . $m['ft_interior'] ?></td>
                                <td><?= $m['hrg_hari'] ?></td>
                                <td><?= $m['cttn_unit'] ?></td>
                                <td><?= $m['status_unit'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- Data mobil -->
                    </tbody>
=======
                  <thead>
                    <tr>
                      <th>No. Plat</th>
                      <th>Nama Mobil</th>
                      <th>Jumlah Kursi</th>
                      <th>Jumlah Bagasi</th>
                      <th>Jenis Mobil/<br>Transmisi</th>
                      <th>Tahun</th>
                      <th>Foto</th>
                      <th>Biaya Perhari</th>
                      <th>Cartatan Unit</th>
                      <th>Status Unit</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($datamobil as $m) : ?>
                      <tr>
                        <td><?= $m['no_plat'] ?></td>
                        <td><?= $m['nm_mobil'] ?></td>
                        <td><?= $m['nkursi'] ?></td>
                        <td><?= $m['nbagasi'] ?></td>
                        <td><?= $m['jns_mobil'] . '<br>' . $m['transmisi'] ?></td>
                        <td><?= $m['thn_buat'] ?></td>
                        <td>
                          <?php if (!empty($m['ft_depan'])) : ?>
                            <img src="<?= base_url('img/' . $m['ft_depan']) ?>"
                              style="width: 80px; height: 40px; object-fit: cover;"
                              alt="Foto Depan Mobil"
                              onerror="this.style.display='none';">
                            <br>
                          <?php endif; ?>
                          <?php if (!empty($m['ft_blkng'])) : ?>
                            <img src="<?= base_url('img/' . $m['ft_blkng']) ?>"
                              style="width: 80px; height: 40px; object-fit: cover;"
                              alt="Foto Belakang Mobil"
                              onerror="this.style.display='none';">
                            <br>
                          <?php endif; ?>
                          <?php if (!empty($m['ft_interior'])) : ?>
                            <img src="<?= base_url('img/' . $m['ft_interior']) ?>"
                              style="width: 80px; height: 40px; object-fit: cover;"
                              alt="Foto Interior Mobil"
                              onerror="this.style.display='none';">
                            <br>
                          <?php endif; ?>
                        </td>
                        <td><?= $m['hrg_hari'] ?></td>
                        <td><?= $m['cttn_unit'] ?></td>
                        <td><?= $m['status_unit'] ?></td>
                        <td>
                          <a href="<?= base_url('Mobil_C/edit/' . $m['no_plat']) ?>" class="btn btn-warning btn-sm">Edit</a>
                          <a href="<?= base_url('Mobil_C/hapus/' . $m['no_plat']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    <!-- Data mobil -->
                  </tbody>
>>>>>>> 1e3dda6db3a78fbe14c948c53bd08ff6955574ef
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->