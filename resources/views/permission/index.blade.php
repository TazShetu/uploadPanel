@extends('layouts.joli')
@section('title', 'Permissions')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>ACL</li>
        <li class="active">Permission</li>
    </ul>
@endsection
@section('pageTitle', 'Permissions')
@section('content')
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
        @endif
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
                                    <a href="{{route('permission.edit', ['pid' => $p->id])}}"
                                       class="btn btn-sm btn-success"><span class="fa fa-pencil"></span>
                                    </a>
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
@endsection
@section('script')
    <!-- START THIS PAGE PLUGINS-->
    {{--    <script type='text/javascript' src='{{asset('joli/js/plugins/icheck/icheck.min.js')}}'></script>--}}
    {{--    <script type="text/javascript" src="{{asset('joli/js/demo_tables.js')}}"></script>--}}
    <!-- END THIS PAGE PLUGINS-->
@endsection
