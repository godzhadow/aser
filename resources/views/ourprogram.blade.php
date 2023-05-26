@extends('layouts.base')

@section('content')
<section class="contact-form-area pt-130 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <section class="page-title-area d-flex align-items-end mb-40" style="background-image: url(img/login/breadcrumb.png);heigh:100px">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-12">
                    <div class="page-title-wrapper mb-50">
                    <h1 class="page-title mb-25">Login</h1>
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home - </a></li>
                            <li><a href="#">&nbsp Our Program</a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center border p-4">
            <div class="col-md-12">
                    <fieldset>
                        <legend>Select virtual Program</legend>
                        <div class="mb-3">
                            <select class="nice-select wide mb-3" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary text-end">Submit</button>
                        </div>

                    </fieldset>
            </div>
        </div>
    </div>
</section>
<section class="feature-course pt-100 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
    <div class="container">
        <div class="row">
           <div class="col-xl-12">
                <div class="section-title text-center mb-50">
                    <h5 class="bottom-line mb-25">Featured Courses</h5>
                    <h2>Explore our Popular Courses</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 text-center">
                <div class="portfolio-menu mb-30">
                    <button class="gf_btn active" data-filter='*'>All</button>
                    <button class="gf_btn" data-filter='.cat1'>Career</button>
                    <button class="gf_btn" data-filter='.cat2'>Development</button>
                    <button class="gf_btn" data-filter='.cat3'>Business</button>
                    <button class="gf_btn" data-filter='.cat4'>science</button>
                    <button class="gf_btn" data-filter='.cat5'>Design</button>
                </div>
            </div>
        </div>
        <div class="grid row">
            <div class="col-lg-4 col-md-6 grid-item cat2 cat3">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image1.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in1.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Take Your Career to the Next Level Future</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat1 cat3 cat4">
               <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image2.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in2.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Your Career to build for the pro level</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat2 cat1 cat5">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image3.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in3.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Take A Course For You Biright Future</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat2 cat3">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image4.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in4.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Take Your Career to the Next Level Future</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat5 cat4">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image5.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in5.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Your Career to build for the pro level</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat3 cat1">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image6.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in6.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Take A Course For You Biright Future</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-lg-12 mt-20 text-center mb-20 wow fadeInUp2 animated" data-wow-delay='.3s'>
                <a href="courses.html" class="theme_btn">All Categories</a>
            </div>
        </div>
    </div>
</section>
<section class="why-chose-us pt-50 pb-100">
    <div class="why-chose-us-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="chose-wrapper pl-25 pl-lg-0 pl-md-0 pl-xs-0">
                        <div class="section-title mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <h5 class="bottom-line mb-25">Explore ASER</h5>
                            <h2 class="mb-25">Why Join ASER?</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. There are many variations of passages of Lorem Ipsum available.</p>
                        </div>
                        <ul class="text-list mb-40 wow fadeInUp2 animated" data-wow-delay='.2s'>
                            <li>There are many variations of passages of Lorem Ipsum.</li>
                            <li>The majority have suffered alteration in some form. </li>
                            <li>There are many variations of passages of Lorem Ipsum.</li>
                        </ul>
                        <a href="about.html" class="theme_btn wow fadeInUp2 animated" data-wow-delay='.3s'>More Details</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="chose-img-wrapper mb-50 pos-rel">
                        <div class="coures-member">
                            <h5>Total Students</h5>
                            <img class="choses chose_01" src="img/chose/01.png" alt="Chose-img">
                            <img class="choses chose_02" src="img/chose/02.png" alt="Chose-img">
                            <img class="choses chose_03" src="img/chose/03.png" alt="Chose-img">
                            <img class="choses chose_04" src="img/chose/04.png" alt="Chose-img">
                            <span>25k+</span>
                        </div>
                        <div class="feature tag_01"><span><img src="img/icon/shield-check.svg" alt=""></span> International Collegues</div>
                        <div class="feature tag_02"><span><img src="img/icon/catalog.svg" alt=""></span> New Knowledge <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Internationally</span></div>
                        <div class="feature tag_03"><span><i class="fal fa-check"></i></span> International Conference</div>
                        <div class="video-wrapper">
                            <a href="https://www.youtube.com/watch?v=7omGYwdcS04" class="popup-video"><i class="fas fa-play"></i></a>
                        </div>
                        <div class="img-bg-two pos-rel">
                            <img class="chose_05 pl-0 pl-lg-0 pl-md-0 pl-xs-0" src="img/main-page/image4.png" alt="Chose-img">
                        </div>
                        <img class="chose chose_06" src="img/shape/dot-box3.svg" alt="Chose-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-course pt-100 pb-130 pt-md-95 pb-md-80 pt-xs-95 pb-xs-80">
    <div class="container">
        <div class="row">
           <div class="col-xl-12">
                <div class="section-title text-center mb-50">
                    <h5 class="bottom-line mb-25">Featured Courses</h5>
                    <h2>Explore our Popular Courses</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12 text-center">
                <div class="portfolio-menu mb-30">
                    <button class="gf_btn active" data-filter='*'>All</button>
                    <button class="gf_btn" data-filter='.cat1'>Career</button>
                    <button class="gf_btn" data-filter='.cat2'>Development</button>
                    <button class="gf_btn" data-filter='.cat3'>Business</button>
                    <button class="gf_btn" data-filter='.cat4'>science</button>
                    <button class="gf_btn" data-filter='.cat5'>Design</button>
                </div>
            </div>
        </div>
        <div class="grid row">
            <div class="col-lg-4 col-md-6 grid-item cat2 cat3">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image1.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in1.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Take Your Career to the Next Level Future</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat1 cat3 cat4">
               <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image2.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in2.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Your Career to build for the pro level</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat2 cat1 cat5">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image3.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in3.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Take A Course For You Biright Future</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat2 cat3">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image4.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in4.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Take Your Career to the Next Level Future</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat5 cat4">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image5.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in5.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Your Career to build for the pro level</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 grid-item cat3 cat1">
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="course-details.html"><img class="img-fluid" src="img/main-page/freeprogram_image6.png" alt=""></a>
                        <div class="feedback-tag">4.8(256)</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            <span>Science</span>
                            <span>Lab</span>
                            <a class="f-right" href="instructor-details.html"><img src="img/course/in6.png" alt=""></a>
                        </div>
                        <h4 class="sub-title mb-20"><a href="course-details.html">Take A Course For You Biright Future</a></h4>
                        <div class="course__meta">
                            <span><img class="icon" src="assets/img/icon/time.svg" alt="course-meta"> 12 Class</span>
                            <span><img class="icon" src="assets/img/icon/bar-chart.svg" alt="course-meta"> Higher</span>
                            <span><img class="icon" src="assets/img/icon/user.svg" alt="course-meta"> 6395+</span>
                            <span>$260</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-lg-12 mt-20 text-center mb-20 wow fadeInUp2 animated" data-wow-delay='.3s'>
                <a href="courses.html" class="theme_btn">All Categories</a>
            </div>
        </div>
    </div>
</section>
@endsection
