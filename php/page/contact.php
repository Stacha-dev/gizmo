<?php



$imgs = array();
$html = '';



$html .= '<div class="grabber" id="contactBody">';
$html .= '<div class="head">';
$html .= '<h1 class="contactHeadder">CONTACT</h1>';
$html .= '<div class="linksHeadder"><a href="" class="esc" target="_blank">facebook</a> <a href="" class="esc" target="_blank">instagram</a></div>';
$html .= '</div>';
$html .= '<div class="person"><h2>HELENA TODD</h2><p>Česká designérka, která ráda experimentuje s neobvyklými kombinacemi materiálů a forem. Na první pohled antagonicky působící prvky jako celek vytvářejí kompoziční i významové napětí. Různorodé textury a povahy všedních materiálů protíná čistá linie, která se prolíná její rozmanitou tvorbou. Dialog různorodých tvarů, struktur a kombinací materiálů může na diváka působit až avantgardně-surrealistickým dojmem. Důležitou součástí její tvorby je důraz na užitnou funkčnost.</p><p><a href="" class="esc" target="_blank">www.helenatodd.me</a> / htodd@seznam.cz</p></div>';
$html .= '<div class="person"><h2>ŽIL JULIE VOSTALOVÁ</h2><p>Módní designérka, která ve své tvorbě ráda propojuje realitu s digitálním světem, což vyjadřuje i její koncept PhyGital Fashion. Nové technologie využívá k naplnění konceptu udržitelnosti a minimalizace odpadu. Několik let studovala a úspěšně působila v Holandsku, nyní žije v České republice. Zastává názor, že kromě kreativní tvorby je potřeba přicházet s inovacemi, které pomohou snížit dopady módního průmyslu na životní prostředí.</p><p><a href="" class="esc" target="_blank">www.zilvostalova.com</a> / zil@zilvostalova.com</p></div>';
$html .= '<div class="person">DSADSADSADASDSADADS</div>';
$html .= '<div class="person">DSADSADSADASDSADADS</div>';
$html .= '<div class="person">DSADSADSADASDSADADS</div>';
$html .= '</div>';



$html = str_replace('"', '\\"', $html);



array_push($imgs, '"/data/img/2.png"');
array_push($imgs, '"/data/img/1.png"');



/*
output JSON
*/
echo '
{
  "headder": "contact",
  "html": "'.$html.'",
  "imgs": ['.join(',', $imgs).']
}
';
