@extends('Home')
@section('content')
<script src="https://unpkg.com/vue@2.4.3/dist/vue.js"></script>
<script src="jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
<div class="container" >
    <div class="panel-body">
        <span>Add New Wallet:   </span>
        <a href="{{url('/getAddWallet')}}">Add</a>
        <br>
        <span>Transfer Money:   </span>
        <a href="{{url('/getTransferWallet')}}">Transfer</a>
        <div class="search-auto" style="margin-top: 20px">
            <span> 
                Search:   
            </span>
            <input type="text" id="search" placeholder="Search name wallet" onkeyup="searchAutomation()" style="width: 60%"  >
        </div>
        <script>
            $key = $('#search').val();
        </script>
        <div class="tableData" style="margin-top: 20px">
            <table style=" width:100% ; " id="table">
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