<?php
class Login_M extends Model
{
    function ambildata($email, $pass)
    {
        $dtadmin = $this->db->prepare("select username, password, status_akun
            from admin where username=? and password=? and status_akun='Aktif'");
        $dtadmin->bind_param("ss", $email, $pass);
        $dtadmin->execute();
        return $dtadmin->get_result()->fetch_assoc();
    }
}