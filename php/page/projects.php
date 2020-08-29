<?php
session_start();



/*
fce
*/
include '../fce.php';



/*
vars
*/
$imgs = array();
$html = '';
$prjs = '';
$prjSize = 3;
if (isset($_POST['link'])) {
  $id = $_POST['link'];
} else {
  $id = rand(1, $prjSize);
}
if ($id+1 > $prjSize) {
  $nextPrj = 1;
} else {
  $nextPrj = $id+1;
}



// gogogogo
for ($p = 1; $p <= $prjSize; $p++) {
  $prjs .= '<div href="/projects/'.$p.'"';
  if ($p == $id) {
    $prjs .= ' class="selected"';
  }
  $prjs .= '>'.$p.'</div>';
}



/*
projekt 1
*/
switch ($id) {
  case 3:
    $prj_data = [['type' => '3d', 'data' => '/data/data/prj1/1_3d/mikina.glb'],
                 ['type' => 'video', 'data' => '/data/data/prj1/1.mp4'],
                 ['type' => 'img', 'data' => '/data/data/prj1/1.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/2.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/3.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/4.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/5.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/6.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/7.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/8.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/9.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/10.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/11.jpg']];
    $prj_head = '<h1>HFCN</h1>';
    $prj_info_cz = '';
    $prj_info_en = 'Creative collaboration between fashion and graphic design, inspired by space exploration and utopian attempts at reaching outer worlds. Wearable garments reflect our vision of a true adventurer living in the modern world – beyond gender, age or size.<br><br>Fashion Design: Hana Frisonsova<br>Graphic Design: Creative Nights<br>3D Visuals and Animation: Zil J Vostalova';
  break;

  case 2:
    $prj_data = [['type' => '3d', 'data' => '/data/data/prj2/1_3d/PLAST_METAL.glb'],
                 ['type' => 'video', 'data' => '/data/data/prj2/1.mp4'],
                 ['type' => '3d', 'data' => '/data/data/prj2/5_3d/LING_ROZ_4.glb'],
                 ['type' => 'img', 'data' => '/data/data/prj2/1.png'],
                 ['type' => '3d', 'data' => '/data/data/prj2/2_3d/LING_ROZ_5.glb'],
                 ['type' => 'img', 'data' => '/data/data/prj2/2.png'],
                 ['type' => '3d', 'data' => '/data/data/prj2/4_3d/lingerie_roza_300.glb'],
                 ['type' => 'img', 'data' => '/data/data/prj2/3.png'],
                 ['type' => '3d', 'data' => '/data/data/prj2/3_3d/LING_avatar2.glb'],
                 ['type' => 'img', 'data' => '/data/data/prj2/4.png']];
    $prj_head = '<h1>PUT IT ON</h1>';
    $prj_info_cz = 'Instalace PUT IT ON představuje audiovizuální vstup ve formě augmentované reality, čímž vznikají nová propojení obsahu ve fyzickém i virtuálním prostředí. Dematerializovaná módní přehlídka odehrávající se na pomezí různých realit představuje efemérní moment zpřítomnění neviditelného a ilustruje intimní rovinu instalace. Projekt je zaměřen na prezentaci autorských skleněných a kovových oděvů vytvořených u příležitosti výstavy Caution: Contents Hot!.<br><br>Design: Helena Todd<br>Animace: Žil J. Vostalová<br>Hudba: Haruomi Hosono';
    $prj_info_en = 'The installation PUT IT ON represents an audio-visual contribution in the form of augmented reality creating new links between contents in physical and virtual environments. This dematerialized fashion show taking place on the boundary of different realities represents an ephemeral moment of visualizing the invisible and illustrates the intimate level of the installation. The project focuses on presenting author glass and metal clothes created for the occasion of the exhibition Caution: Contents Hot!.<br><br>Motion Design: Helena Todd<br>Animace: Žil J. Vostalová<br>Music: Haruomi Hosono';
  break;

  case 1:
    $prj_data = [['type' => '3d', 'data' => '/data/data/prj3/1_3d/kosile.glb'],
                 ['type' => 'video', 'data' => '/data/data/prj3/1.mp4'],
                 ['type' => 'video', 'data' => '/data/data/prj3/2.mp4'],
                 ['type' => 'video', 'data' => '/data/data/prj3/3.mp4'],
                 ['type' => 'video', 'data' => '/data/data/prj3/4.mp4'],
                 ['type' => 'img', 'data' => '/data/data/prj3/20.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/21.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/22.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/26.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/27.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/28.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/29.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/30.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/31.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/32.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/18.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/19.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/14.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/15.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/16.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/17.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/1.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/2.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/3.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/4.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/5.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/6.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/7.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/8.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/9.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/10.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/11.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/12.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/13.jpg']];
    $prj_head = '<h1>TRANSFORMER JACKET</h1>';
    $prj_info_cz = 'TJ. [that is] a "transformer jacket". The project is a combination of sustainable approach to clothing design and a reflection on over the last phase of the fashion production chain, namely "death of clothing", the final stage decided by the consumer.<br><br>The subject of the collection is a more gentle approach to the production of clothing, which is intended to ensure a new life and function. The form of recycling ensures the continuity of the garment and its further circulation. The standardization, our own manufacturing production, has in our case shifted to a tailoring cut where the creative limitation has become the breadth of the industrial strip from which the cut of the garment is made. The collection is based on the reconstruction of the classic jacket that has become a superfluous article as a result of the mass industrial clothing industry. The aim is to look for new aesthetic features and forms of familiar office uniforms.';
    $prj_info_cz .= '<br><br>RECYCLING.<br>NOWASTE.<br>AFTERLIFE.<br>CRAFT ARTISANAL.<br>OBJECTS.<br><br>The project is a collaboration of Helena Todd and Žil Vostalova. Helena Todd (AAAD, Prague) is inspired by unusual materials that give new meanings in a contrasting symbiosis. Žil Vostalova, a graduate of the AMFI (HvA, Amsterdam), focuses on digital clothing modeling at an early stage of designing and is loyal to the no-waste editing principle.';
    $prj_info_en = 'TJ. [to je] “transformer jacket”. Projekt je kombinací ekologicky udržitelných přístupů ke konstrukci oděvu a zamyšlením se nad poslední fází produkčního řetězce módy a to “smrtí oděvu”, tedy finální fáze o které rozhoduje spotřebitel.<br><br>Námětem kolekce je šetrnejsí přístup k výrobě oděvu, která mu má zajistit nový život a funkci.<br><br>Formou recyklace je zajištěna kontinuita oděvu a jeho další cirkulace. Standardizovanost, vlastní konfekční výrobě, se v našem případe přesunula na pole krejčovského střihu kde se tvůrčím omezením stala šíře průmyslové metráže, ze které střih daného oděvu vychází. Kolekce se odvíjí od rekonstrukce klasickeho saka, které se následkem hromadné průmyslové výroby oděvu, stalo nadbytečným artiklem. Cílem je hledat nové estetické funkce a formy známé office uniformy.';
    $prj_info_en .= '<br><br>RECYCLING.<br>NOWASTE.<br>AFTERLIFE.<br>CRAFT ARTISANAL.<br>OBJECTS.<br><br>Projekt je představením kolaborace Heleny Todd a Žil Vostalové. Helena Todd (AAAD, Prague) je inspirována nevšedními materiály, které v kontrastní symbióze dostavaji nové významy. Žil Vostalová, absolvetnka AMFI (HvA, Amsterdam) se zaměřuje na digitální modelace oděvu v rané fázi navrhování a je věrná střihovému principu no-waste.';
  break;

}



//shuffle($prj_data);
//ksort($prj_data);

for ($i = 0; $i < sizeof($prj_data); $i++) {

  $prj .= '<div class="post">';
  switch ($prj_data[$i]['type']) {
    case 'img':
      $prj .= '<img src="'.$prj_data[$i]['data'].'">';
      array_push($imgs, '"'.$prj_data[$i]['data'].'"');
    break;
    case 'video':
      $prj .= '<video autoplay loop><source src="'.$prj_data[$i]['data'].'" type="video/mp4"></video>';
    break;
    case '3d':
      $prj .= '<model-viewer class="model" src="'.$prj_data[$i]['data'].'" auto-rotate camera-controls></model-viewer>';
    break;
  }
  $prj .= '</div>';

}

$prj .= '<div id="nextProject"><div href="/projects/'.$nextPrj.'" class="navig navigNextProject"><div class="button nextProject">NEXT<br>WORK</div></div></div>';



/*
html setup
*/
//if (!isset($_POST['full']) && !$_POST['full']) {
  $html .= '<div id="projectsBody">';
  $html .= '<div id="listaProjects">'.$prjs.'</div>';
  $html .= '<div id="projectReading"><div class="act close">✖</div><div class="reading grabber">'.lang($prj_info_cz, $prj_info_en).'</div></div>';
  $html .= '<div id="projectAbout">'.$prj_head.'</div><div class="act info">INFO</div>';
  $html .= '<div id="project" class="grabber">';
//}

  $html .= $prj;

//if (!isset($_POST['full']) && !$_POST['full']) {
  $html .= '</div>';
  $html .= '</div>';
//}



$html = str_replace('"', '\\"', $html);



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
