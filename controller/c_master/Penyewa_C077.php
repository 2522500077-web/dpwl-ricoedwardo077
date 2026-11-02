
<?php
class Penyewa_C077 extends Controller
{
    // Menampilkan data penyewa
    public function index()
    {
        $cekdata = $this->load->model('m_master/Penyewa_M077');
        $dt['datapenyewa'] = $cekdata->datapenyewa();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/penyewaview077', $dt);
        $this->load->view('layout/footer');
    }

    // Form tambah penyewa
    public function create_penyewa()
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview077');
        $this->load->view('layout/footer');
    }

    // Simpan data penyewa
    public function simpan()
    {
        $penyewa = $this->load->model('m_master/Penyewa_M077');

        $user = $this->load->post('user_plg077');

        if ($penyewa->cekpenyewa($user)) {
            echo "<script>
                alert('Nomor user sudah terdaftar!');
                window.history.back();
            </script>";
            exit;
        }

        $folder = dirname(__DIR__, 2) . '/img/';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $ft_ktp = '';
        $ft_sim_a = '';

        // Upload foto KTP
        if (isset($_FILES['ft_ktp']) && $_FILES['ft_ktp']['error'] == 0) {
            $file = $_FILES['ft_ktp'];
            $info = getimagesize($file['tmp_name']);
            $ext = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png'
            ];

            if ($info && isset($ext[$info['mime']]) &&
                $file['size'] <= 2 * 1024 * 1024) {

                $ft_ktp = 'ktp' . $user . '.' . $ext[$info['mime']];

                if (!move_uploaded_file($file['tmp_name'], $folder . $ft_ktp)) {
                    die('Gagal upload foto KTP!');
                }
            } else {
                die('Format foto KTP harus JPG/PNG dan maksimal 2 MB!');
            }
        } else {
            die('Foto KTP wajib diupload!');
        }

        // Upload foto SIM A
        if (isset($_FILES['ft_sim_a']) && $_FILES['ft_sim_a']['error'] == 0) {
            $file = $_FILES['ft_sim_a'];
            $info = getimagesize($file['tmp_name']);
            $ext = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png'
            ];

            if ($info && isset($ext[$info['mime']]) &&
                $file['size'] <= 2 * 1024 * 1024) {

                $ft_sim_a = 'sim_a' . $user . '.' . $ext[$info['mime']];

                if (!move_uploaded_file($file['tmp_name'], $folder . $ft_sim_a)) {
                    die('Gagal upload foto SIM A!');
                }
            } else {
                die('Format foto SIM A harus JPG/PNG dan maksimal 2 MB!');
            }
        } else {
            die('Foto SIM A wajib diupload!');
        }

        $data = [
            'user_plg077' => $user,
            'Sandi077' => $this->load->post('Sandi077'),
            'Nik077' => $this->load->post('Nik077'),
            'nm_lngkp077' => $this->load->post('nm_lngkp077'),
            'no_hp077' => $this->load->post('no_hp077'),
            'almt_lngkp077' => $this->load->post('almt_lngkp077'),
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a
        ];

        $simpan = $penyewa->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil disimpan!');
                window.location.href = '" . base_url('Penyewa_C077/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    // Form edit penyewa
    public function edit($user_plg077)
    {
        $info['nm_user'] = explode('@', $this->session->userdata('emailuser'))[0];

        $penyewa = $this->load->model('m_master/Penyewa_M077');
        $dt['penyewa'] = $penyewa->detailpenyewa($user_plg077);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_penyewaview077', $dt);
        $this->load->view('layout/footer');
    }

    // Update data penyewa
    public function UpdatePenyewa()
    {
        $penyewa = $this->load->model('m_master/Penyewa_M077');

        $user = $this->load->post('user_plg077');

        $folder = dirname(__DIR__, 2) . '/img/';

        $ft_ktp = $this->load->post('ft_ktp_asli');
        $ft_sim_a = $this->load->post('ft_sim_a_asli');

        // Update foto KTP
        if (isset($_FILES['ft_ktp']) && $_FILES['ft_ktp']['error'] != 4) {
            $info = getimagesize($_FILES['ft_ktp']['tmp_name']);

            if (!$info || !in_array($info['mime'], ['image/jpeg', 'image/png']) ||
                $_FILES['ft_ktp']['size'] > 2 * 1024 * 1024) {
                die('Foto KTP tidak valid atau melebihi 2 MB!');
            }

            $ext = $info['mime'] == 'image/png' ? 'png' : 'jpg';
            $ft_ktp = 'ktp' . $user . '.' . $ext;

            if (!move_uploaded_file(
                $_FILES['ft_ktp']['tmp_name'],
                $folder . $ft_ktp
            )) {
                die('Gagal upload foto KTP!');
            }
        }

        // Update foto SIM A
        if (isset($_FILES['ft_sim_a']) && $_FILES['ft_sim_a']['error'] != 4) {
            $info = getimagesize($_FILES['ft_sim_a']['tmp_name']);

            if (!$info || !in_array($info['mime'], ['image/jpeg', 'image/png']) ||
                $_FILES['ft_sim_a']['size'] > 2 * 1024 * 1024) {
                die('Foto SIM A tidak valid atau melebihi 2 MB!');
            }

            $ext = $info['mime'] == 'image/png' ? 'png' : 'jpg';
            $ft_sim_a = 'sim_a' . $user . '.' . $ext;

            if (!move_uploaded_file(
                $_FILES['ft_sim_a']['tmp_name'],
                $folder . $ft_sim_a
            )) {
                die('Gagal upload foto SIM A!');
            }
        }

        $data = [
            'user_plg077' => $user,
            'Sandi077' => $this->load->post('Sandi077'),
            'Nik077' => $this->load->post('Nik077'),
            'nm_lngkp077' => $this->load->post('nm_lngkp077'),
            'no_hp077' => $this->load->post('no_hp077'),
            'almt_lngkp077' => $this->load->post('almt_lngkp077'),
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a
        ];

        $simpan = $penyewa->UbahDtpenyewa($data);

        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil diubah!');
                window.location.href = '" . base_url('Penyewa_C077/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal diubah!');
                window.history.back();
            </script>";
        }
    }

    // Hapus data penyewa
    public function hapus($user_plg077)
    {
        $penyewa = $this->load->model('m_master/Penyewa_M077');

        $dt = $penyewa->detailpenyewa($user_plg077);

        if (!$dt) {
            die('Data penyewa tidak ditemukan!');
        }

        $ft_ktp = $dt['ft_ktp'];
        $ft_sim_a = $dt['ft_sim_a'];

        $hapus = $penyewa->HapusDtpenyewa($user_plg077);

        if ($hapus) {
            $folder = dirname(__DIR__, 2) . '/img/';

            foreach ([$ft_ktp, $ft_sim_a] as $file) {
                if (!empty($file) && file_exists($folder . $file)) {
                    unlink($folder . $file);
                }
            }

            echo "<script>
                alert('Data penyewa berhasil dihapus!');
                window.location.href = '" . base_url('Penyewa_C077/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal dihapus!');
                window.history.back();
            </script>";
        }
    }

    // Logout
    public function keluar()
    {
        $this->session->unset_userdata('emailuser');
        $this->session->set_flashdata('pesan', 'Berhasil Logout');

        redirect('login_C/index');
        exit;
    }
}
