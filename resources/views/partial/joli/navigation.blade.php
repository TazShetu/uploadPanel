<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <!-- TOGGLE NAVIGATION -->
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
    </li>
    <li class="xn-icon-button pull-right">
        <a href="javascript: void (0)" class="mb-control" data-box="#mb-signout"><span
                class="fa fa-sign-out"></span></a>
    </li>
{{--    @if(Auth::id() > 3)--}}
        <li class="xn-icon-button pull-right">
            <a href="{{route('account.settings')}}"><span class="fa fa-gears"></span></a>
        </li>
{{--    @endif--}}

</ul>

<!-- Logout MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if you want to continue work. Press Yes to logout.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="#" class="btn btn-success btn-lg"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    >
                        Yes
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
