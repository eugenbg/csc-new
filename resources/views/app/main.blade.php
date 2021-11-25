@extends('layouts.app')
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
            <div class="row">
                @foreach ($unis as $uni)
                    <div class="card m-3" style="width: 18rem;">
                        @if($uni->getImage())
                            <img alt="CSC Scholarships for {{$uni->name}}" class="card-img-top" src="/images/{{$uni->getImage()->local_path}}"/>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{$uni->name}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        <div class="card-body">
                            <a href="{{$uni->link}}">Scholarship guide for {{$uni->name}}</a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
