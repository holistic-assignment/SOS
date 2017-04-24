$(function () {
    $('#insert_memo').on('click', function () {
        var memo = $('#modal_memo').val();
        var memo_member = $(this).attr("data_member")
        var memo_date = $(this).attr("data_time");
        var memo_memo = $(this).attr("data_memo");
        var memo_id = $(this).attr("data_id");
        $.ajax({
            type: "POST",
            url: path + 'index.php/member/addMemo',
            data: {
                member_id: memo_member,
                time: memo_date,
                memo: memo,
                memo_id: memo_id,
            },
            dataType: 'json',
            beforeSend: function () {

            },
            error: function (xhr, ajaxOptions, thrownError) {
//                alert(xhr.status);
//                alert(thrownError);
            },
            success: function (obj) {
                if (obj.rs == 1) {
                    $('#'+memo_member+memo_date).attr('data-memo',obj.memo);
                    $('#'+memo_member+memo_date).attr('data-id',obj.memo_id);
                    $('#'+memo_member+memo_date).addClass('note');
                    
                }
                if (obj.rs == 2) {
                    $('#'+memo_member+memo_date).attr('data-memo',obj.memo);
                }
                $('#myModal').modal('hide');
            }
        });
    });
    $('#delete_memo').on('click', function () {
        var memo_id = $(this).attr("data_delete");
        var member_id = $(this).attr("delete_member");
        var time = $(this).attr("delete_time");
        $.ajax({
            type: "POST",
            url: path + 'index.php/member/delete',
            data: {
                memo_id: memo_id,
                member_id: member_id,
                time: time
            },
            dataType: 'json',
            beforeSend: function () {
            },
            error: function (xhr, ajaxOptions, thrownError) {
//                alert(xhr.status);
//                alert(thrownError);
            },
            success: function (obj) {
                if (obj.rs == 1) {
                    $('#'+member_id+time).removeClass('note');
                    $('#'+member_id+time).attr('data-memo','');
                }
                $('#myModal').modal('hide');
            }
        });
    });
});

function create_memo(that) {
    var memo_member = $(that).attr("data-member")
    var memo_date = $(that).attr("data-time");
    var memo_memo = $(that).attr("data-memo");
    var memo_id = $(that).attr("data-id");
    $('#insert_memo').attr('data_member', memo_member);
    $('#insert_memo').attr('data_time', memo_date);
    $('#insert_memo').attr('data_memo', memo_memo);
    $('#insert_memo').attr('data_id', memo_id);
    $('#delete_memo').attr('data_delete', memo_id);
    $('#delete_memo').attr('delete_member', memo_member);
    $('#delete_memo').attr('delete_time', memo_date);
    $("#modal_memo").val(memo_memo)
    $('#myModal').modal('show');
}