<nav class="top-nav">
    <div class="nav-wrapper">
        <a class="page-title">@yield('title')</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="#" class="dropdown-button" data-activates="account_dropdown" data-beloworigin="true">
                    Username<i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
            <ul id="account_dropdown" class="dropdown-content">
                <li><a href="#">Logout</a></li>
            </ul>
        </ul>
    </div>
</nav>
<ul id="nav-mobile" class="side-nav fixed">
    <li class="logo no-padding center-align">
        <a id="logo-container no-padding" class="brand-logo" href="#" style="height:140px">
            <img src="/img/placeholder_logo.png" alt="NS Sandboxes" style="width:140px">
        </a>
    </li>
    <li class="bold">
        <a class="waves-effect" href="#"><i class="material-icons left vmid">dashboard</i>Dashboard</a>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <a class="collapsible-header waves-effect"><i class="material-icons left vmid">chrome_reader_mode</i>News</a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="#">New News</a>
                        </li>
                        <li>
                            <a href="#">List News</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <a class="collapsible-header waves-effect"><i class="material-icons left vmid">event</i>Events</a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="#">New Event</a>
                        </li>
                        <li>
                            <a href="#">List Events</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li class="bold">
        <a class="waves-effect" href="#"><i class="material-icons left vmid">fingerprint</i>Admins</a>
    </li>
    <li class="bold">
        <a class="waves-effect" href="#"><i class="material-icons left vmid">people</i>Users</a>
    </li>
    <li class="bold">
        <a class="waves-effect" href="#"><i class="material-icons left vmid">settings</i>Settings</a>
    </li>
</ul>