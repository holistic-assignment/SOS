
        //do what ever you want here
    
function create_character(){  
    setTimeout(function(){
        var vmain_character = document.getElementsByName('main_character_dlg');
        var valuemain_character = '0';
        for (var i = 0; i < vmain_character.length; i++) {
            if(vmain_character[i].checked){
                valuemain_character ='1';
            }else{
                valuemain_character ='0';
            }
        }
        
        var vcharactername = $("#name_dlg").val().trim();
        var vcharacterlastname = $("#last_name_dlg").val().trim();
        var vcharactername = $("#name_dlg").val().trim();    
        var vremarks = $("#remarks_dlg").val().trim(); 

        var id = $('#character_id_dlg').val().trim();
        var img_main = $('#img_main').val();
        var img_main_grey = $('#img_main_grey').val();    
        var img_detail = $('#img_detail').val(); 
        var img_still_title = $('#img_still_title').val(); 
        var img_save_data_title = $('#img_save_data_title').val();
        var img_save_data_title_grey = $('#img_save_data_title_grey').val();       
        var img_history_title = $('#img_history_title').val();
        
        var img_startup_title = $('#img_startup_title').val();
        var img_startup_grey_title = $('#img_startup_grey_title').val();
        var img_save_profile_title = $('#img_save_profile_title').val();
        var img_save_profile_grey_title = $('#img_save_profile_grey_title').val();
        var img_mission_title = $('#img_mission_title').val();
        var img_mission_s_title = $('#img_mission_s_title').val();
        var img_mission_s_p_title = $('#img_mission_s_p_title').val();

        $('#character_error').text('');
        $('#character_image_main_error').text('');
        $('#character_image_main_grey_error').text('');
        $('#character_image_detail_error').text('');
        $('#character_image_still_title_error').text('');
        $('#character_image_save_data_title_error').text('');
        $('#character_image_save_data_title_grey_error').text('');
        $('#character_image_history_title_error').text('');
        
        $('#character_image_startup_title_error').text('');
        $('#character_image_startup_grey_title_error').text('');
        $('#character_image_save_profile_title_error').text('');
        $('#character_image_save_profile_grey_title_error').text('');
        $('#character_image_mission_title_error').text('');
        $('#character_image_mission_s_title_error').text('');
        $('#character_image_mission_s_p_title_error').text('');

    //    alert(id);
        var element = document.getElementById('character_error');
        if(vcharacterlastname=='' && vcharactername==''){           
            element.innerHTML = "キャラクター名がNULLになっています。";
            return;
        }else{
            element.innerHTML = "";
        }

        //if image main not choose
        var element2 = document.getElementById('character_image_main_error');        
        if(valuemain_character == 1 &&  (img_main == null || img_main == 0)){          
          element2.innerHTML = "メニュー用画像を選択してください。";
          $("#character_image_main_error").show();
          return;      
        }else{
               element2.innerHTML = "";  
         }

        //if image main grey not choose
        var element5 = document.getElementById('character_image_main_grey_error');

        if(valuemain_character == '1' &&  (img_main_grey == null || img_main_grey == 0)){
          element5.innerHTML = "メニュー用反転画像を選択してください。";
          $("#character_image_main_grey_error").show();
          return;      
        }else{         
               element5.innerHTML = "";  
         }

        //if image detail not choose
        var element3 = document.getElementById('character_image_detail_error');
        if(valuemain_character == '1' && (img_detail == null || img_detail == 0)){      
          element3.innerHTML = "プロフィール画像を選択してください。";
          $("#character_image_detail_error").show();
          return;      
        }
        else{
               element3.innerHTML = ""; 
        }

        //check image still title
        var element4 = document.getElementById('character_image_still_title_error');
        if(valuemain_character == '1' && (img_still_title == null || img_still_title == 0)){      
          element4.innerHTML = "スチルタイトル画像を選択してください。";
          $("#character_image_still_title_error").show();
          return;      
        }
        else{
          element4.innerHTML = ""; 
        }

        var element5 = document.getElementById('character_image_save_data_title_error');
        if(valuemain_character == '1' && (img_save_data_title == null || img_save_data_title == 0)){      
          element5.innerHTML = "セーブデータ用画像を選択してください。";
          $("#character_image_save_data_title_error").show();
          return;      
        }
        else{
          element5.innerHTML = ""; 
        }
        
        var element7 = document.getElementById('character_image_save_data_title_grey_error');
        if(valuemain_character == '1' && (img_save_data_title_grey == null || img_save_data_title_grey == 0)){      
          element7.innerHTML = "セーブデータ用反転画像を選択してください。";
          $("#character_image_save_data_title_grey_error").show();
          return;      
        }
        else{
          element7.innerHTML = ""; 
        }

        var element6 = document.getElementById('character_image_history_title_error');
        if(valuemain_character == '1' && (img_history_title == null || img_history_title == 0)){      
          element6.innerHTML = "履歴用画像を選択してください。";
          $("#character_image_history_title_error").show(); 
          return;      
        }
        else{
          element6.innerHTML = ""; 
        }
        
        //end with number 7
        
        // ----------
        if(valuemain_character == '1' && (img_startup_title == null || img_startup_title == 0)){      
            $("#character_image_startup_title_error").html('Startup用画像を選択してください。').show();
            return;
        }else{
            $("#character_image_startup_title_error").html('').hide();
        }
        
        if(valuemain_character == '1' && (img_startup_grey_title == null || img_startup_grey_title == 0)){      
            $("#character_image_startup_grey_title_error").html('Startup用反転画像を選択してください。').show();
            return;
        }else{
            $("#character_image_startup_grey_title_error").html('').hide();
        }
        
        if(valuemain_character == '1' && (img_save_profile_title == null || img_save_profile_title == 0)){      
            $("#character_image_save_profile_title_error").html('SaveProfile用画像を選択してください。').show();
            return;
        }else{
            $("#character_image_save_profile_title_error").html('').hide();
        }
        
        if(valuemain_character == '1' && (img_save_profile_grey_title == null || img_save_profile_grey_title == 0)){      
            $("#character_image_save_profile_grey_title_error").html('SaveProfile用反転画像を選択してください。').show();
            return;
        }else{
            $("#character_image_save_profile_grey_title_error").html('').hide();
        }
        //mission image
        if(valuemain_character == '1' && (img_mission_title == null || img_mission_title == 0)){
            $("#character_image_mission_title_error").html('Mission用反転画像を選択してください。').show();
            return;
        }else{
            $("#character_image_mission_title_error").html('').hide();
        }
        //mission image

        //mission image save
        if(valuemain_character == '1' && (img_mission_s_title == null || img_mission_s_title == 0)){
            $("#character_image_mission_s_title_error").html('MissionSave用反転画像を選択してください。').show();
            return;
        }else{
            $("#character_image_mission_s_title_error").html('').hide();
        }
        //mission image save

        //mission image save press
        if(valuemain_character == '1' && (img_mission_s_p_title == null || img_mission_s_p_title == 0)){
            $("#character_image_mission_s_p_title_error").html('MissionSavePress用反転画像を選択してください。').show();
            return;
        }else{
            $("#character_image_mission_s_p_title_error").html('').hide();
        }
        //mission image save press

        // ----------

        if(id != ''){
            $.ajax({
                type: "POST",
                url: "savemodifier",
                data: ({id: id,main_character: valuemain_character, charactername: vcharactername, remarks: vremarks, lastname: vcharacterlastname, img_main:img_main, img_main_grey:img_main_grey, img_detail:img_detail,
                    img_still_title:img_still_title, img_save_data_title:img_save_data_title, img_save_data_title_grey:img_save_data_title_grey, img_history_title:img_history_title,
                    img_startup_title:img_startup_title,img_startup_grey_title:img_startup_grey_title,img_save_profile_title:img_save_profile_title,img_save_profile_grey_title:img_save_profile_grey_title,img_mission_title:img_mission_title,img_mission_s_title:img_mission_s_title,img_mission_s_p_title:img_mission_s_p_title}),
                dataType: 'text',
                success: function(data) {         
                   window.location.reload(true);
                   reset_dialog();

                }
            });        
        }
        else //Create new character
        {
            $.ajax({
                type: "POST",
                url: "insertcharacter",
                data: ({main_character: valuemain_character, charactername: vcharactername, lastname: vcharacterlastname, remarks: vremarks, img_main:img_main,img_main_grey:img_main_grey, img_detail:img_detail,
                        img_still_title:img_still_title, img_save_data_title:img_save_data_title, img_save_data_title_grey:img_save_data_title_grey, img_history_title:img_history_title,
                        img_startup_title:img_startup_title,img_startup_grey_title:img_startup_grey_title,img_save_profile_title:img_save_profile_title,img_save_profile_grey_title:img_save_profile_grey_title,img_mission_title:img_mission_title,img_mission_s_title:img_mission_s_title,img_mission_s_p_title:img_mission_s_p_title}),
                dataType: 'text',
                success: function(data) {                        
                   window.location.reload(true);
                   reset_dialog();     
                }
            });
        }
  }, 500 );
}
function reset_dialog()
{
    $('#myModal').modal('hide');
    $("#main_character_dlg1").prop('checked', true);
    $("#name_dlg").val('');
    $("#last_name_dlg").val('');
    $("#remarks_dlg").val('');
    $('#character_id_dlg').val('');
    
    $('#img_main').val('');
    $('#img_main_grey').val('');    
    $('#img_detail').val(''); 
    $('#img_still_title').val(''); 
    $('#img_save_data_title').val('');
    $('#img_save_data_title_grey').val('');
    $('#img_history_title').val('');
    var element = document.getElementById('character_error');
    element.innerHTML = "";    
}
function checkLength(text) {

    var escapedStr = encodeURI(text);
    if (escapedStr.indexOf("%") != -1) {
        var count = escapedStr.split("%").length - 1;
        if (count == 0) count++; 
        var tmp = escapedStr.length - (count * 3);
        count = count + tmp;
    } else {
        count = escapedStr.length;
    }
    return count;
}



