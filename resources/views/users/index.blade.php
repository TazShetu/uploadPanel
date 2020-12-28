@extends('layouts.joli')
@section('title', 'User')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>ACL</li>
        <li class="active">User</li>
    </ul>
@endsection
@section('pageTitle', 'User')
@section('content')
    <div class="row mb-5">
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @elseif(session('unSuccess'))
            <div class="alert alert-danger text-center">
                {{session('unSuccess')}}
            </div>
        @endif
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">CREATE USER</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('user.store')}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Name</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" placeholder="Full Name" name="name" required
                                           class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"
                                           value="{{old('name')}}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
                                    <input type="email" placeholder="Email" name="email" required
                                           class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                           value="{{old('email')}}">
                                </div>
                                @if($errors->has('email'))
                                    <span class="help-block text-danger">{{$errors->first('email')}}</span>
                                @endif
                                <small class="help-block">Duplicate entry is not allowed*</small>
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="col-md-3 col-xs-12 control-label">Password</label>--}}
                        {{--                            <div class="col-md-6 col-xs-12">--}}
                        {{--                                <div class="input-group">--}}
                        {{--                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>--}}
                        {{--                                    <input type="password" placeholder="Password" name="password" required--}}
                        {{--                                           class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}">--}}
                        {{--                                </div>--}}
                        {{--                                @if($errors->has('password'))--}}
                        {{--                                    <span class="help-block text-danger">{{$errors->first('password')}}</span>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="col-md-3 col-xs-12 control-label">Confirm Password</label>--}}
                        {{--                            <div class="col-md-6 col-xs-12">--}}
                        {{--                                <div class="input-group">--}}
                        {{--                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>--}}
                        {{--                                    <input type="password" placeholder="Password Confirmation"--}}
                        {{--                                           name="password_confirmation" required--}}
                        {{--                                           class="form-control">--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="col-md-3 col-xs-12 control-label padding-top-0">Role</label>--}}
                        {{--                            <div class="col-md-6 col-xs-12">--}}
                        {{--                                @if($errors->has('roles'))--}}
                        {{--                                    <span class="help-block text-danger"><strong>Please select at least a Role</strong></span>--}}
                        {{--                                @endif--}}
                        {{--                                @foreach($roles as $role)--}}
                        {{--                                    <div class="form-check form-check-inline d-block">--}}
                        {{--                                        <input class="form-check-input" type="checkbox" value="{{$role->id}}"--}}
                        {{--                                               name="roles[]">--}}
                        {{--                                        <label class="text-secondary">{{$role->display_name}}</label>--}}
                        {{--                                    </div>--}}
                        {{--                                @endforeach--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="panel-footer">
                            <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                    class="fa fa-refresh"></span></a>
                            <button class="btn btn-primary pull-right">Create</button>
                        </div>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
        <div class="col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ALL USERS</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $i => $u)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>
                                    @if(($u->role[0]->id) != 1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    @if(($u->id) > 3)
                                        <a href="{{route('user.edit', ['uid' => $u->id])}}"
                                           class="btn btn-sm btn-success"><span class="fa fa-pencil"></span></a>
                                        @if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
                                            @if(($u->role[0]->id) != 1)
                                                <a href="{{route('make.user.in.active', ['uid' => $u->id])}}"
                                                   class="btn btn-sm btn-danger ml-1"
                                                   onclick="return confirm('Are you sure you want to make {{$u->name}} inactive ?')">Make
                                                    Inactive</a>
                                            @else
                                                <a href="{{route('make.user.active', ['uid' => $u->id])}}"
                                                   class="btn btn-sm btn-warning ml-1"
                                                   onclick="return confirm('Are you sure you want to make {{$u->name}} active ?')">Make
                                                    Active</a>
                                            @endif
                                        @endif
                                    @else
                                        <a href="#" class="btn btn-sm btn-success disabled"><span
                                                class="fa fa-pencil"></span></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection

