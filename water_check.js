function check (formData) {
    // 2/20 空值檢查--------------------------------------------
    var date = formData.get('date') ;
    var nh4 = formData.get('nh4') ;
    var no2 = formData.get('no2') ;
    var no3 = formData.get('no3') ;
    var Salinity_1 = formData.get('Salinity_1') ;
    var Salinity_2 = formData.get('Salinity_2') ;
    var Salinity_3 = formData.get('Salinity_3') ;
    var pH_1 = formData.get('pH_1') ;
    var pH_2 = formData.get('pH_2') ;
    var pH_3 = formData.get('pH_3') ;
    var O2_1 = formData.get('O2_1') ;
    var O2_2 = formData.get('O2_2') ;
    var O2_3 = formData.get('O2_3') ;
    var ORP_1 = formData.get('ORP_1') ;
    var ORP_2 = formData.get('ORP_2') ;
    var ORP_3 = formData.get('ORP_3') ;
    var Temp_1 = formData.get('Temp_1') ;
    var Temp_2 = formData.get('Temp_2') ;
    var Temp_3 = formData.get('Temp_3') ;
    var Alkalinity = formData.get('Alkalinity') ;
    var TCBS = formData.get('TCBS') ;
    var TCBS綠菌 = formData.get('TCBS綠菌') ;
    var Marine = formData.get('Marine') ;
    var 螢光菌TCBS = formData.get('螢光菌TCBS') ;
    var 螢光菌Marine = formData.get('螢光菌Marine') ;

    const map = new Map()
    map.set("date" , "日期") ;
    map.set("nh4" , "NH4-N") ;
    map.set("no2" , "NO2") ;
    map.set("no3" , "NO3") ;
    map.set("Salinity_1" , "Salinity_1") ;
    map.set("Salinity_2" , "Salinity_2") ;
    map.set("Salinity_3" , "Salinity_3") ;
    map.set("pH_1" , "pH_1") ;
    map.set("pH_2" , "pH_2") ;
    map.set("pH_3" , "pH_3") ;
    map.set("O2_1" , "O2_1") ;
    map.set("O2_2" , "O2_2") ;
    map.set("O2_3" , "O2_3") ;
    map.set("ORP_1" , "ORP_1") ;
    map.set("ORP_2" , "ORP_2") ;
    map.set("ORP_3" , "ORP_3") ;
    map.set("Temp_1" , "W Temp_1") ;
    map.set("Temp_2" , "W Temp_2") ;
    map.set("Temp_3" , "W Temp_3") ;
    map.set("Alkalinity" , "Alkalinity") ;
    map.set("TCBS" , "TCBS") ;
    map.set("TCBS綠菌" , "TCBS綠菌") ;
    map.set("Marine" , "Marine") ;
    map.set("螢光菌TCBS" , "螢光菌TCBS") ;
    map.set("螢光菌Marine" , "螢光菌Marine") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "資訊尚未填寫完成，請填入" ;
    if(date == null || date == "") {
        show_message += (map.get("date") + '\n') ;
        count ++ ;
    }
    if(nh4 == null || nh4 == "") {
        show_message += (map.get("nh4") + '\n') ;
        count ++ ;
    }
    if(no2 == null || no2 == "") {
        show_message += (map.get("no2") + '\n') ;
        count ++ ;
    }
    if(no3 == null || no3 == "") {
        show_message += (map.get("no3") + '\n') ;
        count ++ ;
    }
    if(Salinity_1 == null || Salinity_1 == "") {
        show_message += (map.get("Salinity_1") + '\n') ;
        count ++ ;
    }
    if(Salinity_2 == null || Salinity_2 == "") {
        show_message += (map.get("Salinity_2") + '\n') ;
        count ++ ;
    }
    if(Salinity_3 == null || Salinity_3 == "") {
        show_message += (map.get("Salinity_3") + '\n') ;
        count ++ ;
    }
    if(pH_1 == null || pH_1 == "") {
        show_message += (map.get("pH_1") + '\n') ;
        count ++ ;
    }
    if(pH_2 == null || pH_2 == "") {
        show_message += (map.get("pH_2") + '\n') ;
        count ++ ;
    }
    if(pH_3 == null || pH_3 == "") {
        show_message += (map.get("pH_3") + '\n') ;
        count ++ ;
    }
    if(O2_1 == null || O2_1 == "") {
        show_message += (map.get("O2_1") + '\n') ;
        count ++ ;
    }
    if(O2_2 == null || O2_2 == "") {
        show_message += (map.get("O2_2") + '\n') ;
        count ++ ;
    }
    if(O2_3 == null || O2_3 == "") {
        show_message += (map.get("O2_3") + '\n') ;
        count ++ ;
    }
    if(no3 == null || no3 == "") {
        show_message += (map.get("no3") + '\n') ;
        count ++ ;
    }
    if(ORP_1 == null || ORP_1 == "") {
        show_message += (map.get("ORP_1") + '\n') ;
        count ++ ;
    }
    if(ORP_2 == null || ORP_2 == "") {
        show_message += (map.get("ORP_2") + '\n') ;
        count ++ ;
    }
    if(ORP_3 == null || ORP_3 == "") {
        show_message += (map.get("ORP_3") + '\n') ;
        count ++ ;
    }
    if(Temp_1 == null || Temp_1 == "") {
        show_message += (map.get("Temp_1") + '\n') ;
        count ++ ;
    }
    if(Temp_2 == null || Temp_2 == "") {
        show_message += (map.get("Temp_2") + '\n') ;
        count ++ ;
    }
    if(Temp_3 == null || Temp_3 == "") {
        show_message += (map.get("Temp_3") + '\n') ;
        count ++ ;
    }
    if(Alkalinity == null || Alkalinity == "") {
        show_message += (map.get("Alkalinity") + '\n') ;
        count ++ ;
    }
    if(TCBS == null || TCBS == "") {
        show_message += (map.get("TCBS") + '\n') ;
        count ++ ;
    }
    if(TCBS綠菌 == null || TCBS綠菌 == "") {
        show_message += (map.get("TCBS綠菌") + '\n') ;
        count ++ ;
    }
    if(Marine == null || Marine == "") {
        show_message += (map.get("Marine") + '\n') ;
        count ++ ;
    }
    if(螢光菌TCBS == null || 螢光菌TCBS == "") {
        show_message += (map.get("螢光菌TCBS") + '\n') ;
        count ++ ;
    }
    if(螢光菌Marine == null || 螢光菌Marine == "") {
        show_message += (map.get("螢光菌Marine") + '\n') ;
        count ++ ;
    }

    if(count != 0) show_message = show_message.slice(0 , show_message.length - 1) ;
    show_message += "!" ;

    if(count == 0) show_message = "" ;
    return show_message ;
    //----------------------------------------------------------
}

function post (formData) {
    $.ajax({
        url: 'Upload_水質.php',
        type: 'POST',
        data: formData,
        cache: false,
        //下面兩者一定要false
        processData: false,
        contentType: false,

        success: function(backData) {
            console.log();
            window.alert(backData);
            if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
                window.location.href = 'add_水質';
                $("#backmsg").html(backData);
            }

        },
        error: function() {
            window.alert("上傳失敗...");
            $('#backmsg').html("上傳失敗...");
        },
    });
}

function add_check (formData) {
    // 3/5 獲取前一天資料--------------------------------------------
    var date = formData.get('date') ;

    const map = new Map()
    map.set("date" , "日期") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "要取得前天資料，請填入" ;
    if(date == null || date == "") {
        show_message += (map.get("date") + '\n') ;
        count ++ ;
    }

    if(count != 0) show_message = show_message.slice(0 , show_message.length - 1) ;
    show_message += "!" ;

    if(count == 0) show_message = "" ;
    return show_message ;
    //----------------------------------------------------------
}

function get_before (formData) {
    var ret_data ;
    $.ajax({
        url: 'get_waterquality.php',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        async: false,
        //下面兩者一定要false
        processData: false,
        contentType: false,

        success: function(backData) {
            ret_data = backData ;
        },
        error: function() {
            window.alert("取得資料失敗...");
            $('#backmsg').html("取得資料失敗...");
        },
    });
    return ret_data ;
}

function put_into_form(before_data_array) {
    // 將昨日的值放入 html
    let nh4 = document.getElementById("nh4") ;
    nh4.value = before_data_array["NH4_N"] ;
    let no2 = document.getElementById("no2") ;
    no2.value = before_data_array["NO2"] ;
    let no3 = document.getElementById("no3") ;
    no3.value = before_data_array["NO3"] ;
    let Salinity_1 = document.getElementById("Salinity_1") ;
    Salinity_1.value = before_data_array["Salinity_1"] ;
    let Salinity_2 = document.getElementById("Salinity_2") ;
    Salinity_2.value = before_data_array["Salinity_2"] ;
    let Salinity_3 = document.getElementById("Salinity_3") ;
    Salinity_3.value = before_data_array["Salinity_3"] ;
    let pH_1 = document.getElementById("pH_1") ;
    pH_1.value = before_data_array["pH_1"] ;
    let pH_2 = document.getElementById("pH_2") ;
    pH_2.value = before_data_array["pH_2"] ;
    let pH_3 = document.getElementById("pH_3") ;
    pH_3.value = before_data_array["pH_3"] ;
    let O2_1 = document.getElementById("O2_1") ;
    O2_1.value = before_data_array["O2_1"] ;
    let O2_2 = document.getElementById("O2_2") ;
    O2_2.value = before_data_array["O2_2"] ;
    let O2_3 = document.getElementById("O2_3") ;
    O2_3.value = before_data_array["O2_3"] ;
    let ORP_1 = document.getElementById("ORP_1") ;
    ORP_1.value = before_data_array["ORP_1"] ;
    let ORP_2 = document.getElementById("ORP_2") ;
    ORP_2.value = before_data_array["ORP_2"] ;
    let ORP_3 = document.getElementById("ORP_3") ;
    ORP_3.value = before_data_array["ORP_3"] ;
    let Temp_1 = document.getElementById("Temp_1") ;
    Temp_1.value = before_data_array["WTemp_1"] ;
    let Temp_2 = document.getElementById("Temp_2") ;
    Temp_2.value = before_data_array["WTemp_2"] ;
    let Temp_3 = document.getElementById("Temp_3") ;
    Temp_3.value = before_data_array["WTemp_3"] ;
    let Alkalinity = document.getElementById("Alkalinity") ;
    Alkalinity.value = before_data_array["Alkalinity"] ;
    let TCBS = document.getElementById("TCBS") ;
    TCBS.value = before_data_array["TCBS"] ;
    let TCBS綠菌 = document.getElementById("TCBS綠菌") ;
    TCBS綠菌.value = before_data_array["TCBS綠菌"] ;
    let Marine = document.getElementById("Marine") ;
    Marine.value = before_data_array["Marine"] ;
    let 螢光菌TCBS = document.getElementById("螢光菌TCBS") ;
    螢光菌TCBS.value = before_data_array["螢光菌TCBS"] ;
    let 螢光菌Marine = document.getElementById("螢光菌Marine") ;
    螢光菌Marine.value = before_data_array["螢光菌Marine"] ;
}