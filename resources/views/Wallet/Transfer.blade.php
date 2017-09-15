@extends('Home')
@section('content')

<div class="container">
    <form method="post" action="{{url('/postTransferWallet')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="send-Wallet">
            <span>
                Choice Wallet Want Transfer:
            </span>

            <select name="send">
                <option value="0"> --Choice wallet-- </option>
                @foreach($wallet as $row)
                <option value="{{ $row->id }}">
                    Name Wallet: {{ $row->name_wallet }}--Money:{{ $row->money_wallet }} vnđ
                </option>

                @endforeach
            </select>
        </div>

        <div class="to-Wallet">
            <span>
                Choice Wallet is Transfered:&nbsp; &nbsp;
            </span>

            <select name="to">
                <option value="0"> --Choice wallet-- </option>
                @foreach($wallet as $row)
                <option value="{{ $row->id }}">
                    Name Wallet:{{ $row->name_wallet }}--Money:{{ $row->money_wallet }}vnđ
                </option>
                @endforeach
            </select>      
        </div>

        <div class="money-transfer" style="margin-top: 20px">
            <span>
                Money Want To Transfer:
            </span>
            <input type="text" name="money-send" placeholder="Enter Money" >
        </div>
        <button type="submit" name="bnt-tt">Transfer</button>
    </form>
</div>

@endsection