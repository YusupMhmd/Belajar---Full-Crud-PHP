<?php

require __DIR__.'/vendor/autoload.php';
require 'config/app.php';

use Spipu\Html2Pdf\Html2Pdf;

$data_mahasiswa = select("SELECT * FROM mahasiswa");

$content .= '
<style type="text/css" >
    .gambar{
        width: 50px;
    }
    .yellow-fill{
        background-color: yellow;
        text-align: center;
    }
</style>';

$content .= '
<page>
    <table border="1" align="center">
        <tr class="yellow-fill">
            <th>No</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Foto</th>
        </tr>';

        $no = 1;
        foreach($data_mahasiswa as $mahasiswa){
            $content .= '
                <tr>
                    <td>'.$no++.'</td>
                    <td>'.$mahasiswa['nama'].'</td>
                    <td>'.$mahasiswa['prodi'].'</td>
                    <td>'.$mahasiswa['jk'].'</td>
                    <td>'.$mahasiswa['telepon'].'</td>
                    <td>'.$mahasiswa['email'].'</td>
                    <td><img src="assets/img/'.$mahasiswa['foto'].'" class="gambar"></td>
                </tr>
            ';
        }

$content .= '
    </table>
</page>';

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
ob_start();
$html2pdf->output('Data Mahasiswa.pdf');

?>