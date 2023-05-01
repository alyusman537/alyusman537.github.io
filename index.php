<?php

$pesan = new Pesan();
$request_method=$_SERVER["REQUEST_METHOD"];
if($request_method != 'POST') {
    echo json_encode(['status' => 400, 'pesan' => 'gunakan method post untuk kirim pesan']);
} else {
    $pesan->kirim();
}
