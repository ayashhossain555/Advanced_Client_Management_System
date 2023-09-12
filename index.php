<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a14ae3558.js" crossorigin="anonymous"></script>

    <title>Client management system</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/b.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    
    <link rel="stylesheet" href="assets/css/template.css">

    
    
    

  </head>

<body>

 


  <!-- ***** Header Area Start ***** -->

  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/meeting.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
       
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h2>ABC Soft company</h2>
              <h6>Welcome to ABC SOFT COMPANY, your gateway to cutting-edge technology solutions and unparalleled innovation. As a leading IT company at the forefront of digital transformation, we are dedicated to shaping the future through our expertise, creativity, and commitment to excellence.</h6>
              <div class="main-button-red">
                
                <ul class="nav" align='center'>
                 
                  <li><a href="login.php">Login</a></li>
                  <li>....<a href="register.php">Register</a></li>
                </ul> 
              
              </div>
              
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->



  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</body>
</html>