@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="container">
            <form method="POST" enctype="multipart/form-data" action="{{sprintf('/admin/spell/%s/generate', $spell->id)}}">
                @csrf
                <div class="field">
                    <label class="label" for="input">Input</label>
                    <div class="control">
                        <input id="input" class="input is-large" value="" type="text" name="input"/>
                    </div>
                </div>
                <button type="submit" class="button is-info is-fullwidth is-large">Generate</button>
            </form>
            @if($generated ?? null)
                <div>
                    <h1>Generated Text</h1>
                    <pre>{{$generated}}</pre>
                </div>
            @endif
        </div>
    </section>
@endsection
