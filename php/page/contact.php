<?php



$imgs = array();
$html = '';



$html .= '<div class="grabber" id="contactBody">';
$html .= '<div class="head">';
$html .= '<h1 class="contactHeadder">CONTACT</h1>';
$html .= '<div class="linksHeadder"><a href="" class="esc" target="_blank">facebook</a>&emsp;<a href="" class="esc" target="_blank">instagram</a></div>';
$html .= '</div>';
$html .= '<div class="person"><h2 class="team">TEAM</h2><h2>HELENA TODD</h2><p class="first">artist, glass designer,<br>3D fashion design</p><p><a href="https://instagram.com/todd_helena" class="esc" target="_blank">@todd_helena</a></p></div>';
$html .= '<div class="person"><h2>&nbsp;</h2><h2>ŽIL J. VOSTALOVÁ</h2><p class="first">3D fashion design</p><p><br><a href="https://instagram.com/zil_julie_vostalova" class="esc" target="_blank">@zil_julie_vostalova</a></p></div>';
$html .= '<div class="person"><h2 class="team">EXTERNISTS</h2><h2>11v151131_m06</h2><p class="first">visual – sound artist</p><p><br><a href="https://instagram.com/11v151131_m06" class="esc" target="_blank">@11v151131_m06</a></p></div>';
$html .= '<div class="person"><h2>&nbsp;</h2><h2>DAVID BABKA</h2><p class="first">3D, animation, digital fashion,<br>graphic design</p><p><a href="https://instagram.com/david.babka" class="esc" target="_blank">@david.babka</a></p></div>';
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
