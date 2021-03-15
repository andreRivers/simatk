<?php

$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => [210, 330],
  'orientation' => 'P'
]);

$isi =
  '<!DOCTYPE html>
<html>
<head>
    <title>Berita acara</title>
</head>

<body>
<h3  align="center">LEMBAGA KESEJAHTERAAN KARYAWAN (LKK) <br>
UNIVERSITAS MUHAMMADIYAH SUMATERA UTARA</h3>
<br>
<h4  align="center"><u>Laporan Permohonan Atk</u></h4>
<br>
<table>
<thead>
  <tr>
    <td style="text-align: left; "><b>Permohonan Pengadaan Dari</b></td>
    <td style="text-align: left; "><b>:</b></td>
    <td style="text-align: left; "><b>'.$tk["username"].'</b></td>
  </tr>
</thead>
<tbody>
  <tr>
   <td style="text-align: left; "><b>Tanggal Permohonan</b></td>
    <td style="text-align: left; "><b>:</b></td>
    <td style="text-align: left; "><b> '.date("d F Y", strtotime($tk["created_at"])).'</b></td>
  </tr>
</tbody>
</table>

 <table border="1" cellpadding="5" cellspacing="0">
   <thead>
     <tr>
       <td><b>ID</b></td>
       <td style="width:200px"><b>Nama Barang</b></td>
       <td style="width:200px"><b>Merek</b></td>
       <td style="width:200px"><b>Tipe</b></td>
       <td><b>Jumlah</b></td>
       <td><b>Satuan</b></td>

     </tr>
   </thead>
   <tbody>';
   $i = 1;
   foreach ($lap as $lp) :
   
   

     $isi .='v<tr> 
     <td>'.$lp["id_lpk"].'</td>  
     <td>'.$lp["nama_barang"].'</td>  
     <td>'.$lp["merek"].'</td>  
     <td>'.$lp["type"].'</td>  
     <td>'.$lp["jumlah"].'</td>  
     <td>'.$lp["satuan"].'</td>  
   
   
               
     </tr>';
     $i++;
    endforeach;
    

    $isi .='</tbody>
 </table>
</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($isi);
$mpdf->Output();
