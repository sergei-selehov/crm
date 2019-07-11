@extends('layouts.admin')

@section('content')
    <div class="container-fluid" id="index">
        <main role="main" class="px-4">
            <div id="paginate">
                @if(isset($table))
                    @include('table.table')
                @endif
                @if(isset($history))
                    @include('table.history')
                @endif
            </div>
        </main>
    </div>
    <script>
        $(window).on('hashchange', function () {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getData(page);
                }
            }
        });
        $(document).ready(function () {
            $(document).on('click', '.pagination a', function (event) {
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                event.preventDefault();
                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
                getData(page);
            });
        });

        function getData(page) {
            $.ajax(
                {
                    url: '?page=' + page,
                    type: 'GET',
                    datatype: 'html',
                    // beforeSend: function()
                    // {
                    //     you can show your loader
                    // }
                })
                .done(function (data) {
                    $("#paginate").empty().html(data);
                    location.hash = page;
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }
    </script>
@endsection