@extends('layouts.app')
@section('content')
<script type="text/javascript" src="{{ asset('concave5/js/plugins/highcharts/code/highcharts.js') }}"></script>

<div class="page-header">
	<h2>Dashboard <small> Manage your web application  </small></h2>
	<h2 class="float-right ml-5"><i class="fa fa-globe"></i>&nbsp;&nbsp;<a target="_blank" href="/">Visit Website</a></h2>
</div>

@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if (\Session::has('failed'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('failed') !!}</li>
        </ul>
    </div>
@endif




@if(\Auth::user()->group_id == 7)
@include('dashboard/user')
@elseif(\Auth::user()->group_id == 5)
@include('dashboard/agent')
@elseif(\Auth::user()->group_id == 1 || \Auth::user()->group_id == 2)
@include('dashboard/administrator')
@endif

@stop