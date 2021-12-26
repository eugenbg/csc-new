<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-offset-2 is-8">
                <div class="box">
                    @if($object->image)
                        <img style="max-height: 300px" src="{!! $object->image !!}" alt="test"/>
                    @endif
                    <div class="content">{!! $content !!}</div>
                </div>
                @include('partials.app.breadcrumbs')
            </div>
        </div>
    </div>
</section>
