@extends('layouts.app')

@section('title') China Scholarship Council (CSC) Guide @endsection

@section('content')

    <style>
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }

        .card {
            padding: 0;
        }
    </style>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-2 is-8">
                    <div class="box">
                        <h1>China Scholarship Council (CSC)</h1>
                        <div class="content">{!! $article->content !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-2 is-8 overflow-scroll" style="max-height: 1000px">
                    <div class="box">
                        <h1 style="text-align: center">Universities Offering CSC Scholarships</h1>
                        <div class="row">

                            @foreach ($unis as $uni)
                                <div class="col-4 p-1">
                                    <div class="card">
                                        @if($uni->local_path)
                                            <img alt="CSC Scholarships for {{$uni->name}}" class="card-img-top" src="/images/{{$uni->local_path}}"/>
                                        @endif

                                        <div class="card-body">
                                            <h5 class="card-title"><strong>{{$uni->abbr}}</strong> - {{$uni->name}}</h5>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{$uni->link}}">CSC Guide for {{$uni->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
