@extends('Home')
@section('content')
<div class="container">
    <div class="details-wallet">
        <strong>DETTAIL</strong>
        @foreach($wallet as $row)
        <table style="width: 100%" class="table-bordered">
            <thead>
                <tr>
                    <th style="width: 10%">

                    </th>
                    <th style="width: 15%">
                        ID
                    </th>
                    <th style="width: 25%">
                        Name Wallet
                    </th>
                    <th style="width: 25%">
                        Money Wallet
                    </th>
                    <th style="width: 25%">
                        Setting
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox" id="checkbox-checked" name="check">
                    </td>
                    <td>
                        {{ $row->id }}
                    </td>
                    <td>
                        {{ $row->name_wallet }}
                    </td>
                    <td>
                        {{ $row->money_wallet }}
                    </td>
                    <td>
                        <a href="{{ url('/getEditWallet/'.$row->id ) }}">Edit</a>
                        <a href="{{ url('/postDeleteWallet/'.$row->id ) }}" >Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach
    </div>
</div>
@endsection