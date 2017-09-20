@extends('Home')
@section('content')
<div class="container">
    <div class="edit-wallet">
        @foreach($rows as $row)
        <form method="post" action="{{url('postEditUser/'.$row->id)}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div style="margin-top: 40px">		
                <span>Name User:</span>
                <input type="text" name="name" value="{{ $row->name }}">
                <br>
                <br>
                <span>Email: </span>
                <input type="text" name="email" value="{{ $row->email }}">
                
            </div>	
            <div style="margin-top: 20px">
                <button type="submit" style="width: 90px">Update</button>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection