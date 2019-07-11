@extends('layouts.manager_app')

@section('content')
    @auth
    <div class="container">
        <div class="py-5 text-center">
            <h3>Добавление</h3>
        </div>
        <div class="row">
            <div class="order-md-1">
                <h4 class="mb-3">Контрагент</h4>
                <hr class="mb-4">
                <form data-id="createData" id="allForm" class="needs-validation">
                    <div class="mb-3">
                        <label for="name">Название организации</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inn">ИНН контрагента</label>
                            <input type="text" class="form-control" id="inn"  name="inn" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="federal_district">Федеральный округ</label>
                            <input type="text" class="form-control" id="federal_district" name="federal_district" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="city">Город</label>
                            <input type="text" class="form-control" id="city" name="city" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="actual_address">Фактический адрес</label>
                            <input type="text" class="form-control" id="actual_address" name="actual_address" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="clinic_class">Класс клиники</label>
                            <input type="text" class="form-control" id="clinic_class" name="clinic_class" value="">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="clinic_network">Входит в сеть клиник</label>
                            <input type="text" class="form-control" id="clinic_network" name="clinic_network" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="clinic_size">Размер клиники</label>
                            <input type="text" class="form-control" id="clinic_size" name="clinic_size" value="">
                        </div>
                        {{-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                        <div class="col-md-6 mb-3">
                            <label for="specialization">Специализации</label>
                            <input type="text" class="form-control" id="specialization" name="specialization" value="">
                        </div>
                        {{-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! --}}
                    </div>
                    <h4 class="mb-3">Контактное лицо</h4>
                    <hr class="mb-4">
                    <div class="mb-3">
                        <label for="contactFacesSearch">Поиск</label>
                        <select class="custom-select d-block w-100 js-example-basic-single" name="contactFaces" id="contactFaces">
                            <option id="hide" name="hide" value="hide" selected>Выбрать</option>
                            <option id="addContactFace" name="addContactFace" value="add">Добавить</option>
                            @if(count($contactFacesFree) >= 1)
                                <optgroup label="Свободные контактные лица">
                                    @foreach($contactFacesFree as $contactFace)
                                        <option name="selectContact" value="{{$contactFace->id}}">{{$contactFace->first_name}} {{$contactFace->last_name}} {{$contactFace->middle_name}}</option>
                                    @endforeach
                                </optgroup>
                            @endif
                        </select>
                    </div>
                    <div id="contactFacesHide" style="display: none">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Имя</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Фамилия</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="middle_name">Отчество</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="post">Должность</label>
                                <input type="text" class="form-control" id="post" name="post" value="">
                            </div>
                            <div id="phones" class="col-md-6 mb-3">
                                <label for="phone_1">Контактный телефон</label>
                                <a id="addPhone" class="align-items-center text-muted" href="javascript;">
                                    <img src="https://cdn.iconscout.com/icon/free/png-256/add-insert-control-point-plus-31700.png" width="17" height="17" class="feather feather-plus-circle">
                                </a>
                                <input type="text" class="form-control" data-id="phone" id="phone_1" name="phone[0]"
                                       value="">
                            </div>
                            <div id="emails" class="col-md-6 mb-3">
                                <label for="email_1">E-Mail</label>
                                <a id="addEmail" class="align-items-center text-muted" href="javascript;">
                                    <img src="https://cdn.iconscout.com/icon/free/png-256/add-insert-control-point-plus-31700.png" width="17" height="17" class="feather feather-plus-circle">
                                </a>
                                <input type="email" class="form-control" id="email_1" name="email[0]" value="">
                            </div>
                        </div>
                        <h4 class="mb-3">История взаимодействия <input style="transform: scale(1.2);" id="history" name="history" type="checkbox"></h4>
                        <hr class="mb-4">
                        <div id="historyHide" style="display: none;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="contact_date">Дата контакта</label>
                                    <input type="text" class="form-control" id="contact_date" name="contact_date" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="next_contact_date">Дата следующего контакта</label>
                                    <input type="text" class="form-control" id="next_contact_date" name="next_contact_date" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Тип диалога</label>
                                    <select class="custom-select d-block w-100" id="dialogueType" name="dialogueType">
                                        <option selected value="">Выбрать</option>
                                        <option value="Телефонный звонок">Телефонный звонок</option>
                                        <option value="Почта(E-Mail)">Почта(E-Mail)</option>
                                        <option value="Сообщения">Сообщения</option>
                                        <option value="Встреча">Встреча</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Суть диалога</label>
                                <textarea class="form-control" id="dialogue_sense" name="dialogue_sense"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email">Достигнутая договоренность</label>
                                <textarea class="form-control" id="arrangement" name="arrangement"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <button id="create" class="btn btn-primary btn-lg btn-block" type="submit">Отправить</button>
            </div>
        </div>
    </div>
    @endauth

    @if(auth()->user()->isAdmin == 1)
        <h1>Adminnnnnnnnnn</h1>
    @endif


@endsection