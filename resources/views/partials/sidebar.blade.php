<!--
    This is the side bar that will accompany all admin pages.
 -->
<div class="col s3">
    <ul class="collection collapsible" data-collapsible="accordion">
        {{--
            This is a list that hooks into material css so sub lists act as drop downs
            when the main list item container is clicked
         --}}
        <li>
            <div class="collapsible-header"><i class="material-icons"></i>News</div>
            <div class="collapsible-body">
                <ul> {{-- news drop down options--}}
                    <li class="collection-item"><a href="../api/news">Add News</a></li>
                    <li class="collection-item"><a href="../api/news">List News</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons"></i>Events</div>
            <div class="collapsible-body">
                <ul>{{-- Events drop down options--}}
                    <li class="collection-item"><a href="/admin/eventadd/">Add Event</a></li>
                    <li class="collection-item"><a href="../api/events">List Events</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons"></i>Registration</div>
            <div class="collapsible-body">
                <ul>{{-- Registration options drop down options--}}
                    <li class="collection-item"><a href="../api/news">option1</a></li>
                    <li class="collection-item"><a href="../api/news">option2</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons"></i>Settings</div>
            <div class="collapsible-body">
                <ul>{{-- Settings drop down options--}}
                    <li class="collection-item"><a href="../api/news">option1</a></li>
                    <li class="collection-item"><a href="../api/news">option2</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons"></i>Accounts</div>
            <div class="collapsible-body">
                <ul>{{-- Accounts drop down options--}}
                    <li class="collection-item"><a href="../api/news">option1</a></li>
                    <li class="collection-item"><a href="../api/news">option2</a></li>
                    <li class="collection-item"><a href="../api/news">option3</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
