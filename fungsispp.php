<?php

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_spp");

if(mysqli_connect_errno()){
    echo 'Gagal Koneksi, Informasi Error : '.mysqli_connect_error();
}

    function query($query) {
        global $conn;

        //ambil data dari tabel
        $result = mysqli_query($conn, $query);
        //tampilkan data
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
        // menampung isian dari form
        $tahun = htmlspecialchars($data["tahun"]);
        $nominal = htmlspecialchars($data["nominal"]);

        $query = "INSERT INTO tb_spp VALUES ('',' $tahun',' $nominal')";

        mysqli_query($conn, $query);//jika error perhatikan spasi pada INSERT INTO
        return mysqli_affected_rows($conn);
    }


    function hapus($idspp) {
        global $conn;
        mysqli_query($conn, "DELETE FROM tb_spp WHERE id_spp= $idspp");
        return mysqli_affected_rows($conn);
    }
    
    function ubahspp($data) {
        global $conn;
        // menampung isian dari form
        $idspp = $data["idspp"];
        $tahun = $data["tahun"];
        $nominal = $data["nominal"];
    
        $query = "UPDATE tb_spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp='$idspp'";
    
        mysqli_query($conn, $query);//jika error perhatikan spasi pada INSERT INTO
        return mysqli_affected_rows($conn);
    }


    function caridata($katakunci) {
        
        $query = "SELECT * FROM tb_spp WHERE tahun LIKE '%$katakunci%' OR nominal LIKE '%$katakunci%' ";

        return query($query);

    }


    function tambahuser($data) {
        global $conn;

        $username = strtolower(stripcslashes($data["username"])); //menghindari karakter backslash /
        $pengguna = strtoupper($data["namapetugas"]); //
        $password = mysqli_real_escape_string($conn, $data["password"]); //agar simbol tanda kutip juga bisa tersimpan
        $password1 = mysqli_real_escape_string($conn, $data["password1"]); //agar simbol tanda kutip juga bisa tersimpan
        $level = $data["level"];

        //cek passwor ulang
        if( $password!== $password1 ) 
        {
        echo "<script> alert('konfirmasi password tidak sesuai'); </script>";
        return false;
        }

        //cek apakah username sudah ada atau tidak
        $result = mysqli_query($conn, "SELECT username FROM tb_petugas WHERE username = '$username'");

        if( mysqli_fetch_assoc($result) ) {
            echo "<script> alert('Username sudah ada'); </script>";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //tambahkan userbaru ke database
        mysqli_query($conn, "INSERT INTO tb_petugas VALUES ('', '$username', '$password', '$pengguna', '$level')");
        return mysqli_affected_rows($conn);
    }
?>