   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="{{ asset('landingpage/style.css') }}" />
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400&display=swap" rel="stylesheet" />

       <script src="{{ asset('/js/popper.min.js') }}" crossorigin="anonymous"></script>
       <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
       </script>


       <!-- HTML Meta Tags -->
       <title>WDO Institution | World Developement Opportunities</title>
       <meta name="description" content="WDO Institution is a national institution committed to providing every child with a world-class education, empowering overall development and equal opportunities.">
       <meta property="og:image" content="{{ asset('landingpage/image/wdo-logo01.png') }}">
       {{-- <meta property="image" content="{{asset('landingpage/image/wdo-logo01.png')}}" /> --}}

       <!-- Favicons -->
       <link rel="icon" href="{{ asset('landingpage/image/facicon.png') }}">

       <!-- Facebook Meta Tags -->
       <meta property="og:url" content="https://www.wdoinstitution.com">
       <meta property="og:type" content="website">
       <meta property="og:title" content="Wdo Institution | World Developement Opportunities">
       <meta property="og:description" content="WDO Institution is a national institution committed to providing every child with a world-class education, empowering overall development and equal opportunities.">
       <meta property="og:image" content="{{ asset('landingpage/image/wdo-logo01.png') }}">

       <!-- Twitter Meta Tags -->
       <meta name="twitter:card" content="summary_large_image">
       <meta property="twitter:domain" content="wdoinstitution.com">
       <meta property="twitter:url" content="https://www.wdoinstitution.com">
       <meta name="twitter:title" content="Wdo Institution | World Developement Opportunities">
       <meta name="twitter:description" content="WDO Institution is a national institution committed to providing every child with a world-class education, empowering overall development and equal opportunities.">
       <meta name="twitter:image" content="">


       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">

       <meta name='robots' content='max-image-preview:large' />
       <link rel='stylesheet' href="{{ asset('/css/bootstrap.min.css') }}" type='text/css' media='all' />
       <link rel='stylesheet' href="{{ asset('/css/edubin-core.css') }}" type='text/css' media='all' />
       <link rel='stylesheet' href="{{ asset('/css/style.css') }}" type='text/css' media='all' />
       <link rel='stylesheet' id='elementor-frontend-css' href="{{ asset('/css/frontend.min.css') }}" type='text/css' media='all' />
       <link rel='stylesheet' id='elementor-post-2661-css' href="{{ asset('/css/post-2661.css') }}" type='text/css' media='all' />
       <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto&#038;ver=6.2.2' type='text/css' media='all' />
       <link rel="stylesheet" id="edubin-flaticon-css" href="{{ asset('/css/flaticon.css') }}" type="text/css" media="all">
       <!-- <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}"> -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

   </head>
   <style>
       .post-content p {
           overflow: hidden;
           text-overflow: ellipsis;
           display: -webkit-box;
           -webkit-line-clamp: 2;
           -webkit-box-orient: vertical;
       }

       .lat-post-content p {
           overflow: hidden;
           text-overflow: ellipsis;
           display: -webkit-box;
           -webkit-line-clamp: 3;
           -webkit-box-orient: vertical;
       }
   </style>

   <body onload=display_ct();>
       <div class="header-pati">
           <div class="menu-main">
               <div class="first-two">
                   <div class="pati-text">Customer Reviews Careers |</div>
                   <div class="live-time">
                       <span style="font-weight: bold;color: #ffffff;">it's</span>
                       <span id='ct6' style="font-weight: bold;color: #ffffff;"></span>
                       <span style="font-weight: bold;color: #ffffff;">We're Open |</span>
                   </div>
                   <h4 class="lang-site">Language</h4>
                   <h4 class="lang-site">Sitemap</h4>
               </div>
               <!-- <button class="request-services">request-services</button> -->
           </div>
       </div>
       <div class="header-menu sticky-active menu-effect-2 responsive-rp">
           <div class="header-area rp-12 head-respo cont-hed high-768">
               <a href="{{ route('landingPage') }}" class="logo12">
                   <div class="site-branding d-inline-block">
                       <img src="{{ asset('landingpage/image/wdo-logo01.png') }}" alt="img" class="custom-logo-link">
                   </div>
               </a>
               <div class="empowring-business">
                   <p class="wdo">WDO INSTITUTION</p>
                   <p class="worlds">World Developement Opportunities</p>
                   <div class="main-regulator">
                       <div class="regulator">
                           <div class="dot"></div>
                           <p class="upsc-exam">UPSC</p>
                       </div>
                       <div class="regulator">
                           <div class="dot"></div>
                           <p class="upsc-exam">CBSE</p>
                       </div>
                       <div class="regulator">
                           <div class="dot"></div>
                           <p class="upsc-exam">SSC</p>
                       </div>
                       <div class="regulator">
                           <div class="dot"></div>
                           <p class="upsc-exam">T.B.S.E</p>
                       </div>
                       <div class="regulator">
                           <div class="dot"></div>
                           <p class="upsc-exam">ICSC</p>
                       </div>
                   </div>
               </div>
               <form class="search23">
                   <div class="pl-btn">
                       <input type="text" placeholder="Search.." name="search">
                       <button type="submit" class="btn-fa"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                               <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                           </svg></i></button>
                   </div>
               </form>
           </div>
       </div>
       <div class="header-under-color">
           <ul class="sub-menu menu-respo icpn-912">

               {{-- <li class="menu-item extra-color">HOME</li> --}}
               <nav class="nav justify-content-center" aria-label="Secondary navigation">
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           COACHING
                       </a>
                       <ul class="dropdown-menu">
                           <h5 class="gov-hm">Free Coaching</h5>
                           <div class="drep-dwn01">
                               <li><a class="dropdown-item" href="#" style="font-size: 14px;">10th Class</a></li>
                               <li><a class="dropdown-item" href="#" style="font-size: 14px;">11th Class</a></li>
                               <li><a class="dropdown-item" href="#" style="font-size: 14px;">12th Class</a></li>
                           </div>
                       </ul>
                   </li>
               </nav>
               <nav class="nav justify-content-center" aria-label="Secondary navigation">
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           PREMIUM COACHING
                       </a>

                       <ul class="dropdown-menu">
                           <h5 class="gov-em">Government
                               Exams</h5>
                           <div class="drep-dwn">
                               <div class="prijin">
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">9th Class</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">10th Class</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">11th Class</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">12th Class</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">Spoken
                                           English</a></li>
                               </div>
                               <div class="prijin">
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">UPSC Exam</a></li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">State Government
                                           Exams</a></li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">Railways Exam</a>
                                   </li>
                                </div>
                                <div class="prijin">
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">Nursing Exams</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">Central Government
                                           Exams</a></li>
                                    <li><a class="dropdown-item" href="#" style="font-size: 14px;">More</a></li>
                                </div>
                       </ul>

               </nav>
               <li class="menu-item">ADMISSION COLLEGE AND UNIVERSITY</li>
               <li class="menu-item">WDO TEACHER QUALLATY</li>
               <li class="menu-item">TREANDING NEWS</li>
           </ul>


           </li>






           {{-- <li class="dropdown-submenu">
                           <a class="dropdown-item" href="#">Premium Coaching<span
                                    class="float-end custom-toggle-arrow">&#187</span></a>
                           <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="#">9th Class</a></li>
                                 <li><a class="dropdown-item" href="#">10th Class</a></li>
                                 <li><a class="dropdown-item" href="#">11th Class</a></li>
                                 <li><a class="dropdown-item" href="#">12th Class</a></li>
                                 <li><a class="dropdown-item" href="#">Spoken English</a></li>
                           </ul>
                        </li> --}}

           </ul>
           </li>
           </nav>



           <div class="topnav">
               <div id="navbar01">
                   {{-- <a href="#news">HOME</a> --}}
                   <nav class="nav justify-content-center" aria-label="Secondary navigation">
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: none;">
                               COACHING
                           </a>
                           <ul class="dropdown-menu">
                               <h5 class="gov-hm">Free Coaching</h5>
                               <div class="drep-dwn">
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">10th Class</a></li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">11th Class</a></li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">12th Class</a></li>
                               </div>
                           </ul>
                       </li>
                   </nav>
                   <nav class="nav justify-content-center" aria-label="Secondary navigation">
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: none;">
                               PREMIUM COACHING
                           </a>

                           <ul class="dropdown-menu">
                               <h5 class="gov-em">Government
                                   Exams</h5>
                               <div class="drep-dwn">
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">9th Class</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">10th Class</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">11th Class</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">12th Class</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">Spoken
                                           English</a></li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">UPSC Exam</a></li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">State Government
                                           Exams</a></li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">Railways Exam</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">Nursing Exams</a>
                                   </li>
                                   <li><a class="dropdown-item" href="#" style="font-size: 14px;">Central Government
                                           Exams</a></li>
                               </div>
                           </ul>






                   </nav>

                   <nav class="nav justify-content-center" aria-label="Secondary navigation">
                       <li class="menu-item">ADMISSION COLLEGE AND UNIVERSITY</li><br>
                       <li class="menu-item">WDO TEACHER QUALLATY</li><br>
                       <li class="menu-item">TREANDING NEWS</li><br>
                   </nav>

                   <!-- <a href="#about">COACHING</a> -->
                   {{-- <nav class="nav justify-content-center" aria-label="Secondary navigation">
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              COACHING
                              </a>
                              <ul class="dropdown-menu">
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Free Coaching<span
                                             class="float-end custom-toggle-arrow">&#187</span></a>
                                    <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">10th Class</a></li>
                                          <li><a class="dropdown-item" href="#">11th Class</a></li>
                                          <li><a class="dropdown-item" href="#">12th Class</a></li>
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Premium Coaching<span
                                             class="float-end custom-toggle-arrow">&#187</span></a>
                                    <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">9th Class</a></li>
                                          <li><a class="dropdown-item" href="#">10th Class</a></li>
                                          <li><a class="dropdown-item" href="#">11th Class</a></li>
                                          <li><a class="dropdown-item" href="#">12th Class</a></li>
                                          <li><a class="dropdown-item" href="#">Spoken English</a></li>
                                    </ul>
                                 </li>
                                 <li class="dropdown-submenu">
                                    <a class="dropdown-item" href="#">Government Exams<span
                                             class="float-end custom-toggle-arrow">&#187</span></a>
                                    <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">UPSC Exam</a></li>
                                          <li><a class="dropdown-item" href="#">State Government Exams</a></li>
                                          <li><a class="dropdown-item" href="#">Railways Exam</a></li>
                                          <li><a class="dropdown-item" href="#">Nursing Exams</a></li>
                                          <li><a class="dropdown-item" href="#">Central Government Exams</a></li>
                                    </ul>
                                 </li>

                              </ul>
                        </li>
                     </nav> --}}

               </div>
               <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                   <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000" class="bi bi-list" viewBox="0 0 16 16">
                       <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                   </svg>
               </a>
           </div>
       </div>
       </header>


   </body>
