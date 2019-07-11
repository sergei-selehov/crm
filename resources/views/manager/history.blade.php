@extends('layouts.admin')

@section('content')
    <div class="container-fluid" id="index">
        <main role="main" class="px-4">
            <table id="table" class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Дата взаимодействия</th>
                    <th scope="col">Дата последнего взаимодействия</th>
                    <th scope="col">Тип диалога</th>
                    <th scope="col">Суть диалога</th>
                    <th scope="col">Аргумент</th>
                </tr>
                </thead>
                <tbody>
                @foreach($history as $histor)
                    <tr class="tr" id="row_{{$histor->id}}">
                        <td scope="row">{{$histor->id}}</td>
                        <td scope="row">
                            @foreach($histor->interactionsHistory as $cont)
                                {{$cont->first_name}} {{$cont->last_name}} {{$cont->middle_name}}
                            @endforeach
                        </td>
                        <td scope="row">{{$histor->contact_date}}</td>
                        <td scope="row">{{$histor->next_contact_date }}</td>
                        <td scope="row">{{$histor->dialogue_type}}</td>
                        <td scope="row">{{$histor->dialogue_sense}}</td>
                        <td scope="row">{{$histor->arrangement}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </main>
    </div>
@endsection