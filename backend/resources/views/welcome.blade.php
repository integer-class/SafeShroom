<!DOCTYPE html>
<html dir="ltr" lang="en-US">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="author" content="Ayman Fikry"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Multi-purpose Application landing page HTML5 template"/>
    <title>Landing Page ShafeShroom</title>
    <link href="assets/images/favicon/favicon.png" rel="icon"/>
    <!--  Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&amp;family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet"/>
    <!--  Stylesheets-->
    <link href="assets/css/vendor.min.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
  </head>
  <body class="body-scroll">
    <!-- Document Wrapper-->
    <div class="wrapper clearfix" id="wrapperParallax">
      <!--   
      Header
      =============================================  
      -->
      <header class="header header-light header-sticky">
        <nav class="navbar navbar-sticky navbar-expand-lg" id="primary-menu"> 
          <a class="logo navbar-brand" href="index.html">
            <img class="logo logo-dark" src="assets/images/logo/logo11.png" alt="LadidApp Logo" style="width: 250px; height: auto;" />
            <img class="logo logo-light" src="assets/images/logo/logo11.png" alt="LadidApp Logo" style="width: 250px; height: auto;" />
        </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarContent" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" data-scroll="scrollTo" href="#hero">Home</a></li>
                <li class="nav-item"><a class="nav-link" data-scroll="scrollTo" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" data-scroll="scrollTo" href="#screens">Desain Apps</a></li>
                <li class="nav-item"><a class="nav-link" data-scroll="scrollTo" href="#reviews">Team Members</a></li>
              </ul>
              <div class="module-container">
                <!-- Tombol Login -->
                <div class="module module-cta">
                  <a class="btn" href="{{ route('login') }}"> <span>LOGIN</span></a>
                </div>
              </div>
              
              <!-- End Module Container  -->
            </div>
            <!-- End .nav-collapse-->
          </div>
          <!-- End .container-->
        </nav>
        <!-- End .navbar-->
      </header>
      <!--
      Hero Section
      ============================================= 
      -->
      <section class="hero hero-lead pb-50" id="hero">
        <div class="hero-cotainer">
          <div class="hero-bg"> <img src="assets/images/background/bg-hero.svg" alt="Background Image"/></div>
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-6"> 
                <div class="hero-content">
                  <h1 class="hero-headline">Welcome To Our App ShafeShroom</h1>
                  <p class="hero-bio">
                    The application helps users identify mushrooms and determine if they are safe to eat (edible) or pose a health risk (poisonous). It aims to make foraging safer for users by providing accurate recognition and classification of various mushroom species.
                  </p>
                  <div class="hero-action">
                    <!-- Tombol Download -->
                    <a class="btn btn--primary" href="https://drive.google.com/drive/folders/17r8KA6Wl7evybfNCH381mkB2KglMsc3r?usp=sharing" download>
                      <svg xmlns="http://www.w3.org/2000/svg" width="28.114" height="31.16" viewBox="0 0 28.114 31.16">
                        <path id="app" d="M37.384,12.606,16.12.451A3.425,3.425,0,0,0,11,3.425V27.734a3.425,3.425,0,0,0,5.125,2.974L37.383,18.554a3.425,3.425,0,0,0,0-5.948ZM28.17,9.732,25.25,13.8,18.267,4.071ZM14.286,29.071a1.336,1.336,0,0,1-.542-.17,1.352,1.352,0,0,1-.671-1.166V3.425a1.342,1.342,0,0,1,1.212-1.339L23.971,15.58Zm3.98-1.982,6.983-9.728,2.92,4.067ZM36.353,16.75l-6.37,3.641L26.529,15.58l3.454-4.811,6.37,3.641a1.348,1.348,0,0,1,0,2.34Z" transform="translate(-10.995)"></path>
                      </svg>
                      <span>Download</span>
                    </a>
                  </div>
                </div>
              </div>
              
              <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center" style="height: 400px;">
                <div class="hero-image">
                  <img class="img-fluid" src="assets/images/mockup/iphone1.png" alt="iPhone Mockup" style="max-width: 150%; height: auto; transform: translateX(-70px);">
                </div>
              </div>
              
              
            </div>
            <!-- End .row-->
          </div>
          <!-- End .hero-cotainer-->
        </div>
        <!-- End .container-->
        <div class="skew-divider"></div>
      </section>
      <!--   
      Featured Section
      ============================================= 
      -->
      <section class="features text-center" id="features">
        <div class="container">
          <div class="row clearfix">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
              <div class="heading text-center">
                <p class="heading-subtitle">our feature-content</p>
                <h2 class="heading-title">our amazing features</h2>
              </div>
            </div>
            <!-- End .col-lg-6 -->
          </div>
          <!-- End .row  -->
          <div class="row">
            <!-- Panel #1  -->
            <div class="col-12 col-lg-3 ">
              <div class="feature-panel feature-panel-1">
                <div class="feature-icon">
                  <div class="bg-img"><img src="assets/images/icons/bg-icon-1.svg" alt="icon svg"/></div><img src="assets/images/icons/icon-code.svg" alt="Icon"/>
                </div>
                <div class="feature-content">
                  <h3>Identification</h3>
                  <p>we provide camera based identification of poisonous and non-poisonous mushrooms </p>
                </div>
              </div>
              <!-- End .feature-panel -->
            </div>
            <!-- End .col-12-->
            <!-- Panel #2-->
            <div class="col-12 col-lg-3" style="margin-left: 150px;">
              <div class="feature-panel feature-panel-2">
                <div class="feature-icon">
                  <div class="bg-img">
                    <img src="assets/images/icons/bg-icon-2.svg" alt="icon svg" />
                  </div>
                  <img src="assets/images/icons/icon-paint.svg" alt="Icon" />
                </div>
                <div class="feature-content">
                  <h3>History Page</h3>
                  <p>We provide a view of your past identification results and activity.</p>
                </div>
              </div>
            </div>
            
            <!-- End .col-12-->
            <!-- Panel #3-->
            <div class="col-12 col-lg-3" style="margin-left: 100px;">
              <div class="feature-panel feature-panel-3">
                <div class="feature-icon">
                  <div class="bg-img">
                    <img src="assets/images/icons/bg-icon-3.svg" alt="icon svg" />
                  </div>
                  <img src="assets/images/icons/icon-screen.svg" alt="Icon" />
                </div>
                <div class="feature-content">
                  <h3>Cataloge Page</h3>
                  <p>We provide Browse detailed information about various mushrooms.</p>
                </div>
              </div>
            </div>
          </div>
          <!-- End .row  -->
        </div>
        <!-- End .container-->
      </section>
      <!--   
      About Section
      ============================================= 
      -->
      <section class="about bg-pink" id="about">
        <div class="container">
          <div class="row align-items-center text-center-xs">
            <div class="col-12 col-lg-6"><img class="img-fluid" src="assets/images/cover/about1.png" alt="Book Cover"/></div>
            <div class="col-12 col-lg-5">
              <div class="heading mb-40">
                <p class="heading-subtitle">about us</p>
                <h2 class="heading-title">See, Snap, and Stay Safe with Mushrooms.</h2>
                <p class="heading-desc">Our Mushroom Identification App is your reliable companion for identifying poisonous and non-poisonous mushrooms with ease. Designed to be intuitive and user-friendly, the app provides a seamless experience for mushroom enthusiasts and casual users alike.</p>
            </div>
          </div>
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>
      <!-- 
      Process Section
      =============================================  
      -->
      <section class="processes text-center" id="processes">
        <div class="container"> 
          <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
              <div class="heading text-center">
                <p class="heading-subtitle">working processes</p>
                <h2 class="heading-title">How to works this Apps </h2>
              </div>
            </div>
            <!-- End .col-lg-6 -->
          </div>
          <!-- End .row -->
          <div class="process-panels-container">
            <div class="divider"></div>
            <div class="process-panel process-panel-1">
              <div class="process-phase">
                <p>step 1</p>
              </div>
              <h2 class="process-name">Capture or Upload a Mushroom Image</h2>
              <p class="process-desc">Use your phone's camera to take a picture of the mushroom or upload an existing image from your gallery.</p>
            </div>
            <div class="process-panel process-panel-2">
              <div class="process-phase">
                <p>step 2</p>
              </div>
              <h2 class="process-name">Get Instant Identification</h2>
              <p class="process-desc">The app analyzes the image and identifies whether the mushroom is edible or poisonous, providing a detailed description.</p>
            </div>
            <div class="process-panel process-panel-3">
              <div class="process-phase">
                <p>step 3</p>
              </div>
              <h2 class="process-name">Explore Results</h2>
              <p class="process-desc">For edible mushrooms, view recommended recipes. For poisonous ones, learn about potential risks and safety precautions.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- 
      Screenshots Section
      =============================================  
      -->
      <section class="screenshots bg-pink" id="screens">
        <div class="container"> 
          <div class="row"> 
            <div class="col-12 col-lg-6 offset-lg-3">
              <div class="heading heading-3 text-center">
                <p class="heading-subtitle">Mockup Design</p>
                <h2 class="heading-title">app screenshot</h2>
              </div>
            </div>
            <div class="col-12"> 
              <div class="owl-carousel" data-slide="4" data-slide-rs="3" data-autoplay="true" data-nav="false" data-dots="false" data-space="20" data-loop="true" data-center="false"><img src="assets/images/screenshots/11.png" alt="screenshot"/><img src="assets/images/screenshots/22.png" alt="screenshot"/><img src="assets/images/screenshots/33.png" alt="screenshot"/><img src="assets/images/screenshots/44.png" alt="screenshot"/><img src="assets/images/screenshots/55.png" alt="screenshot"/><img src="assets/images/screenshots/66.png" alt="screenshot"/><img src="assets/images/screenshots/77.png"><img src="assets/images/screenshots/88.png" alt="screenshot"/></div>
            </div>
          </div>
        </div>
      </section>
     
      <section class="testimonials bg-pink" id="reviews">
        <div class="container">
          <div class="row"> 
            <div class="col-12 col-lg-6 offset-lg-3"> 
              <div class="heading text-center">
                <p class="heading-subtitle">TEAM MEMBER </p>
                <h2 class="heading-title">what our Job and position</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="owl-thumbs testimonials-customers-container" data-slider-id="1">
                <div class="author-img owl-thumb-item active"><img src="assets/images/testimonials/profile1.png" alt="avatar author"/></div>
                <div class="author-img owl-thumb-item"><img src="assets/images/testimonials/profile2.png" alt="avatar author"/></div>
                <div class="author-img owl-thumb-item"><img src="assets/images/testimonials/profile3.png" alt="avatar author"/></div>
                <div class="author-img owl-thumb-item"><img src="assets/images/testimonials/profile4.png" alt="avatar author"/></div>
              </div>
              <div class="owl-carousel" data-slider-id="1" data-slide="1" data-slide-res="1" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="800">
                <div class="testimonial-panel">
                  <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                      <div class="testimonial-body">
                        <h4 class="testimonial-name">Ananda Az Haruddin Salima</h4>
                        <p class="testimonial-title">Project Manager</p>
                        <p class="testimonial-desc">I facilitated the overall development of the project by focusing on creating robust web services and managing the backend infrastructure. My responsibilities included designing, developing, and maintaining APIs to ensure seamless communication between the frontend and backend systems. I also handled server-side logic, database management, and optimized application performance to deliver a scalable and efficient solution.</p>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="testimonial-img">
                        <div class="background">
                          <img src="assets/images/background/1.png" alt="Background" class="background-img"/>
                        </div>
                        <div class="author-wrapper">
                          <img class="author" src="assets/images/testimonials/model22.png" alt="Author Image"/>
                        </div>
                      </div>
                    </div>
                    
                    <style>
                      /* Container Utama */
                      .testimonial-img {
                        position: relative;
                        display: grid;
                        grid-template-areas: "background" "author";
                        justify-items: center;
                        align-items: center;
                        overflow: hidden;
                        width: 100%;
                        height: auto;
                      }
                    
                      /* Background Gambar */
                      .background {
                        grid-area: background;
                        position: relative;
                        z-index: 1;
                        width: 100%;
                      }
                    
                      .background-img {
                        width: 100%;
                        height: auto;
                        object-fit: cover;
                      }
                    
                      /* Gambar Author */
                      .author-wrapper {
                        grid-area: author;
                        z-index: 2;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
                        cursor: grab;
                      }
                    
                      .author {
                        width: 150px;
                        height: auto;
                        transition: transform 0.3s ease;
                      }
                    
                      .author-wrapper:hover {
                        transform: scale(1.1);
                      }
                    </style>
                    
                  </div>
                </div>
                <div class="testimonial-panel">
                  <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                      <div class="testimonial-body">
                        <h4 class="testimonial-name">Virza Aulia Rachman</h4>
                        <p class="testimonial-title">Frontend Developer</p>
                        <p class="testimonial-desc">My responsbility was A front-end mobile programmer designs and implements intuitive, responsive user interfaces for mobile applications, collaborates with designers and back-end developers, and ensures seamless user experiences through clean coding, performance optimization, and rigorous testing. </p>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="testimonial-img">
                        <div class="background">
                          <img src="assets/images/background/1.png" alt="Background" class="background-img"/>
                        </div>
                        <div class="author-wrapper">
                          <img class="author" src="assets/images/testimonials/model1.png" alt="Author Image"/>
                        </div>
                      </div>
                    </div>
                    
                    <style>
                      /* Container Utama */
                      .testimonial-img {
                        position: relative;
                        display: grid;
                        grid-template-areas: "background" "author";
                        justify-items: center;
                        align-items: center;
                        overflow: hidden;
                        width: 100%;
                        height: auto;
                      }
                    
                      /* Background Gambar */
                      .background {
                        grid-area: background;
                        position: relative;
                        z-index: 1;
                        width: 100%;
                      }
                    
                      .background-img {
                        width: 100%;
                        height: auto;
                        object-fit: cover;
                      }
                    
                      /* Gambar Author */
                      .author-wrapper {
                        grid-area: author;
                        z-index: 2;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
                        cursor: grab;
                      }
                    
                      .author {
                        width: 150px;
                        height: auto;
                        transition: transform 0.3s ease;
                      }
                    
                      .author-wrapper:hover {
                        transform: scale(1.1);
                      }
                    </style>
                    
                  </div>
                </div>
                <div class="testimonial-panel">
                  <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                      <div class="testimonial-body">
                        <h4 class="testimonial-name">Safa Rafa Zanda</h4>
                        <p class="testimonial-title">Backend Developer</p>
                        <p class="testimonial-desc">back-end developer in machine learning builds and optimizes server-side systems, develops APIs, and integrates machine learning models into applications, ensuring efficient data processing, model deployment, and seamless communication between the front-end and databases..</p>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="testimonial-img">
                        <div class="background">
                          <img src="assets/images/background/1.png" alt="Background" class="background-img"/>
                        </div>
                        <div class="author-wrapper">
                          <img class="author" src="assets/images/testimonials/model33.png" alt="Author Image"/>
                        </div>
                      </div>
                    </div>
                    
                    <style>
                      /* Container Utama */
                      .testimonial-img {
                        position: relative;
                        display: grid;
                        grid-template-areas: "background" "author";
                        justify-items: center;
                        align-items: center;
                        overflow: hidden;
                        width: 100%;
                        height: auto;
                      }
                    
                      /* Background Gambar */
                      .background {
                        grid-area: background;
                        position: relative;
                        z-index: 1;
                        width: 100%;
                      }
                    
                      .background-img {
                        width: 100%;
                        height: auto;
                        object-fit: cover;
                      }
                    
                      /* Gambar Author */
                      .author-wrapper {
                        grid-area: author;
                        z-index: 2;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
                        cursor: grab;
                      }
                    
                      .author {
                        width: 200px;
                        height: auto;
                        transition: transform 0.3s ease;
                      }
                    
                      .author-wrapper:hover {
                        transform: scale(1.1);
                      }
                    </style>
                    
                  </div>
                </div>
                <div class="testimonial-panel">
                  <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                      <div class="testimonial-body">
                        <h4 class="testimonial-name">Gatiadirijal Naufaldy Kestiyanto</h4>
                        <p class="testimonial-title">Backend developer</p>
                        <p class="testimonial-desc">Back-end developers in the PCVK field are responsible for setting up and managing hosting servers, ensuring applications run stably, securely, and are optimally accessible..</p>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="testimonial-img">
                        <div class="background">
                          <img src="assets/images/background/1.png" alt="Background" class="background-img"/>
                        </div>
                        <div class="author-wrapper">
                          <img class="author" src="assets/images/testimonials/model.png" alt="Author Image"/>
                        </div>
                      </div>
                    </div>
                    
                    <style>
                      /* Container Utama */
                      .testimonial-img {
                        position: relative;
                        display: grid;
                        grid-template-areas: "background" "author";
                        justify-items: center;
                        align-items: center;
                        overflow: hidden;
                        width: 100%;
                        height: auto;
                      }
                    
                      /* Background Gambar */
                      .background {
                        grid-area: background;
                        position: relative;
                        z-index: 1;
                        width: 100%;
                      }
                    
                      .background-img {
                        width: 100%;
                        height: auto;
                        object-fit: cover;
                      }
                    
                      /* Gambar Author */
                      .author-wrapper {
                        grid-area: author;
                        z-index: 2;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
                        cursor: grab;
                      }
                    
                      .author {
                        width: 150px;
                        height: auto;
                        transition: transform 0.3s ease;
                      }
                    
                      .author-wrapper:hover {
                        transform: scale(1.1);
                      }
                    </style>
                    
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End .container-->
      </section>
      <!-- 
      Blog Section
      =============================================  
      -->
          <!-- End .row-->
        </div>
        <!-- End .container-->
      </section>
      <!-- 
      CTA Section
      =============================================  
      -->
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Centered Footer</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
          body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
          }
  
          /* Footer Styling */
          .footer {
            background-color: #222;
            color: #fff;
            padding: 40px 20px;
            text-align: center;
          }
  
          .footer-logo img {
            max-width: 150px;
            margin: 0 auto 10px;
          }
  
          .footer-description {
            margin: 10px 0;
            font-size: 14px;
            line-height: 1.6;
          }
  
          .footer-contact {
            margin-top: 20px;
            font-size: 14px;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
          }
  
          .footer-contact i {
            margin-right: 5px;
            color: #4CAF50;
          }
  
          .footer-contact a {
            color: #ADD8E6;
            text-decoration: none;
          }
  
          .footer-contact a:hover {
            text-decoration: underline;
          }
        </style>
      </head>
      <body>
  
      <!-- Footer -->
      <footer class="footer">
        <div class="footer-logo">
          <img src="assets/images/logo/logo11.png" alt="LadidApp Logo">
        </div>
        <div class="footer-description">
          <p>ShafeShroom apps mushroom knowlagde.<br> Let's capture your mushrooms!</p>
        </div>
        <div class="footer-contact">
          <span><i class="fas fa-phone-alt"></i> +62-812-21645-5407</span>
          <span><i class="fas fa-envelope"></i> <a href="mailto:support@ladidapp.com">support@ShafeShroom.com</a></span>
          <span><i class="fas fa-map-marker-alt"></i> Politeknik Negeri Malang</span>
        </div>
      </footer>
  
  </body>
  </html>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
          <div class="container">
            <hr/>
            <div class="row">
              <div class="col-12 text-center">
                <span>2024 &copy; <a href="http://themeforest.net/user/zytheme/portfolio?ref=zytheme">Team Raja Terakhir</a>. All rights reserved.</span>
              </div>
            </div>
          </div>
        </div>
      </footer>


    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/functions.js"></script>
  </body>
</html>