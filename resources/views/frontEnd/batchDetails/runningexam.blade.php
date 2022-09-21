@extends('frontEnd.layouts.app')

@section('content')
    <h2 class="m-5 ">
        লাইভ পরীক্ষা
    </h2>
    <div class="container table-responsive my-5" style="height:80vh;overflow-y:scroll">
        @if ($exams->count())
            <table class="table table-borderless table-hover text-center ">
                <thead class="bg-success text-light">
                    <tr>
                        <th scope="col">
                            শুরু
                        </th>

                        <th scope="col">
                            নাম
                        </th>

                        <th scope="col">
                            পূর্ণ নম্বর
                        </th>
                        <th scope="col">
                            শেষ
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
                            <td scope="row">
                                {{ $from->getDateTime()->format('j F, Y b h:i') }}


                            </td>

                            <td>
                                {{ $exam->title }}
                            </td>

                            <td>
                                {{ $exam->fullMark }}
                            </td>
                            <td>
                                {{ $to->getDateTime()->format('j F, Y b h:i') }}
                            </td>

                            <td>

                                <a href="{{ route('start-exam', $exam->uuid) }}" class="btn btn-primary"> টেস্ট
                                    দিন</a>

                                <button data-syllabus="{{ $exam->syllabus }}" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" class="btn btn-dark"> সিলেবাস</button>
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
        @else
            <div class="container text-center my-5">
                <img src="{{ asset('icons/runningExam.svg') }}" height="200px" class="mb-5" alt="">
                <h1>এই মুহূর্তে কোন লাইভ পরীক্ষা নেই</h1>
                <h5>
                    পরবর্তী পরীক্ষার সিলেবাস দেখতে রুটিন/আপকামিং বাটন দেখুন। পুরনো পরীক্ষা দেখতে আর্কাইভ বাটন ভিজিট করুন।
                </h5>
                <h5>
                    পড়ে আবার চেক করুণ
                </h5>
                  </div>
        @endif
    </div>
@endsection
