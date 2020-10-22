<?php 


//LifeTime 
$users = \App\Models\Core\Users::where('agent_id',\Auth::id())->where('active',1)->get();
$activeUser = count($users);
$totalSubscription = 0;
$raisedAmount = 0;
foreach($users as $user ){
	$subscription = \App\Models\Insurancesubscriptions::where('entry_by',$user->id)->where('status',1)->get();
	$number_of_subscription = count($subscription);
	$totalSubscription += $number_of_subscription;
	
	foreach($subscription as $s){
		$raisedAmount += $s->price;
	}
}

//This Month 
$thismonthUserCount = \App\Models\Core\Users::where('agent_id',\Auth::id())
						->where('active',1)
						->whereYear('created_at', Carbon\Carbon::now()->year)
                        ->whereMonth('created_at', Carbon\Carbon::now()->month)
                        ->count();
$totalSubscriptionThisMonth = 0;
$raisedAmountThisMonth = 0;

foreach($users as $user ){
	$subscriptionThisMonth = \App\Models\Insurancesubscriptions::where('entry_by',$user->id)
						->where('status',1)
						->whereYear('created_at', Carbon\Carbon::now()->year)
                        ->whereMonth('created_at', Carbon\Carbon::now()->month)
                        ->get();
						
	$number_of_subscription_this_month = count($subscriptionThisMonth);
	$totalSubscriptionThisMonth += $number_of_subscription_this_month;
	
	foreach($subscriptionThisMonth as $s){
		$raisedAmountThisMonth += $s->price;
	}
}


//Lsst Month 
$lastmonthUserCount = \App\Models\Core\Users::where('agent_id',\Auth::id())
						->where('active',1)
						->whereYear('created_at', Carbon\Carbon::now()->year)
                        ->whereMonth('created_at', Carbon\Carbon::now()->month-1)
                        ->count();

$totalSubscriptionlastMonth = 0;
$raisedAmountlastMonth = 0;

foreach($users as $user ){
	$subscriptionlastMonth = \App\Models\Insurancesubscriptions::where('entry_by',$user->id)
						->where('status',1)
						->whereYear('created_at', Carbon\Carbon::now()->year)
                        ->whereMonth('created_at', Carbon\Carbon::now()->month-1)
                        ->get();
						
	$number_of_subscription_last_month = count($subscriptionlastMonth);
	$totalSubscriptionlastMonth += $number_of_subscription_last_month;
	
	foreach($subscriptionlastMonth as $s){
		$raisedAmountlastMonth += $s->price;
	}
}

?>


<style>
.agent_matrix p {
    padding: 9px 5px;
    text-align: center;
    background: #c8e9da;
    font-size: 15px;
    color: #000;
    font-weight: bold;
    min-height: 210px;
}
.agent_box {
    border: 1px solid #ddd;
    padding: 12px;
    margin-top: 20px;
    text-align: center;
}

.agent_card span {
    color: #03a84e;
    font-size: 20px;
    display: block;
    border: 2px solid #fff;
    border-radius: 26px;
    margin-bottom: 14px;
}
.agent_title{
	text-transform: uppercase;
	font-size: 18px;
	padding: 10px;
	color: #080808;
}
.datrange .form-control{
	width:80%;
}
.datrange .form-group{
	width:33%;
}
.text_report{
	text-align:left !important;
}
.text_report p {
    margin-bottom: 5px;
}
@media only screen and (max-width: 768px) {
  .datrange .form-group {
    width: 100%;
    padding: 0 10px;
  }
  .datrange .form-control{
	width:100%;
  }
}
</style>



<div class="container-fluid">

	<div class="row">
	
		<div class="col-md-4">
		   <div class="agent_box">
			<h4 class="agent_title"> Life time Statistics</h4>
				<div class="row agent_matrix">
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>{{$activeUser}}</span> Active User<br><small>There are {{$activeUser}} users has active subscription referred by you.</small></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>{{$totalSubscription}}</span>Active Subscription<br><small>There are {{$totalSubscription}} active subscription from your referred user.</small></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>BDT {{$raisedAmount}}</span> Total<br><small>You have raised total fund of BDT {{$raisedAmount}} for Chhaya.xyz</small></p>
						</div>
					</div>
				</div>
			</div>	
		</div>




		<div class="col-md-4">
		   <div class="agent_box">
			<h4 class="agent_title">This Month Statistics</h4>
				<div class="row agent_matrix">
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>{{$thismonthUserCount}}</span> New User<br><small>There are {{$thismonthUserCount}} users has active subscription referred by you.</small></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>{{$totalSubscriptionThisMonth}}</span>New Subscriptions<br><small>There are {{$totalSubscriptionThisMonth}} active subscription from your referred user.</small></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>BDT {{$raisedAmountThisMonth}}</span> Total<br><small>You have raised total fund of BDT {{$raisedAmountThisMonth}} for Chhaya.xyz</small></p>
						</div>
					</div>
				</div>
			</div>	
		</div>
		
		<div class="col-md-4">
		   <div class="agent_box">
			<h4 class="agent_title">Last Month Statistics</h4>
				<div class="row agent_matrix">
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>{{$lastmonthUserCount}}</span> New User<br><small>There are {{$lastmonthUserCount}} users has active subscription referred by you.</small></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>{{$totalSubscriptionlastMonth}}</span>New Subscriptions<br><small>There are {{$totalSubscriptionlastMonth}} active subscription from your referred user.</small></p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="agent_card">
							<p><span>BDT {{$raisedAmountlastMonth}}</span> Total<br><small>You have raised total fund of BDT {{$raisedAmountlastMonth}} for Chhaya.xyz</small></p>
						</div>
					</div>
				</div>
			</div>	
		</div>
		
		
		
		<div class="col-md-6">
		   <div class="agent_box datrange">
			<h4 class="agent_title"> Date Range Statistics</h4>

			  <form class="form-inline row" >
				<div class="form-group">
				  <label class="col-md-4" for="email">From:</label>
				  <input type="date" class="form-control col-sm-8" name="from_date">
				</div>
				<div class="form-group">
				  <label class="col-md-4" for="email">To:</label>
				  <input class="form-control col-sm-8" type="date" name="to_date">
				</div>
				<div class="form-group">
				  <label class="col-md-2"></label>
				  <button class="btn btn-success col-sm-8" type="submit">Search</button>
				   <label class="col-sm-2"></label>
				</div>
				
			  </form><br><hr>
			  
			<div class="text_report">
				<p><b>Active User:</b> 25</p>
				<p><b>Active Subscription:</b> 20</p>
				<p><b>Fund Raised by You:</b> 2500</p>
			</div><br><hr>
          
				  <table class="table table-hover table-responsive">
					<thead>
					  <tr>
						<th>User ID</th>
						<th>Fullname</th>
						<th>Mobile Number</th>
						<th>Email</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>1</td>
						<td>Jane Doe</td>
						<td>01711158729</td>
						<td>BDT 3500</td>
					  </tr>
		
					</tbody>
				  </table>

			</div>	
		</div>

	</div>

</div>
<br><br><br>
