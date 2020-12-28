@extends('layouts.joli')
@section('title', 'User Active')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>ACL</li>
        <li><a href="{{route('users')}}">User</a></li>
        <li class="active">Active</li>
    </ul>
@endsection
@section('pageTitle')
Make {{$user->name}} Active
@endsection
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
                    <h3 class="panel-title">Must Assign Role Before Activation</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('make.user.active', ['uid' => $user->id])}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label padding-top-0">Assign Role to {{$user->name}}</label>
                            <div class="col-md-6 col-xs-12">
                                @if($errors->has('roles'))
                                    <span class="help-block text-danger"><strong>Please select at least a Role</strong></span>
                                @endif
                                @foreach($roles as $role)
                                    <div class="form-check form-check-inline d-block">
                                        <input class="form-check-input" type="checkbox" value="{{$role->id}}"
                                               name="roles[]">
                                        <label class="text-secondary">{{$role->display_name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="{{route('users')}}" title="Back" class="btn btn-default">Back</a>
                            <button class="btn btn-primary pull-right">Active</button>
                        </div>
                    </div>
                </form>
                {{--     Form end               --}}
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

