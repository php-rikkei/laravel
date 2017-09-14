@extends('Home')
@section('content')
<script src="https://unpkg.com/vue@2.4.3/dist/vue.js"></script>
	<div class="container" >
		<div class="panel-body">
			<span>Add New Wallet:   </span>
			<a href="{{url('/getAddWallet')}}">Add</a>
			<span>Transfer Money:   </span>
			<a href="{{url('/getTransferWallet')}}">Transfer</a>
			<div class="tableData" style="margin-top: 20px">
				<table style="border-style: ridge  ; width:100% ; ">
					<thead>
						<tr>
							<th>Name Wallet</th>
							<th>Price Wallet</th>
							<th>ID</th>
							<th>Setting </th>
						</tr>
					</thead>
					@foreach ($wallet as $row ) 
					<tbody>	
					 	<tr>
							<td style="width: 30%">
								{{ $row->name_wallet }}
							</td>
							<td style="width: 20%">
								{{ $row->money_wallet }}
							</td>
							<td style="width:20% ">
								{{ $row->id }}
							</td>
							<td>
								<a href="{{ url('/getEditWallet/'.$row->id ) }}">Edit</a>
								<a href="{{ url('/postDeleteWallet/'.$row->id ) }}" >Delete</a>
							</td>
						</tr>
					</tbody>	 
					<!-- <script>
						function alertDelete(){
							if(comfirm("Are you sure delete this wallet!!!")==true) {
								return redirect()->route('{{url('/postDeleteWallet/'.$row->id )}}');
							}
							else{
								return redirect('/getManageWallet');
							}
						}
					</script> -->
					@endforeach
					

					
			
				</table>
						@if (session('response'))
		  					<div class="alert alert-success">
		  	    				{{session('response')}}	
		  					</div> 
		  				@endif	
			</div>		
		
		</div>
	</div>

@endsection