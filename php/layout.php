<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

echo '
<!doctype html>
<html lang="'.$_SESSION['lang'].'">
  <head>
    <meta charset="utf-8">

    <title>GIZ’MO LAB</title>
    <meta name="keywords" content="3d fashion">
    <meta name="description" content="Gizmo baby 3d fashion">

    <meta name="robots" content="all">
    <meta name="author" content="Oliver Staša — Developer, Alina Matějová — Grafička">
    <meta name="viewport" content="width=device-width">

    <link rel="icon" href="/data/fav.png">
    <link href="/css/main.css?v=0.7" rel="stylesheet">

    <script src="/js/jq.js" type="text/javascript"></script>
    <script src="/js/fce.js?v=0.4" type="module"></script>

    <!-- 3d model viewer -->
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script type="module" src="https://unpkg.com/focus-visible@5.1.0/dist/focus-visible.js"></script>
    <!-- /3d model viewer -->

    <meta property="og:image" content="'.$og.'">

  </head>
<body>
  <div class="cursor">
    <div id="dot"></div>
    <div id="gizmo">
      <div id="cube"><div id="s2"></div><div id="s5"></div><div id="s6"></div><div id="s3"></div><div id="s4"></div><div id="s1"></div></div>
    </div>
  </div>
</body>
</html>';
