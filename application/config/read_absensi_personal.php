<?php
include_once "connect.php";

    class usr{}
    
    $id_pegawai = $_POST["id_pegawai"];
   
    
    $query = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
    
    $row = mysqli_fetch_array($query);
    
    if (!empty($row)){
        $response = new usr();
        $response->success = 1;
        
        $response->id_pegawai = $row['id_pegawai'];
        $response->nama = $row['nama'];
        $response->ttl = $row['ttl'];
        $response->alamat = $row['alamat'];
        $response->success = 1;
        $response->email = $row['email'];
        $response->no_tlp = $row['no_tlp'];
        $response->jabatan = $row['jabatan'];
        $response->username = $row['username'];
        $response->image = $row['image'];
        die(json_encode($response));
        
    } else { 
        $response = new usr();
        $response->success = 0;
        $response->message = "tidak ada";
        die(json_encode($response));
    }
    
    mysqli_close($conn);
?>