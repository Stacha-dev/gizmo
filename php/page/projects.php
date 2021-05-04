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
$mobile = false;
$useragent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
  $mobile = true;
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
    $prj_data = [//['type' => '3d', 'data' => '/data/data/prj1/1_3d/mikina.glb', 'preload' => '/data/data/prj1/1_3d/thumb.jpg'],
                 ['type' => '3d', 'data' => '/data/data/prj1/2_3d/mikina6.glb', 'preload' => '/data/data/prj1/2_3d/thumb.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/1.jpg'],
                 //['type' => 'img', 'data' => '/data/data/prj1/2.jpg'],
                 //['type' => 'img', 'data' => '/data/data/prj1/3.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/4.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/5.jpg'],
                 //['type' => 'img', 'data' => '/data/data/prj1/6.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/7.jpg'],
                 //['type' => 'img', 'data' => '/data/data/prj1/8.jpg'],
                 //['type' => 'img', 'data' => '/data/data/prj1/9.jpg'],
                 //['type' => 'img', 'data' => '/data/data/prj1/10.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj1/11.jpg'],
                 ['type' => 'video', 'data' => '/data/data/prj1/1.mp4']];
    $prj_head = '<h1>HFCN</h1>';
    $prj_info_cz = '';
    $prj_info_en = 'Creative collaboration between fashion and graphic design, inspired by space exploration and utopian attempts at reaching outer worlds. Wearable garments reflect our vision of a true adventurer living in the modern world – beyond gender, age or size.<br><br>Fashion Design: Hana Frisonsova<br>Graphic Design: Creative Nights<br>3D Visuals and Animation: Zil J Vostalova';
  break;

  case 2:
    $prj_data = [['type' => '3d', 'data' => '/data/data/prj2/4_3d/lingerie_roza_300.glb', 'preload' => '/data/data/prj2/4_3d/thumb.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj2/1.png'],
                 ['type' => 'img', 'data' => '/data/data/prj2/2.png'],
                 ['type' => 'img', 'data' => '/data/data/prj2/3.png'],
                 ['type' => 'img', 'data' => '/data/data/prj2/4.png'],
                 ['type' => 'video', 'data' => '/data/data/prj2/1.mp4']
                 //['type' => '3d', 'data' => '/data/data/prj2/1_3d/PLAST_METAL.glb', 'preload' => '/data/data/prj2/1_3d/thumb.jpg'],
                 //['type' => '3d', 'data' => '/data/data/prj2/5_3d/LING_ROZ_4.glb', 'preload' => '/data/data/prj2/2_3d/thumb.jpg'],
                 //['type' => '3d', 'data' => '/data/data/prj2/2_3d/LING_ROZ_5.glb', 'preload' => '/data/data/prj2/3_3d/thumb.jpg'],
                 //['type' => '3d', 'data' => '/data/data/prj2/3_3d/LING_avatar2.glb', 'preload' => '/data/data/prj2/5_3d/thumb.jpg'],
                 ];
    $prj_head = '<h1>PUT IT ON</h1>';
    $prj_info_cz = 'Instalace PUT IT ON představuje audiovizuální vstup ve formě augmentované reality, čímž vznikají nová propojení obsahu ve fyzickém i virtuálním prostředí. Dematerializovaná módní přehlídka odehrávající se na pomezí různých realit představuje efemérní moment zpřítomnění neviditelného a ilustruje intimní rovinu instalace. Projekt je zaměřen na prezentaci autorských skleněných a kovových oděvů vytvořených u příležitosti výstavy Caution: Contents Hot!.<br><br>Design: Helena Todd<br>Animace: Žil J. Vostalová<br>Hudba: Haruomi Hosono';
    $prj_info_en = 'The installation PUT IT ON represents an audio-visual contribution in the form of augmented reality creating new links between contents in physical and virtual environments. This dematerialized fashion show taking place on the boundary of different realities represents an ephemeral moment of visualizing the invisible and illustrates the intimate level of the installation. The project focuses on presenting author glass and metal clothes created for the occasion of the exhibition Caution: Contents Hot!.<br><br>Motion Design: Helena Todd<br>Animace: Žil J. Vostalová<br>Music: Haruomi Hosono';
  break;

  case 1:
    $prj_data = [['type' => '3d', 'data' => '/data/data/prj3/2_3d/satykriz_quads.glb', 'preload' => '/data/data/prj3/2_3d/thumb.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/29.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/27.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/28.jpg'],
                 
                 ['type' => 'video', 'data' => '/data/data/prj3/1.mp4'],
                 ['type' => 'video', 'data' => '/data/data/prj3/3.mp4'],

                 ['type' => 'img', 'data' => '/data/data/prj3/22.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/20.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/18.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/19.jpg'],
                 
                 //['type' => 'video', 'data' => '/data/data/prj3/2.mp4'],
                 //['type' => 'video', 'data' => '/data/data/prj3/4.mp4'],
                 ['type' => 'img', 'data' => '/data/data/prj3/21.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/26.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/30.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/31.jpg'],
                 ['type' => 'img', 'data' => '/data/data/prj3/32.jpg'],
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
      if (!$mobile) {
        $prj .= '<video loop><source src="'.$prj_data[$i]['data'].'" type="video/mp4"></video>';
      }
    break;
    case '3d':
      $prj .= '<model-viewer class="model" src="'.$prj_data[$i]['data'].'" loading="eager" auto-rotate camera-controls poster="'.$prj_data[$i]['preload'].'"></model-viewer>';
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
