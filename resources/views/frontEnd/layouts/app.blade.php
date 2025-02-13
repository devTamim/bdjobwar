<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="BDJobWar is an innovative online platform designed to help job seekers prepare for competitive exams with ease. Access mock tests, practice questions, and expert insights to enhance your preparation.">
    <meta name="keywords"
        content="BDJobWar, job exam preparation, online exams, mock tests, competitive exams, job preparation platform, practice questions, exam tips, career preparation">
    <meta name="author" content="BDJobWar Team">
    <meta property="og:title" content="BDJobWar - Online Exam Preparation Platform">
<meta property="og:description" content="Prepare for competitive job exams with BDJobWar. Take mock tests, practice questions, and get expert insights to enhance your career opportunities.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->url() }}">

<meta property="og:image" content="{{asset('logo-light.png')}}">
<meta property="og:site_name" content="BDJobWar">
<meta property="og:locale" content="en_US">
    <title>BD Job War</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <script src="https://kit.fontawesome.com/10ec6aaa98.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min2167.css?v=3.2.0') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

    <link href="{{ asset('frontEnd-assets/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontEnd-assets/css/overright.css') }}">
    @yield('css')
    <style>
        body {
            font-family: 'AdorshoLipi', Arial, sans-serif !important;

        }

        .videos {
            list-style: none;
        }

        .videos li {
            border: 2px solid #161E31;
            color: #161E31;
            padding: 5px;
            margin: 10px 0px;
            transition: .2s ease-in;
        }

        .videos li a {
            font-size: 14px;
        }

        .videos li:hover {
            background-color: #161E31;
            color: #fff;
        }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .video {
                width: 250px;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .video {
                width: 700px;
                height: 315px;
            }
        }

        .icon {
            transition: .2s ease-in;
        }

        .icon:hover {
            transform: rotate(5deg);
        }

        .icon-text {
            cursor: pointer;
        }

        .marquee {
            margin: 10px 0px;
            font-size: 14px;
            height: 24px;
            overflow: hidden;
        }

        .live {
            background-color: #FF6000 !important;


            border: none;
            color: #eeeeee;
            cursor: pointer;
            display: inline-block;
            font-family: sans-serif;
            font-size: 20px;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            transition: 1s;
        }

        .live:hover {
            background-color: transparent !important;
            border: 1px solid #FF6000;
            color: #FF6000;
        }

        @keyframes glowing {
            0% {
                background-color: #FF6000;
                box-shadow: 0 0 5px #FF6000;
            }

            50% {
                background-color: #FF6000;
                box-shadow: 0 0 20px #FF6000;
            }

            100% {
                background-color: #FF6000;
                box-shadow: 0 0 5px #FF6000
            }
        }

        .live {
            animation: glowing 1300ms infinite;
        }

        .nav-custom>a {
            color: #015b25 !important;
        }

        .nav-sidebar li>a {
            color: #015b25 !important;
        }

        .nav-sidebar li>a:hover {
            color: #fff !important;
            background-color: #015b25 !important;
        }

        .text-white th {
            color: #fff;
        }

        .dropdown-menu {
            width: 50%;
        }

        .dropdown-menu>.nav-item a {
            padding: 0px !important;
        }
    </style>




</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <nav class=" navbar navbar-expand navbar-white navbar-light sticky-top" style="z-index:3000">

            <ul class="navbar-nav d-flex justify-content-center align-items-center">

                <li class="nav-item ">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class=" mr-2">
                    <a href="{{ url('/') }}" class="">
                        <img src="{{ asset('logo.png') }}" alt="AdminLTE Logo" style="height:50px;color:#fff">
                        <!-- <span class="brand-text font-weight-light">Bd Job War</span> -->
                    </a>

                </li>
                <li class="nav-item d-none d-sm-inline-block  nav-custom">
                    <a href="{{ route('home_page') }}" class="nav-link">হোম</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block  nav-custom">
                    <a href="{{ route('liveexams') }}" class="nav-link">লাইভ সেকশন</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block  nav-custom">
                    <a href="{{ route('home_page') }}#courses" class="nav-link"> কোর্সসমূহ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block  nav-custom">
                    <a href="{{ route('home_page') }}#package" class="nav-link"> প্যাকেজসমূহ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block  nav-custom">
                    <a href="{{ route('jobsolutions') }}" class="nav-link"> জব সলিউশন</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block  nav-custom">
                    <a href="{{ route('post') }}" class="nav-link"> ব্লগ</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">




                @auth

                    <li class="nav-item dropdown mr-5">
                        <a class="btn btn-success dropdown-toggle w-100 " data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('profile.png') }}"
                                style="height:30px" class="rounded-circle" alt="">
                            {{ Str::limit(auth()->user()->name, 5, '.. ') }}
                        </a>
                        <ul class="dropdown-menu ">
                            <li class="nav-item nav-hover-secondary">
                                <a href="{{ route('dashboard') }}" class="d-flex aling-items-center">
                                    <i data-feather="user"></i>
                                    <p class="ms-2 mt-2">
                                        ড্যাশবোর্ড
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item nav-hover-secondary">
                                <a href="{{ route('courses') }}" class="d-flex aling-items-center">
                                    <i data-feather="book"></i>
                                    <p class="ms-2 mt-2">
                                        কোর্সসমূহ
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item nav-hover-secondary">
                                <a href="{{ route('exams') }}" class="d-flex aling-items-center">
                                    <i data-feather="edit-2"></i>
                                    <p class="ms-2 mt-2">
                                        পরীক্ষাসমূহ
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">

                                <a href="{{ route('logout') }}" class="d-flex aling-items-center"
                                    onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i>
                                    <p class="ms-2 ">
                                        লগ আউট
                                    </p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item mr-2">
                        <a class="btn btn-sm btn-success" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="btn btn-sm btn-success" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                @endauth

            </ul>
        </nav>


        <aside class="main-sidebar  elevation-4">



            <div class="sidebar mt-5" style="background-color: #fff;">

                <nav class="mt-5">
                    <ul class="nav nav-pills  nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">


                        <li class="nav-item ">
                            <a href="{{ route('home_page') }}" class="nav-link d-flex aling-items-center">
                                <i data-feather="home"></i>
                                <p class="ms-2">
                                    হোম
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('liveexams') }}" class="nav-link d-flex aling-items-center">
                                <i data-feather="target"></i>
                                <p class="ms-2">

                                    লাইভ সেকশন
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('home_page') }}#courses" class="nav-link d-flex aling-items-center">
                                <i data-feather="book"></i>
                                <p class="ms-2">

                                    কোর্স
                                    সমূহ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('home_page') }}#package" class="nav-link d-flex aling-items-center">
                                <i data-feather="gift"></i>
                                <p class="ms-2">
                                    প্যাকেজসমূহ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('jobsolutions') }}" class="nav-link d-flex aling-items-center">
                                <i data-feather="users"></i>
                                <p class="ms-2">
                                    জব
                                    সলিউশন
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('notices') }}" class="nav-link d-flex aling-items-center">
                                <i data-feather="file-text"></i>
                                <p class="ms-2">
                                    ব্লগ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('notices') }}" class="nav-link d-flex aling-items-center">
                                <i data-feather="bell"></i>
                                <p class="ms-2">
                                    নোটিশ
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>
        <div class="content-wrapper px-3 pt-3">
            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>

        <footer class="p-0 mb-0   bg-primary">
            <div class="container-fluid  p-5 row justify-content-around ">

                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center footer-info">
                    <img src="{{ asset('logo-light.png') }}" height="150px" style="object-fit:stretch"
                        alt="">
                    <div class="d-flex flex-column align-items-center ">

                        <p class="text-light p-0 mt-3">
                            আমাদের মোবাইল অ্যাপ ডাউনলোড করুন
                        </p>
                        <a href="https://play.google.com/store/apps/details?id=bdjobwar.com">
                            <img src="{{ asset('download.png') }}" alt="" height="50">
                        </a>

                    </div>

                </div>
                @php
                    $fpackages = App\Models\Package::where('paid', 1)->get();
                    $fcourses = App\Models\Course::with('batches')
                        ->where('job_solutions', 0)
                        ->latest()
                        ->take(3)
                        ->get();
                    
                @endphp

                <div class="col-md-2 populer-course ">
                    <h5 class="mt-3">জনপ্রিয় প্যাকেজ </h5>
                    @foreach ($fpackages as $package)
                        @if (@auth()->user()->information->package_id == $package->id)
                            <a href="javascript:void(0)" onclick="alert('আপনি এই প্যাকেজটিতে সাবস্ক্রাইব করেছেন ')">
                                <p>{{ $package->title }} </p>
                            </a>
                        @else
                            <a href="{{ route('package-details', [Str::slug($package->title), $package]) }}">
                                <p>{{ $package->title }} </p>
                            </a>
                        @endif
                    @endforeach


                </div>
                <div class="col-md-2 populer-course">
                    <h5 class="mt-3">জনপ্রিয় কোর্সসমূহ </h5>
                    @foreach ($fcourses as $course)
                        <a href="{{ $course->link() }}">
                            <p>{{ Str::limit($course->title, 30) }}</p>
                        </a>
                    @endforeach


                </div>
                <div class="col-md-2 populer-course">
                    <p>
                        ঠিকানা: বরিশাল, বাংলাদেশ, মোবাইল: 01707725544, ইমেইল: hafizurrahaman013@gmail.com
                    </p>
                    <h5 class="mt-3">সোসাল লিঙ্ক</h5>
                    <p class="text-white social-link">আমাদের সাথে থাকো</p>
                    <a class="social-link" href="https://www.facebook.com/groups/bcsprimary2021"><i
                            class="fab fa-facebook-f fs-3 "></i></a>
                    {{-- <a class="social-link" href=""><i class="fab fa-youtube fs-3 ms-3 "></i></a>
                            <a class="social-link" href=""><i class="fab fa-instagram fs-3 ms-3  "></i></a>
                            <a class="social-link" href=""><i class="fab fa-twitter fs-3 ms-3 "></i></a> --}}

                </div>

            </div>
        </footer>


    </div>

    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>

    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
    @yield('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <script></script>

    <script>
        function animate(element) {
            let elementWidth = element.offsetWidth;
            let parentWidth = element.parentElement.offsetWidth;
            let flag = 0;

            setInterval(() => {
                element.style.marginLeft = --flag + "px";

                if (elementWidth == -flag) {
                    flag = parentWidth;
                }
            }, 40);
        }

        [...document.getElementsByClassName('marquee')].map(e => {
            animate(e)
        })
    </script>


    <script src="{{ asset('dist/js/adminlte2167.js') }}?v=3.2.0"></script>
</body>

</html>
