@extends('Home')
@section('content')
<div class="container">
	<div class="edit-wallet">
		@foreach($rows as $row)
		<form method="post" action="{{url('postEditWallet/'.$row->id)}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div style="margin-top: 40px">		
							<span>Name Wallet</span>
							<input type="text" name="nameWallet" value="{{ $row->name_wallet }}">
							<br>
							<br>
							<span>Price Wallet</span>
							<input type="text" name="priceWallet" value="{{ $row->money_wallet }}">
						</div>	
						<div style="margin-top: 20	px, margin-left: 10px">
							<button type="submit" style="width: 90px">Update</button>
						</div>
		</form>
		@endforeach
	</div>
</div>
@endsection