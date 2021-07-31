<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once('controller/common/header.php'); ?>

  <title>Refaccionaria Arboledas | 404</title>
</head>

<style>
  .container {
    width: 100%;
    height: 100%;
    height: 100vh;
    overflow: hidden !important;
  }

  h1 {
    font-family: "Source Sans Pro", sans-serif;
    font-weight: bold;
    font-size: 90px;
    letter-spacing: 20px;
    text-transform: uppercase;
    text-align: center;
    color: #ffffff;
    margin: 0px;
    padding: 0px;
  }

  h2 {
    font-family: "Source Sans Pro", sans-serif;
    font-size: 30px;
    font-weight: 600;
    letter-spacing: 20px;
    text-transform: uppercase;
    text-align: center;
    color: #ffffff;
    line-height: 50px;
    padding: 0px;
    margin: 0px;
  }

  h2 a {
    color: #ffffff;
    text-decoration: none;
    border-bottom: 5px solid #B5B5B5;
    margin: 0;
    padding: 0;
  }

  h2 a span {
    letter-spacing: 0px !important;
    padding-right: 3px;
  }

  h2 a:hover {
    color: #808080;
    border-bottom: 5px solid #808080;
  }

  #scene ul {
    width: 100% !important;
    height: 100% !important;
    height: 100vh !important;
    overflow: hidden;
    position: relative;
  }

  .text {
    position: relative;
    top: 50%;
    -webkit-transform: translateY(-50%) !important;
    -ms-transform: translateY(-50%) !important;
    transform: translateY(-50%) !important;
    z-index: 3;
    display: block;
  }


  /* ---- reset ---- */

  body {
    margin: 0;
    font: normal 75% Arial, Helvetica, sans-serif;
  }

  canvas {
    display: block;
  }

  /* ---- particles.js container ---- */

  #particles-js {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: #b61924;
    background-image: url("");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 50% 50%;
  }
</style>

<script>
  window.onload = function() {

    /*inspired from : https://codepen.io/ArielBeninca/pen/yyKaPX
Particle JS - Vincent Garreau
*/
    particlesJS('particles-js', {
      'particles': {
        'number': {
          'value': 80,
          'density': {
            'enable': true,
            'value_area': 800
          }
        },
        'color': {
          'value': '#ffffff'
        },
        'shape': {
          'type': 'circle',
          'stroke': {
            'width': 0,
            'color': '#000000'
          },
          'polygon': {
            'nb_sides': 5
          },
          'image': {
            'src': 'img/github.svg',
            'width': 100,
            'height': 100
          }
        },
        'opacity': {
          'value': 0.5,
          'random': false,
          'anim': {
            'enable': false,
            'speed': 1,
            'opacity_min': 0.1,
            'sync': false
          }
        },
        'size': {
          'value': 3,
          'random': true,
          'anim': {
            'enable': false,
            'speed': 40,
            'size_min': 0.1,
            'sync': false
          }
        },
        'line_linked': {
          'enable': true,
          'distance': 150,
          'color': '#ffffff',
          'opacity': 0.4,
          'width': 1
        },
        'move': {
          'enable': true,
          'speed': 6,
          'direction': 'none',
          'random': false,
          'straight': false,
          'out_mode': 'out',
          'bounce': false,
          'attract': {
            'enable': false,
            'rotateX': 600,
            'rotateY': 1200
          }
        }
      },
      'interactivity': {
        'detect_on': 'canvas',
        'events': {
          'onhover': {
            'enable': true,
            'mode': 'grab'
          },
          'onclick': {
            'enable': true,
            'mode': 'push'
          },
          'resize': true
        },
        'modes': {
          'grab': {
            'distance': 140,
            'line_linked': {
              'opacity': 1
            }
          },
          'bubble': {
            'distance': 400,
            'size': 40,
            'duration': 2,
            'opacity': 8,
            'speed': 3
          },
          'repulse': {
            'distance': 200,
            'duration': 0.4
          },
          'push': {
            'particles_nb': 4
          },
          'remove': {
            'particles_nb': 2
          }
        }
      },
      'retina_detect': true
    });

  };
</script>

<body>

  <div id="particles-js">
    <canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;">
    </canvas>
  </div>

  <section class="all">
    <div class="container">
      <div class="text">
        <center>
          <img src="assets/media/img/LogoBlanco.png" alt="Refaccionaria Arboledas" width="20%" height="!00%" onContextMenu='return false;' draggable='false'>
          <h1 style="text-shadow: -3px 0 0 rgba(255,0,0,.7), 3px 0 0 rgba(0,255,255,.7);"> ERROR 404 </h1>
          <h2 style="text-shadow: -3px 0 0 rgba(255,0,0,.7), 3px 0 0 rgba(0,255,255,.7);">Regresar al <a href="index"> inicio</a> </h2>
        </center>
      </div>
    </div>
  </section>

</body>

</html>