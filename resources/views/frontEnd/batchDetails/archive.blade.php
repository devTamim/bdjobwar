@extends('frontEnd.layouts.app')

@section('content')
    <h2 class="m-5">
        আর্কাইভ
    </h2>
    @if ($exams->count())
        <div class="container table-responsive my-5" style="height:80vh;overflow-y:scroll">

            <table class="table table-borderless table-hover text-center ">
                <thead class="bg-success text-light">
                    <tr>
                        <th scope="col">
                            নাম
                        </th>
                        <th scope="col">
                            বিষয়
                        </th>
                        <th scope="col">
                            পূর্ণ নম্বর
                        </th>

                        <th scope="col">

                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        @php
                            $from = new EasyBanglaDate\Types\BnDateTime($exam->from, new DateTimeZone('Asia/Dhaka'));
                            $to = new EasyBanglaDate\Types\BnDateTime($exam->to, new DateTimeZone('Asia/Dhaka'));
                        @endphp
                        <tr>


                            <td>
                                {{ $exam->title }}
                            </td>

                            <td>
                                {{ $exam->sub_title }}
                            </td>

                            <td>
                                {{ $exam->fullMark }}
                            </td>


                            <td>
                                <!-- <div class="dropdown open">
                                                                                                    <a class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                        Dropdown
                                                                                                    </a> -->
                                <!-- <div class="dropdown-menu" aria-labelledby="triggerId"> -->
                                <a href="{{ route('start-exam', $exam->uuid) }}" class="btn btn-primary"> টেস্ট দিন</a>
                                <!-- <button data-syllabus="{{ $exam->syllabus }}" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item"> সিলেবাস</button> -->
                                <a href="{{ route('all-results-exam', $exam->uuid) }}" class="btn btn-dark"> মেধাতালিকা</a>
                                <a href="{{ route('answerSheet', $exam->uuid) }}" class="btn btn-info text-white">
                                    উত্তরমালা</a>

                                <a class="btn btn-warning"
                                    onclick="alert('বিঃদ্রঃ প্রাকটিস পরীক্ষা দিয়ে আপনি আপনার পড়া কতটুকু মনে রাখতে পেরেছেন তা যাচাই করতে পারবেন। আপনার পূর্ববর্তী মেধাতালিকার কোন পরিরবর্তন হবে না।')"
                                    href="{{ route('start', [$exam->uuid, 'practice' => true]) }}"
                                    class="btn btn-info ">প্রাকটিস পরীক্ষা
                                </a>

                                <!-- </div> -->
                                <!-- </div> -->
                                @auth
                                    @if (auth()->user()->information->is_paid ||
                                        auth()->user()->bought($batch->id))
                                        @if ($exam->reading_pdf && count(json_decode($exam->reading_pdf)))
                                            <a href="{{ Voyager::image(json_decode($exam->reading_pdf)[0]->download_link) }}"
                                                class="btn btn-dark mt-2"> পড়ার পিডিএফ</a>
                                        @endif
                                    @endif
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @else
      <div class="container text-center my-5">
                <img src="{{ asset('icons/archive.svg') }}" height="200px" class="mb-5" alt="">
                <h1>এখন পর্যন্ত কোন পরীক্ষা শেষ হয়নি। সকল পুরনো পরীক্ষা এখানে দেখতে পাবেন।</h1>
                <h5>
                    পড়ে আবার চেক করুণ
                </h5>
            </div>
    @endif
@endsection
