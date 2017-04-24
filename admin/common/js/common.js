/**
 * Created by Administrator on 7/18/2014.
 */
$(function() {
    //set width for heading td
    w_heading();
    $(window).resize(function() {
        w_heading();
    });
    //catch event type number increase_times
    $(".number_check").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                                (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
    //catch event type float
    $(".float_check").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                                (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
    //prevent enter key
    $('.preventEnter').keypress(function(event) {

        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });
    //only alphabelnumeric
    $('.alpha_numeric').keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                (e.keyCode >= 48 && e.keyCode <= 57) ||
                (e.keyCode >= 96 && e.keyCode <= 105) ||
                (e.keyCode >= 65 && e.keyCode <= 90) ||
                (e.keyCode >= 65 && e.keyCode <= 90) ||
                (e.keyCode >= 37 && e.keyCode <= 40)
                ) {
            return
        } else {
            e.preventDefault();
        }
    });
    //CHECK DATE
    $(".date_check").keydown(function(e) {
        // Allow: /, /, -, -, delete, backspace, tab, escape, escape, enter, space, shift.
        if ($.inArray(e.keyCode, [191, 111, 173, 109, 46, 8, 9, 27, 18, 13, 32, 16]) !== -1 ||
                // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                                (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
    //protest copying
    $('.block_copy').bind("copy", function() {
        return false;
    });
    //protest cutting
    $('.block_cut').bind("cut", function() {
        return false;
    });
    //protest pasting
    $('.block_paste').bind("paste", function() {
        return false;
    });//protest Dropping
    $('.block_drop').bind("drop", function() {
        return false;
    });


});

//on load
//var table_wrapper = 0;
//var table_scroll = 0;

//set offet scroll x at bottom of the screen
//function resizeHeightContentTable() {
//    //height
//    var windowH = $(window).height() + $(window).scrollTop();
//    var offset = $("#table-scroll").offset();
//    var offset_top = offset.top;
//    var height = windowH - offset_top;
//    if (windowH - offset_top <= table_wrapper) {
//        $("#table-scroll").css('height', height + 'px');
//    } else {
//        $("#table-scroll").css('height', table_scroll + 'px');
//    }
//}
//
//$(document).ready(function () {
//    //set offet scroll x at bottom of the screen
//    if (table_wrapper == 0) {
//        table_wrapper = $("#table-wrapper").height();
//    }
//    if (table_scroll == 0) {
//        table_scroll = $("#table-scroll").height();
//    }
//    //width
//    var tableWidth = $("#table-scroll table:first").width() + 2;
//    var sidebar_nav = $(".sidebar-nav").width();
//    var total = tableWidth + sidebar_nav + 50;
//    if (total < $(window).width()) {
//        $("#table-wrapper").css('width', tableWidth + 'px');
//    }
//    resizeHeightContentTable();
//    $(window).resize(resizeHeightContentTable);
//    $(window).scroll(resizeHeightContentTable);
//    //end set offet scroll x at bottom of the screen
//});


function convertToTimeStamp(dateString) {

    if (dateString.indexOf(' ') < 0) {
        dateString += ' 00:00:00';
    }

    var dateParts = dateString.split(' '),
            timeParts = dateParts[1].split(':'),
            date;

    //check format
    if (!isDate(dateParts[0]) || !isTime(dateParts[1])) {
        return false;
    }
    dateParts = dateParts[0].split('-');


    date = new Date(dateParts[0], parseInt(dateParts[1], 10) - 1, dateParts[2], timeParts[0], timeParts[1], timeParts[2]);
    return date.getTime();
}

function isDate(str) {
    try {
        var parms = str.split(/[\.\-\/]/);
        var yyyy = parseInt(parms[0], 10);
        var mm = parseInt(parms[1], 10);
        var dd = parseInt(parms[2], 10);
        var date = new Date(yyyy, mm - 1, dd, 0, 0, 0, 0);
        return mm === (date.getMonth() + 1) && dd === date.getDate() && yyyy === date.getFullYear();
    } catch (e) {
        return false;
    }

}

function isTime(time) {
    var newreg = /^(([0-1][0-9])|(2[0-3])):[0-5][0-9]:[0-5][0-9]$/;
    if (time.match(newreg)) {
        return true;
    }
    return false;
}

function isVersion(version) {
    var newreg = /^(\*|\d+(\.\d+){0,2}(\.\d)?)$/;
    if (version.match(newreg)) {
        return true;
    }
    return false;
}
function site_trim(str) {
    var trimmed = str.replace(/^\s+|\s+$/g, '');
    return trimmed;
}

//check length - limit
var utf8 = {}

utf8.toByteArray = function(str) {
    var byteArray = [];
    for (var i = 0; i < str.length; i++)
        if (str.charCodeAt(i) <= 0x7F)
            byteArray.push(str.charCodeAt(i));
        else {
            var h = encodeURIComponent(str.charAt(i)).substr(1).split('%');
            for (var j = 0; j < h.length; j++)
                byteArray.push(parseInt(h[j], 16));
        }
    return byteArray;
};

utf8.parse = function(byteArray, limit) {
    var str = '';
    var strTemp = '';
    var count = 0;
    var isJP = false;
    var countJP = 0;
    for (var i = 0; i < byteArray.length; i++) {
        if (byteArray[i] <= 0x7F) {
            //if LATIN
            //increase count general
            count++;
            if (byteArray[i] === 0x25) {
                str += "%25";
            } else {
                str += String.fromCharCode(byteArray[i]);
            }
        } else {
            //if JP
            //increase count JP
            countJP++;
            strTemp += "%" + byteArray[i].toString(16).toUpperCase();
        }
        //reset countJP
        if (countJP == 3) {
            //check limit
            if ((count + 2) > (limit * 2)) {
                break;
            }

            //increase count
            count += 2;
            //set string
            str += strTemp;
            //reset
            strTemp = '';
            isJP = false;
            countJP = 0;
        } else {
            isJP = true;
        }
        //check limit
        if (count >= (limit * 2)) {
            break;
        }
    }

    return decodeURIComponent(str);
};
// sample
//var str = '1234説説説11234説1説123456789';//"説明説明12説明説明34";
//var ba = utf8.toByteArray(str);
//console.log('kq: ' + utf8.parse(ba, 3)); // Да!


function leftWord(id, sub_id, limit) {
    countWord = countLength($(id).val()) / 2;
    left = limit - countWord;
    if (left < 0) {
        $(sub_id).html(0);
        return 0;
    }
    $(sub_id).html(left);
    return 1;
}
function countLength(str) {
    count = 0;
    for (var i = 0; i < str.length; i++) {
        (str.charAt(i).match(/[ｱ-ﾝ]/) || escape(str.charAt(i)).length < 4) ? count++
                : count += 2;
    }
    return count;
}

//true: no error; false: error
function checkUrlFormat(str) {
    var urlPattern = /[\w-]:\/\/[\w-]+(|\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/
    if (urlPattern.test(str)) {
        //do something about it
        return true;
    }
    return false;
}
//is Alphabet + Numer Only
function isLatin(str) {
    return /^[a-zA-Z0-9]+$/.test(str);
}
/*
 lmkhang 2015-01-13
 only allow number
 */
function number_check(evt) {
    var e = evt || window.event;

    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
            // Allow: Ctrl+A
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        }
        /*
         lmkhang 2015-01-23
         checkValueNumber
         */
        function checkValueNumber(that) {
            if ($(that).val() <= 0) {
                $(that).val('');
            }
        }
        /*
         lmkhang
         2015-01-13
         remove element in array
         */
        Array.prototype.remove = function() {
            var what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };

        /*
         lmkhang 2015-01-15
         convert string to time stamp
         */

        function convertToTimeStamp2(dateString, $date_seperate) {

            if (dateString.indexOf(' ') < 0) {
                dateString += ' 00:00:00';
            }

            var dateParts = dateString.split(' '),
                    timeParts = dateParts[1].split(':'),
                    date;

            //check format
            if (!isDate(dateParts[0]) || !isTime(dateParts[1])) {
                return false;
            }
            dateParts = dateParts[0].split($date_seperate);


            date = new Date(dateParts[0], parseInt(dateParts[1], 10) - 1, dateParts[2], timeParts[0], timeParts[1], timeParts[2]);
            return date.getTime();
        }

        /*
         lmkhang
         2015-01-27
         check datetime format
         */
        function setDateTimeFormat(that, dateString) {
            if (dateString.indexOf(' ') < 0) {
                dateString += ' 00:00:00';
                $(that).val(dateString);
            }
        }
        /*
         khangml@vccvn.com
         2015-02-05
         display image after choosing
         */
        function readURL(input, image_id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#' + image_id)
                            .attr('src', e.target.result)
                            .width(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        /*
         trangttn
         2015-07-22
         set width for heading td
         */
        function w_heading() {
            var w_topic = $('#topic_view').width();
            $('.div_topic_view').css('width', w_topic);
            $('.div_topic_view').css('overflow', 'hidden');
            $('.div_topic_view').css('text-overflow', 'ellipsis');
        }

    