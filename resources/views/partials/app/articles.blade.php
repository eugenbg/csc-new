<div class="columns is-multiline">
    @foreach ($articles as $article)
        <div class="column is-12 mb-5">
            <h2 class="title"><a class="has-text-grey-dark" href="{{ $article->link }}">{{ $article->title }}</a></h2>
            <div class="row">
                <div class="col-12">
                    <p class="has-text-grey">{{ $article->localized_published_at }}</p>
                </div>
            </div>

            <div class="content">
                <p>{{ getNWords($article->content, 50) }}</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="button is-link" href="{{ $article->link }}">{{ __('app.read_more') }}</a>
                </div>
            </div>
        </div>
    @endforeach
    @if ($articles->total() > $articles->count())
        <div class="column is-12">
            {!! $articles->appends(request()->except('page'))->links() !!}
        </div>
    @endif
</div>
