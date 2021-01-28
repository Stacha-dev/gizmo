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



/*
html
*/
$html .= '<div id="adminBody">';
$html .= '<h1>GIZ’MO ADMIN</h1>';
$html .= '<br>';
$html .= '<div class="adminHome" href="/hello">↑</div>';
if ($_SESSION['admin'] == true) {
    $html .= '<div class="logout">logout</div>';

    /*
    page type
    */
    switch ($_POST['page']) {


        // news
        case 'news':

            
            // action type
            switch($_POST['action']) {

                // add to db
                case 'add':
                    $html .= 'adding news';
                break;

                // edit from db
                case 'e':
                    $html .= 'editing news: '.$_POST['id'];
                break;

                // show all news
                default:
                    $html .= '<a href="/admin/news/add">+</a>';
                break;


            } 



        break;


        // default
        default: 
            $html .= '<a href="/admin/news">Aktuality</a>';
        break;

    }


} else {
    $html .= '<form id="loginForm" method="post">';
    $html .= '<input type="text" name="login" placeholder="login"><br>';
    $html .= '<input type="password" name="pass" placeholder="password"><br>';
    $html .= '<input type="submit" value="log in">';
    $html .= '</form>';
}
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
