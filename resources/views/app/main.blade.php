@extends('layouts.app')

@section('title')China Scholarship Council (CSC) Guide@endsection

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
                        <div class="content">{!! $object->content !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row">
                <h1 style="text-align: center">Universities Offering CSC Scholarships</h1>

                @foreach ($unis as $uni)
                    <div class="card m-3" style="width: 18rem;">
                        @if($uni->getImage())
                            <img alt="CSC Scholarships for {{$uni->name}}" class="card-img-top" src="/images/{{$uni->getImage()->local_path}}"/>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{$uni->name}}</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{$uni->link}}">CSC Guide for {{$uni->name}}</a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
