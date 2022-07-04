@extends('frontEnd.layouts.app')
@section('content')

@php
use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
@endphp
<!-- Slider section start -->
<section class="container-fluid container-md  d-flex justify-content-center  " style="background-image: url({{asset('frontEnd-assets/img/bg.png')}})">
  <div class=" mt-4 mb-2 row">
    <div class=" col-md-12 col-xl-7 col-12 mb-2">
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          @foreach($sliderExams as $exam)
          <div class="carousel-item @if($loop->first)active @endif">
            <a href="{{route('register')}}">
              <img class="d-block w-100" src="{{Voyager::image($exam->image)}}" alt="First slide">
            </a>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </div>
    <div class="col-md-12 col-xl-5 col-12">
      <div class="h-100 d-flex justify-content-center align-items-center">
        <iframe class="video" src="https://www.youtube.com/embed/ATjaT7MzY30" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>

</section>
<!-- Slider section end -->
<!-- Live section start -->
<section class="live-section" id="live-section" style="background-image: url({{asset('frontEnd-assets/img/bg.png')}})">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1 class="text-uppercase" style="font-weight:500 ; font-size:25px">লাইভ সেকশন</h1>
  </div>
  <div class="container">
    <div class="row" id="live-section-free">
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-danger"> লাইভ পরীক্ষা চলছে <sup>Free</sup></span>
        </h6>
        @foreach($liveExams as $exam)
        <x-exam-card :exam="$exam" />
        @endforeach
      </div>
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-file-alt fs-3 text-muted"></i> <span class="text-success">সম্প্রতি বন্ধ <sup>Free</sup></span>
        </h6>
        @foreach($finishedExams as $exam)
        <x-exam-card :exam="$exam" />
        @endforeach
      </div>

    </div>
    <div class="row" id="live-section-paid">
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-danger"> লাইভ পরীক্ষা চলছে <sup>Paid</sup></span>
        </h6>
        @foreach($livePaidExams as $exam)
        <x-exam-card :exam="$exam" />
        @endforeach
      </div>
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-file-alt fs-3 text-muted"></i> <span class="text-success">সম্প্রতি বন্ধ <sup>Paid</sup></span>
        </h6>
        @foreach($finishedPaidExams as $exam)
        <x-exam-card :exam="$exam" />
        @endforeach
      </div>

    </div>
    <div class="row">

      <div class="col-md-12 mb-4">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-poll fs-3 text-muted"></i> <span class="text-success">সর্বশেষ ফলাফল </span>
        </h6>
        <table class="table table-striped table-light">
          <thead class="text-muted">
            <tr>
              <th scope="col">পরীক্ষা</th>
              <th scope="col">বিষয়</th>
              <th scope="col">ফলাফল</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach($liveExams as $exam)
            <tr>
              <td>{{$exam->title}}</td>
              <td>{{join(', ',$exam->subjects->pluck('name')->toArray())}}</td>
              <td><a class="btn btn-sm btn-danger" href="{{route('all-results-exam',$exam->uuid)}}">দেখুন</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>


    </div>
    <div class="row">
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="far fa-file-alt fs-3 text-muted"></i> <span class="text-success">আসন্ন পরীক্ষা </span>
        </h6>
        @foreach($upcomingExams as $exam)
        @php
        $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
        $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
        @endphp
        <div class="card border border-success rounded shadow mb-2">

          <div class="card-body">
            <div class=" d-flex justify-content-between gap-2 flex-wrap mb-3 text-muted" style="font-size: 12px ;font-weight:700">
              <span>শুরু : {{ $from->getDateTime()->format('j F, Y b h:i')}} </span> <span> শেষ : {{ $to->getDateTime()->format('j F, Y b h:i') }}</span>
            </div>
            <h4 class="text-success" style="font-weight: 700;">{{$exam->title}}</h4>
            <div style="height:2px;width:100px" class="bg-danger"></div>
            <p class="text-secondary mt-2">
              {{join(', ',$exam->subjects->pluck('name')->toArray())}}
            </p>
            <div class=" d-flex flex-sm-column flex-md-row gap-3  flex-wrap justify-content-between align-items-center mt-4">


              <div class="d-flex  gap-5 text-dark" style="font-size: 14px;">
                <span>
                  <i class="fa fa-coins"></i> : {{$exam->priceFormat()}}
                </span>
                <span>
                  <i class="fa fa-clock"></i> :

                  {{$exam->duration}} মিনিট
                </span>
                <span>
                  <i class="fa fa-users"></i> :

                  {{$exam->participants}} জন
                </span>

              </div>
            </div>




          </div>
        </div>
        @endforeach
      </div>
      <div class="col-md-6">
        <h6 class="mt-5 fw-bold live-exam-heading mb-4">
          <i class="fas fa-file-invoice fs-3 text-muted"></i> <span class="text-success">নোটিশ বোর্ড </span>
        </h6>
        @foreach($notices as $notice)
        <div class="card mb-3 col-md-12" style="">
          <div class="card-body">

            <h6 class="up-exam-title"><a href="{{$notice->fileLink}}">{{$notice->title}}</a></h6>
            <p class="live-exam-date pt-2"><span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($notice->created_at)->format('d M ,Y ') }} </span></p>
          </div>
        </div>
        @endforeach



      </div>
    </div>

  </div>
</section>
<section class="live-section" id="courses">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">আমাদের কোর্স সমূহ</h1>
  </div>
  <div class="container">
    <div class="row py-5">
      @foreach($courses as $course)

      <div class="col-md-4">
        <div class="card border-success shadow package-hover">
          <img src="{{Voyager::image($course->thumbnail)}}" height="300px" style="object-fit:contain" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="card-title">{{$course->title}}</h3>
            <div style="height:2px;width:100px" class="bg-danger"></div>
            <div class=" d-flex flex-sm-column flex-md-row gap-3  flex-wrap justify-content-between align-items-center mt-4">

              <a class="btn btn-success btn-lg " href="{{$course->link()}}" style="font-size: 13px ;">বিস্তারিত </a>
              <div class="d-flex  gap-5 text-dark" style="font-size: 14px;">

                <span>
                  <i class="fa fa-users"> ব্যাচ</i> :

                  {{$numto->bnNum($course->batches->count())}} </span>
                <span>
                  <i class="fa fa-certificate"> পরীক্ষা</i> :

                  {{$numto->bnNum($course->exams()->count())}}
                </span>

              </div>
            </div>
          </div>
        </div>

      </div>

      @endforeach

    </div>
  </div>
</section>
<!-- Live section end -->
<!-- Package section start -->
<section class="live-section" id="package">
  <div class="live-section-title" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
    <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">আমাদের প্যাকেজসমূহ</h1>
  </div>
  <div class="container">
    <div class="row py-5">
      @foreach($packages as $package)
      @if($package->paid)
      <div class="col-md-3 col-12">
        <div class="card border border-success shadow package-hover ">

          <div class="card-body d-flex  flex-column justify-content-center align-items-center shadow  p-5 gap-2">
            <div style="height:80px;width:80px" class="text-success shadow rounded-circle border-success border d-flex justify-content-center flex-column  align-items-center">
              <i class="fa fa-gifts fa-2x"></i>
            </div>
            <h4 class="text-uppercase" style="font-weight:700 ;">
              {{$package->title}}
            </h4>
            <h5 style="font-weight:700;">

              {{$numto->bnNum($package->price)}} &#2547;

            </h5>
            <ul class="premium-feature">
              <li><span>প্রশ্ন ব্যাংক</span></li>
              <li><span>সমস্ত রুটিন ভিত্তিক পরীক্ষা</span></li>
              <li><span>সমস্ত বিদ্যমান পরীক্ষা</span></li>
              <li><span>অনলাইন স্ব-পরীক্ষা</span></li>
              <li><span>কাজের সমাধান</span></li>

            </ul>
            <!-- <a href="{{route('orderCreate',['package',$package->id])}}" class="btn  btn-danger text-uppercase">
    Subscribe
  </a> -->
          </div>
        </div>
        <a class="btn btn-outline-danger d-block mt-3 text-uppercase" href="{{route('package-details',[Str::slug($package->title),$package])}}"> বিস্তারিত দেখুন</a>
      </div>

      @endif

      @endforeach

    </div>
  </div>


  <section class="">
    <div class=" py-4 d-flex flex-column flex-md-row justify-content-around gap-3" style="background-image: url({{asset('frontEnd-assets/img/Blog.png')}})">
      <div class="d-flex flex-column justify-content-center align-items-center text-light">
        <i class="fa fa-users fa-3x"></i>
        <h6>সাবস্ক্রাইবার </h6>
        <h5>{{$numto->bnNum(App\Models\User::count())}}</h5>
      </div>

      <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
        <i class="fa fa-file-alt fa-3x"></i>
        <h6>মডেল টেস্ট </h6>
        <h5>{{$numto->bnNum(App\Models\Exam::count())}}</h5>
      </div>

      <div class="d-flex flex-column justify-content-center align-items-center text-light gap-2">
        <i class="fa fa-question-circle fa-3x"></i>
        <h6>প্রশ্ন সংখ্যা </h6>
        <h5>{{$numto->bnNum(App\Models\Question::count())}}</h5>
      </div>


    </div>
  </section>

  @endsection