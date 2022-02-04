@extends('layouts.app')

@include('partials.app.sections', [
'title' => getTitle($title),
'image' => getImage()
])

@section("meta_title", $category->title)

@section('content')
    @include('partials.app.hero')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-2 is-8">
                    <div class="box">
                        <div class="content">
                            @include('partials.app.articles')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
