
<?php
class Penyewa_M077 extends Model
{
    // Menampilkan seluruh data penyewa
    public function datapenyewa()
    {
        $sql = $this->db->prepare("
            SELECT user_plg077, Sandi077, Nik077,
                   nm_lngkp077, no_hp077, almt_lngkp077,
                   ft_ktp, ft_sim_a
            FROM penyewa
        ");

        $sql->execute();

        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Mengecek username penyewa
    public function cekpenyewa($user_plg077)
    {
        $sql = $this->db->prepare("
            SELECT user_plg077
            FROM penyewa
            WHERE user_plg077 = ?
        ");

        $sql->bind_param("s", $user_plg077);
        $sql->execute();

        return $sql->get_result()->num_rows > 0;
    }

    // Menyimpan data penyewa
    public function simpan($data)
    {
        $sql = $this->db->prepare("
            INSERT INTO penyewa
            (user_plg077, Sandi077, Nik077, nm_lngkp077,
             no_hp077, almt_lngkp077, ft_ktp, ft_sim_a)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $sql->bind_param(
            "ssssssss",
            $data['user_plg077'],
            $data['Sandi077'],
            $data['Nik077'],
            $data['nm_lngkp077'],
            $data['no_hp077'],
            $data['almt_lngkp077'],
            $data['ft_ktp'],
            $data['ft_sim_a']
        );

        return $sql->execute();
    }

    // Menampilkan detail penyewa
    public function detailpenyewa($user_plg077)
    {
        $sql = $this->db->prepare("
            SELECT user_plg077, Sandi077, Nik077,
                   nm_lngkp077, no_hp077, almt_lngkp077,
                   ft_ktp, ft_sim_a
            FROM penyewa
            WHERE user_plg077 = ?
        ");

        $sql->bind_param("s", $user_plg077);
        $sql->execute();

        return $sql->get_result()->fetch_assoc();
    }

    // Mengubah data penyewa
    public function UbahDtpenyewa($data)
    {
        $sql = $this->db->prepare("
            UPDATE penyewa SET
                Sandi077 = ?,
                Nik077 = ?,
                nm_lngkp077 = ?,
                no_hp077 = ?,
                almt_lngkp077 = ?,
                ft_ktp = ?,
                ft_sim_a = ?
            WHERE user_plg077 = ?
        ");

        $sql->bind_param(
            "ssssssss",
            $data['Sandi077'],
            $data['Nik077'],
            $data['nm_lngkp077'],
            $data['no_hp077'],
            $data['almt_lngkp077'],
            $data['ft_ktp'],
            $data['ft_sim_a'],
            $data['user_plg077']
        );

        return $sql->execute();
    }

    // Menghapus data penyewa
    public function HapusDtpenyewa($user_plg077)
    {
        $sql = $this->db->prepare("
            DELETE FROM penyewa
            WHERE user_plg077 = ?
        ");

        $sql->bind_param("s", $user_plg077);
        $hasil = $sql->execute();
        $sql->close();

        return $hasil;
    }
}
