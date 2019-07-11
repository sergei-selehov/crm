

<table id="table" class="table table-bordered table-sm table-hover">
    <thead class="thead-dark">
    <tr>
        <th scope="col">№</th>
        <th scope="col">Имя</th>
        <th scope="col">ИНН</th>
        {{--<th scope="col">Имя города</th>--}}
        <th scope="col">Страна</th>
        <th scope="col">Область</th>
        <th scope="col">Регион</th>
        <th scope="col">Город</th>
        {{--<th scope="col">geometry_name</th>--}}
        <th scope="col">Офис</th>
        {{--<th scope="col">post_code</th>--}}
        <th scope="col">Телефон(ы)</th>
        {{--<th scope="col">Факс</th>--}}
        <th scope="col">Email</th>
        <th scope="col">Сайт</th>
        <th scope="col">vkontakte</th>
        <th scope="col">instagram</th>
        {{--<th scope="col">Высота</th>--}}
        {{--<th scope="col">Долгота</th>--}}
        <th scope="col">Категории</th>
        <th scope="col">Специалист</th>
        <th scope="col">Телефоны специалиста</th>
        <th scope="col">Email специалиста</th>
        {{--<th scope="col">Действие</th>--}}
    </tr>
    </thead>
    <tbody id="tbody">
    @foreach($table as $row)
        <tr class="tr" onclick="event.preventDefault();window.location = 'show/' + this.id;" style="cursor: pointer;" id="{{$row->id}}">
            <td scope="row">{{$row->id}}</td>
            <td scope="row">{{$row->name}}</td>
            <td scope="row">{{$row->inn}}</td>
            {{--<td scope="row">{{$row->city_name}}</td>--}}
            <td scope="row">{{$row->country}}</td>
            <td scope="row">{{$row->federal_district}}</td>
            <td scope="row">{{$row->region}}</td>
            <td scope="row">{{$row->city}}</td>
            {{--<td scope="row">{{$row->geometry_name}}</td>--}}
            <td scope="row">{{$row->office}}</td>
            {{--<td scope="row">{{$row->post_code}}</td>--}}
            <td scope="row">{{$row->phone_fix}}</td>
            {{--<td scope="row">{{$row->fax}}</td>--}}
            <td scope="row">{{$row->email}}</td>
            <td scope="row">{{$row->website}}</td>
            <td scope="row">{{$row->vkontakte}}</td>
            <td scope="row">{{$row->instagram}}</td>
            {{--<td scope="row">{{$row->lon}}</td>--}}
            {{--<td scope="row">{{$row->lat}}</td>--}}
            <td scope="row">{{$row->subcategory}}</td>
            <td scope="row">{{$row->specialist}}</td>
            <td scope="row">{{$row->phone_specialist}}</td>
            <td scope="row">{{$row->email_specialist}}</td>

            <td scope="row" style="width: 15%; display: none;">
                <a id="url" class="btn btn-info btn-sm" href="{{url('show/' . $row->id)}}">Открыть</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div style="width: 30%; margin: auto;">
    {{ $table->links('vendor.pagination.bootstrap-4') }}
</div>
