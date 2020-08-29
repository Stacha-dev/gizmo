<?php
/*
fce
*/
include '../fce.php';



/*
vars
*/
$imgs = array();
$html = '';
$cz = '';
$en = '';



/*
html
*/
$cz .= '<p><u>Tvoříme oděv, doplňky&nbsp;a šperky digitálně</u> a&nbsp;máme v&nbsp;tom dlouholeté zkušenosti. Digitální 3D&nbsp;model nabízí možnost přesahů do&nbsp;zprostředkované reality (AR), virtuální reality VR, smíšené reality (MR), Cinematic Reality (CR) a&nbsp;Extended Reality (XR). Vybrané modely se dají libovolně barevně či střihově upravovat a&nbsp;vyhotovit v&nbsp;reálné podobě a&nbsp;stát se tak součástí vašeho šatníku.</p>';
$cz .= '<p>Nabízíme službu zhotovit <u>3D model</u> ze&nbsp;skeče nebo střihu. Tvoříme <u>produktová videa</u> komunikující koncept a&nbsp;<u>digitální módní přehlídky</u> (mohou sloužit při konstrukci oděvu při tzv. fittingu nebo jako finální prezentace produktu).</p>';
$cz .= '<p class="action">Kontaktujte nás na <a href="mailto:gizmo@gizmo-lab.com" class="esc">gizmo@gizmo-lab.com</a></p>';

$en .= '<p><u>We design 3D apparel, accessories and jewelry</u> and we have years of experience in this field. The digital 3d model overlaps with Augmented Reality (AR), Virtual Reality (VR), Mixed Reality (MR), Cinematic Reality (CR) and Extended reality (XR) and its possibilities. 3D models can be easily modified in shape, color and serve for presentation or be custom made on demand and become part of your wardrobe.</p>';
$en .= '<p>We offer a service to visualize a <u>3D model</u> from a sketch or pattern reference. We deliver <u>product videos</u> communicating concept (for a final phase), <u>digital catwalks</u> (for development phase or final presentation).</p><br>';
$en .= '<p class="action">Contact us at <a href="mailto:gizmo@gizmo-lab.com" class="esc">gizmo@gizmo-lab.com</a></p>';

$html .= '<div class="grabber" id="aboutBody">';
$html .= '<h1>GIZ’MO LAB</h1>';
$html .= lang($cz, $en);
$html .= '</div>';



$html = str_replace('"', '\\"', $html);



array_push($imgs, '"/data/logoB.png"');



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
