<?php
$namafolder="gambar_buku/"; //tempat menyimpan file

include "../conn.php";


if (!empty($_FILES["nama_file"]["tmp_name"]))
{
        $jenis_gambar=$_FILES['nama_file']['type'];
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $th_terbit = $_POST['th_terbit'];
        $penerbit = $_POST['penerbit'];
        $isbn = $_POST['isbn'];
        $kategori = $_POST['kategori'];
        $kode_klas = $_POST['kode_klas'];
        $jumlah_buku = $_POST['jumlah_buku'];
        $lokasi = $_POST['lokasi'];
        $asal = $_POST['asal'];
        $jum_temp = $_POST['jum_temp'];
        $tgl_input = $_POST['tgl_input'];	
        $gambar_full_name = $_FILES["nama_file"]["tmp_name"];
        $id_gambar = $_POST['id'];

        $file_gambar = $_FILES["nama_file"]["tmp_name"];

        // $_FILES['nama_file']['tmp_name'], $gambar)
		
	// if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	// {			
		// $gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($file_gambar,$namafolder.$id_gambar.'.jpg')) {
			$sql="UPDATE data_buku SET judul='$judul', pengarang='$pengarang', th_terbit='$th_terbit', penerbit='$penerbit', isbn='$isbn', kategori='$kategori', kode_klas='$kode_klas', jumlah_buku='$jumlah_buku', lokasi='$lokasi', asal='$asal', jum_temp='$jum_temp', tgl_input='$tgl_input', gambar='$namafolder$id_gambar.jpg' WHERE id='$id'";
			$res=mysqli_query($koneksi,$sql) or die (mysql_error());
			echo "Gambar berhasil dikirim ke direktori".$gambar;
            header('location:buku.php'); 
		} else {
		   echo "<p>Gambar gagal dikirim 1</p>";
		}
  //  } else {
		// echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
  //  }
// } else {
// 	echo "Anda belum memilih gambar";
}

elseif (empty($_FILES["nama_file"]["tmp_name"]))
{
        $jenis_gambar=$_FILES['nama_file']['type'];
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $th_terbit = $_POST['th_terbit'];
        $penerbit = $_POST['penerbit'];
        $isbn = $_POST['isbn'];
        $kategori = $_POST['kategori'];
        $kode_klas = $_POST['kode_klas'];
        $jumlah_buku = $_POST['jumlah_buku'];
        $lokasi = $_POST['lokasi'];
        $asal = $_POST['asal'];
        $jum_temp = $_POST['jum_temp'];
        $tgl_input = $_POST['tgl_input'];   
        // $gambar = $_FILES["nama_file"]["tmp_name"];
        
    // if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
    // {            
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);     
        // if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql2="UPDATE data_buku SET judul='$judul', pengarang='$pengarang', th_terbit='$th_terbit', penerbit='$penerbit', isbn='$isbn', kategori='$kategori', kode_klas='$kode_klas', jumlah_buku='$jumlah_buku', lokasi='$lokasi', asal='$asal', jum_temp='$jum_temp', tgl_input='$tgl_input'  WHERE id='$id'";
            $res=mysqli_query($koneksi,$sql2);
            echo "Gambar berhasil dikirim ke direktori".$gambar;
            header('location:buku.php'); 
        // } else {
        //    echo "<p>Gambar gagal dikirim 2</p>";
        // }
  //  } else {
        // echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
  //  }
} else {
    echo "Anda belum memilih gambar";
}

?>