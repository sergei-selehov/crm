<table id="table" class="table table-bordered table-hover">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Компания</th>
        <th scope="col">Дата взаимодействия</th>
        <th scope="col">Дата последнего взаимодействия</th>
        <th scope="col">Тип диалога</th>
        <th scope="col">Суть диалога</th>
        <th scope="col">Аргумент</th>
    </tr>
    </thead>
    <tbody id="tbody">
    @foreach($history as $row)
        <tr class="tr">
            <td scope="row">{{$row->company->name}}</td>
            <td scope="row">{{$row->contact_date}}</td>
            <td scope="row">{{$row->next_contact_date }}</td>
            <td scope="row">{{$row->dialogue_type}}</td>
            <td scope="row">{{$row->dialogue_sense}}</td>
            <td scope="row">{{$row->arrangement}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<div style="width: 30%; margin: auto;">
    {{ $history->links('vendor.pagination.bootstrap-4') }}
</div>

