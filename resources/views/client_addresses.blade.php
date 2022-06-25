@extends('layouts.app')

@section('content')

<div class="page">
    <table>

        <tr>
            <th class="table__item table__title">ID</th>
            <th class="table__item table__title">Address</th>
            <th class="table__item table__title">Client Name</th>
        </tr>

        @foreach ($addresses as $address)
            
            <tr>
                <td class="table__item">{{$address->id}}</td>
                <td class="table__item">{{$address->title}}</td>
                <td class="table__item">{{$address->client->name}}</td>
            </tr>

        @endforeach
        
    </table>
</div>
@endsection
