<html>
<head>
  <title>GIZMO LAB</title>
  <style>
  @font-face {font-family: "FK"; src: url("/data/FKRomanDisplay-Medium.woff2");}
  ::selection {background: rgb(0, 255, 0);}
  a, a:visited {color: blue;}
  a:hover {color: red;}
  html, body {padding: 0; margin: 0; font-family: "FK", monospace; background: white; /* animation: breathe 24s infinite linear; animation-delay: <?php echo (rand(1,3)*(-8)); ?>s; */}
  .g {position: absolute; top: 50%; left: 50%; font-weight: bold; transform: translate(-50%, -50%); animation: rotator infinite linear; font-size: 5vh;}
    #g1 {animation-duration: <?php echo (rand(200,800)/100); ?>s; animation-delay: <?php echo (rand(500,800)*(-1)/100); ?>s;}
    #g2 {animation-duration: <?php echo (rand(200,800)/100); ?>s; animation-delay: <?php echo (rand(500,800)*(-1)/100); ?>s; color: rgb(255, 0, 0); mix-blend-mode: multiply;}
    #g3 {animation-duration: <?php echo (rand(200,800)/100); ?>s; animation-delay: <?php echo (rand(500,800)*(-1)/100); ?>s; color: rgb(0, 255, 0); mix-blend-mode: multiply;}
    #g4 {animation-duration: <?php echo (rand(200,800)/100); ?>s; animation-delay: <?php echo (rand(500,800)*(-1)/100); ?>s; color: rgb(0, 0, 255); mix-blend-mode: multiply;}
  #host {position: absolute; bottom: 0; right: 0; padding: 1vh;}
    @keyframes rotator {
      0% {transform: translate(-50%, -50%) rotate3d(1, 1, 1, 0deg);}
      50% {transform: translate(-50%, -50%) rotate3d(1, 2, -1, 180deg);}
      100% {transform: translate(-50%, -50%) rotate3d(1, 1, 1, 360deg);}
    }
    @keyframes breathe {
      0% {background: rgb(255, 0, 0); color: black;}
      30% {background: rgb(255, 0, 0); color: black;}
      33% {background: rgb(0, 255, 0); color: black;}
      63% {background: rgb(0, 255, 0); color: black;}
      66% {background: rgb(0, 0, 255); color: white;}
      97% {background: rgb(0, 0, 255); color: white;}
      100% {background: rgb(255, 0, 0); color: black;}
    }
  </style>
</head>
<body>
<!--<div class="g" id="g1">Gizmo-lab.com</div>-->
<div class="g" id="g2">Gizmo-lab.com</div>
<div class="g" id="g3">Gizmo-lab.com</div>
<div class="g" id="g4">Gizmo-lab.com</div>
<div id="host">in development at <a href="https://stacha.dev">stacha.dev</a> and <a href="https://alinarandom.tumblr.com/">alinarandom</a></div>
</body>
</html>
