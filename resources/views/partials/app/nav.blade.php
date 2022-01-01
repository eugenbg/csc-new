<nav class="navbar is-light">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('root') }}">
                <img src="{{ asset(config('settings.logo')) }}" alt="{{ config('settings.site_title') }}">
            </a>
            <div id="toggle-menu" class="navbar-burger burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="menu" class="navbar-menu">
            <div class="navbar-start">
                @foreach (getMenu() as $linkText => $payload)
                    @if (isset($payload['children']) && count($payload['children']) > 0)
                        <div class="navbar-item has-dropdown is-hoverable">
                            <div class="navbar-link">
                                <a class="navbar-item {{ active($payload['slug']) }}" href="/{{ $payload['slug'] }}">
                                    {{ $linkText }}
                                </a>
                            </div>
                            <div class="navbar-dropdown">
                                @foreach ($payload['children'] as $childLinkText => $child)
                                    <a class="navbar-item {{ active($child['slug']) }}" href="/{{ $child['slug'] }}">
                                        {{ $childLinkText }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a class="navbar-item" href="/{{ $payload['slug'] }}">
                            {{ $linkText }}
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field is-grouped">
                        <p class="control">
                            <a target="_blank" rel="noopener noreferrer" href="@yield('facebook')" class="button button-facebook">
                                <span class="icon">{!! icon('facebook') !!}</span>
                                <span>{{ __('app.buttons.share') }}</span>
                            </a>
                        </p>
                        <p class="control">
                            <a target="_blank" rel="noopener noreferrer" href="@yield('twitter')" class="button button-twitter">
                                <span class="icon">{!! icon('twitter') !!}</span>
                                <span>{{ __('app.buttons.tweet') }}</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
