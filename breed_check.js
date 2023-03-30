function check (formData) {
    // 2/20 空值檢查--------------------------------------------
    var cutday = formData.get('cutday') ;
    var spawningroomdate = formData.get('spawningroomdate') ;
    var family = formData.get('family') ;
    var cutweight = formData.get('cutweight') ;
    var spawningweight = formData.get('spawningweight') ;
    var male_family = formData.get('male_family') ;
    var ovary_state = formData.get('ovarystate') ;
    var mating = formData.get('mating') ;
    var eye = formData.get('eye') ;
    const map = new Map()
    map.set("cutday" , "剪眼日期") ;
    map.set("family" , "家族") ;
    map.set("spawningroomdate" , "進產卵室待產日期") ;
    map.set("male_family" , "公蝦家族") ;
    map.set("ovary_state" , "卵巢進展階段") ;
    map.set("eye" , "眼標") ;
    map.set("mating" , "交配方式") ;
    map.set("spawningweight" , "生產體重") ;
    map.set("cutweight" , "剪眼體重") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "資訊尚未填寫完成，請填入:\n" ;
    if(cutday == null || cutday == "") {
        show_message += (map.get("cutday") + '、') ;
        count ++ ;
    }
    if(ovary_state == null || ovary_state == "") {
        show_message += (map.get("ovary_state") + '、') ;
        count ++ ;
    }
    if(eye == null || eye == "") {
        show_message += (map.get("eye") + '、') ;
        count ++ ;
    }
    if(family == null || family == "") {
        show_message += (map.get("family") + '、') ;
        count ++ ;
    }
    if(spawningroomdate == null || spawningroomdate == "") {
        show_message += (map.get("spawningroomdate") + '、') ;
        count ++ ;
    }
    if(cutweight == null || cutweight == "") {
        show_message += (map.get("cutweight") + '、') ;
        count ++ ;
    }
    if(spawningweight == null || spawningweight == "") {
        show_message += (map.get("spawningweight") + '、') ;
        count ++ ;
    }
    if(male_family == null || male_family == "") {
        show_message += (map.get("male_family") + '、') ;
        count ++ ;
    }
    if(mating == null || mating == "") {
        show_message += (map.get("mating") + '、') ;
        count ++ ;
    }
    
    if(count != 0) show_message = show_message.slice(0 , show_message.length - 1) ;
    else show_message = "" ;
    
    return show_message ;
}

function html_show_all_data(formData) {
    // 3/17 show html在sweetalert2
    var cutday = formData.get('cutday') ;
    var spawningroomdate = formData.get('spawningroomdate') ;
    var family = formData.get('family') ;
    var cutweight = formData.get('cutweight') ;
    var spawningweight = formData.get('spawningweight') ;
    var male_family = formData.get('male_family') ;
    var ovary_state = formData.get('ovarystate') ;
    var mating = formData.get('mating') ;
    var eye = formData.get('eye') ;
    const map = new Map()
    map.set("cutday" , "剪眼日期") ;
    map.set("family" , "家族") ;
    map.set("spawningroomdate" , "進產卵室待產日期") ;
    map.set("male_family" , "公蝦家族") ;
    map.set("ovary_state" , "卵巢進展階段") ;
    map.set("eye" , "眼標") ;
    map.set("mating" , "交配方式") ;
    map.set("spawningweight" , "生產體重") ;
    map.set("cutweight" , "剪眼體重") ;

    //用 array 先把超過範圍的資料存起來
    var all_data_name = ["眼標" , "家族" , "公蝦家族" , "生產體重" , "剪眼體重" , "卵巢進展階段" , "交配方式" , "剪眼日期" , "進產卵室待產日期"] ;
    var all_data_num = [eye , family , male_family , spawningweight , cutweight , ovary_state , mating  , cutday , spawningroomdate] ;

    //建立一個新的html檔來當作提示訊息，append_div為要插入的訊息
    var new_html = document.createElement('div') ;

    var a_div = document.createElement('div') ;
    a_div.textContent = "請確認所有資料:\n " ;
    new_html.appendChild(a_div) ;

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
        second_span.style.color = 'black' ;
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
        url: 'Upload_生產.php',
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
                    window.location.href = 'add_生產';
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
    document.getElementById(form_id).elements["male_family"].value = from_data.get("male_family") ;
    document.getElementById(form_id).elements["cutweight"].value = from_data.get("cutweight") ;
    document.getElementById(form_id).elements["spawningweight"].value = from_data.get("spawningweight") ;
    document.getElementById(form_id).elements["cutday"].value = from_data.get("cutday") ;
    document.getElementById(form_id).elements["spawningroomdate"].value = from_data.get("spawningroomdate") ;
    document.getElementById(form_id).elements["ovarystate"].value = from_data.get("ovarystate") ;
    document.getElementById(form_id).elements["mating"].value = from_data.get("mating") ;
}