@extends('layouts.app')

@section('content')

    <div class="split-page">

        <div class="split-page__container split-page__container--no-border">
            <div class="column-list">
                <p class="column-list__item"><span class="column-name">Id:</span>{{$client->id}}</p>
                <p class="column-list__item"><span class="column-name">Name:</span>{{$client->name}}</p>
                <p class="column-list__item"><span class="column-name">Email:</span>{{$client->email}}</p>
                <p class="column-list__item"><span class="column-name">Phone:</span>{{$client->phone}}</p>
            </div>
        </div>

        <div class="split-page__container">
            <table> 
                <tr>
                    <th class="table__item table__title">ID</th>
                    <th class="table__item table__title">Address</th>
                    <th class="table__item table__title">Date</th>
                    <th class="table__item table__title">Price</th>
                    <th class="table__item table__title">Status</th>
                </tr>

                @foreach ($deliveries as $delivery)
            
                    <tr class="table">
                        <td class="table__item">{{$delivery["id"]}}</>
                        <td class="table__item">{{$delivery["address"]}}</>
                        <td class="table__item">{{$delivery["date"]}}</>
                        <td class="table__item">${{$delivery["sum"]}}</>
                        <td class="table__item">{{$delivery["status"]}}</>
                    </tr>
            
                @endforeach
            </table>
        </div>

    </div>

@endsection