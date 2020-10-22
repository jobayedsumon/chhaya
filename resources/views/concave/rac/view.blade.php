@extends('layouts.app')

@section('content')
<div class="page-header"><h2>  {{ $pageTitle }} <small> {{ $pageNote }} </small> </h2></div>

	<div class="toolbar-nav">
		<div class="row">
			<div class="col-md-6" >
		   		<a href="{{ ($prevnext['prev'] != '' ? url('concave/rac/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm"><i class="fa fa-arrow-left"></i>  </a>	
				<a href="{{ ($prevnext['next'] != '' ? url('concave/rac//'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm "> <i class="fa fa-arrow-right"></i>  </a>					
			</div>	

			<div class="col-md-6 >
				@if($access['is_add'] ==1)
		   		<a href="{{ url('concave/rac//'.$id.'/edit?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
				@endif
				<a href="{{ url('concave/rac/?return='.$return) }}" class="tips btn btn-sm  " title="{{ __('core.btn_back') }}"><i class="fa  fa-times"></i></a>		
			</div>
		</div>
	</div>	


<div class="p-5">	
	<div style="padding: 20px;">
	<b>ID</b> : {{ SiteHelpers::formatLookUp($row->apiuser,'apiuser','1:tb_users:id:email') }} <br />
	<b> KEY </b> : {{ $row->apikey}}
	</div>

							<?php
					 			$am = explode(',',$row->modules);
					 			
					 		?>
					 		<table class="table table-bordered table-striped tableapi">
					 			<thead>
					 				<tr>
					 					<th>Module</th>
					 					<th>Path</th>
					 					<th>Action</th>
					 					<th>Route Name</th>
					 				</tr>

					 			</thead>
					 			@foreach($am as $m)
					 			<tbody>
					 				<tr>
					 					<td colspan="4"><h5>{{ $m}}</h5></td>

					 				</tr>
					 				<tr>
						 				<td><b>GET</b></td>
						 				<td>{{ url('concaveapi?module='.$m) }}</td>
						 				<td>index</td>
						 				<td>concaveapi.index</td>
					 				</tr>
						 				<td><b>POST</b></td>
						 				<td>{{ url('concaveapi?module='.$m) }}</td>
						 				<td>store</td>
						 				<td>concaveapi.store</td>
					 				</tr>
					 				</tr>
						 				<td><b>GET</b></td>
						 				<td>{{ url('concaveapi/id?module='.$m) }}</td>
						 				<td>show</td>
						 				<td>concaveapi.show</td>
					 				</tr>
					 				</tr>
						 				<td><b>PUT/PATCH</b></td>
						 				<td>{{ url('concaveapi/id?module='.$m) }}</td>
						 				<td>update</td>
						 				<td>concaveapi.update</td>
					 				</tr>
					 				</tr>
						 				<td><b>DELETE</b></td>
						 				<td>{{ url('concaveapi/id?module='.$m) }}</td>
						 				<td>destroy</td>
						 				<td>concaveapi.destroy</td>
					 				</tr>

					 			@endforeach	

					 			</tbody>

					 		</table>	


	 
	</div>
		

	  
@stop