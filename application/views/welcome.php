<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TESTCENTER RMUTI</title>
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
  <link href="<?php echo base_url() . 'theme/Bootstrap-4-templates-master/full-page-image-carousel/' ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() . 'theme/Bootstrap-4-templates-master/full-page-image-carousel/' ?>css/mdb.min.css" rel="stylesheet">
  <link href="<?php echo base_url() . 'theme/Bootstrap-4-templates-master/full-page-image-carousel/' ?>css/style.min.css" rel="stylesheet">
  <link href="<?php echo base_url() . 'theme/MDB' ?>/css/mdb.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . 'theme/MDB' ?>/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . 'theme/MDB' ?>/css/mdb.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . 'theme/Fonts' ?>/promt/stylesheet.css" rel="stylesheet" />
</head>
<style>
  .phone {
    font-size: 10pt;
    font-family: 'Prompt';
  }
  .phonebody {
    font-size: 12pt;
    font-family: 'Prompt';
  }
  .phoneimage{
    width: 60pt;
  }
  .desktop {
    font-size: 20pt;
    font-family: 'Prompt';
  }

  .desktopbody {
    font-size: 18pt;
    font-family: 'Prompt';
  }
  .image{
    width: 90pt;
  }
</style>

<link rel="shortcut icon" href="<?php echo base_url() . 'files/rmuti_logo/favicon.png' ?>" type="image/png">

<body>
  <div class="view">
    <video class="video-intro" autoplay loop muted>
      <source class="view jarallax" src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" data-jarallax='{"speed": 0.2}'>
    </video>
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
      <div class="text-center white-text mx-5 wow fadeIn">
        <img id="image" src="files/rmuti_logo/RMUTI_KORAT.png" style="margin:auto;  filter: drop-shadow(0px 2px 2px #222); " alt="RMUTI">
        <br>
        <div id="head" >Program Support Information Technology Testing Centers
          RMUTI.
        </div>
        <div id="body" class="mb-3" >
          <strong>ยินดีต้อนรับสู่โปรแกรมสนับสนุนศูนย์สอบวัดความรู้ด้านเทคโนโลยีสารสนเทศ มทร.อีสาน</strong>
        </div>
        <br>
        <div id="body2" style="color:red">
          <strong>(ยังไม่เปิดให้บริการ)</strong>
        </div>
        <br>
        <a target="" href="<?php echo base_url('home') ?>" class="btn btn-deep-orange waves-effect waves-light"><strong class="h2" style="font-size: 120%;"> เข้าสู่เว็บไซต์</strong>
          <i class="fas fa-graduation-cap ml-2"></i>
        </a>
      </div>
    </div>
  </div>
</body>

</html>
<script>
  var head = document.getElementById("head");
  var body = document.getElementById("body");
  var body2 = document.getElementById("body2");

  var image = document.getElementById("image");

  var size = window.screen.width;
  // console.log(window.screen.width);
  if (size < 1200 && size > 500) {
    head.className = "desktop";
    body.className = "desktopbody";
    body2.className = "desktopbody";
    image.className = "image";
  } else if (size < 500) {
    head.className = "phone";
    body.className = "phonebody";
    body2.className = "phonebody";
    image.className = "phoneimage";
  } else {
    head.className = "desktop";
    body.className = "desktopbody";
    body2.className = "desktopbody";
    image.className = "image";
  }
</script>