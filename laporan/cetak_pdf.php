
<?php
include "../config/koneksi.php";
include "../config/dataset.php";
require '../vendor/autoload.php';
use Dompdf\Dompdf;



if (!$idn) {
    die("Query gagal: " . mysqli_error($conn));
}

$html = '<h3>Laporan Nilai Siswa SMK</h3><table border="1" width="100%"
cellspacing="0">
<tr><th>Nama</th><th>Jurusan</th><th>Mapel</th><th>Nilai</th><th>Semester</th
></tr>';

while ($row = mysqli_fetch_array($idn)) {
    $html .= '<tr>
    <td>'.$row['nama'].'</td>
    <td>'.$row['nama_jurusan'].'</td>
    <td>'.$row['mapel'].'</td>
    <td>'.$row['nilai_angka'].'</td>
    <td>'.$row['semester'].'</td>
    </tr>';
}

$html .= "</table>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("lana.pdf");

echo $html;

?>