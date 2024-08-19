<?php
// Tambahan
$page = $_GET['id'];
$nomordok = $_GET['id'];
$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJTSVBEX0FVVEhfU0VSVklDRSIsInN1YiI6IjMyMi4zNDIiLCJleHAiOjE3MjQwODUyOTEsImlhdCI6MTcyMzg2OTI5MSwidGFodW4iOjIwMjQsImlkX3VzZXIiOjMyMiwiaWRfZGFlcmFoIjozNDIsImtvZGVfcHJvdmluc2kiOiI3MiIsImlkX3NrcGQiOjAsImlkX3JvbGUiOjksImlkX3BlZ2F3YWkiOjMyMiwic3ViX2RvbWFpbl9kYWVyYWgiOiJwYWx1In0.YiN0oImOhWJAPAI3VYKTy6MvZkV4yu1E813NOLavB3c';
$urlls = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=LS&status=LS&page=$page&limit=10";
$urlgu = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/index?jenis=GU&status=LS&page=$page&limit=10";
$urldok = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/cetak/$nomordok";
$pagination = 40 ;
// batasan tambahan

//koneksi databse
$servername = "localhost";
$username = "root";
$password = "";
$database = "simelajang2025";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Data Berhasil Ditambahkan";
//batas koneksi database

$curl = curl_init();
$url = "https://service.sipd.kemendagri.go.id/pengeluaran/strict/sp2d/pembuatan/cetak/$nomordok";

curl_setopt_array($curl, array(
  CURLOPT_URL => $urldok,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer $token"
  ),
));

$response = curl_exec($curl);
// $sipd = array($response);
// echo $response;

curl_close($curl);
$dt = json_decode($response, true);
$detail_belanja = $dt["ls"]["detail_belanja"];
$pajak_potongan = $dt["ls"]["pajak_potongan"];

$potongan2 = "INSERT INTO potongan2 (
  status1)VALUES('0')";
$expotongan2= mysqli_query($conn,$potongan2)or die (mysqli_error($conn));

  $sp2d = "INSERT INTO sp2d (
    idhalaman,
    jenis,
    tahun,
    nomor_rekening,
    nama_bank,
    nomor_sp2d,
    tanggal_sp2d,
    nama_skpd,
    nama_sub_skpd,
    nama_pihak_ketiga,
    no_rek_pihak_ketiga,
    nama_rek_pihak_ketiga,
    bank_pihak_ketiga,
    npwp_pihak_ketiga,
    keterangan_sp2d,
    nilai_sp2d,
    nomor_spm,
    tanggal_spm,
    nama_ibu_kota,
    nama_bud_kbud,
    jabatan_bud_kbud,
    nip_bud_kbud
      )Values(
        '$nomordok',
        '".$dt["jenis"]."',
        '".$dt["ls"]["header"]["tahun"]."',
        '".$dt["ls"]["header"]["nomor_rekening"]."',
        '".$dt["ls"]["header"]["nama_bank"]."',
        '".$dt["ls"]["header"]["nomor_sp_2_d"]."',
        '".$dt["ls"]["header"]["tanggal_sp_2_d"]."',
        '".$dt["ls"]["header"]["nama_skpd"]."',
        '".$dt["ls"]["header"]["nama_sub_skpd"]."',
        '".$dt["ls"]["header"]["nama_pihak_ketiga"]."',
        '".$dt["ls"]["header"]["no_rek_pihak_ketiga"]."',
        '".$dt["ls"]["header"]["nama_rek_pihak_ketiga"]."',
        '".$dt["ls"]["header"]["bank_pihak_ketiga"]."',
        '".$dt["ls"]["header"]["npwp_pihak_ketiga"]."',
        '".$dt["ls"]["header"]["keterangan_sp2d"]."',
        '".$dt["ls"]["header"]["nilai_sp2d"]."',
        '".$dt["ls"]["header"]["nomor_spm"]."',
        '".$dt["ls"]["header"]["tanggal_spm"]."',
        '".$dt["ls"]["header"]["nama_ibu_kota"]."',
        '".$dt["ls"]["header"]["nama_bud_kbud"]."',
        '".$dt["ls"]["header"]["jabatan_bud_kbud"]."',
        '".$dt["ls"]["header"]["nip_bud_kbud"]."'
  )";
 $exsp2d= mysqli_query($conn,$sp2d)or die (mysqli_error($conn));

foreach($detail_belanja as $row){
  $belanja = "INSERT INTO belanja1 (
    norekening,
    uraian,
    nilai,
    id_sp2d
  )VALUES (
    '".$row["kode_rekening"]."',
    '".$row["uraian"]."',
    '".$row["jumlah"]."',
    '$nomordok'
  )";
  $exbelanja= mysqli_query($conn,$belanja)or die (mysqli_error($conn));
}

if ($pajak_potongan == null){
echo "<h3>SP2D ini tidak memiliki Potongan</h3>";
}else{
  foreach($pajak_potongan as $row1){
    $potonganpjk = "INSERT INTO potongan2 (
      jenis_pajak,
      nilai_pajak,
      id_potongan,
      ebilling,
    )VALUES (
      '".$row1["nama_pajak_potongan"]."',
      '".$row1["nilai_sp2d_pajak_potongan"]."',
      '$nomordok',
      '".$row1["id_billing"]."'
    )";
    $expotongan = mysqli_query($conn,$potonganpjk)or die (mysqli_error($conn));
  }
}

return redirect('tampilsp2dsipdri')->with('status', 'Data Berhasil diSImpan');

?>
