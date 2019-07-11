@extends('layouts.admin')

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel">Text</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                <div class="modal-body">
                    <img style="margin-bottom: 5px;" src="{{URL::asset('/img/complete.png')}}" alt="img" height="20" width="20"> Успешно добавлено!
                </div>
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

    <div class="container" data-url="edit" >
        <div class="py-5 text-center">
            <h2>"{{$show->name}}"</h2>
        </div>
        <div class="row">
            <div class="order-md-1">
                <h4 class="mb-3">Инфо об организации "{{$show->name}}"</h4>
                <span><span style="color: red;">x</span> - недоступно для редактирования</span>
                <hr class="mb-4">
                <form id="formCompany" class="needs-validation">
                    <div class="mb-3">
                        <label for="name">Имя @if(isset($show->name) && $show->name != '') <span style="color: red;">x</span> @endif</label>
                        <input type="text" class="form-control" id="name" value="{{$show->name}}" @if(isset($show->name) && $show->name != '')  @else name="name" @endif>
                    </div>
                    <div class="mb-3">
                        <label for="inn">ИНН @if(isset($show->inn) && $show->inn != '') <span style="color: red;">x</span> @endif</label>
                        <input type="text" class="form-control" id="inn" value="{{$show->inn}}" @if(isset($show->inn) && $show->inn != '')  @else name="inn" @endif>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city_name">Имя Города @if(isset($show->city_name) && $show->city_name != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="city_name" value="{{$show->city_name}}" @if(isset($show->city_name) && $show->city_name != '')  @else name="city_name" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="country">Страна @if(isset($show->country) && $show->country != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="country" value="{{$show->country}}" @if(isset($show->country) && $show->country != '')  @else name="country" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="federal_district">Область @if(isset($show->federal_district) && $show->federal_district != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="federal_district" value="{{$show->federal_district}}" @if(isset($show->federal_district) && $show->federal_district != '')  @else name="federal_district" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="region">Регион @if(isset($show->region) && $show->region != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="region" value="{{$show->region}}" @if(isset($show->region) && $show->region != '')  @else name="region" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="city">Город @if(isset($show->city) && $show->city != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="city" value="{{$show->city}}" @if(isset($show->city) && $show->city != '')  @else name="city" @endif>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="geometry_name">geometry_name @if(isset($show->geometry_name) && $show->geometry_name != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="geometry_name" value="{{$show->geometry_name}}" @if(isset($show->geometry_name) && $show->geometry_name != '')  @else name="geometry_name" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="office">Офис @if(isset($show->office) && $show->office != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="office" value="{{$show->office}}" @if(isset($show->office) && $show->office != '')  @else name="office" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="post_code">post_code @if(isset($show->post_code) && $show->post_code != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="post_code" value="{{$show->post_code}}" @if(isset($show->post_code) && $show->post_code != '')  @else name="post_code" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone_fix">Телефон(ы) @if(isset($show->phone_fix) && $show->phone_fix != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="phone_fix" value="{{$show->phone_fix}}" @if(isset($show->phone_fix) && $show->phone_fix != '')  @else name="phone_fix" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fax">Факс @if(isset($show->fax) && $show->fax != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="fax" value="{{$show->fax}}" @if(isset($show->fax) && $show->fax != '')  @else name="fax" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email @if(isset($show->email) && $show->email != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="email" value="{{$show->email}}" @if(isset($show->email) && $show->email != '')  @else name="email" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="website">Сайт @if(isset($show->website) && $show->website != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="website" value="{{$show->website}}" @if(isset($show->website) && $show->website != '')  @else name="website" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="vkontakte">Vkontakte @if(isset($show->vkontakte) && $show->vkontakte != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="vkontakte" value="{{$show->vkontakte}}" @if(isset($show->vkontakte) && $show->vkontakte != '')  @else name="vkontakte" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="instagram">Instagram @if(isset($show->instagram) && $show->instagram != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="instagram" value="{{$show->instagram}}" @if(isset($show->instagram) && $show->instagram != '')  @else name="instagram" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lon">Высота @if(isset($show->lon) && $show->lon != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="lon" value="{{$show->lon}}" @if(isset($show->lon) && $show->lon != '')  @else name="lon" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lat">Долгота @if(isset($show->lat) && $show->lat != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="lat" value="{{$show->lat}}" @if(isset($show->lat) && $show->lat != '')  @else name="lat" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subcategory">Категория @if(isset($show->subcategory) && $show->subcategory != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="subcategory" value="{{$show->subcategory}}" @if(isset($show->subcategory) && $show->subcategory != '')  @else name="subcategory" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specialist">Специолист @if(isset($show->specialist) && $show->specialist != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="specialist" value="{{$show->specialist}}" @if(isset($show->specialist) && $show->specialist != '')  @else name="specialist" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone_specialist">Телефоны специалиста @if(isset($show->phone_specialist) && $show->phone_specialist != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="phone_specialist" value="{{$show->phone_specialist}}" @if(isset($show->phone_specialist) && $show->phone_specialist != '')  @else name="phone_specialist" @endif>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email_specialist">Email специалиста @if(isset($show->email_specialist) && $show->email_specialist != '') <span style="color: red;">x</span> @endif</label>
                            <input type="text" class="form-control" id="email_specialist" value="{{$show->email_specialist}}" @if(isset($show->email_specialist) && $show->email_specialist != '')  @else name="email_specialist" @endif>
                        </div>
                    </div>
                    <h4 class="mb-3">История взаимодействия</h4>
                    <hr class="mb-4">
                    <div id="histoor" style="display: none">
                        <table id="table" class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Дата взаимодействия</th>
                                <th scope="col">Дата последнего взаимодействия</th>
                                <th scope="col">Тип диалога</th>
                                <th scope="col">Суть диалога</th>
                                <th scope="col">Аргумент</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div>
                        <table id="table" class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Дата взаимодействия</th>
                                <th scope="col">Дата последнего взаимодействия</th>
                                <th scope="col">Тип диалога</th>
                                <th scope="col">Суть диалога</th>
                                <th scope="col">Аргумент</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($history as $his)
                                <tr class="tr">
                                    <td scope="row">{{$his->contact_date}}</td>
                                    <td scope="row">{{$his->next_contact_date}}</td>
                                    <td scope="row">{{$his->dialogue_type}}</td>
                                    <td scope="row">{{$his->dialogue_sense}}</td>
                                    <td scope="row">{{$his->arrangement}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h6 class="mb-3">Добавить <input style="transform: scale(1.2);" id="history" name="history" type="checkbox"></h6>
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
                </form>
                <button id="createHis" data-id="{{$show->id}}" class="btn btn-primary btn-lg btn-block" type="submit">Отправить</button>
            </div>
        </div>
    </div>

@endsection