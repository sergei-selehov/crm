@extends('layouts.admin')

@section('content')
    <div class="container-fluid" id="index">
        <main role="main" class="px-4">
            <table id="table" class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название организации</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Должность</th>
                    <th scope="col">Дата(ы) взаимодействия</th>
                    <th scope="col">Федеральный округ</th>
                    <th scope="col">Город</th>
                    <th scope="col">Фактический адрес</th>
                    <th scope="col">Вход в сеть клиник</th>
                    <th scope="col">Размер клиники</th>
                    <th scope="col">Класс клиники</th>
                    <th scope="col">Кол-во специализаций</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contactFace as $conFace)
                    @foreach($conFace->counterparts as $counterpart)
                    <tr class="tr" id="row_{{$conFace->id}}">
                        <td scope="row">{{$conFace->id}}</td>
                        <td scope="row">{{$counterpart->name}}</td>
                        <td scope="row">{{$conFace->first_name}} {{$conFace->last_name}} {{$conFace->middle_name}}</td>
                        <td scope="row">{{$conFace->post}}</td>
                        <td scope="row">
                            @foreach($conFace->historyContactFaces as $history)
                                <p style="margin-bottom: 0px;">{{date('d.m.Y h:i', strtotime($history->contact_date))}}</p>
                            @endforeach
                        </td>
                        <td scope="row">{{$counterpart->federal_district}}</td>
                        <td scope="row">{{$counterpart->city}}</td>
                        <td scope="row">{{$counterpart->actual_address}}</td>
                        <td scope="row">{{$counterpart->clinic_network}}</td>
                        <td scope="row">{{$counterpart->clinic_size}}</td>
                        <td scope="row">{{$counterpart->clinic_class}}</td>
                        <td scope="row">{{$conFace->specialization}}</td>
                        <td scope="row" style="width: 15%;">
                            <a class="btn btn-info btn-sm" href="{{url('edit/' . $conFace->id)}}">Открыть</a>
                            @if(auth()->user()->isAdmin == 1)
                                <a class="btn btn-danger btn-sm" href="">Удалить</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                @endforeach

                </tbody>
            </table>
        </main>
    </div>
@endsection