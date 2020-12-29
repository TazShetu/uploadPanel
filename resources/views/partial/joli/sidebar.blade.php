<div class="page-sidebar">

    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{url('/')}}" style="background-color:#1caf9a;">
                Twinbit
            </a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{asset('joli/avatar.png')}}" alt="Full Name">
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img
                        src="
                    @if(Auth::user()->profile_photo_path)
                    {{asset(Auth::user()->profile_photo_path)}}
                    @else
                        {{asset('joli/avatar.png')}}
                    @endif
                        " alt="Profile Image">
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{Auth::user()->name}}</div>
                </div>
            </div>
        </li>
        <li>
            <a href="{{route('dashboard')}}"><span class="glyphicon glyphicon-home"></span> <span
                    class="xn-text">Dashboard</span></a>
        </li>
        @permission('permission|role|user')
        <li class="xn-openable">
            <a href="#"><span class="glyphicon glyphicon-transfer"></span> <span class="xn-text"> ACL</span></a>
            <ul>
                @permission('permission')
                <li><a href="{{route('permission')}}"><i class="glyphicon glyphicon-minus"></i> Permissions</a></li>
                @endpermission
                @permission('role')
                <li><a href="{{route('role')}}"><i class="glyphicon glyphicon-minus"></i> Roles</a></li>
                @endpermission
                @permission('user')
                <li><a href="{{route('users')}}"><i class="glyphicon glyphicon-minus"></i> Users</a>
                </li>
                @endpermission
            </ul>
        </li>
        @endpermission
        @permission('image_category|image_vendor')
        <li class="xn-openable">
            <a href="#"><span class="fa fa-camera-retro"></span> <span class="xn-text"> Images</span></a>
            <ul>
                @permission('image_category')
                <li><a href="{{route('image.category')}}"><i class="glyphicon glyphicon-minus"></i> Category</a></li>
                @endpermission
                @permission('image_vendor')
                <li><a href="{{route('image.vendor')}}"><i class="glyphicon glyphicon-minus"></i> Vendor</a></li>
                @endpermission
            </ul>
        </li>
        @endpermission


    </ul>
</div>
