@extends('layouts.app')

@include('partials.app.sections', [
'title' => getTitle($title = $object->title),
'description' => getDescription($description = $object->description),
'image' => getImage()
])

@section('meta_title', $object->meta_title ? $object->meta_title :  $object->title)
@section('content')
    @include('partials.app.hero', ['class' => 'has-text-centered'])
    @include('partials.app.content', ['content' => $object->content])
@endsection
