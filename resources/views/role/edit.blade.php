@extends('layouts.joli')
@section('title', 'Role Edit')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>ACL</li>
        <li><a href="{{route('role')}}">Role</a></li>
        <li class="active">Edit</li>
    </ul>
@endsection
@section('pageTitle', 'Role Edit')
@section('content')
    <div class="row mb-5">
        @if(session('unSuccess'))
            <div class="alert alert-danger text-center">
                {{session('unSuccess')}}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @endif
        <div class="col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ROLE Edit</h3>
                </div>
                {{--     Form Start              --}}
                <form action="{{route('role.update', ['rid' => $redit->id])}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Title</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$redit->name}}" name="name" required
                                           class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                @endif
                                <small class="help-block">Duplicate entry is not allowed*</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Display Name</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                    <input type="text" value="{{$redit->display_name}}" name="displayName" required
                                           class="form-control {{$errors->has('displayName') ? 'is-invalid' : ''}}">
                                </div>
                                @if($errors->has('displayName'))
                                    <span class="help-block text-danger">{{$errors->first('displayName')}}</span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        {{--      Permissions will go here              --}}
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Menu Permissions</label>
                            <br>
                            <div class="col-md-6 col-xs-12">
                                @if($errors->has('permission'))
                                    <span
                                        class="help-block text-danger"><strong>Please Select at least one permission.</strong></span>
                                @endif
                                @foreach($permissions as $m)
                                    <div
                                        class="form-check form-check-inline d-block">
                                        <input class="form-check-input" type="checkbox" value="{{$m->id}}"
                                               name="permission[]"
                                               @foreach($pedits as $pe)
                                               @if(($pe->id * 1) == ($m->id * 1))
                                               checked
                                            @break
                                            @endif
                                            @endforeach
                                        >
                                        <label for="{{$m->name}}">{{$m->display_name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                class="fa fa-refresh"></span></a>
                        <button class="btn btn-primary pull-right">Update</button>
                    </div>
                </form>
                {{--     Form end               --}}
            </div>
        </div>
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ALL ROLES</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Display Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $i => $r)
                            <tr>
                                <th scope="row">{{$i + 1}}</th>
                                <td>{{$r->display_name}}</td>
                                <td>
                                    @if($r->id != $redit->id)
                                        <a href="{{route('role.edit', ['rid' => $r->id])}}"
                                           class="btn btn-sm btn-success m-1"><span class="fa fa-pencil"></span></a>
                                        <form action="{{route('role.delete', ['rid' => $r->id])}}" method="POST"
                                              style="display: inline-table;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger m-1"
                                                    onclick="return confirm('Are you sure you want to delete the Role ?')">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{route('role.edit', ['rid' => $r->id])}}"
                                           class="btn btn-sm btn-success m-1 disabled"><span
                                                class="fa fa-pencil"></span></a>
                                        <a href="#" class="btn btn-sm btn-danger m-1 disabled"><i
                                                class="fa fa-trash-o"></i></a>
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
    {{--    <script type='text/javascript' src="{{asset('joli/js/plugins/icheck/icheck.min.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    {{--    <script type='text/javascript' src="{{asset('joli/js/plugins/icheck/icheck.min.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/bootstrap/bootstrap-select.js')}}"></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection

