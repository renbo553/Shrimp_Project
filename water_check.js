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
    var 綠菌 = formData.get('綠菌') ;
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
    map.set("綠菌" , "TCBS綠菌") ;
    map.set("Marine" , "Marine") ;
    map.set("螢光菌TCBS" , "螢光菌TCBS") ;
    map.set("螢光菌Marine" , "螢光菌Marine") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "資訊尚未填寫完成，請填入" ;
    if(date == null || date == "") {
        show_message += (map.get("date") + '、') ;
        count ++ ;
    }
    if(nh4 == null || nh4 == "") {
        show_message += (map.get("nh4") + '、') ;
        count ++ ;
    }
    if(no2 == null || no2 == "") {
        show_message += (map.get("no2") + '、') ;
        count ++ ;
    }
    if(no3 == null || no3 == "") {
        show_message += (map.get("no3") + '、') ;
        count ++ ;
    }
    if(Salinity_1 == null || Salinity_1 == "") {
        show_message += (map.get("Salinity_1") + '、') ;
        count ++ ;
    }
    if(Salinity_2 == null || Salinity_2 == "") {
        show_message += (map.get("Salinity_2") + '、') ;
        count ++ ;
    }
    if(Salinity_3 == null || Salinity_3 == "") {
        show_message += (map.get("Salinity_3") + '、') ;
        count ++ ;
    }
    if(pH_1 == null || pH_1 == "") {
        show_message += (map.get("pH_1") + '、') ;
        count ++ ;
    }
    if(pH_2 == null || pH_2 == "") {
        show_message += (map.get("pH_2") + '、') ;
        count ++ ;
    }
    if(pH_3 == null || pH_3 == "") {
        show_message += (map.get("pH_3") + '、') ;
        count ++ ;
    }
    if(O2_1 == null || O2_1 == "") {
        show_message += (map.get("O2_1") + '、') ;
        count ++ ;
    }
    if(O2_2 == null || O2_2 == "") {
        show_message += (map.get("O2_2") + '、') ;
        count ++ ;
    }
    if(O2_3 == null || O2_3 == "") {
        show_message += (map.get("O2_3") + '、') ;
        count ++ ;
    }
    if(no3 == null || no3 == "") {
        show_message += (map.get("no3") + '、') ;
        count ++ ;
    }
    if(ORP_1 == null || ORP_1 == "") {
        show_message += (map.get("ORP_1") + '、') ;
        count ++ ;
    }
    if(ORP_2 == null || ORP_2 == "") {
        show_message += (map.get("ORP_2") + '、') ;
        count ++ ;
    }
    if(ORP_3 == null || ORP_3 == "") {
        show_message += (map.get("ORP_3") + '、') ;
        count ++ ;
    }
    if(Temp_1 == null || Temp_1 == "") {
        show_message += (map.get("Temp_1") + '、') ;
        count ++ ;
    }
    if(Temp_2 == null || Temp_2 == "") {
        show_message += (map.get("Temp_2") + '、') ;
        count ++ ;
    }
    if(Temp_3 == null || Temp_3 == "") {
        show_message += (map.get("Temp_3") + '、') ;
        count ++ ;
    }
    if(Alkalinity == null || Alkalinity == "") {
        show_message += (map.get("Alkalinity") + '、') ;
        count ++ ;
    }
    if(TCBS == null || TCBS == "") {
        show_message += (map.get("TCBS") + '、') ;
        count ++ ;
    }
    if(綠菌 == null || 綠菌 == "") {
        show_message += (map.get("綠菌") + '、') ;
        count ++ ;
    }
    if(Marine == null || Marine == "") {
        show_message += (map.get("Marine") + '、') ;
        count ++ ;
    }
    if(螢光菌TCBS == null || 螢光菌TCBS == "") {
        show_message += (map.get("螢光菌TCBS") + '、') ;
        count ++ ;
    }
    if(螢光菌Marine == null || 螢光菌Marine == "") {
        show_message += (map.get("螢光菌Marine") + '、') ;
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