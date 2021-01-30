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
$status = '';



/*
html
*/
$html .= '<div id="adminBody">';
$html .= '<h1>GIZ’MO: <a href="/admin">ADMIN ↓</a></h1>';
$html .= '<br>';
$html .= '<div class="adminHome" href="/hello">↑</div>';
if ($_SESSION['admin'] == true) {


    // sql
    $conn = sqlConn();

    

    $html .= '<div class="logout">logout</div>';



    $page = isset($_POST['page']) ? $_POST['page'] : 'menu';
    /*
    page type
    */
    switch ($page) {


        // news
        case 'news':

            
            // action type
            switch($_POST['action']) {

                // add to db
                case 'add':

                    if (isset($_POST['text']) && isset($_POST['text_en']) && isset($_POST['from']) && isset($_POST['to'])) {
                    
                        // add to db
                        $sql = 'INSERT INTO news(txt, txt_en, od, do) VALUES ("'.$_POST['text'].'", "'.$_POST['text_en'].'", "'.$_POST['ftom'].'", "'.$_POST['to'].'")';
                        if (mysqli_query($conn, $sql)) {
                            $status = 'success';
                            $html .= 'přidáno!<br><a href="/admin/news">[ok]</a>';
                        } else {
                            $status = 'error';
                            $html .= 'error: '.mysqli_error($conn).'<br>nepovedlo se!<br><a href="/admin/news/add">[zpět]</a>';
                            $html .= 'txt = "'.$_POST['text'].'", txt_en = "'.$_POST['text_en'].'", od = "'.$_POST['from'].'", do = "'.$_POST['to'].'" WHERE id = '.$_POST['id'];
                        }

                    } else {

                        // form
                        $html .= '<form method="post" id="aktualitaForm">';
                        $html .= 'Text [cz]: <input type="text" placeholder="text cz" name="text" maxlength="250"><br>';
                        $html .= 'Text [en]: <input type="text" placeholder="text en" name="text_en" maxlength="250"><br>';
                        $html .= 'Od kdy: <input type="date" name="dateFrom"><br>';
                        $html .= 'Do kdy: <input type="date" name="dateTo"><br>';
                        $html .= '<input type="submit" name="Přidat">';
                        $html .= '</form>';

                    }

                break;

                // edit from db
                case 'e':
                    
                    if (isset($_POST['id']) && isset($_POST['text']) && isset($_POST['text_en']) && isset($_POST['from']) && isset($_POST['to'])) {
                    
                        // update in db
                        $sql = 'UPDATE news SET txt = "'.$_POST['text'].'", txt_en = "'.$_POST['text_en'].'", od = "'.$_POST['from'].'", do = "'.$_POST['to'].'" WHERE id = '.$_POST['id'];
                        if (mysqli_query($conn, $sql)) {
                            $status = 'success';
                            $html .= 'upraveno!<br><a href="/admin/news">[ok]</a>';
                        } else {
                            $status = 'error';
                            $html .= 'error: '.mysqli_error($conn).'<br>nepovedlo se!<br><a href="/admin/news/e/'.$_POST['id'].'">[zpět]</a>';
                        }

                    } else if (isset($_POST['id'])) {
                        
                        // sql
                        $sql = 'SELECT * FROM news WHERE id = "'.$_POST['id'].'"';
                        // run sql
                        $ress = mysqli_query($conn, $sql);
                        // if there is any result
                        if (mysqli_num_rows($ress) > 0) {

                            // fetch data to object
                            $news = mysqli_fetch_array($ress);
                            // form
                            $html .= '<form method="post" id="aktualitaForm" idnews="'.$news['id'].'">';
                            $html .= 'Text [cz]: <input type="text" placeholder="text cz" name="text" maxlength="250" value="'.$news['txt'].'"><br>';
                            $html .= 'Text [en]: <input type="text" placeholder="text en" name="text_en" maxlength="250" value="'.$news['txt_en'].'"><br>';
                            $html .= 'Od kdy: <input type="date" name="dateFrom" value="'.$news['od'].'"><br>';
                            $html .= 'Do kdy: <input type="date" name="dateTo" value="'.$news['do'].'"><br>';
                            $html .= '<input type="submit" value="Upravit">';
                            $html .= '</form>';

                        } else {
                            $html .= 'error: no result';
                        }

                    } else {
                        $html .= 'error: no id';
                    }

                break;
                
                // delete from db
                case 'del':
                    
                    // when id
                    if ($_POST['id']) {

                        // delete from db
                        $sql = 'DELETE FROM news WHERE id = "'.$_POST['id'].'"';
                        if (mysqli_query($conn, $sql)) {
                            $status = 'success';
                            $html .= 'smazáno!<br><a href="/admin/news">[zpět]</a>';
                        } else {
                            $status = 'error';
                            $html .= 'error: '.mysqli_error($conn).'<br>nepovedlo se!<br><a href="/admin/news">[zpět]</a>';
                        }

                    } else {
                        $html .= 'error: no id';
                    }

                break;

                // show all news
                default:

                    $html .= '<a href="/admin/news/add">[+]</a><br>';
                    
                    // set sql
                    $sql = 'SELECT * FROM news ORDER BY od DESC';
                    
                    // run sql
                    $ress = mysqli_query($conn, $sql);
                    // if there is any result
                    if (mysqli_num_rows($ress) > 0) {

                        // head
                        $html .= '<table>';
                        $html .= '<tr><td>text</td><td>od</td><td>do</td><td>[akce]</td></tr>';
                        // fetch data to object and list them
                        while ($news = mysqli_fetch_array($ress)) {
                            $html .= '<tr><td>'.$news['txt'].'</td><td>'.$news['od'].'</td><td>'.$news['do'].'</td><td><a href="/admin/news/e/'.$news['id'].'">[e]</a> <a href="/admin/news/del/'.$news['id'].'" class="del">[×]</a></td></tr>';
                        }
                        $html .= '</table>';

                    } else {
                        $html .= '<i>žádné aktuality</i>';
                    }

                break;


            } 



        break;


        // default = menu
        default: 

            $html .= '<a href="/admin/news">Aktuality</a>';

        break;

    }



// if not logged in
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
  "imgs": ['.join(',', $imgs).'],
  "status": "'.$status.'"
}
';
