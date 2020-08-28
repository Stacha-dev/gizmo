<?php



$imgs = array();
$html = '';



$html .= '<div id="projectsBody">';
$html .= '';
$html .= '</div>';



$html = str_replace('"', '\\"', $html);



array_push($imgs, '"/data/img/1.png"');
array_push($imgs, '"/data/img/2.png"');



/*
output JSON
*/
echo '
{
  "headder": "projects",
  "html": "'.$html.'",
  "imgs": ['.join(',', $imgs).']
}
';
