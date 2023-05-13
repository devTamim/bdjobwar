@extends('frontEnd.layouts.app')
@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="live-section-title" style="background-image: url({{ asset('frontEnd-assets/img/Blog.png') }})">
                    <h1 class="text-uppercase" style="font-weight:700 ;font-size:25px">নোটিশসমূহ
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <div class="card shadow">
                    <div class="card-header">
                        <h3>{{ $notice->title }}</h3>
                        @if ($notice->file)
                            @php
                                $link = Storage::url(json_decode($notice->file)[0]->download_link) ?? '';
                            @endphp
                            <a class="btn btn-sm btn-primary mt-3" href="{{ $link }}">Download</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $notice->description }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <h3>Notices :</h3>
                        <ul class="">
                            @foreach ($notices as $n)
                                <li class="list-group-item shadow @if($notice == $n) bg-primary @endif"> <a
                                        href="{{ route('notices', ['notice' => $n->id]) }}">{{ $loop->iteration }}.
                                        {{ $n->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        {{$notices->links()}}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
