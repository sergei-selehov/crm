$(document).ready(function(){


    // if ($('.container-fluid').attr('id') == 'index') {
    // } else {
    //     $('.js-example-basic-single').select2();
    //
    //     $('.js-example-basic-single').on('change', function () {
    //         if($(this).val() == 'add'){
    //             $('#contactFacesHide').show();
    //         }
    //         if($(this).val() == 'hide'){
    //             $('#contactFacesHide').hide();
    //         }
    //         var id = $(this).val();
    //         $.ajax({
    //             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //             type: 'POST',
    //             dataType: 'json',
    //             url: '/searchCF',
    //             data: {"id": id},
    //             cache: false,
    //             success: function(data){
    //
    //                 $('#phones').each(function(){
    //                     $(this).find(':input').val('');
    //                     $(this).find(':input').not(":eq(0)").remove();
    //                 });
    //
    //                 $('#emails').each(function(){
    //                     $(this).find(':input').val('');
    //                     $(this).find(':input').not(":eq(0)").remove();
    //                 });
    //
    //                 var countPhone = 1;
    //                 var countEmail = 1;
    //
    //                 console.log(data)
    //                 $.each(data.phones, function (index, data) {
    //                     countPhone++;
    //                     if ($('#phone_1').val().length == 0) {
    //                         $('#phone_1').val(data.phone);
    //                     } else {
    //                         $('#phones').append("<input style=\"margin-top: 10px; margin-left: 10px; width: 97%;\" type=\"text\" class=\"form-control\" data-id=\"phone\" id=\"phone_" + countPhone + "\" name=\"phone[" + countPhone + "]\" value=\"" + data.phone + "\" >");
    //                         $("input[data-id=phone]").mask("+7(999) 999-9999");
    //                     }
    //                 });
    //
    //                 $.each(data.emails, function (index, data) {
    //                     countEmail++;
    //                     if ($('#email_1').val().length == 0) {
    //                         $('#email_1').val(data.email);
    //                     } else {
    //                         $('#emails').append("<input style=\"margin-top: 10px; margin-left: 10px; width: 97%;\" type=\"email\" class=\"form-control\" id=\"email_" + countEmail + "\" name=\"email[" + countEmail + "]\" value=\"" + data.email + "\" >");
    //                     }
    //                 });
    //
    //                 $('#first_name').val(data.first_name);
    //                 $('#last_name').val(data.last_name);
    //                 $('#middle_name').val(data.middle_name);
    //                 $('#post').val(data.post);
    //
    //                 $('#histoor').show();
    //                 $.each(data.history_contact_faces, function (index, data) {
    //                     $('#table').append("<tbody>" +
    //                         "<td scope=\"row\">" + data.contact_date + "</td>" +
    //                         "<td scope=\"row\">" + data.next_contact_date + "</td>" +
    //                         "<td scope=\"row\">" + data.dialogue_type + "</td>" +
    //                         "<td scope=\"row\">" + data.dialogue_sense + "</td>" +
    //                         "<td scope=\"row\">" + data.arrangement + "</td>" +
    //                         "</tbody>");
    //                 });
    //             }
    //         });
    //     });
    //
    // }
    // if ($('div.container').data('url') == 'edit') {
    //
    //     //Search Manager
    //     var options = {
    //         url: function (phrase) {
    //             return '/search';
    //         },
    //         getValue: function (element) {
    //             return element.name;
    //         },
    //         ajaxSettings: {
    //             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //             dataType: 'json',
    //             method: 'POST',
    //             data: {
    //                 dataType: 'json'
    //             }
    //         },
    //         preparePostData: function (data) {
    //             data.search = $("#searchManager").val();
    //             return data;
    //         },
    //         requestDelay: 400,
    //         template: {
    //             type: "links",
    //             fields: {
    //                 link: "id"
    //             }
    //         }
    //     };
    //     $("#searchManager").easyAutocomplete(options);
    //
    //     //
    //     $('select#contactFaces').on('change', function (e) {
    //         e.preventDefault();
    //         if ($("select#contactFaces").val() == 'add') {
    //             $('#contactFacesHide').show();
    //         } else {
    //             $('#contactFacesHide').hide();
    //         }
    //     });
    // }

    //
    $('input#cFSearch').on('click', function () {
        if ($('input#cFSearch').is(':checked')){
            $('#searchHide').show();
        } else {
            $('#searchHide').hide();
        }
    });

    //
    $('input#history').on('click', function () {
        if ($('input#history').is(':checked')){
            $('#historyHide').show();
        } else {
            $('#historyHide').hide();
        }
    });

    //DateTime
    jQuery('#contact_date').datetimepicker({
        format:'Y-m-d H:i'
    });
    jQuery('#next_contact_date').datetimepicker({
        format:'Y-m-d H:i'
    });

    // //Mack Phone
    // $(function(){
    //     $("input[data-id=phone]").mask("+7(999) 999-9999");
    // });
    //
    // // Forms
    // $("button#create").on('click', function () {
    //     var url = $('form#allForm').data('id');
    //     console.log(url)
    //         $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         type: 'POST',
    //         dataType: 'json',
    //         url: '/' + url,
    //         data: $('#allForm').serialize(),
    //         success: function (data) {
    //             if (data[0] == 'success'){
    //                 alert('Все успешно добавлено!');
    //             } else {
    //                 alert('Ошибка!');
    //             }
    //
    //         }
    //         });
    // });

    // Forms1
    $("button#createHis").on('click', function () {
        var id = $(this).data('id');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            dataType: 'json',
            url: '/addHistory/' + id,
            data: $('form#formCompany').serialize(),
            success: function (data) {
                if (data[0] == 'success'){
                    $('#exampleModal').modal('show');
                    $('#exampleModal').on('hidden.bs.modal', function (e) {
                        location.reload();
                    });
                } else {
                    alert('Ошибка!');
                }
            }
        });
    });

    // Search
    $('#searchBtn').on('click', function () {
        var search = $('#search').val();
        if (search.length == 0) {
            location.reload();
        } else {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    dataType: 'json',
                    url: '/searchTable',
                    data: {"search": search},
                    cache: false,
                    success: function (data) {
                        $("tbody#tbody").empty();
                        $.each(data, function (key, val) {
                            $('#tbody').append("<tr class=\"tr\" id=" + val.id + ">\n" +
                                "        <td scope=\"row\">" + val.id + "</td>\n" +
                                "    <td scope=\"row\">" + val.name + "</td>\n" +
                                "    <td scope=\"row\">" + val.inn + "</td>\n" +
                                "    <td scope=\"row\">" + val.city_name + "</td>\n" +
                                "    <td scope=\"row\">" + val.country + "</td>\n" +
                                "    <td scope=\"row\">" + val.federal_district + "</td>\n" +
                                "    <td scope=\"row\">" + val.region + "</td>\n" +
                                "    <td scope=\"row\">" + val.city + "</td>\n" +
                                "    <td scope=\"row\">" + val.geometry_name + "</td>\n" +
                                "    <td scope=\"row\">" + val.office + "</td>\n" +
                                "    <td scope=\"row\">" + val.post_code + "</td>\n" +
                                "    <td scope=\"row\">" + val.phone_fix + "</td>\n" +
                                "    <td scope=\"row\">" + val.fax + "</td>\n" +
                                "    <td scope=\"row\">" + val.email + "</td>\n" +
                                "    <td scope=\"row\">" + val.website + "</td>\n" +
                                "    <td scope=\"row\">" + val.vkontakte + "</td>\n" +
                                "    <td scope=\"row\">" + val.instagram + "</td>\n" +
                                "    <td scope=\"row\">" + val.lon + "</td>\n" +
                                "    <td scope=\"row\">" + val.lat + "</td>\n" +
                                "    <td scope=\"row\">" + val.subcategory + "</td>\n" +
                                "    <td scope=\"row\">" + val.specialist + "</td>\n" +
                                "    <td scope=\"row\">" + val.phone_specialist + "</td>\n" +
                                "    <td scope=\"row\">" + val.email_specialist + "</td>\n" +
                                "\n" +
                                "    <td scope=\"row\" style=\"width: 15%;\">\n" +
                                "        <a class=\"btn btn-info btn-sm\" href=\"/show/" + val.id + "\">Открыть</a>\n" +
                                "        </td>\n" +
                                "        </tr>")
                        });
                    }
                });
        }
    });

// // Search
//     $('input#search').on('keyup', function () {
//         var search = $('#search').val();
//         if (search.length >= 3) {
//             $.ajax({
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                 type: 'POST',
//                 dataType: 'json',
//                 url: '/searchTable',
//                 data: {"search": search},
//                 cache: false,
//                 success: function (data) {
//                     $('.table tbody tr.tr').each(function () {
//                         var trId = $(this).attr('id').split('_')[1];
//                         _this = this;
//
//                         $.each(data, function () {
//                             var dataId = this.id.toString();
//
//                             if (trId === dataId) {
//                                 $(_this).show();
//                                 return false;
//                             } else {
//                                 $(_this).hide();
//                             }
//                         });
//
//                     });
//                 }
//             });
//         } else {
//             $('.table tbody tr.tr').each(function () {
//                 $(this).show();
//             });
//         }
//     });

    // $('.selectContact').on('click', function (e) {
    //     e.preventDefault();
    //     var id = $(this).val();
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         type: 'POST',
    //         url: '/contact-face/' + id,
    //         dataType: 'json',
    //         data: id,
    //         success: function(data){
    //             $('#phones').each(function(){
    //                 $(this).find(':input').val('');
    //                 $(this).find(':input').not(":eq(0)").remove();
    //             });
    //
    //             $('#emails').each(function(){
    //                 $(this).find(':input').val('');
    //                 $(this).find(':input').not(":eq(0)").remove();
    //             });
    //
    //             var countPhone = 1;
    //             var countEmail = 1;
    //
    //             console.log(data)
    //             $.each(data.phones, function (index, data) {
    //                 countPhone++;
    //                 if ($('#phone_1').val().length == 0) {
    //                     $('#phone_1').val(data.phone);
    //                 } else {
    //                     $('#phones').append("<input style=\"margin-top: 10px; margin-left: 10px; width: 97%;\" type=\"text\" class=\"form-control\" data-id=\"phone\" id=\"phone_" + countPhone + "\" name=\"phone[" + countPhone + "]\" value=\"" + data.phone + "\" >");
    //                     $("input[data-id=phone]").mask("+7(999) 999-9999");
    //                 }
    //             });
    //
    //             $.each(data.emails, function (index, data) {
    //                 countEmail++;
    //                 if ($('#email_1').val().length == 0) {
    //                     $('#email_1').val(data.email);
    //                 } else {
    //                     $('#emails').append("<input style=\"margin-top: 10px; margin-left: 10px; width: 97%;\" type=\"email\" class=\"form-control\" id=\"email_" + countEmail + "\" name=\"email[" + countEmail + "]\" value=\"" + data.email + "\" >");
    //                 }
    //             });
    //
    //             $('#first_name').val(data.first_name);
    //             $('#last_name').val(data.last_name);
    //             $('#middle_name').val(data.middle_name);
    //             $('#post').val(data.post);
    //         }
    //     });
    // });

    // $('#addPhone').on('click', function(e){
    //     e.preventDefault();
    //
    //     var lastId = $('#phones input:last').last('input').attr('id').split('_')[1];
    //     lastId++;
    //
    //     $('#phones').append("<img id=\"phone_" + lastId + "\" style=\"position: absolute; margin-top: 20px; cursor: pointer;\" src=\"https://cdn0.iconfinder.com/data/icons/trends-1/256/icon-10.png\" width=\"14\" height=\"14\" class=\"deletePhone feather feather-plus-circle\">\n" +
    //         "<input style=\"margin-top: 10px; margin-left: 20px; width: 93.5%;\" type=\"text\" class=\"form-control\" data-id=\"phone\" id=\"phone_" + lastId + "\" name=\"phone[" + lastId + "]\" value=\"\">");
    //     $("input[data-id=phone]").mask("+7(999) 999-9999");
    //     $('.deletePhone').on('click', function(e){
    //         e.preventDefault();
    //         $(this).remove();
    //         var idInput =  $(this).attr('id');
    //         $('input#' + idInput).remove();
    //     });
    // });
    //
    // $('#addEmail').on('click', function(e){
    //     e.preventDefault();
    //
    //     var lastId = $('#emails input:last').last('input').attr('id').split('_')[1];
    //     lastId++;
    //
    //     $('#emails').append("<img id=\"email_" + lastId + "\" style=\"position: absolute; margin-top: 20px; cursor: pointer;\" src=\"https://cdn0.iconfinder.com/data/icons/trends-1/256/icon-10.png\" width=\"14\" height=\"14\" class=\"deleteEmail feather feather-plus-circle\">\n" +
    //         "<input style=\"margin-top: 10px; margin-left: 20px; width: 93.5%;\" type=\"email\" class=\"form-control\" id=\"email_" + lastId + "\" name=\"email[" + lastId + "]\" value=\"\">");
    //     $('.deleteEmail').on('click', function(e){
    //         e.preventDefault();
    //         $(this).remove();
    //         var idInput =  $(this).attr('id');
    //         $('input#' + idInput).remove();
    //     });
    // });
});