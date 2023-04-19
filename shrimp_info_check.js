function check (formData) {
    // 2/20 空值檢查--------------------------------------------
    var eye = formData.get('eye') ;
    var birthday = formData.get('birthday') ;
    var family = formData.get('family') ;
    var weight = formData.get('weight') ;
    var cutday = formData.get('cutday') ;
    var enterday = formData.get('enterday') ;
    var location = formData.get('location') ;
    var live_or_die = formData.get('live_or_die') ;
    const map = new Map()
    map.set("cutday" , "剪眼日期") ;
    map.set("family" , "家族") ;
    map.set("eye" , "眼標") ;
    map.set("birthday" , "出生日期") ;
    map.set("weight" , "體重") ;
    map.set("enterday" , "進蝦時間") ;
    map.set("location" , "tankid") ;
    map.set("live_or_die" , "生存狀態") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "資訊尚未填寫完成，請填入:\n" ;
    if(cutday == null || cutday == "") {
        show_message += (map.get("cutday") + '、') ;
        count ++ ;
    }
    if(eye == null || eye == "") {
        show_message += (map.get("eye") + '、') ;
        count ++ ;
    }
    if(birthday == null || birthday == "") {
        show_message += (map.get("birthday") + '、') ;
        count ++ ;
    }
    if(family == null || family == "") {
        show_message += (map.get("family") + '、') ;
        count ++ ;
    }
    if(weight == null || weight == "") {
        show_message += (map.get("weight") + '、') ;
        count ++ ;
    }
    if(enterday == null || enterday == "") {
        show_message += (map.get("enterday") + '、') ;
        count ++ ;
    }
    if(location == null || location == "") {
        show_message += (map.get("location") + '、') ;
        count ++ ;
    }
    if(live_or_die == null || live_or_die == "") {
        show_message += (map.get("live_or_die") + '、') ;
        count ++ ;
    }
    
    if(count != 0) show_message = show_message.slice(0 , show_message.length - 1) ;
    else show_message = "" ;
    
    return show_message ;
}

function html_show_all_data(formData) {
    // 3/17 show html在sweetalert2
    var eye = formData.get('eye') ;
    var birthday = formData.get('birthday') ;
    var family = formData.get('family') ;
    var weight = formData.get('weight') ;
    var cutday = formData.get('cutday') ;
    var enterday = formData.get('enterday') ;
    var location = formData.get('location') ;
    var live_or_die = formData.get('live_or_die') ;
    const map = new Map()
    map.set("cutday" , "剪眼日期") ;
    map.set("family" , "家族") ;
    map.set("eye" , "眼標") ;
    map.set("birthday" , "出生日期") ;
    map.set("weight" , "體重") ;
    map.set("enterday" , "進蝦時間") ;
    map.set("location" , "tankid") ;
    map.set("live_or_die" , "生存狀態") ;

    var all_data_name = ["眼標" , "家族" , "體重" , "tankid" , "剪眼日期" , "出生日期" , "進蝦時間" , "生存狀態"] ;
    var all_data_num = [eye , family , weight , location , cutday , birthday  , enterday , live_or_die] ;

    //建立一個新的html檔來當作提示訊息，append_div為要插入的訊息
    var new_html = document.createElement('div') ;

    var a_div = document.createElement('div') ;
    a_div.textContent = "請確認所有資料:\n" + "(紅色眼標表示此資料庫有這個眼標)\n" + "(藍色剪眼日期是會影響到生產資料庫中相同眼標的資料)\n " ;
    new_html.appendChild(a_div) ;

    //先去察看母種蝦資料中是否有這個眼標-------------------------------------------------
    var shrimp_info_has_eyetag = 0 ;
    $.ajax({
        url: 'check_eyetag.php?eye='+eye+'&UI_type='+"shrimp_info",
        type: 'POST',
        // data: {'eye' : eye},
        cache: false,
        dataType: 'json',
        async: false,
        //下面兩者一定要false
        processData: false,
        contentType: false,

        success: function(backData) {
            shrimp_info_has_eyetag = backData ;
        },
        error: function() {
            Swal.fire({
                title: backData,
                confirmButtonText: "確認",
            }).then((result) => {
                $('#backmsg').html("取得資料失敗...");
            });
        },
    });
    //----------------------------------------------------------------------

    //再去察看breed中是否有這個眼標-------------------------------------------------
    var breed_has_eyetag = 0 ;
    $.ajax({
        url: 'check_eyetag.php?eye='+eye+'&UI_type='+"breed",
        type: 'POST',
        // data: {'eye' : eye},
        cache: false,
        dataType: 'json',
        async: false,
        //下面兩者一定要false
        processData: false,
        contentType: false,

        success: function(backData) {
            breed_has_eyetag = backData ;
        },
        error: function() {
            Swal.fire({
                title: backData,
                confirmButtonText: "確認",
            }).then((result) => {
                $('#backmsg').html("取得資料失敗...");
            });
        },
    });
    //----------------------------------------------------------------------

    //append 所有資料上去
    for(var i = 0 ; i < all_data_name.length ; i ++ ) {
        var append_div = document.createElement('div') ;

        var first_span = document.createElement('span');
        first_span.textContent = all_data_name[i] ;
        first_span.style.color = 'black' ;
        append_div.append(first_span) ;

        var third_span = document.createElement('span');
        third_span.textContent = " ".repeat(2) + ":" + " ".repeat(2) ;
        third_span.style.color = 'black' ;
        append_div.append(third_span) ;

        var second_span = document.createElement('span');
        second_span.textContent = all_data_num[i] ;
        if(all_data_name[i] == "眼標" && shrimp_info_has_eyetag == 1) second_span.style.color = 'red' ;
        else if(all_data_name[i] == "剪眼日期" && breed_has_eyetag == 1) second_span.style.color = 'blue' ;
        else second_span.style.color = 'black' ;
        append_div.append(second_span) ;

        // 設定div中span的比例
        append_div.style.display = "flex" ;
        append_div.style.justifyContent = "center" ;
        append_div.style.alignItems = "cneter" ;
        append_div.firstElementChild.style.flexBasis = "35%" ;
        append_div.firstElementChild.style.textAlign = "center" ;
        append_div.lastElementChild.style.flexBasis = "35%" ;
        append_div.lastElementChild.style.textAlign = "center" ;


        new_html.append(append_div) ;
    }

    return new_html ;
}

function post (formData) {
    $.ajax({
        url: 'Upload_母種蝦資料.php',
        type: 'POST',
        data: formData,
        cache: false,
        //下面兩者一定要false
        processData: false,
        contentType: false,

        success: function(backData) {
            console.log();
            Swal.fire({
                title: backData,
                confirmButtonText: "確認",
            }).then((result) => {
                if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
                    window.location.href = 'add_母種蝦資料';
                    $("#backmsg").html(backData);
                }
            });
        },
        error: function() {
            Swal.fire({
                title: backData,
                confirmButtonText: "確認",
            }).then((result) => {
                $('#backmsg').html("上傳失敗...");
            });
        },
    });
}

function data_transfer(from_data , form_id) {
    document.getElementById(form_id).elements["eye"].value = from_data.get("eye") ;
    document.getElementById(form_id).elements["family"].value = from_data.get("family") ;
    document.getElementById(form_id).elements["cutday"].value = from_data.get("cutday") ;
    document.getElementById(form_id).elements["birthday"].value = from_data.get("birthday") ;
    document.getElementById(form_id).elements["enterday"].value = from_data.get("enterday") ;
    document.getElementById(form_id).elements["weight"].value = from_data.get("weight") ;
    document.getElementById(form_id).elements["live_or_die"].value = from_data.get("live_or_die") ;
    document.getElementById(form_id).elements["location"].value = from_data.get("location") ;
}

function FileListItems (files) {
    var b = new ClipboardEvent("").clipboardData || new DataTransfer() ;
    for (var i = 0, len = files.length; i<len; i++) b.items.add(files[i]) ;
    return b.files ;
}

//圖片load進去filereader中
function place_picture(target_id , show_picture_id , picture_address) {
    var reader = new FileReader();
    // 當檔案讀取完後，所要進行的動作
    reader.onload = function(e) {
        // 顯示圖片
        document.getElementById(show_picture_id).src = picture_address ;
        if(target_id == "uploadimage_big") {
            document.getElementById(show_picture_id).style.height = big_picture_height ;
            document.getElementById(show_picture_id).style.width = big_picture_width ;
        }
        else {
            document.getElementById(show_picture_id).style.height = small_picture_height ;
            document.getElementById(show_picture_id).style.width = small_picture_width ;
        }
    };
    //放入form裡面
    reader.readAsDataURL(document.getElementById(target_id).files[0]);
}

async function modify_put_into_form(data , form_id , is_modify) {
    var Filelist ;
    //show data on 詳細資料_母種蝦資料
    if(is_modify == 1) {
        if(data.get("image") != "") {
            Filelist = fetch(data.get("image"))
                .then(response => response.blob())
                .then(blob => {
                    // 創建新的文件對象
                    var files = [
                        new File([blob], data.get("image") + ".jpg" , { type: 'image/jpeg' } )
                    ];
                    
                    return new FileListItems(files) ;
                    
                });
                // console.log(Filelist)
                file = await Filelist.then((value) => {
                    return value;
                });
                document.getElementById("uploadimage_big").files = file ;
                document.getElementById("uploadimage_small").files = file ;
                place_picture("uploadimage_big" , "show_image_big" , data.get("image")) ;
                place_picture("uploadimage_small" , "show_image_small" , data.get("image")) ;
        }
    }
    document.getElementById(form_id).elements["id"].value = data.get("id") ;
    document.getElementById(form_id).elements["family"].value = data.get("family") ;
    document.getElementById(form_id).elements["enterday"].value = data.get('enterday') ;
    document.getElementById(form_id).elements["eye"].value = data.get('eye') ;
    document.getElementById(form_id).elements["cutday"].value = data.get("cutday") ;
    document.getElementById(form_id).elements["weight"].value = data.get("weight") ;
    document.getElementById(form_id).elements["location"].value = data.get("tankid") ;
    document.getElementById(form_id).elements["birthday"].value = data.get("birthday") ;
    document.getElementById(form_id).elements["live_or_die"].value = data.get("live_or_die") ;
}

function modify_post (formData) {
    $.ajax({
        url: 'Update_母種蝦資料.php',
        type: 'POST',
        data: formData,
        cache: false,
        //下面兩者一定要false
        processData: false,
        contentType: false,

        success: function(backData) {
            console.log();
            Swal.fire({
                title: backData,
                confirmButtonText: "確認",
            }).then((result) => {
                if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
                    window.location.href = 'find_母種蝦資料';
                    $("#backmsg").html(backData);
                }
            });
        },
        error: function() {
            Swal.fire({
                title: backData,
                confirmButtonText: "確認",
            }).then((result) => {
                $('#backmsg').html("上傳失敗...");
            });
        },
    });
}