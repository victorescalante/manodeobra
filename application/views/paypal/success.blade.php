@extends('app')

@section('title', 'Inicio')

@section('content')
<div>
    <h2 style="font-family: 'quicksandbold'; font-size:16px; color:#313131; padding-bottom:8px;">Dear Member</h2>
    <span style="color: #646464;">Your payment was successful, thank you for purchase.</span><br/>
    <span style="color: #646464;">Item Number :
      	<strong style="font:15px Arial,Helvetica,sans-serif;color:#f09"><?php echo $data['item_number']; ?></strong>
  	</span><br/>
	<span style="color: #646464;">TXN ID :
      	<strong style="font:15px Arial,Helvetica,sans-serif;color:#f09"><?php echo $data['txn_id']; ?></strong>
  	</span><br/>
	<span style="color: #646464;">Amount Paid :
      	<strong style="font:15px Arial,Helvetica,sans-serif;color:#f09">$<?php echo $data['payment_amt'].' '.$data['currency_code']; ?></strong>
  	</span><br/>
	<span style="color: #646464;">Payment Status :
      	<strong style="font:15px Arial,Helvetica,sans-serif;color:#f09"><?php echo $data['status']; ?></strong>
  	</span><br/>
</div>

@endsection
