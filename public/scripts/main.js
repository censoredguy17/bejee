$(document).ready(function (){

    $('.modal').on('hidden.bs.modal', function () {
        $(this).remove();
    });

});

function addTaskTemplate(){
    $.ajax({
        url: './task/task_template',
        type: 'POST',
        dataType: 'html',
        success: function(html){
            $('body').prepend(html);
            $('#TaskAddModal').modal('show');
        }
    });
}

function loginTemplate(){
    $.ajax({
        url: './main/login_template',
        type: 'POST',
        dataType: 'html',
        success: function(html){
            $('body').prepend(html);
            $('#LoginModal').modal('show');
        }
    });
}

function message(data){
    $.ajax({
        url: './main/message',
        type: 'POST',
        dataType: 'html',
        data: {data : data},
        success: function(html){
            $('body').prepend(html);
            $('#messageModal').modal('show');
            setTimeout(function () {
                $('#messageModal').modal('hide');
                }, 3000);
        }
    });
}

function logout(){
    $.ajax({
        url: './main/logout',
        type: 'POST',
        dataType: 'html',
        success: function(o){
            let data = jQuery.parseJSON(o);
            message(data);
            $('.log_in_btn').removeClass('d-none');
            $('.log_out_btn').addClass('d-none');
            setTimeout(function (){
                location.reload();
            },2000);
        }
    });
}

$(document).on({
    submit: function (e) {
        e.preventDefault();
        let postData = $(this).serialize();
        $.ajax(
            {
                url: './task/add_task',
                type: 'POST',
                data: postData,
                datatype: 'json',
                success: function (o){
                    let data = jQuery.parseJSON(o);
                    message(data);
                    if(data.result == 1){
                        $('#TaskAddModal').modal('hide');
                        setTimeout(function (){
                            location.reload();
                        },2000);
                    }
                }
            });
    }
}, '#addTaskForm');

$(document).on({
    submit: function (e) {
        e.preventDefault();
        let postData = $(this).serialize();
        $.ajax(
            {
                url: './task/update_task',
                type: 'POST',
                data: postData,
                datatype: 'json',
                success: function (o){
                    let data = jQuery.parseJSON(o);
                    message(data);
                    if(data.result == 1){
                        $('#TaskEditModal').modal('hide');
                        setTimeout(function (){
                            location.reload();
                        },2000);
                    }
                }
            });
    }
}, '#updateTaskForm');

$(document).on({
    submit: function (e) {
        e.preventDefault();
        let postData = $(this).serialize();
        $.ajax(
            {
                url: './main/login',
                type: 'POST',
                data: postData,
                datatype: 'json',
                success: function (o){
                    let data = jQuery.parseJSON(o);
                    message(data);
                    if(data.result == 1){
                        $('#LoginModal').modal('hide');
                        $('.log_in_btn').addClass('d-none');
                        $('.log_out_btn').removeClass('d-none');
                        setTimeout(function (){
                            location.reload();
                        },2000);
                    }
                }
            });
    }
}, '#loginForm');

$(document).on({
    click: function (e) {
        let id = $(this).data('id');
        e.preventDefault();
        $.ajax(
            {
                url: './task/edit_template',
                type: 'POST',
                data: {id:id},
                datatype: 'html',
                success: function (html){
                    $('body').prepend(html);
                    $('#TaskEditModal').modal('show');
                }
            });
    }
}, '.editTask');

function link_prepare(){
    let page = $('.page_link.active').attr('data-id');
    if(page == undefined) page = 1;
    let order = $('select[name="sort_tasks"]').val();
    let link = '?page='+page+'&orderBy='+order;
    location.href = link;
}

$(document).on({
    click: function (e) {
        e.preventDefault();
        $('.page_link').removeClass('active');
        $(this).addClass('active');
        link_prepare();
    }
}, '.page_link');

$(document).on({
    change: function (e) {
        e.preventDefault();
        link_prepare();
    }
}, 'select[name="sort_tasks"]');

