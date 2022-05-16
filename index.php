<?php
//error_reporting(0);
//
//function file_get_contents_curl($url)
//{
//    $ch = curl_init();
//
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_URL, $url);
//
//    $data = curl_exec($ch);
//    curl_close($ch);
//
//    return $data;
//}
//
//function enregistreimg()
//{
//    $url = "https://tiles.telegeography.com/maps/submarine-cable-map-2015/2/";
//    for ($i = 0; $i < 4; $i++) {
//        for ($j = 0; $j < 4; $j++) {
//            $urlImg = $url . $j . '/' . $i . '.png';
//            $data = file_get_contents_curl($urlImg);
//
//            if (!is_dir('images/img' . $i)) {
//                mkdir('images/img-' . $i);
//            }
//            $fp = 'images/img-' . $i . '/logo-' . $i . '-' . $j . '.png';
//
//            file_put_contents($fp, $data);
//        }
//    }
//}

function downloadImg()
{

    $dest = imagecreatetruecolor(16384, 16384);
    for ($i = 0; $i <= 63; $i++) {
        print_r($i . 'commence');
        for ($j = 0; $j <= 63; $j++) {
            $url = 'https://tiles.telegeography.com/maps/submarine-cable-map-2015/6/' . $i . '/' . $j . '.png';
            $image = imagecreatefrompng($url);
            imagecopymerge($dest, $image, (256 * $i), (256 * $j), 0, 0, imagesx($image), imagesy($image), 100);
        }
        print_r($i . 'termine');
    }
    imagepng($dest, 'img/final/final.png');
}

downloadImg();
//echo '<img src="img/final/final.png" alt="" />'
?>