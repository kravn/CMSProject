<ul class="nav navbar-nav">
    <li><a href="{{ route('games')}}">{{ trans('application.games') }}</a></li>
</ul>
@if(count(Session::get('current_lang')->pages))
    <ul class="nav navbar-nav">
        @foreach(Session::get('current_lang')->pages->toHierarchy() as $node)
            {!! renderMenuNode($node) !!}
        @endforeach
    </ul>
@endif
<ul class="nav navbar-nav navbar-right">
    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in fa-lg"></i> {{ trans('application.login') }}</a></li>
</ul>
<ul class="nav navbar-nav navbar-right" style="display: none;">
    @if(!empty(Config::get('settings')->facebook))
        <li><a target="_blank" href="{{ Config::get('settings')->facebook }}"><i class="fa fa-facebook"></i></a></li>
    @endif
    @if(!empty(Config::get('settings')->twitter))
        <li><a target="_blank" href="{{ Config::get('settings')->twitter }}"><i class="fa fa-twitter"></i></a></li>
    @endif
    @if(!empty(Config::get('settings')->email))
        <li><a target="_blank" href="mailto:{{ Config::get('settings')->email }}"><i class="fa fa-envelope"></i></a></li>
    @endif
</ul>