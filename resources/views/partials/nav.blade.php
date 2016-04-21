<li class="logo no-padding center-align">
    <a id="logo-container no-padding" class="brand-logo" href="#" style="height:140px">
        <img src="/img/placeholder_logo.png" alt="NS Sandboxes" style="width:140px">
    </a>
</li>
<li class="bold">
    <a class="waves-effect" href="/"><i class="material-icons vmid">dashboard</i>Dashboard</a>
</li>
<li class="no-padding">
    <ul class="collapsible collapsible-accordion">
        <li class="bold">
            <a class="collapsible-header waves-effect"><i class="material-icons vmid">chrome_reader_mode</i>News</a>
            <div class="collapsible-body">
                <ul>
                    <li>
                        <a href="{{ action('FP\NewsController@create') }}">New News</a>
                    </li>
                    <li>
                        <a href="{{ action('FP\NewsController@index') }}">List News</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</li>
<li class="no-padding">
    <ul class="collapsible collapsible-accordion">
        <li class="bold">
            <a class="collapsible-header waves-effect"><i class="material-icons vmid">event</i>Events</a>
            <div class="collapsible-body">
                <ul>
                    <li>
                        <a href="{{ action('FP\EventController@create') }}">New Event</a>
                    </li>
                    <li>
                        <a href="{{ action('FP\EventController@index') }} ">List Events</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</li>
<li class="no-padding">
    <ul class="collapsible collapsible-accordion">
        <li class="bold">
            <a class="collapsible-header waves-effect"><i class="material-icons vmid">pin_drop</i>Sandboxes</a>
            <div class="collapsible-body">
                <ul>
                    <li>
                        <a href="#">New Sandbox</a>
                    </li>
                    <li>
                        <a href="#">List Sandboxes</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</li>
<li class="no-padding">
    <ul class="collapsible collapsible-accordion">
        <li class="bold">
            <a class="collapsible-header waves-effect"><i class="material-icons vmid">fingerprint</i>Admins</a>
            <div class="collapsible-body">
                <ul>
                    <li>
                        <a href="{{ action('FP\AdminController@create') }}">New Admin</a>
                    </li>
                    <li>
                        <a href="{{ action('FP\AdminController@index') }}">List Admins</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</li>
<li class="bold">
    <a class="waves-effect" href="#"><i class="material-icons vmid">people</i>Users</a>
</li>
<li class="bold">
    <a class="waves-effect" href="#"><i class="material-icons vmid">settings</i>Settings</a>
</li>
<li class="bold">
    <a class="waves-effect" href="{{ action('FP\FPController@logout') }}"><i class="material-icons vmid">exit_to_app</i>Sign Out</a>
</li>