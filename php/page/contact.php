<?php



$imgs = array();
$html = '';



$html .= '<div class="grabber" id="contactBody">';
$html .= '<div class="head">';
$html .= '<h1 class="contactHeadder">CONTACT</h1>';
$html .= '<div class="linksHeadder"><!-- <a href="" class="esc" target="_blank">facebook</a>&emsp; --><a href="https://www.instagram.com/gizmo.lab/" class="esc" target="_blank">instagram</a></div>';
$html .= '</div>';
$html .= '<div class="person"><h2 class="team">TEAM</h2><h2>HELENA TODD</h2><p class="first">artist, glass designer,<br>3D fashion design</p><p><a href="https://instagram.com/todd_helena" class="esc" target="_blank">@todd_helena</a><br><a href="mailto:gizmo@gizmo-lab.com" class="esc">gizmo@gizmo-lab.com</a></p></div>';
$html .= '<div class="person"><h2>&nbsp;</h2><h2>ŽIL J. VOSTALOVÁ</h2><p class="first">3D fashion design</p><p><br><a href="https://instagram.com/zil_julie_vostalova" class="esc" target="_blank">@zil_julie_vostalova</a><br><a href="mailto:gizmo@gizmo-lab.com" class="esc">gizmo@gizmo-lab.com</a></p></div>';
$html .= '<div class="person"><h2 class="team">EXTERNISTS</h2><h2>11v151131_m06</h2><p class="first">visual – sound artist</p><p><br><a href="https://instagram.com/11v151131_m06" class="esc" target="_blank">@11v151131_m06</a></p></div>';
$html .= '<div class="person"><h2>&nbsp;</h2><h2>DAVID BABKA</h2><p class="first">3D, animation, digital fashion,<br>graphic design</p><p><a href="https://instagram.com/david.babka" class="esc" target="_blank">@david.babka</a></p></div>';
$html .= '<div class="person"><h2>&nbsp;</h2><h2>JÁCHYM MORAVEC</h2><p class="first">3D environment, animation,<br>graphic design</p><p><a href="https://www.instagram.com/jachym.moravec" class="esc" target="_blank">@jachym.moravec</a></p></div>';
$html .= '<div class="person"><h2>&nbsp;</h2><h2>PAVEL KUJA</h2><p class="first">3D environment, animation,<br>graphic design</p><p><a href="https://www.instagram.com/kuja_pavel" class="esc" target="_blank">@kuja_pavel</a></p></div>';
$html .= '<div class="person"><h2>&nbsp;</h2><h2>MAREK BULÍŘ</h2><p class="first">3D environment, animation,<br>graphic design</p><p><a href="https://www.instagram.com/mrkblr/" class="esc" target="_blank">@mrkblr</a></p></div>';
$html .= '<div class="person"><h2>&nbsp;</h2><h2>ABHISHEK CHAUDHARY</h2><p class="first">sound artist</p><p><a href="https://www.instagram.com/_ma.khee/" class="esc" target="_blank">@_ma.khee</a></p></div>';
$html .= '</div>';



$html = str_replace('"', '\\"', $html);



array_push($imgs, '"/data/logoR.png"');



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
