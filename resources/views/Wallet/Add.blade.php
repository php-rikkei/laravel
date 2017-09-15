@extends('Home')
@section('content')
<div class="add-wallet">
    <!-- <button type="button" v-on:click="showAdd">Add Wallet</button>  -->

    <form method="post" action="{{url('/postAddWallet')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div style="margin-top: 40px">
            <span>Name Wallet</span>
            <input type="text" name="nameWallet">
            <br>
            <br>
            <span>Price Wallet</span>
            <input type="text" name="priceWallet">
        </div>
        <div style="margin-top: 20	px">
            <button type="submit" style="width: 90px">Save</button>
        </div>
    </form>

</div>

@endsection