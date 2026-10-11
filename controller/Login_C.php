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
    echo "Email " . $email . " dan " . $password . " Password Anda";
  }
}