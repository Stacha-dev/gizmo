<?php



$imgs = array();
$html = '';



$text = str_replace(" ", "&nbsp;", '  DIGITAL FASHION       DESIGN VISUALISATION       ANIMATED CATWALK       DIGITAL IDENTITIES  ');
$aktualita = str_replace(" ", "&nbsp;", '  Mercedes Benz Prague Fashion Week       5.—8. 9. 2020 / 13— 21 h       Holečkova 10, Praha 5  ');



$html .= '<div id="logo" class="center fadeup red"></div>';
$html .= '<div id="homebg" class="center"></div>';
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
