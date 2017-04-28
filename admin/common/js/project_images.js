$(function () {
        add_content();
    });
    
function add_content() {

    $('.add_content').on('click', function() {
        var _num = $('img').length;
        var _html = '';
        var _contain = $('#container-content');
        if(_num < 3) {
        ++_num;
        // load images
        var im_image ="'img_image"+_num+"'";
        _html += '<tr class="content_images" attr-num="'+_num+'" id="delete_image'+_num+'">';
            _html += '<th class="subThDetail">画像'+_num+'</th>';
            _html += '<td id="add_images'+_num+'">';
                _html += '<img src="" width="95" id="img_image'+_num+'" att-num="'+_num+'" class="hidden"/>';
                _html += '<input  alt="削除" class="bt-del btn-del-detail" set-data="'+_num+'" value="X" id="btn_delete_image'+_num+'" onclick="del_img(this,'+_num+')" type="hidden"/>';
                _html += '<br>';
                _html += '<input type="file" name="content_img[]" onchange="readURL(this,'+im_image+','+_num+')"/>';
                _html += '</td>';
        _html += '</tr>';
        
            _contain.before(_html);
        }
        if(_num >= 3) {
            $(this).parent().parent().hide();
        }

    })
}

function del_img(that, _num) {
        var image = $('img').length;
        var _html = '';
        var _contain = $('#container-content');
        if (image <= 3) {
            var im_image ="'img_image"+_num+"'";
                _html += '<tr class="content_images" attr-num="'+_num+'" id="delete_image'+_num+'">';
                    _html += '<th class="subThDetail">画像'+_num+'</th>';
                    _html += '<td id="add_images'+_num+'">';
                        _html += '<img src="" width="95" id="img_image'+_num+'" att-num="'+_num+'" class="hidden"/>';
                        _html += '<input type="hidden" alt="削除" class="bt-del btn-del-detail" set-data="'+_num+'" value="X" id="btn_delete_image'+_num+'" onclick="del_img(this,'+_num+')" class="hidden"/>';
                        _html += '<br>';
                        _html += '<input type="file" name="content_img[]" onchange="readURL(this,'+im_image+','+_num+')"/>';
                        _html += '</td>';
                _html += '</tr>';
            _contain.before(_html);
        }
        var _frmArticle = $('#table_frame');
        var _imgId = parseInt($(this).attr('set-data'));
        _frmArticle.append('<input type="hidden" name="del_img[]" value="'+_imgId+'" />');
        $('#delete_image'+_num).remove();
}
    
function readURL(input, img_image,_num) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#' + img_image)
                    .attr('src', e.target.result)
                    .width(95)
                    .css('margin-top', '10px');
        };
        reader.readAsDataURL(input.files[0]);
        $('#img_image'+_num).removeClass('hidden');
        $('#btn_delete_image'+_num).attr('type','button');
        $('#' + img_image+_num).show();
    } else {
        $('#' + img_image+_num).hide();
    }
}