<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/empresa/CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/empresa/CSS/animated.css">
    <link href="/empresa/CSS/style.css" rel="stylesheet">
    <style>
      .volume-control input[type="range"]::-webkit-slider-thumb {
        background-color: #4a148c;
      }

      .volume-control input[type="range"]::-moz-range-thumb {
        background-color: #4a148c;
      }

      .volume-control input[type="range"]::-ms-thumb {
        background-color: #4a148c;
      }
      .propaganda-title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        color: white;
        background-color: #4a148c;
        padding: 10px 0;
        margin-top: 20px;
      }
    </style>
</head>
<body>
    <?php include_once "menu.php";?>
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>A Liderança de Qualidade</h2>
                    <p>O Supermercado Lider é a melhor opção para suas compras. Oferecemos uma ampla variedade de produtos de alta qualidade, preços competitivos e um excelente atendimento. Aqui você encontra desde alimentos frescos até produtos de limpeza e utensílios domésticos.</p>
                  </div>
                  <div class="col-lg-12">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="/empresa/IMG/slide.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <h1 class="propaganda-title">Propagandas de Marcas Parceiras</h1>
    <div class="container">
      <div class="video-container">
        <video class="video" id="video1" src="/empresa/IMG/video.mp4"></video>
      </div>
      <div class="volume-control">
        <input type="range" min="0" max="1" step="0.1" value="1" id="volume-slider">
      </div>
    </div>
    <script src="/empresa/JS/slider.js"></script>
    <script>
      var volumeSlider = document.getElementById('volume-slider');
      var videos = document.querySelectorAll('video');

      volumeSlider.addEventListener('input', function() {
        var volume = parseFloat(this.value);
        videos.forEach(function(video) {
          video.volume = volume;
        });
      });
      document.addEventListener('DOMContentLoaded', function() {
        var videos = document.querySelectorAll('video');
        videos.forEach(function(video) {
          video.volume = 0;
          video.play();
        });
      });
    </script>

    <?php include_once "rodape.php" ?>
    <script src="/empresa/JS/bootstrap.bundle.min.old.js"></script>
    <script src="/empresa/JS/animation.js"></script>
</body>
</html>
