$( document ).ready( function() {

    action = getAction(window.location.pathname);

    if (action == 'index') {
        showIndexForm();
    } else if (action == 'additional') {
        showAdditionalForm();
    } else if (action == 'share') {
        showShareForm();
    };
});

function showIndexForm() {
    $.ajax({
        type:'GET',
        url:'/ajaxparticipaint',
        success:function(data){
            $("#form").html(data.view);
            history.pushState(null, null, '/main/index');
            setTimeout(function(){
                $( "#datepicker" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    minDate: "01/01/1950",
                    maxDate: "12/30/2001"
                });

                $("#phone").mask("+1(999) 999-9999");
            }, 1000);
        }
    });
}

function showAdditionalForm() {
    $.ajax({
        type:'GET',
        url:'/ajaxparticipaint/additional',
        success:function(data){
            $("#form").html(data.view);
            history.pushState(null, null, '/main/additional');
            console.log(window.location.search);
        },
        error: function(data) {
            console.log('error');
            //console.log(data);
        }
    });
    return false;
}

function showShareForm() {
    $.ajax({
        type:'GET',
        url:'/ajaxparticipaint/share',
        success:function(data){
            $("#form").html(data.view);
            history.pushState(null, null, '/main/share');
        },
        error: function(data) {
            console.log(data);
        }
    });
    return false;
}

function storeMainForm(e) {
    e.preventDefault();
    //console.log("hello");
    $.ajax({
        type:'POST',
        url:'/ajaxparticipaint/store',
        data: $("#form1").serialize(),
        success:function(data){
            console.log(data);
            if (!data.code) {
                showAdditionalForm();
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
}

function saveAdditionalForm(e) {
    e.preventDefault();
    var fd = new FormData($("#form2").get(0));
    console.log($("#form2").get(0));
    $.ajax({
        type:'POST',
        url:'/ajaxparticipaint/additsave',
        data: fd,
        contentType: false, // важно - убираем форматирование данных по умолчанию
        processData: false, // важно - убираем преобразование строк по умолчанию
        success:function(data){
            if (!data.code) {
                showShareForm();
            } else {
                console.log("unknown error");
            }
        },
        error: function(data) {
            console.log('error');
        }
    });
    return false;
}

function getAction(url) {
    let fullPath = url.split('/');
    return  fullPath[2];
}