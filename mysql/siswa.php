<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
</head>
<body>
    <form action="" method="get">
        <input type="search" name="cari" id="">
        <input type="submit" value="Cari">
    </form>
    <a href="create-siswa.php"><button>tambah siswa</button></a>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NISN</th>
            <th>NAMA</th>
            <th>JENIS KELAMIN</th>
            <th>ALAMAT</th>
            <th>NO HP</th>
            <th>AKSI</th>
        </tr>
        <?php 
        include "koneksi.php";
        if(isset($_GET['cari'])){
            $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
            $sql = "SELECT * FROM siswa WHERE nisn='$cari' OR nama='$cari'";
        } else {
            $sql = "SELECT * FROM siswa";
        }

        
        $query = mysqli_query($koneksi, $sql);
        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nisn']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['jk'] == 'l' ? 'Laki-Laki' : 'Perempuan'; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['nohp']; ?></td>
            <td>
                <a href="delete_siswa.php?nisn=<?=$data['nisn']?>">
                    <button>Hapus</button>
                </a>
            </td>
        </tr>
        <?php 
    } 
    ?>
    </table>
</body>
</html>

