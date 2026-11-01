<?php
class Mobil_C extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['datamobil'] = $cekdata->datamobil();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/mobilview', $dt);
        $this->load->view('layout/footer');
    }
    public function create_mobil()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_mobilview');
        $this->load->view('layout/footer');
    }
    public function simpan()
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        if ($mobil->cekplat($this->load->post('no_plat'))) {
            echo "<script>
            alert('Nomor plat sudah terdaftar!');
            window.history.back();
            </script>";
            exit;
        }
        $ft_depan    = 'Depan' . $this->load->post('no_plat');
        $ft_blkg     = 'Belakang' . $this->load->post('no_plat');
        $ft_interior = 'Interior' . $this->load->post('no_plat');
        $folder = dirname(__DIR__, 2) . '/img/';
        if (isset($_FILES['ft_depan']) && $_FILES['ft_depan']['error'] == 0) {
            $file = $_FILES['ft_depan'];
            $info = getimagesize($file['tmp_name']);
            $ext = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
            if ($info && isset($ext[$info['mime']]) && $file['size'] <= 2 * 1024 * 1024) {
                $namaFiledepan = $ft_depan . '.' . $ext[$info['mime']];
                if (move_uploaded_file($file['tmp_name'], $folder . $namaFiledepan)) {
                    $ft_depan = $namaFiledepan;
                }
            } else {
                echo "<script>alert('Gagal simpan gambar, cek ukuran dan format..!');</script>";
            }
        }
        if (isset($_FILES['ft_blkng']) && $_FILES['ft_blkng']['error'] == 0) {
            $file = $_FILES['ft_blkng'];
            $info = getimagesize($file['tmp_name']);
            $ext = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
            if ($info && isset($ext[$info['mime']]) && $file['size'] <= 2 * 1024 * 1024) {
                $namaFileblkng = $ft_blkng . '.' . $ext[$info['mime']];
                if (move_uploaded_file($file['tmp_name'], $folder . $namaFileblkng)) {
                    $ft_blkng = $namaFileblkng;
                }
            } else {
                echo "<script>alert('Gagal simpan gambar, cek ukuran dan format..!');</script>";
            }
        }
        if (isset($_FILES['ft_interior']) && $_FILES['ft_interior']['error'] == 0) {
            $file = $_FILES['ft_interior'];
            $info = getimagesize($file['tmp_name']);
            $ext = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
            if ($info && isset($ext[$info['mime']]) && $file['size'] <= 2 * 1024 * 1024) {
                $namaFileinterior = $ft_interior . '.' . $ext[$info['mime']];
                if (move_uploaded_file($file['tmp_name'], $folder . $namaFileinterior)) {
                    $ft_interior = $namaFileinterior;
                }
            } else {
                echo "<script>alert('Gagal simpan gambar, cek ukuran dan format..!');</script>";
            }
        }
        $data = [
            'no_plat'    => $this->load->post('no_plat'),
            'nm_mobil'   => $this->load->post('nm_mobil'),
            'nkursi'     => $this->load->post('nkursi'),
            'nbagasi'    => $this->load->post('nbagasi'),
            'jns_mobil'  => $this->load->post('jns_mobil'),
            'transmisi'  => $this->load->post('transmisi'),
            'thn_buat'   => $this->load->post('thn_buat'),
            'ft_depan'   => $ft_depan,
            'ft_blkg'    => $ft_blkg,
            'ft_interior' => $ft_interior,
            'hrg_hari'   => $this->load->post('hrg_hari'),
            'cttn_unit'  => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        $simpan = $mobil->simpan($data);

        if ($simpan) {
            echo "<script>
        alert('Data mobil berhasil disimpan!');
        window.location.href = '" . base_url('Mobil_C/index') . "';
        </script>";
        } else {
            echo "<script>
        alert('Data mobil gagal disimpan!');
        window.history.back();
        </script>";
        }
    }
    public function edit($no_plat)
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];
        $mobil = $this->load->model('m_master/Mobil_M');
        $dt['mobil'] = $mobil->detailmobil($no_plat);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_mobilview', $dt);
        $this->load->view('layout/footer');
    }
    
public function UpdateMobil()
{
    $mobil = $this->load->model('m_master/Mobil_M');

    $ft_depan = 'Depan' . $this->load->post('no_plat');
    $ft_depan_asli = $this->load->post('ft_depan_asli');

    if (isset($_FILES['ft_depan']) && $_FILES['ft_depan']['error'] != 4) {
        $nmgambar = $_FILES['ft_depan']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_depan']['name']);
        $ekstensi = end($ekstensi);
        $ft_depan = $ft_depan . '.' . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_depan;

        if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
            echo "<script>alert('Format gambar depan harus jpg, png, atau jpeg!');window.history.back();</script>";
            exit;
        } else {
            if (move_uploaded_file($nmgambar, $target_dir)) {
                $ft_depan = $ft_depan;
            } else {
                echo "<script>alert('Gagal upload gambar depan!');window.history.back();</script>";
                exit;
            }
        }
    } else {
        $ft_depan = $ft_depan_asli;
    }

    $ft_blkng = 'Belakang' . $this->load->post('no_plat');
    $ft_blkng_asli = $this->load->post('ft_blkng_asli');

    if (isset($_FILES['ft_blkng']) && $_FILES['ft_blkng']['error'] != 4) {
        $nmgambar = $_FILES['ft_blkng']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_blkng']['name']);
        $ekstensi = end($ekstensi);
        $ft_blkng = $ft_blkng . '.' . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_blkng;

        if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
            echo "<script>alert('Format gambar belakang harus jpg, png, atau jpeg!');window.history.back();</script>";
            exit;
        } else {
            if (move_uploaded_file($nmgambar, $target_dir)) {
                $ft_blkng = $ft_blkng;
            } else {
                echo "<script>alert('Gagal upload gambar belakang!');window.history.back();</script>";
                exit;
            }
        }
    } else {
        $ft_blkng = $ft_blkng_asli;
    }

    $ft_interior = 'Interior' . $this->load->post('no_plat');
    $ft_interior_asli = $this->load->post('ft_interior_asli');

    if (isset($_FILES['ft_interior']) && $_FILES['ft_interior']['error'] != 4) {
        $nmgambar = $_FILES['ft_interior']['tmp_name'];
        $ekstensi = explode(".", $_FILES['ft_interior']['name']);
        $ekstensi = end($ekstensi);
        $ft_interior = $ft_interior . '.' . $ekstensi;
        $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_interior;

        if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
            echo "<script>alert('Format gambar interior harus jpg, png, atau jpeg!');window.history.back();</script>";
            exit;
        } else {
            if (move_uploaded_file($nmgambar, $target_dir)) {
                $ft_interior = $ft_interior;
            } else {
                echo "<script>alert('Gagal upload gambar interior!');window.history.back();</script>";
                exit;
            }
        }
    } else {
        $ft_interior = $ft_interior_asli;
    }

    $data = [
        'no_plat' => $this->load->post('no_plat'),
        'nm_mobil' => $this->load->post('nm_mobil'),
        'nkursi' => $this->load->post('nkursi'),
        'nbagasi' => $this->load->post('nbagasi'),
        'jns_mobil' => $this->load->post('jns_mobil'),
        'transmisi' => $this->load->post('transmisi'),
        'thn_buat' => $this->load->post('thn_buat'),
        'ft_depan' => $ft_depan,
        'ft_blkng' => $ft_blkng,
        'ft_interior' => $ft_interior,
        'hrg_hari' => $this->load->post('hrg_hari'),
        'cttn_unit' => $this->load->post('cttn_unit'),
        'status_unit' => $this->load->post('status_unit')
    ];

    $simpan = $mobil->UbahDtMobil($data);

    if ($simpan) {
        echo "<script>alert('Data mobil berhasil diubah!');";
        echo "window.location.href = '" . base_url('Mobil_C/index') . "';";
        echo "</script>";
    } else {
        echo "<script>alert('Data mobil gagal diubah!');";
        echo "window.history.back();";
        echo "</script>";
    }
}

    public function hapus($no_plat)
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        $dt['Gambar_Mobil'] = $mobil->detailmobil($no_plat);
        $ft_depan = $dt['Gambar_Mobil']['ft_depan'];
        $ft_blkng = $dt['Gambar_Mobil']['ft_blkng'];
        $ft_interior = $dt['Gambar_Mobil']['ft_interior'];
        $hapus = $mobil->HapusDtMobil($no_plat);
        if ($hapus) {
            $folder = dirname(__DIR__, 2) . '/img/';
            $gambar = [$ft_depan, $ft_blkng, $ft_interior];
            foreach ($gambar as $file) {
                if (!empty($file) && file_exists($folder . $file)) {
                    unlink($folder . $file);
                }
            }
            echo "<script>alert('Data mobil berhasil dihapus!');
        window.location.href = '" . base_url('Mobil_C/index') . "';
        </script>";
        } else {
            echo "<script>alert('Data mobil gagal dihapus!');window.history.back();</script>";
        }
    }
    public function keluar()
{
    $this->session->unset_userdata('emailuser');
    $this->session->set_flashdata('pesan', 'Berhasil Logout');
    redirect('login_C/index');
    exit;
}
}