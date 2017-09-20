@extends('Home')
@section('content')
@section('css')
<style>
    #div_search {
        position: relative;
    }
    #list {
        z-index: 100;
        list-style-type: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 90%;
        background-color: #eee;
        padding: 0px;
    }
    #list li {
        margin: 2px 2px 2px 2px;
        background: #fff;
        padding: 5px;
    </style>
    @endsection


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

                    <div id="div_search">
                        
                        <form method="post" action="{{ url('/getSearch') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
<!--                            <input type="hidden" value="$key" name="key">-->
                            <div class="row">
                                <div class="col-lg-11">   
                                    <input type="text" id="search" name="search" class="form-control  " placeholder="Search name wallet" onkeyup="searchAutomation()" style="width: 100%">
<!--                                    <script>
                                     $key = $('#search').val();             
                                    </script>-->
                                </div>
                                <div class="col-lg-1">
                                    <button type="submit" class="search" style="height: 35px"> Search</button>
                                </div>
                            </div>
                        </form> 

                        <ul id="list">
                        </ul>
                    </div>
                </div>
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <div class="tableData" style="margin-top: 20px">
                    <table style=" width:100% ; " class="table">
                    <thead>
                        <tr>
                            <td> </td>
                            <th>ID</th>
                            <th>Name Wallet</th>
                            <th>Price Wallet</th>
                            <th>Setting </th>
                        </tr>
                    </thead>
                    @foreach ($wallet as $row ) 
                    <tbody>	
                        <tr>
                            <td style="width: 10%">
                                    <input type="checkbox" id="checkbox-checked" name="check">
                                </td>
                                <td style="width:15% ">
                                    {{ $row->id }}
                                </td>
                                <td style="width: 25%">
                                    {{ $row->name_wallet }}
                                </td>
                                <td style="width: 25%">
                                    {{ $row->money_wallet }}
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

        <script>
            function searchAutomation() {
                $key = $('#search').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if ($key != '') {
                    $.ajax({
                        type: 'GET',
                        url: 'api/getSearchAuto',
                        dataType: 'json',
                        data: {key: $key},
                        success:
                                function (data) {
                                    var html = '';
                                    data.forEach(function (item) {
                                        html += " <li><a href='{{url('getShowDetail')}}" + "/" + item.id + "'>" + item.name_wallet + "</a> </li> ";
                                    });
                                    $('#list').html(html);

                                    //console.log(data);
                                }
                        //            ,
                        //                    error: function () {
                        //                    alert("Fail");
                        //                    }
                    })
                } else {
                    $('#list').html("");
                    //document.getElementById("list-group").innerHTML="";
                }
            }

        </script>

        @endsection