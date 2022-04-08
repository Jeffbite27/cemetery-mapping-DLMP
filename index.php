<!DOCTYPE html>
<html lang="en">
<head>
    <script href="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/image/logopngplain.png" type="image/x-icon">
    <title>Divine Life Memorial Park</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/01_User_Home.css">
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <script src="Assets/js/index.js" defer></script>

</head>
<body>

    <header class="primary-header">
        <div class="logo">
            <img src="Assets/image/logopngplain.png" alt="navLogo" class="navlogo">
        </div>

        <button aria-controls="primary-nav" aria-expanded="false" class="nav-toggle">
            <span class="sr-only">
                Menu
            </span>
        </button>

        <nav>
            <ul class="primary-nav" id="primary-nav" data-visible="false">
                <li> 
                    <a href="#">HOME</a> 
                </li>
                <li> 
                    <a href="#about">ABOUT</a> 
                </li>
                <li> 
                    <a href="#news">NEWS & EVENTS</a> 
                </li>
                <li> 
                    <a href="#contact">CONTACT</a> 
                </li>
            </ul>
        </nav>

    </header>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide1">
              <div class="slide1-cont1">
                  <h1>Find your loved ones</h1>
                  <p>Introducing our new Locate a Grave feature. An easiest way to locate and track grave of your loved ones with convenience in just few seconds.
                    Within minutes of arriving at the cemetery, you can be standing in front of the grave by using locate a grave feature </p>
                <div class="text-start">
                <a href="User/Find_Grave.php"> 
                    <button type="submit" class="btn-find"><b>TRY IT NOW</b></button>
                </a>
                </div>
                
              </div>
              <div class="slide1-cont2">
                  <img src="Assets/image/Location tracking-rafiki.svg" alt="">
              </div>
          </div>
          <div class="swiper-slide slide2">
              <div class="slide2-cont1">
                  <img src="Assets/image/People sightseeing outdoors-cuate.svg" alt="">
              </div>
              <div class="slide2-cont2">
                  <h1>Visiting Hours</h1>
                  <p>We are glad to welcome you at Divine Memorial Park Cemetery, whether you are remembering a loved one or attending a holiday event.</p>
                  <!-- <p>The grounds are open for visitation every day including holidays, 8am-5:30pm </p> -->
                  <div class="visiting-hrs">
                    <h2>Opens 7 days a week: <span><b>7:00 AM - 8:00 PM</b></span></h2> 
                  </div>
                  <h1 class="office_hours">Office Hours</h1>
                  <p>The Cemetery office is anticipated to be closed, keep updated to our news and events</p>
                  <div class="office-hrs">
                    <h2>Monday - Friday: <b>8:00 AM - 4:00 PM</b></h2>
                    <h2>Saturday: <b>9:00 AM - 12:00 PM</b></h2>    
                  </div>
                  
              </div>
          </div>
        </div>
        <div class="swiper-button-next">
            <i class="fa fa-chevron-right"></i>
        </div>
        <div class="swiper-button-prev">
            <i class="fa fa-chevron-left"></i>
        </div>
        <div class="swiper-pagination"></div>
      </div>
        
    </div>

    <div class="about" id="about">
        <div class="about-pic">
            <h1>A Memorial Heaven</h1>
            <h1>Where Love And Care Last A Lifetime</h1>
            <p> We recognize the importance of delivering compassionate services to families and loved ones,
                A cemetery that embraces a culture of healing and compassionate care in every area of stewardship for the living and those that are resting here.</p>
</div>
        </div>
        <div class="about-content">
            <h1 class="service-text">INTERMENT TYPES</h1>
            <div class="services">
                <div class="service-type">
                    <div class="type-img">
                        <img src="Assets/image/service-type1.jpg" alt="">
                    </div>
                    <div class="type-content">
                        <i class="fa fa-archway"></i>
                        <h1>MAUSOLEUM</h1>
                        <p>Our lovely mausoleums provide the privacy of a dry, sanitary tomb for the same (or less) cost as traditional ground burial.
                            Has a lot area of 30sqm (4m x 7.5m), and it is unlimited internment</p>
                    </div>
                </div>
                <div class="service-type">
                    <div class="type-img">
                        <img src="Assets/image/service-type2.jpg" alt="">
                    </div>
                    <div class="type-content">
                        <i class="fa fa-chess-king"></i>
                        <h1>UNDERGROUND</h1>
                        <p>Divine Life Memorial Park provides a quiet environment for traditional ground burials, keeps your entire family together i a more private setting.
                            Lawn lot 2.44 meter, Single lot and underground burial only with double interment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="news-events" id="news">
        <div class="news-header">
            <h1>NEWS AND EVENTS</h1>
        </div>
        <div class="news-content">
            <div class="content-card">
                <div class="card-img">
                    <img src="Assets/image/service-type1.jpg" alt="">
                </div>
                <div class="card-content">
                    <div class="content-header">
                        <h2>DIVINE LIFE MEMORIAL PARK <span class="date">MM/DD/YYYY</span></h2>
                    </div>
                    <div class="content-body">
                        <h1>Title</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum iusto minima eligendi nobis culpa placeat tempora labore exercitationem quasi recusandae. Voluptatem fugiat eaque earum incidunt fugit quos atque minima voluptatum.</p>
                        
                    </div>

                    <div class="link">
                        <a href="#">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="content-card">
                <div class="card-img">
                    <img src="Assets/image/service-type1.jpg" alt="">
                </div>
                <div class="card-content">
                    <div class="content-header">
                        <h2>DIVINE LIFE MEMORIAL PARK <span class="date">MM/DD/YYYY</span></h2>
                    </div>
                    <div class="content-body">
                        <h1>Title</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maiores. Facere fugiat excepturi ullam earum dignissimos,</p>
                    </div>
                </div>
                <div class="link">
                    <a href="#">READ MORE</a>
                </div>
            </div>
            <div class="content-card">
                <div class="card-img">
                    <img src="Assets/image/service-type1.jpg" alt="">
                </div>
                <div class="card-content">
                    <div class="content-header">
                        <h2>DIVINE LIFE MEMORIAL PARK <span class="date">MM/DD/YYYY</span></h2>
                    </div>
                    <div class="content-body">
                        <h1>Title</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maiores. Facere fugiat excepturi ullam earum dignissimos,</p>
                    </div>
                </div>
                <div class="link">
                    <a href="#">READ MORE</a>
                </div>
            </div>
            <div class="content-card">
                <div class="card-img">
                    <img src="Assets/image/service-type1.jpg" alt="">
                </div>
                <div class="card-content">
                    <div class="content-header">
                        <h2>DIVINE LIFE MEMORIAL PARK <span class="date">MM/DD/YYYY</span></h2>
                    </div>
                    <div class="content-body">
                        <h1>Title</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maiores. Facere fugiat excepturi ullam earum dignissimos,</p>
                    </div>
                </div>
                <div class="link">
                    <a href="#">READ MORE</a>
                </div>
            </div>
            <div class="content-card">
                <div class="card-img">
                    <img src="Assets/image/service-type1.jpg" alt="">
                </div>
                <div class="card-content">
                    <div class="content-header">
                        <h2>DIVINE LIFE MEMORIAL PARK <span class="date">MM/DD/YYYY</span></h2>
                    </div>
                    <div class="content-body">
                        <h1>Title</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maiores. Facere fugiat excepturi ullam earum dignissimos,</p>
                    </div>
                </div>
                <div class="link">
                    <a href="#" >READ MORE</a>
                </div>
            </div>
            <div class="content-card">
                <div class="card-img">
                    <img src="Assets/image/service-type1.jpg" alt="">
                </div>
                <div class="card-content">
                    <div class="content-header">
                        <h2>DIVINE LIFE MEMORIAL PARK <span class="date">MM/DD/YYYY</span></h2>
                    </div>
                    <div class="content-body">
                        <h1>Title</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, maiores. Facere fugiat excepturi ullam earum dignissimos,</p>
                    </div>
                </div>
                <div class="link">
                    <a href="#" >READ MORE</a>
                </div>
            </div>
            
        </div>

        <div class="loadmore">
            <div class="box loadmorebtn">
                <i class="fa fa-plus"></i>
                <h2>LOAD MORE</h2>
            </div>

            <div class="box loadlessbtn">
                <i class="fa fa-plus"></i>
                <h2>LOAD LESS</h2>
            </div>
            
        </div>
    </div>

    <section class="news">
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-sm-1">
                <div class="col ">
                    <div class="card news-section shadow">
                        <div class="news-img">
                            <img src="Assets/image/service-type1.jpg" class="card-img-top img-fluid d-inline-block " alt="This is the picture">
                        </div>
                        <div class="card-body pb-4">
                            <h4 class="card-title fw-bold">News Title</h4>
                            <p class="date-txt fw-bold" >January 5 2027</p>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-us" id="contact">
        <div class="contact-div1">
            <div class="contact-div1-img">
                <img src="Assets/image/undraw_personal_email_re_4lx7.svg" alt="">
            </div>
            <div class="contact-div1-content1">
                <div class="content-1">
                    <h1>GET IN TOUCH</h1>
                    <p>Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
                </div>
                <div class="content-2">
                    <div class="soc-med">
                        <div class="soc-med-img">
                            <img src="Assets/image/facebook-square-brands.svg" alt="">
                        </div>
                        <div class="soc-med-link">
                            <a href="">https://www.facebook.com/Divine-Life-Memorial-Park</a>
                        </div>
                    </div>
                    <div class="soc-med">
                        <div class="soc-med-img">
                            <img src="Assets/image/phone-solid.svg" alt="">
                        </div>
                        <div class="soc-med-link">
                            <a href="tel:09569824700">0956 982 4700</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-div2">
            <h1>WE'RE HERE</h1>
            <div class="content first">
                <div class="map-text">
                    <h2 class="title"> Main Site</h2>
                    <div class="container">
                        <img src="Assets/image/location-dot-solid.svg" alt="loc-icon">
                        <h2>ADDRESS</h2>
                        <p> 
                            Divine Life Memorial Park Brgy. Gulod 4024 Cabuyao, Laguna Philippines
                        </p>
                    </div>
                    <div class="container">
                        <img src="Assets/image/clock-solid.svg" alt="clock-icon">
                        <h2>OPEN HOURS</h2>
                        <p>6:00 - 8:00pm</p>
                    </div>
                </div>
                <div class="map-img">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d683.5756017754296!2d121.16375680627579!3d14.259779832677799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d8aebf42856b%3A0x674c6f6d3961adac!2sDivine%20Life%20Memorial%20Park!5e0!3m2!1sfil!2sph!4v1645258826002!5m2!1sfil!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="content second">
                <div class="map-img">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d287.3841362068981!2d121.12316709448048!3d14.278593412900142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d9251f952dd1%3A0xb6153326caa17181!2sDivine%20Life%20Memorial%20Park%20Office!5e0!3m2!1sfil!2sph!4v1645280477530!5m2!1sfil!2sph" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="map-text">
                    <h2 class="title"> Main Office</h2>
                    <div class="container">
                        <img src="Assets/image/location-dot-solid.svg" alt="loc-icon">
                        <h2>ADDRESS</h2>
                        <p> 
                            238 JP Rizal St, Cabuyao, Laguna Philippines
                        </p>
                    </div>
                    <div class="container">
                        <img src="Assets/image/clock-solid.svg" alt="clock-icon">
                        <h2>OPEN HOURS</h2>
                        <p>6:00 - 8:00pm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="Assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
