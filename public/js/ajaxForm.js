$(document).ready(function() {
    let action = ajaxForm.getAction( window.location.pathname );

    if (action === 'index') {
        ajaxForm.showIndexForm();
    } else if (action === 'additional') {
        ajaxForm.showAdditionalForm();
    } else if (action === 'share') {
        ajaxForm.showShareForm();
    };
});

let ajaxForm = {
    showIndexForm() {
        $.ajax({
            type:'GET',
            url:'/ajaxparticipaint',
            success:function(data){
                $("#form").html(data.view);
                history.pushState(null, null, '/main/index');
                setTimeout(function(){
                    $(document).on('click', '#birthday', function () {
                        $("#birthday").datepicker({
                            showOn: 'focus',
                            altFormat: "mm/dd/yy",
                            dateFormat: "mm/dd/yy",
                            minDate: '12/31/1940',
                            maxDate: '+0m +0w',
                            changeMonth: true,
                            changeYear: true,
                            yearRange: '1950:2019'
                        }).focus();
                    }).on('focus', '#birthday', function () {
                        $("#birthday").mask('99/99/9999');
                    });


                    $("#phone").mask("+9(999) 999-9999");
                }, 1000);
            }
        });
    },
    showAdditionalForm() {
        $.ajax({
            type:'GET',
            dataType: "JSON",
            url:'/ajaxparticipaint/checksessionemail',
            success:function(data){
                if (data.code) {
                    ajaxForm.showIndexForm();
                } else {
                    console.log(data.email)
                    $.ajax({
                        type:'GET',
                        url:'/ajaxparticipaint/additional',
                        success:function(data){
                            $("#form").html(data.view);
                            history.pushState(null, null, '/main/additional');
                        },
                        error: function(data) {
                            console.log('error');
                        }
                    });
                }
            },
            error: function() {
                console.log('error');
            }
        });
        return false;
    },
    showShareForm() {
        $.ajax({
            type:'GET',
            url:'/ajaxparticipaint/share',
            dataType: "JSON",
            success:function(data){
                $("#form").html(data.view);

                contentBtn = "All members (" + data.num + ")";
                $("#members-btn").html(contentBtn);

                history.pushState(null, null, '/main/share');
            },
            error: function(data) {
                console.log(data);
            }
        });
        return false;
    },
    storeMainForm(e) {
        e.preventDefault();
        //console.log("hello");
        $.ajax({
            type:'POST',
            url:'/ajaxparticipaint/store',
            data: $("#form1").serialize(),
            success:function(data) {
                if (!data.code) {
                    ajaxForm.showAdditionalForm();
                } else {
                    console.log("unknown error");
                }
            },
            error: function(data) {
                $('.alert-danger').html('');
                $.each(data.responseJSON.errors, function(key, value){
                    $('.alert-danger').show();
                    $('.alert-danger').append('<p>'+value+'</p>');
                });
            }
        });
        return false;
    },
    saveAdditionalForm(e) {
        e.preventDefault();
        var fd = new FormData($("#form2").get(0));
        $.ajax({
            type:'POST',
            url:'/ajaxparticipaint/additsave',
            data: fd,
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            success:function(data){

                if (!data.code) {
                    ajaxForm.showShareForm();
                } else {
                    console.log("unknown error");
                }
            },
            error: function(data) {
                $('.alert-danger').html('');
                $.each(data.responseJSON.errors, function(key, value){
                    $('.alert-danger').html('').show().append('<p>'+value+'</p>');
                });
                console.log('error');
            }
        });
        return false;
    },
    getAction(url) {
        if (url == '/') {
            return '';
        } else {
            let fullPath = url.split('/');
            return  fullPath[2];
        }
    },
}