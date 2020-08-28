<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

echo '
<!doctype html>
<html lang="'.$_SESSION['lang'].'">
  <head>
    <meta charset="utf-8">

    <title>GIZMO LAB</title>
    <meta name="keywords" content="3d fashion">
    <meta name="description" content="Gizmo baby 3d fashion">

    <meta name="robots" content="all">
    <meta name="author" content="Oliver Staša — Developer, Alina Matějová — Grafička">
    <meta name="viewport" content="width=device-width">

    <link rel="icon" href="/data/fav.png">
    <link href="/css/main.css?v=0.1" rel="stylesheet">

    <script src="/js/jq.js" type="text/javascript"></script>
    <script src="/js/fce.js?v=0.1" type="module"></script>

    <meta property="og:image" content="'.$og.'">

  </head>
<body>
  <div class="cursor">
    <div id="dot"></div>
    <div id="gizmo">
      <!-- <div id="pyramid"><div class="base"></div><div class="front"></div><div class="back"></div><div class="right"></div><div class="left"></div></div> -->
      <div id="cube"><div id="s2"></div><div id="s5"></div><div id="s6"></div><div id="s3"></div><div id="s4"></div><div id="s1"></div></div>
    </div>
  </div>
</body>
</html>';
