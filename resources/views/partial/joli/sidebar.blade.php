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
                    <img src="{{asset('joli/avatar.png')}}" alt="Full Name">
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
                <li><a href="{{route('permission')}}"><i class="glyphicon glyphicon-minus"></i> Permission</a></li>
                @endpermission
                @permission('role')
                <li><a href="{{route('role')}}"><i class="glyphicon glyphicon-minus"></i> Role</a></li>
                @endpermission
                @permission('user')
                <li><a href="{{route('users')}}"><i class="glyphicon glyphicon-minus"></i> User</a>
                </li>
                @endpermission
            </ul>
        </li>
        @endpermission
        {{--        @permission('office_setup|branch_setup|pay_scale|tax|designation|employee_type|working_hour|religion|leave')--}}
        {{--        <li class="xn-openable">--}}
        {{--            <a href="#"><span class="fa fa-building-o"></span> <span--}}
        {{--                        class="xn-text"> {{$menu[6]->display_name}}</span></a>--}}
        {{--            <ul>--}}
        {{--                @permission('office_setup')--}}
        {{--                <li><a href="{{route('office.setup')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[7]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('branch_setup')--}}
        {{--                <li><a href="{{route('branch.setup')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[8]->display_name}}--}}
        {{--                    </a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('pay_scale')--}}
        {{--                <li><a href="{{route('payScale')}}"><i class="glyphicon glyphicon-minus"></i> {{$menu[9]->display_name}}--}}
        {{--                    </a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('tax')--}}
        {{--                <li><a href="{{route('tax.setup')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[10]->display_name}}</a>--}}
        {{--                </li>--}}
        {{--                @endpermission--}}
        {{--                @permission('designation')--}}
        {{--                <li><a href="{{route('designation')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[11]->display_name}}</a>--}}
        {{--                </li>--}}
        {{--                @endpermission--}}
        {{--                @permission('employee_type')--}}
        {{--                <li><a href="{{route('employee.type')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[12]->display_name}}</a>--}}
        {{--                </li>--}}
        {{--                @endpermission--}}
        {{--                @permission('general')--}}
        {{--                <li><a href="{{route('general.setup')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[13]->display_name}}</a>--}}
        {{--                </li>--}}
        {{--                @endpermission--}}
        {{--                @permission('religion')--}}
        {{--                <li><a href="{{route('religion')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[14]->display_name}}</a>--}}
        {{--                </li>--}}
        {{--                @endpermission--}}
        {{--                @permission('leave')--}}
        {{--                <li><a href="{{route('leave.setup')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[15]->display_name}}</a>--}}
        {{--                </li>--}}
        {{--                @endpermission--}}
        {{--            </ul>--}}
        {{--        </li>--}}
        {{--        @endpermission--}}
        {{--        @permission('circular')--}}
        {{--        <li>--}}
        {{--            <a href="{{route('circular')}}"><span class="glyphicon glyphicon-export"></span> <span--}}
        {{--                        class="xn-text">{{$menu[16]->display_name}}</span></a>--}}
        {{--        </li>--}}
        {{--        @endpermission--}}
        {{--        @permission('employee_create|employee_edit|increment_policy|increment|promotion|account_close|transfer')--}}
        {{--        <li class="xn-openable">--}}
        {{--            <a href="#"><span class="fa fa-sitemap"></span> <span--}}
        {{--                        class="xn-text"> {{$menu[17]->display_name}}</span></a>--}}
        {{--            <ul>--}}
        {{--                @permission('employee_create')--}}
        {{--                <li><a href="{{route('employee.create')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[18]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('employee_edit')--}}
        {{--                <li><a href="{{route('employee.edit')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[19]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('increment_policy')--}}
        {{--                <li><a href="{{route('increment.policy')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[20]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('increment')--}}
        {{--                <li><a href="{{route('increment')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[21]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('transfer')--}}
        {{--                <li class="xn-openable">--}}
        {{--                    <a href="#"><span class="fa fa-sitemap"></span> <span--}}
        {{--                                class="xn-text"> {{$menu[23]->display_name}}</span></a>--}}
        {{--                    <ul>--}}
        {{--                        <li><a href="{{route('transfer.release')}}"><i--}}
        {{--                                        class="glyphicon glyphicon-minus"></i> {{$menu[24]->display_name}}</a>--}}
        {{--                        </li>--}}
        {{--                        <li><a href="{{route('transfer.join')}}"><i--}}
        {{--                                        class="glyphicon glyphicon-minus"></i> {{$menu[25]->display_name}}--}}
        {{--                            </a></li>--}}
        {{--                        --}}{{--                        <li><a href="{{route('test')}}"><span class="fa fa-download"></span> Test</a></li>--}}
        {{--                    </ul>--}}
        {{--                </li>--}}
        {{--                @endpermission--}}
        {{--            </ul>--}}
        {{--        </li>--}}
        {{--        @endpermission--}}
        {{--        @permission('l_application|l_supervisor|l_HR')--}}
        {{--        <li class="xn-openable">--}}
        {{--            <a href="#"><span class="fa fa-plane"></span> <span--}}
        {{--                        class="xn-text"> {{$menu[26]->display_name}}</span></a>--}}
        {{--            <ul>--}}
        {{--                @permission('l_application')--}}
        {{--                <li><a href="{{route('leave.application')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[27]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('l_HR')--}}
        {{--                <li><a href="{{route('leave.application.view', ['uid' => 0])}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[28]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('l_supervisor')--}}
        {{--                <li><a href="{{route('leave.application.view.DH', ['uid' => 0])}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[29]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--            </ul>--}}
        {{--        </li>--}}
        {{--        @endpermission--}}
        {{--        @if((Auth::user()->branch_id * 1) != 0)--}}
        {{--            <li class="xn-openable">--}}
        {{--                <a href="#"><span class="glyphicon glyphicon-check"></span> <span--}}
        {{--                            class="xn-text"> {{$menu[30]->display_name}}</span></a>--}}
        {{--                <ul>--}}
        {{--                    <li><a href="{{route('attendance.receive')}}"><i--}}
        {{--                                    class="glyphicon glyphicon-minus"></i> {{$menu[31]->display_name}}</a></li>--}}
        {{--                    @permission('attendance_edit')--}}
        {{--                    <li><a href="{{route('attendance.show')}}"><i--}}
        {{--                                    class="glyphicon glyphicon-minus"></i> {{$menu[32]->display_name}}</a></li>--}}
        {{--                    @endpermission--}}
        {{--                </ul>--}}
        {{--            </li>--}}
        {{--        @endif--}}
        {{--        @permission('salary_generate|bonus|provident_fund|pension|loan')--}}
        {{--        <li class="xn-openable">--}}
        {{--            <a href="#"><span class="fa fa-money"></span> <span--}}
        {{--                        class="xn-text"> {{$menu[33]->display_name}}</span></a>--}}
        {{--            <ul>--}}
        {{--                @permission('salary_generate')--}}
        {{--                <li><a href="{{route('salary')}}"><i class="glyphicon glyphicon-minus"></i> {{$menu[34]->display_name}}--}}
        {{--                    </a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('bonus')--}}
        {{--                <li><a href="{{route('bonus.setup')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[35]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('provident_fund')--}}
        {{--                <li><a href="{{route('provident')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[36]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('pension')--}}
        {{--                <li><a href="{{route('pension')}}"><i class="glyphicon glyphicon-minus"></i> {{$menu[37]->display_name}}--}}
        {{--                    </a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('loan')--}}
        {{--                <li><a href="{{route('loan.type')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[38]->display_name}}</a></li>--}}
        {{--                @endpermission--}}
        {{--            </ul>--}}
        {{--        </li>--}}
        {{--        @endpermission--}}
        {{--        @permission('communication_global|communication_private')--}}
        {{--        <li class="xn-openable">--}}
        {{--            <a href="#"><span class="glyphicon glyphicon-envelope"></span> <span--}}
        {{--                        class="xn-text"> {{$menu[39]->display_name}} </span>--}}
        {{--                @if((((Auth::user()->tag)*1) > 0) || (Auth::user()->new_message_count > 0))--}}
        {{--                    <span class="badge badge-warning ml-1">&nbsp;<b>{{(Auth::user()->tag * 1) + (Auth::user()->new_message_count * 1)}}</b></span>--}}
        {{--                @endif--}}
        {{--            </a>--}}
        {{--            <ul>--}}
        {{--                @permission('communication_global')--}}
        {{--                <li><a href="{{route('commentg')}}"><span--}}
        {{--                                class="fa fa-comments-o"></span> {{$menu[40]->display_name}}--}}
        {{--                        @if(((Auth::user()->tag)*1) > 0)--}}
        {{--                            <span class="badge badge-warning ml-1">&nbsp;<b>{{Auth::user()->tag}}</b></span>--}}
        {{--                        @endif--}}
        {{--                    </a></li>--}}
        {{--                @endpermission--}}
        {{--                @permission('communication_private')--}}
        {{--                <li class="xn-openable">--}}
        {{--                    <a href="#"><span class="fa fa-envelope"></span> <span--}}
        {{--                                class="xn-text"> {{$menu[41]->display_name}} </span>--}}
        {{--                        @if(Auth::user()->new_message_count > 0)--}}
        {{--                            <span class="badge badge-warning ml-1">{{Auth::user()->new_message_count}}</span>--}}
        {{--                        @endif--}}
        {{--                    </a>--}}
        {{--                    <ul>--}}
        {{--                        <li><a href="{{route('message.inbox')}}"><span class="fa fa-inbox"></span> Inbox</a></li>--}}
        {{--                        <li><a href="{{route('message.sent')}}"><span class="glyphicon glyphicon-send"></span> Sent</a>--}}
        {{--                        </li>--}}
        {{--                        <li><a href="{{route('message.create')}}"><span class="fa fa-pencil"></span> New</a></li>--}}
        {{--                    </ul>--}}
        {{--                </li>--}}
        {{--                @endpermission--}}
        {{--            </ul>--}}
        {{--        </li>--}}
        {{--        @endpermission--}}
        {{--        @if((Auth::user()->branch_id * 1) != 0)--}}
        {{--            <li class="xn-openable">--}}
        {{--                <a href="#"><span class="fa fa-thumbs-o-down"></span> <span--}}
        {{--                            class="xn-text"> {{$menu[42]->display_name}}</span>--}}
        {{--                    @if(Auth::user()->complain > 0)--}}
        {{--                        <span class="badge badge-warning ml-1">{{Auth::user()->complain}}</span>--}}
        {{--                    @endif--}}
        {{--                </a>--}}
        {{--                <ul>--}}
        {{--                    <li><a href="{{route('warning.create')}}"><i--}}
        {{--                                    class="glyphicon glyphicon-minus"></i> {{$menu[43]->display_name}}</a></li>--}}
        {{--                    @permission('warningDH')--}}
        {{--                    <li><a href="{{route('warning.showDH')}}"><i--}}
        {{--                                    class="glyphicon glyphicon-minus"></i> {{$menu[44]->display_name}}</a></li>--}}
        {{--                    @endpermission--}}
        {{--                    <li><a href="{{route('appeal.create')}}"><i--}}
        {{--                                    class="glyphicon glyphicon-minus"></i> {{$menu[45]->display_name}}--}}
        {{--                            @if(Auth::user()->complain > 0)--}}
        {{--                                <span class="badge badge-warning ml-1">{{Auth::user()->complain}}</span>--}}
        {{--                            @endif--}}
        {{--                        </a></li>--}}
        {{--                    @permission('warningHR')--}}
        {{--                    <li><a href="{{route('warning.showHR')}}"><i--}}
        {{--                                    class="glyphicon glyphicon-minus"></i> {{$menu[46]->display_name}}</a></li>--}}
        {{--                    @endpermission--}}
        {{--                </ul>--}}
        {{--            </li>--}}
        {{--            @if(((Auth::user()->kpiVoting * 1) == 1) && ((Auth::user()->branch_id * 1) != 0))--}}
        {{--                <li>--}}
        {{--                    <a href="{{route('kpi.vote')}}"><span class="fa fa-tasks"></span> <span--}}
        {{--                                class="xn-text">{{$menu[47]->display_name}}</span></a>--}}
        {{--                </li>--}}
        {{--            @endif--}}
        {{--        @endif--}}
        {{--        @permission('kpi')--}}
        {{--        <li class="xn-openable">--}}
        {{--            <a href="#"><span class="fa fa-gavel"></span> <span--}}
        {{--                        class="xn-text"> {{$menu[48]->display_name}}</span></a>--}}
        {{--            <ul>--}}
        {{--                <li><a href="{{route('kpi.setup')}}"><i--}}
        {{--                                class="glyphicon glyphicon-minus"></i> {{$menu[49]->display_name}}</a></li>--}}
        {{--                <li><a href="{{route('kpi')}}"><i class="glyphicon glyphicon-minus"></i> {{$menu[50]->display_name}}</a>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
        {{--        </li>--}}
        {{--        @endpermission--}}
        {{--        @if((Auth::user()->branch_id * 1) != 0)--}}
        {{--            <li class="xn-openable">--}}
        {{--                <a href="#"><span class="glyphicon glyphicon-calendar"></span> <span--}}
        {{--                            class="xn-text"> {{$menu[51]->display_name}}</span></a>--}}
        {{--                <ul>--}}
        {{--                    @permission('project_manager')--}}
        {{--                    <li><a href="{{route('task.project.manager')}}"><i--}}
        {{--                                    class="glyphicon glyphicon-minus"></i> {{$menu[52]->display_name}}</a></li>--}}
        {{--                    @endpermission--}}
        {{--                    <li><a href="{{route('task.general')}}"><i--}}
        {{--                                    class="glyphicon glyphicon-minus"></i> {{$menu[53]->display_name}}</a></li>--}}
        {{--                </ul>--}}
        {{--            </li>--}}
        {{--        @endif--}}

    </ul>
</div>
