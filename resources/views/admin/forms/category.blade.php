@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @foreach (['title', 'description'] as $a)
        @include('partials.admin.form.text', ['attribute' => $a])
    @endforeach
    @include('partials.admin.form.dropdown', ['attribute' => 'show_in_menu', 'options' => [
         1 => 'Enabled',
         0 => 'Disabled',
    ]])
    @include('partials.admin.form.submit')
@endsection
