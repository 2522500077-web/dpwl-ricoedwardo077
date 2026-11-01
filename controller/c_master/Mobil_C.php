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
        $ft_blkng     = 'Belakang' . $this->load->post('no_plat');
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
            'ft_blkng'    => $ft_blkng,
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
    public function edit_mobil($no_plat)
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        $dt['datamobil'] = $mobil->getmobil($no_plat);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/edit_mobilview', $dt);
        $this->load->view('layout/footer');
    }

    public function update_mobil($no_plat)
    {
        $mobil = $this->load->model('m_master/Mobil_M');

        $data = [
            'nm_mobil'    => $this->load->post('nm_mobil'),
            'nkursi'      => $this->load->post('nkursi'),
            'nbagasi'     => $this->load->post('nbagasi'),
            'jns_mobil'   => $this->load->post('jns_mobil'),
            'transmisi'   => $this->load->post('transmisi'),
            'thn_buat'    => $this->load->post('thn_buat'),
            'ft_depan'    => $this->load->post('ft_depan'),
            'ft_blkng'    => $this->load->post('ft_blkng'),
            'ft_interior' => $this->load->post('ft_interior'),
            'hrg_hari'    => $this->load->post('hrg_hari'),
            'cttn_unit'   => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];
        $update = $mobil->update($no_plat, $data);

        if ($update) {
            echo "<script>
            alert('Data mobil berhasil diperbarui!');
            window.location.href = '" .
                base_url('Mobil_C/index') . "';
        </script>";
        } else {
            echo "<script>
            alert('Data mobil gagal diperbarui!');
            window.history.back();
        </script>";
        }
    }
}