<?php

class Pesan
{
    public function kirim()
    {
        $arrcheckpost = array('nomor' => '', 'pesan' => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {

            $nomor = '$_POST[nomor]';
            $pesan = '$_POST[pesan]';

            $curl = curl_init();
            $tokenFonnte = getenv('TOKEN_FONNTE');
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $nomor,
                    'message' => $pesan,
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: xXokDN@XKNy8k1v0suzx',
                    // `Authorization: '.$tokenFonnte.'` //change TOKEN to your actual token
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            //    return $response;
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Pesan gagal terkirim',
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
