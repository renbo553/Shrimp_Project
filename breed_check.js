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
    var data_name = ["剪眼日期" , "家族" , "進產卵室待產日期" , "公蝦家族" , "卵巢進展階段" , "眼標" , "交配方式" , "生產體重" , "剪眼體重"] ;
    var data_num = [cutday , family , spawningroomdate , male_family , ovary_state , eye , mating , spawningweight , cutweight] ;

    //建立一個新的html檔來當作提示訊息，append_div為要插入的訊息
    var new_html = document.createElement('div') ;

    var a_div = document.createElement('div') ;
    a_div.textContent = "請確認所有資料:\n " ;
    new_html.appendChild(a_div) ;

    //append 所有資料上去
    for(var i = 0 ; i < data_name.length ; i ++ ) {
        // 先清空原本要 append 上去的 div，再append新的元素上去
        var append_div = document.createElement('div') ;

        var first_span = document.createElement('span');
        first_span.textContent = data_name[i] + ": " ;
        first_span.style.color = 'black' ;
        append_div.append(first_span) ;

        var second_span = document.createElement('span');
        second_span.textContent = data_num[i] ;
        second_span.style.color = 'black' ;
        append_div.append(second_span) ;

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