<?php
class Login_C extends Controller
{
  public function index()
  {
    $this->load->view('login');
  }
  public function CekLogin()
  {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cekdata = $this->load->model('Login_M');
    $datauser = $cekdata->ambilData($email, $password);

    if ($datauser) {
        $this->session->set_userdata('emailuser', $email);
        echo '<script>alert("Login berhasil sebagai ' . $this->session->userdata('emailuser') . '");</script>';
    } else {
        echo '<script>alert("Gagal: Silahkan cek email, password, atau status akun Anda.");</script>';
    }
  }
}