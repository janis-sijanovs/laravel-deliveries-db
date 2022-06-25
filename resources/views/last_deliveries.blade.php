@extends('layouts.app')

@section('content')

<div class="page">
    <table>
        <tr class="table">
            <th class="table__item table__title">ID</th>
            <th class="table__item table__title">Client</th>
            <th class="table__item table__title">Address</th>
            <th class="table__item table__title">Date</th>
            <th class="table__item table__title">Type</th>
            <th class="table__item table__title">Sum</th>
        </tr>

        @foreach ($addresses as $address)
            
            <tr>
                <td class="table__item">{{$address['id']}}</td>
                <td class="table__item">{{$address['client']}}</td>
                <td class="table__item">{{$address['title']}}</td>
                <td class="table__item">{{$address['date']}}</td>
                <td class="table__item">{{$address['type']}}</td>
                <td class="table__item">${{$address['sum']}}</td>
            </tr>

        @endforeach
        
    </table>
</div>
@endsection

