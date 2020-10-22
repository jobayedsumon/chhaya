@extends('layouts.app')

@section('content')
<div class="page-header"><h2> {{ $pageTitle }}  <small> {{ $pageNote }} </small> </h2></div>

<div class="p-5">
	<div class="row">
		<div class="col-md-8">



<ul class="nav nav-tabs form-tab" >
  <li class="nav-item"><a href="#info" data-toggle="tab" class="nav-link active"> {{ Lang::get('core.personalinfo') }} </a></li>
  <li class="nav-item"><a href="#pass" id="p_click" data-toggle="tab" class="nav-link">{{ Lang::get('core.changepassword') }} </a></li>
</ul>	

<div class="tab-content ">
  <div class="tab-pane active m-t" id="info">
  
	  <div class="form-group row">
		<label for="ipt" class=" control-label col-md-4">Fullname</label>
		<div class="col-md-8">
		<input type="text"  class="form-control input-sm" disabled value="{{ $info->first_name }}" /> 
		 </div> 
	  </div>
	  
	  <div class="form-group row">
		<label for="ipt" class=" control-label col-md-4"> Mobile Number </label>
		<div class="col-md-8">
		<input type="text" id="username" disabled class="form-control input-sm" required  value="{{ $info->username }}" />  
		 </div> 
	  </div>  
	  <div class="form-group row">
		<label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.email') }} </label>
		<div class="col-md-8">
		<input  type="text"   disabled class="form-control input-sm" value="{{ $info->email }}" /> 
		 </div> 
	  </div> 	  
  

	  <div class="form-group row">
		<label for="ipt" class=" control-label col-md-4">Date of Birth</label>
		<div class="col-md-8">
		<input class="form-control input-sm" disabled value="{{ $info->birth_of_day }}" /> 
		 </div> 
	  </div>
	  <div class="form-group row">
                <label class="control-label col-md-4" for="name">Division:</label>
                <div class="col-sm-8">
                    <select class="form-control input-sm"  disabled >
                        <option disabled selected>-- Select Division --</option>
                        <option @if($info->state == 7) selected @endif value="7">Dhaka</option>
                        <option @if($info->state == 8) selected @endif  value="8">Khulna</option>
                        <option @if($info->state == 2) selected @endif  value="2">Rajshahi</option>
                        <option @if($info->state == 5) selected @endif  value="5">Chittagong</option>
                        <option @if($info->state == 6) selected @endif  value="6">Barisal</option>
                        <option @if($info->state == 1) selected @endif  value="1" >Rangpur</option>
                        <option @if($info->state == 4) selected @endif  value="4">Sylhet</option>
                        <option @if($info->state == 3) selected @endif  value="3">Mymensingh</option>
                    </select>
              </div>
            </div>
    
           <div class="form-group row">
                <label class="control-label col-md-4" >District:</label>
                <div class="col-sm-8">
                    <select class="form-control select_district input-sm" disabled  >
                        <option disabled selected>-- Select Division First --</option>
                        @if($info->city)
                         <option value="{{ $info->city }}" selected >{{ DB::table('con_district')->where('id',$info->city)->first()->title }}</option>
                        @endif
                    </select>
              </div>
            </div>
	  
	  <div class="form-group row">
		<label  class=" control-label col-md-4">Address</label>
		<div class="col-md-8">
			<textarea class="form-control"  disabled>{{ $info->address_1 }}</textarea>
		 </div> 
	  </div>
            <div class="form-group row">
                <label class="control-label col-md-4" for="name">Gender:</label>
                <div class="col-sm-8">
                  <select class="form-control input-sm" disabled >
                    <option @if($info->gender =='male') selected @endif value="male" >Male</option>
                    <option @if($info->gender =='female') selected @endif  value="female" >Female</option>
                    <option @if($info->gender =='other') selected @endif  value="other">Other</option>
                  </select>
                </div>
              </div>  

	  <div class="form-group row" >
		<label for="ipt" class=" control-label col-md-4"> Profile Picture </label>
		<div class="col-md-8">
		 	<?php if( file_exists( './uploads/users/'.$info->avatar) && $info->avatar !='') { ?>
            <img src="{{  url('uploads/users').'/'.$info->avatar }} " border="0" width="60" class="avatar" />
            <?php  } else { ?> 
            <img alt="" src="http://www.gravatar.com/avatar/{{ md5($info->email) }}" width="60" class="avatar" />
            <?php } ?>
			
			<br><br>
			<form method="post" action="{{url('change-profile-picture')}}" enctype='multipart/form-data'>
			@csrf
			<input type="file" name="avatar" >
			<button type="submit" class="btn btn-sm btn-info"> Change Profile Picture</button>
			</form>
			
		 </div> 
		 
		 
		 
		 
	  </div>  

  </div>

  <div class="tab-pane  m-t" id="pass">
	{!! Form::open(array('url'=>'user/savepassword/', 'class'=>'form-horizontal ')) !!}    
	  
	  <div class="form-group row">
		<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.newpassword') }} </label>
		<div class="col-md-8">
		<input name="password" type="password" id="password" class="form-control input-sm" value="" /> 
		 </div> 
	  </div>  
	  
	  <div class="form-group row">
		<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.conewpassword') }}  </label>
		<div class="col-md-8">
		<input name="password_confirmation" type="password" id="password_confirmation" class="form-control input-sm" value="" />  
		 </div> 
	  </div>    
	 
	
	  <div class="form-group row">
		<label for="ipt" class=" control-label col-md-4">&nbsp;</label>
		<div class="col-md-8">
			<button class="btn btn-primary" type="submit"> {{ Lang::get('core.sb_savechanges') }} </button>
		 </div> 
	  </div>   
	{!! Form::close() !!}	
  	

  	</div>
  		</div>
	</div>
</div>

@if(isset($_GET['action']) && $_GET['action'] == 'pass')
<script>
jQuery(document).ready(function(){
	jQuery('#p_click').trigger('click');
});

</script>
@endif


@endsection