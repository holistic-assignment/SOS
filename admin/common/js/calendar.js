function editCalendar() {
    $('#show_item').empty();
    $.ajax({
        type: "POST",
        url: path + 'index.php/calendar/updateCalendar',
        data: {
        },
        dataType: 'json',
        success: function (obj) {
           $('#show_item').append(html(obj.list_date, obj.weekjp, obj.day_color, obj.color, obj.textFull));
        }
    });
}

function html(list_date, weekjp, day_color, color, textFull) {
    var html = '';
    html += '<table class="table Table table-striped" cellpadding="0" cellspacing="0" id="table_frame">';
    html += '<thead>';
    html += '<tr>';
    for(var i = 0 ; i< list_date.length ;i++){
        html += '<th colspan="3" class="titTab ">';
        html +=  list_date[i]['year']+'年'+ list_date[i]['month'] + '月';
        html += '</th>';
    }
    html += '</tr>';
    html += '</thead>';
    html += '<tbody>';
    for (var d = 1; d <= 31; d++) {
	html += '<tr>';
    for(var i = 0; i < list_date.length; i++) {
    if ( d <= daysInMonth(list_date[i]['month'],list_date[i]['year'])) {
        html += '<td class="titTab titFrm20">';
        html += d;
        html += '</td>';
        html += '<td class="titTab titFrm20">';
        var days = weekjp;
        var date = new Date(list_date[i]['year']+ '-' + list_date[i]['month'] +'-' + d);
        var x = date.getDay();
        var tmp_day = days[x];
        html += days[x];
        html += '</td>';
        html += '<td class="titTab th_data textL">';
        var c_date = 0;
        if (parseInt(d) < 10){
            c_date = '0' + d;
        } else {
            c_date = d;
        }
        var tmp_day =list_date[i]['year']+list_date[i]['month']+c_date;
        if (textFull[tmp_day] != '') {
            var link = path + 'index.php/calendar/detail/' + tmp_day;
            html +=  '<a href="'+ link +'" class="'+ color[tmp_day] +'">';
            html += textFull[tmp_day];
            html += '</a>';
        }
        html += '</td>';
    } else {
        html += '<td class="titTab titFrm20"></td>';
        html +=	'<td class="titTab titFrm20"></td>';
        html += '<td class="titTab th_data textL"></td>';
    } 

    }
	html +=	'</tr>';
    }
	html += '</tbody>';
    html += '</table>';
    return html;
}

function daysInMonth(month,year) {
    return new Date(year, month, 0).getDate();
}

