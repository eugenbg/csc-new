@extends('layouts.app')
@section('content')
    @include('partials.app.hero', [
        'title' => $uni->name,
        'description' => '',
    ])


    <section class="section">
        <div class="container">
            <h1>{{$uni->name}}</h1>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h2>Campus Photos</h2>
                    <div id="carousel-campus" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($campusImages as $image)
                                <button type="button" data-bs-target="#carousel-campus"
                                        data-bs-slide-to="{{$i}}" {{$i == 1 ? 'class=active aria-current=true' : ''}}>
                                </button>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                        </div>
                        <div class="carousel-inner">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($campusImages as $image)
                                <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                                    <div style="background-image:url(/images/{{$image->local_path}})"></div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-campus" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-campus" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <h2>Dorm Photos</h2>
                    <div id="carousel-dorm" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($dormImages as $image)
                                <button type="button" data-bs-target="#carousel-dorm"
                                        data-bs-slide-to="{{$i}}" {{$i == 1 ? 'class=active aria-current=true' : ''}}>
                                </button>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                        </div>
                        <div class="carousel-inner">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($dormImages as $image)
                                <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                                    <div style="background-image:url(/images/{{$image->local_path}})"></div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-dorm" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-dorm" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>


            <h2>Programs</h2>
            @php
                $i = 1;
            @endphp
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($programs as $type => $programList)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{$i==1 ? 'active' : ''}}" id="{{$type}}-tab" data-bs-toggle="tab" data-bs-target="#{{$type}}" type="button" role="tab" aria-controls="home" aria-selected="true">{{$type}} Programs</button>
                    </li>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </ul>
            <div class="tab-content p-3 card border-top-0 overflow-auto" style="max-height: 500px" id="myTabContent">
                @php
                    $i = 1;
                @endphp
                @foreach ($programs as $type => $programList)
                    <div class="container tab-pane fade show {{$i==1 ? 'active' : ''}}" id="{{$type}}" role="tabpanel" aria-labelledby="{{$type}}-tab">
                        <div class="row">
                            @foreach ($programList as $programName => $concreteCourses)
                                @foreach ($concreteCourses as $course)
                                    <div class="col-5 m-2">
                                        <div class="card">
                                            <div class="card-header">{{$programName}} (taught in {{$course->language}})</div>
                                            <div class="card-body">Price per year: {{$course->price}}</div>
                                            <div class="card-footer">Duration: {{$course->years}} years</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
    </section>
    <script>
        const myCarousel = document.querySelector('#uni-photos')
        const carousel = new bootstrap.Carousel(myCarousel)
    </script>
@endsection
