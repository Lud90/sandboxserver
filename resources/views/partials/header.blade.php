{{--
    Header and side navigation
--}}
<nav class="top-nav">
    <div class="nav-wrapper">
        <a href="#!" data-activates="slide-out" class="button-collapse hamburger"><i class="material-icons">menu</i></a>
        <a class="page-title">@yield('title')</a>
        <ul class="right contextButtons">
            @yield('context_buttons')
        </ul>

    </div>
</nav>
<ul class="side-nav fixed hide-on-small-and-down">
    @include('partials.nav')
</ul>
<ul id="slide-out" class="side-nav show-on-small">
    @include('partials.nav')
</ul>

