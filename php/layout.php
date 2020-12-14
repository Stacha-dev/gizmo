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
    <meta name="keywords" content="3d fashion, fashion, digital, identities, animated catwalk, fashion week, transformer jacket">
    <meta name="description" content="We design 3D apparel, accessories and jewelry.">

    <meta name="robots" content="all">
    <meta name="author" content="Oliver Staša — Developer, Alina Matějová — Grafička">
    <meta name="viewport" content="width=device-width">

    <link rel="icon" href="/data/fav.png">
    <link href="/css/main.css?v=0.9&release=beta" rel="stylesheet">

    <script src="/js/jq.js" type="text/javascript"></script>
    <script src="/js/fce.js?v=0.8&release=beta" type="module"></script>

    <!-- 3d model viewer -->
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script type="module" src="https://unpkg.com/focus-visible@5.1.0/dist/focus-visible.js"></script>
    <!-- /3d model viewer -->

    <!-- google analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176806952-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag(\'js\', new Date());
      gtag(\'config\', \'UA-176806952-1\');
    </script>
    <!-- /google analytics -->

    <meta property="og:image" content="/data/og2.png">

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
