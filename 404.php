<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>REFACCIONARIA ARBOLEDAS | 404</title>
</head>

<body>
  <div class="container">
    <div id="clouds overflow-hidden">
      <div class="cloud x1"></div>
      <div class="cloud x1_5"></div>
      <div class="cloud x2"></div>
      <div class="cloud x3"></div>
      <div class="cloud x4"></div>
      <div class="cloud x5"></div>
    </div>
    <div class='c'>
      <img src="assets/media/img/LogoBlanco.png" alt="Refaccionaria Arboledas" width="20%" height="!00%" onContextMenu='return false;' draggable='false'>
      <br>
      <div class='_404 mb-3'><b>404</b></div>
      <div class='_1 mb-2'><b>LA PÁGINA</b></div>
      <div class='_2 mb-2'>NO SE ENCONTRÓ</div>
      <br>
      <a class='btn_404' href='index'>REGRESAR A ARBOLEDAS</a>
    </div>
  </div>
</body>

</html>

<style>
  .hit-the-floor {
    color: #fff;
    font-size: 12em;
    font-weight: bold;
    font-family: Helvetica;
    text-shadow:
      0 1px 0 #ccc,
      0 2px 0 #c9c9c9,
      0 3px 0 #bbb,
      0 4px 0 #b9b9b9,
      0 5px 0 #aaa,
      0 6px 1px rgba(0, 0, 0, .1),
      0 0 5px rgba(0, 0, 0, .1),
      0 1px 3px rgba(0, 0, 0, .3),
      0 3px 5px rgba(0, 0, 0, .2),
      0 5px 10px rgba(0, 0, 0, .25),
      0 10px 10px rgba(0, 0, 0, .2),
      0 20px 20px rgba(0, 0, 0, .15);
  }

  .hit-the-floor {
    text-align: center;
  }

  body {

    background: var(--bs-dark);
  }

  body {

    background: var(--bs-dark);
    color: #fff;
    font-family: 'Open Sans', sans-serif;
    max-height: 700px;
    overflow: hidden;
  }

  .c {
    text-align: center;
    display: block;
    position: relative;
    width: 80%;
    margin: 100px auto;
  }

  ._404 {
    font-size: 6rem;
    position: relative;
    display: inline-block;
    z-index: 2;
    letter-spacing: .5rem;
  }

  ._1 {
    text-align: center;
    display: block;
    position: relative;
    letter-spacing: 0.4rem;
    font-size: 3rem;
    line-height: 80%;
  }

  ._2 {
    text-align: center;
    display: block;
    position: relative;
    font-size: 1.7rem;
  }

  .btn_404 {
    background-color: rgb(255, 255, 255);
    position: relative;
    display: inline-block;
    width: 358px;
    padding: 5px;
    z-index: 5;
    font-size: 1.5rem;
    margin: 0 auto;
    color: #000000;
    text-decoration: none;
    margin-right: 10px
  }

  .right {
    float: right;
    width: 60%;
  }

  .cloud {
    width: 350px;
    height: 120px;

    background: #FFF;
    background: linear-gradient(top, #FFF 100%);
    background: -webkit-linear-gradient(top, #FFF 100%);
    background: -moz-linear-gradient(top, #FFF 100%);
    background: -ms-linear-gradient(top, #FFF 100%);
    background: -o-linear-gradient(top, #FFF 100%);

    border-radius: 100px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;

    position: absolute;
    margin: 120px auto 20px;
    z-index: -1;
    transition: ease 1s;
  }

  .cloud:after,
  .cloud:before {
    content: '';
    position: absolute;
    background: #FFF;
    z-index: -1
  }

  .cloud:after {
    width: 100px;
    height: 100px;
    top: -50px;
    left: 50px;

    border-radius: 100px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
  }

  .cloud:before {
    width: 180px;
    height: 180px;
    top: -90px;
    right: 50px;

    border-radius: 200px;
    -webkit-border-radius: 200px;
    -moz-border-radius: 200px;
  }

  .x1 {
    top: -50px;
    left: 100px;
    -webkit-transform: scale(0.3);
    -moz-transform: scale(0.3);
    transform: scale(0.3);
    opacity: 0.9;
    -webkit-animation: moveclouds 15s linear infinite;
    -moz-animation: moveclouds 15s linear infinite;
    -o-animation: moveclouds 15s linear infinite;
  }

  .x1_5 {
    top: -80px;
    left: 250px;
    -webkit-transform: scale(0.3);
    -moz-transform: scale(0.3);
    transform: scale(0.3);
    -webkit-animation: moveclouds 17s linear infinite;
    -moz-animation: moveclouds 17s linear infinite;
    -o-animation: moveclouds 17s linear infinite;
  }

  .x2 {
    left: 250px;
    top: 30px;
    -webkit-transform: scale(0.6);
    -moz-transform: scale(0.6);
    transform: scale(0.6);
    opacity: 0.6;
    -webkit-animation: moveclouds 25s linear infinite;
    -moz-animation: moveclouds 25s linear infinite;
    -o-animation: moveclouds 25s linear infinite;
  }

  .x3 {
    left: 250px;
    bottom: -70px;

    -webkit-transform: scale(0.6);
    -moz-transform: scale(0.6);
    transform: scale(0.6);
    opacity: 0.8;

    -webkit-animation: moveclouds 25s linear infinite;
    -moz-animation: moveclouds 25s linear infinite;
    -o-animation: moveclouds 25s linear infinite;
  }

  .x4 {
    left: 470px;
    botttom: 20px;

    -webkit-transform: scale(0.75);
    -moz-transform: scale(0.75);
    transform: scale(0.75);
    opacity: 0.75;

    -webkit-animation: moveclouds 18s linear infinite;
    -moz-animation: moveclouds 18s linear infinite;
    -o-animation: moveclouds 18s linear infinite;
  }

  .x5 {
    left: 200px;
    top: 300px;

    -webkit-transform: scale(0.5);
    -moz-transform: scale(0.5);
    transform: scale(0.5);
    opacity: 0.8;

    -webkit-animation: moveclouds 20s linear infinite;
    -moz-animation: moveclouds 20s linear infinite;
    -o-animation: moveclouds 20s linear infinite;
  }

  @-webkit-keyframes moveclouds {
    0% {
      margin-left: 1000px;
    }

    100% {
      margin-left: -1000px;
    }
  }

  @-moz-keyframes moveclouds {
    0% {
      margin-left: 1000px;
    }

    100% {
      margin-left: -1000px;
    }
  }

  @-o-keyframes moveclouds {
    0% {
      margin-left: 1000px;
    }

    100% {
      margin-left: -1000px;
    }
  }
</style>