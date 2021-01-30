<?php



/*
fce
*/
include '../fce.php';



$imgs = array();
$html = '';
$conn = sqlConn();
$dnes = date("Y-m-d");



// get aktualitu
$sql = 'SELECT * FROM news WHERE od <= "'.$dnes.'" AND do >= "'.$dnes.'" ORDER BY RAND() LIMIT 1';
// run sql
$ress = mysqli_query($conn, $sql);
// if there is any result
if (mysqli_num_rows($ress) > 0) {

    // fetch data to object
    $news = mysqli_fetch_array($ress);
    
    $aktualita = '&nbsp;&nbsp;'.str_replace(" ", "&nbsp;", lang($news['txt'], $news['txt_en'])).'&nbsp;&nbsp;';

}



$text = str_replace(" ", "&nbsp;", '  DIGITAL FASHION       DESIGN VISUALISATION       ANIMATED CATWALK       DIGITAL IDENTITIES  ');
//$aktualita = str_replace(" ", "&nbsp;", '  Mercedes Benz Prague Fashion Week       5.—8. 9. 2020 / 13—21 h       Holečkova 10, Praha 5  ');



$html .= '<div id="logo" class="center fadeup red"></div>';
$html .= '<div id="homebg" class="center"><video autoplay loop muted class="center"><source src="/data/intro'.rand(1,2).'.mp4" type="video/mp4"></video></div>';
$html .= '<div id="patka">©GIZ’MO LAB '.date('Y').'</div>';
if ($text) {
  $html .= '<div id="lista" class="textSlider hidden">'.$text.'</div>';
}
if ($aktualita) {
  $html .= '<div id="aktuality" class="textSlider hidden">'.$aktualita.'</div>';
}



$html = str_replace('"', '\\"', $html);



array_push($imgs, '"/data/logoR.png"');
array_push($imgs, '"/data/logoG.png"');
array_push($imgs, '"/data/logoB.png"');



/*
output JSON
*/
echo '
{
  "headder": "home",
  "html": "'.$html.'",
  "imgs": ['.join(',', $imgs).']
}
';
