<?php



$imgs = array();
$html = '';



$html .= '<div class="grabber" id="aboutBody">';
$html .= '<h1>GIZ’MO LAB</h1><br>';
$html .= '<p>Tvoříme oděv, doplňky a šperky digitálně.</p>';
$html .= '<p>Digitální 3d model má fotorealistickou podobu, rychleji cestuje a nabízí možnost přesahů do AR, VR, MR, CR a XR.</p>';
$html .= '<p>Vybrané modely se dají libovolně barevně či střihově upravovat a vyhotovit v reálné podobě a stát se tak součástí vašeho šatníku.</p>';
$html .= '<p>Platforma se zabývá prezentací produktu ve 3D, online identitou a vývojem digitálního fittingu.</p>';
$html .= '<p>Nabízíme službu zhotovit 3D model ze skeče nebo střihu, tvoříme digitální catwalk a produktová videa komunikující koncept.</p><br>';
$html .= '<p class="action">Kontaktujte nás na gizmo@gizmo-lab.com</p>';
$html .= '</div>';



$html = str_replace('"', '\\"', $html);



array_push($imgs, '"/data/img/1.png"');
array_push($imgs, '"/data/img/2.png"');



/*
output JSON
*/
echo '
{
  "headder": "about",
  "html": "'.$html.'",
  "imgs": ['.join(',', $imgs).']
}
';
