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
<h4  align="center"><u>BERITA ACARA SERAH TERIMA BARANG</u></h4>
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

<p align="justify" style="font-weight:font-size: 12px;">
Adapun Barang Yang Diserahkan Sebagai Berikut : 
 <br>
</p>
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
   foreach ($atk as $at) :
   
   

     $isi .='v<tr> 
     <td>'.$at["id_atk"].'</td>  
     <td>'.$at["nama_barang"].'</td>  
     <td>'.$at["merek"].'</td>  
     <td>'.$at["type"].'</td>  
     <td>'.$at["jumlah"].'</td>  
     <td>'.$at["satuan"].'</td>  
   
   
               
     </tr>';
     $i++;
    endforeach;
    

    $isi .='</tbody>
 </table>

    <p align="justify">
<br>
  Demikian Berita Acara Penyerahaan Barang Ini Dibuat Dengan Sebenarnya, Untuk Dipergunakan Seperlunya
</p>


<table>
    <thead>
      <tr>

        <td style="text-align: left; width:450px ">Diserahkan Oleh:<br><b>PIHAK KEDUA,</b></td>
        <td style="text-align: left; ">Medan, '.date("d F Y").'<br><b>PIHAK PERTAMA,</b></td>
        
      </tr>
   
    </thead>
    <tbody>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    </tr>
      <tr>
        <td style="text-align: left;"><b><u>AHMAD RAHMATIKA</u></b></td>
        <td style="text-align: left;"><b><u>DINI INDRIANI, S.E</u></b></td>
      </tr>
    </tbody>
  </table>
  


</body>
</html>';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($isi);
$mpdf->Output();
