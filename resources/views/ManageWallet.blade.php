@extends('Home')
@section('content')


<div class="container" >
    <div class="panel-body">

        <div class="col-lg-12">
            @if(Session::has('flash_message'))
            <div class="alert alert-{{ Session::get('flash_level') }}">
                <b>{{ Session::get('flash_message') }}</b>
            </div>
            @endif
        </div>  
        <span>Add New Wallet:   </span>
        <a href="{{url('/getAddWallet')}}">Add</a>
        <br>
        <span>Transfer Money:   </span>
        <a href="{{url('/getTransferWallet')}}">Transfer</a>
        <div class="search-auto" style="margin-top: 20px">
            <span> 
                Search Name:   
            </span>
            <input type="text" id="search" placeholder="Search name wallet" onkeyup="searchAutomation()" style="width: 60%"  >
            <ul id="list-group">

            </ul>
        </div>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <script>
            function searchAutomation() {
                $key = $('#search').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if ($key != '') {
                    var $records = '';
                    $.ajax({
                        type: 'GET',
                        url: 'api/getSearchAuto',
                        dataType: 'json',
                        data: {key: $key},
                        success:
                                function (data) {
                                    data.forEach(function (item) {
                                        $records = $records + " <li class='list-group-item list-group-item-info'><a>" + item.name_wallet + "</a> </li> ";
                                        $('#list-group').html($records);
                                    })
                                    //console.log(data);
                                }
//            ,
//                    error: function () {
//                    alert("Fail");
//                    }
                    })
                } else {
                    $('#list-group').html();
                }
            }

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
                {{ $wallet->links() }}       
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