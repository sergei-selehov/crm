@extends('layouts.admin')

@section('content')
    <div class="container-fluid" id="index">
        <main role="main" class="px-4">
            <table id="table" class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название организации</th>
                    <th scope="col">ИНН</th>
                    <th scope="col">Федеральный округ</th>
                    <th scope="col">Город</th>
                    <th scope="col">Фактический адрес</th>
                    <th scope="col">Вход в сеть клиник</th>
                    <th scope="col">Размер клиники</th>
                    <th scope="col">Класс клиники</th>
                    <th scope="col">Кол-во специализаций</th>
                    <th scope="col">Кол-во контактных лиц</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($counterparts as $counterpart)
                    <tr class="tr" id="row_{{$counterpart->id}}">
                        <td scope="row">{{$counterpart->id}}</td>
                        <td scope="row">{{$counterpart->name}}</td>
                        <td scope="row">{{$counterpart->inn}}</td>
                        <td scope="row">{{$counterpart->federal_district}}</td>
                        <td scope="row">{{$counterpart->city}}</td>
                        <td scope="row">{{$counterpart->actual_address}}</td>
                        <td scope="row">{{$counterpart->clinic_network}}</td>
                        <td scope="row">{{$counterpart->clinic_size}}</td>
                        <td scope="row">{{$counterpart->clinic_class}}</td>
                        <td scope="row">{{$counterpart->specialization}}</td>
                        <td scope="row">{{count($counterpart->contactFaces)}}</td>
                        <td scope="row" style="width: 15%;">
                            <a class="btn btn-info btn-sm" href="{{url('edit/' . $counterpart->id)}}">Открыть</a>
                            @if(auth()->user()->isAdmin == 1)
                                <a class="btn btn-danger btn-sm" href="">Удалить</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </main>
    </div>
@endsection