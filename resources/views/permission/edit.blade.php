@extends('layouts.joli')
@section('title', 'Permission Edit')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>ACL</li>
        <li><a href="{{route('permission')}}">Permission</a></li>
        <li class="active">Edit</li>
    </ul>
@endsection
@section('pageTitle', 'Permission Edit')
@section('content')
    <section class="pb-5">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">PERMISSION UPDATE</h3>
                    </div>
                    <form action="{{route('permission.update', ['pid' => $pedit->id])}}" class="form-horizontal"
                          method="post">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Display Name</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" value="{{$pedit->display_name}}" name="displayName" required
                                               class="form-control {{$errors->has('displayName') ? 'is-invalid' : ''}}">
                                    </div>
                                    @if($errors->has('displayName'))
                                        <span class="help-block text-danger">{{$errors->first('displayName')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Description</label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" value="{{$pedit->description}}" name="description" required
                                               class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">
                                    </div>
                                    @if($errors->has('description'))
                                        <span class="help-block text-danger">{{$errors->first('description')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a title="refresh" class="btn btn-default back" data-link="{{route('back')}}"><span
                                    class="fa fa-refresh"></span></a>
                            <button class="btn btn-primary pull-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-5">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!-- START TABLE HOVER ROWS -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">PERMISSIONS</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ps as $p)
                                <tr>
                                    <td>{{$p->display_name}}</td>
                                    <td>{{$p->description }}</td>
                                    <td>
                                        @if($p->id != $pedit->id)
                                            <a href="{{route('permission.edit', ['pid' => $p->id])}}"
                                               class="btn btn-sm btn-success"><span class="fa fa-pencil"></span>
                                            </a>
                                        @else
                                            <a href="{{route('permission.edit', ['pid' => $p->id])}}"
                                               class="btn btn-sm btn-success disabled"><span
                                                    class="fa fa-pencil"></span>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END TABLE HOVER ROWS -->
            </div>
        </div>
    </section>
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
