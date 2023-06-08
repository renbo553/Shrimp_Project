function check (formData) {
    // 2/20 空值檢查--------------------------------------------
    var TankID = formData.get('location')
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
    map.set("tankid" , "TankID") ;
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
    var show_message = "資訊尚未填寫完成，請填入:\n " ;
    if(TankID == null || TankID == "") {
        show_message += (map.get("tankid") + '、') ;
        count ++ ;
    }
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
    if(TCBS綠菌 == null || TCBS綠菌 == "") {
        show_message += (map.get("TCBS綠菌") + '、') ;
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
    else show_message = "" ;

    
    return show_message ;
    //----------------------------------------------------------
}

function html_get (formData) {
    // 3/17 show html在sweetalert2
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

    //用 array 先把超過範圍的資料存起來
    var data_name = [] ;
    var data_num = [] ;
    var count = 0 ;

    if(parseInt(no2) < 0 || parseInt(no2) > 0.5) {
        data_name.push(map.get("no2")) ;
        data_num.push(no2) ;
        count ++ ;
    }
    if(parseInt(no3) < 0 || parseInt(no3) > 500) {
        data_name.push(map.get("no3")) ;
        data_num.push(no3) ;
        count ++ ;
    }
    if(parseInt(pH_1) < 6 || parseInt(pH_1) > 8) {
        data_name.push(map.get("pH_1")) ;
        data_num.push(pH_1) ;
        count ++ ;
    }
    if(parseInt(pH_2) < 6 || parseInt(pH_2) > 8) {
        data_name.push(map.get("pH_2")) ;
        data_num.push(pH_2) ;
        count ++ ;
    }
    if(parseInt(pH_3) < 6 || parseInt(pH_3) > 8) {
        data_name.push(map.get("pH_3")) ;
        data_num.push(pH_3) ;
        count ++ ;
    }
    if(parseInt(O2_1) < 2 || parseInt(O2_1) > 6) {
        data_name.push(map.get("O2_1")) ;
        data_num.push(O2_1) ;
        count ++ ;
    }
    if(parseInt(O2_2) < 2 || parseInt(O2_2) > 6) {
        data_name.push(map.get("O2_2")) ;
        data_num.push(O2_2) ;
        count ++ ;
    }
    if(parseInt(O2_3) < 2 || parseInt(O2_3) > 6) {
        data_name.push(map.get("O2_3")) ;
        data_num.push(O2_3) ;
        count ++ ;
    }
    if(parseInt(nh4) < 0 || parseInt(nh4) > 0.5) {
        data_name.push(map.get("nh4")) ;
        data_num.push(nh4) ;
        count ++ ;
    }
    if(parseInt(TCBS) < 0 || parseInt(TCBS) > 5000) {
        data_name.push(map.get("TCBS")) ;
        data_num.push(TCBS) ;
        count ++ ;
    }
    if(parseInt(ORP_1) < 0 || parseInt(ORP_1) > 500) {
        data_name.push(map.get("ORP_1")) ;
        data_num.push(ORP_1) ;
        count ++ ;
    }
    if(parseInt(ORP_2) < 0 || parseInt(ORP_2) > 500) {
        data_name.push(map.get("ORP_2")) ;
        data_num.push(ORP_2) ;
        count ++ ;
    }
    if(parseInt(ORP_3) < 0 || parseInt(ORP_3) > 500) {
        data_name.push(map.get("ORP_3")) ;
        data_num.push(ORP_3) ;
        count ++ ;
    }
    if(parseInt(Marine) < 0 || parseInt(Marine) > 10000) {
        data_name.push(map.get("Marine")) ;
        data_num.push(Marine) ;
        count ++ ;
    }
    if(parseInt(Temp_1) < 25 || parseInt(Temp_1) > 33) {
        data_name.push(map.get("Temp_1")) ;
        data_num.push(Temp_1) ;
        count ++ ;
    }
    if(parseInt(Temp_2) < 25 || parseInt(Temp_2) > 33) {
        data_name.push(map.get("Temp_2")) ;
        data_num.push(Temp_2) ;
        count ++ ;
    }
    if(parseInt(Temp_3) < 25 || parseInt(Temp_3) > 33) {
        data_name.push(map.get("Temp_3")) ;
        data_num.push(Temp_3) ;
        count ++ ;
    }
    if(parseInt(TCBS綠菌) < 0 || parseInt(TCBS綠菌) > 5000) {
        data_name.push(map.get("TCBS綠菌")) ;
        data_num.push(TCBS綠菌) ;
        count ++ ;
    }
    if(parseInt(螢光菌TCBS) < 0 || parseInt(螢光菌TCBS) > 5000) {
        data_name.push(map.get("螢光菌TCBS")) ;
        data_num.push(螢光菌TCBS) ;
        count ++ ;
    }
    if(parseInt(Salinity_1) < 20 || parseInt(Salinity_1) > 40) {
        data_name.push(map.get("Salinity_1")) ;
        data_num.push(Salinity_1) ;
        count ++ ;
    }
    if(parseInt(Salinity_2) < 20 || parseInt(Salinity_2) > 40) {
        data_name.push(map.get("Salinity_2")) ;
        data_num.push(Salinity_2) ;
        count ++ ;
    }
    if(parseInt(Salinity_3) < 20 || parseInt(Salinity_3) > 40) {
        data_name.push(map.get("Salinity_3")) ;
        data_num.push(Salinity_3) ;
        count ++ ;
    }
    if(parseInt(Alkalinity) < 0 || parseInt(Alkalinity) > 200) {
        data_name.push(map.get("Alkalinity")) ;
        data_num.push(Alkalinity) ;
        count ++ ;
    }
    if(parseInt(螢光菌Marine) < 0 || parseInt(螢光菌Marine) > 10000) {
        data_name.push(map.get("螢光菌Marine")) ;
        data_num.push(螢光菌Marine) ;
        count ++ ;
    }

    //建立一個新的html檔來當作提示訊息，append_div為要插入的訊息
    var new_html = document.createElement('div') ;

    //append 所有超過的上去
    if(count != 0) {
        var a_div = document.createElement('div') ;
        a_div.textContent = "請注意以下欄位中輸入的值:\n " ;
        new_html.appendChild(a_div) ;

        for(var i = 0 ; i < data_name.length ; i ++ ) {
            // 先清空原本要 append 上去的 div，再append新的元素上去
            var append_div = document.createElement('div') ;

            var first_span = document.createElement('span');
            first_span.textContent = data_name[i] ;
            first_span.style.color = 'black' ;
            first_span.style.width = "120px" ;
            append_div.append(first_span) ;

            var third_span = document.createElement('span');
            third_span.textContent = " : ";
            third_span.style.color = 'black' ;
            append_div.append(third_span) ;

            var second_span = document.createElement('span');
            second_span.textContent = data_num[i] ;
            second_span.style.color = 'red' ;
            append_div.append(second_span) ;

            // 設定div中span的比例
            append_div.style.display = "flex" ;
            append_div.style.justifyContent = "center" ;
            append_div.style.alignItems = "cneter" ;
            append_div.firstElementChild.style.flexBasis = "25%" ;
            append_div.firstElementChild.style.textAlign = "center" ;
            append_div.lastElementChild.style.flexBasis = "25%" ;
            append_div.lastElementChild.style.textAlign = "center" ;

            new_html.append(append_div) ;
        }
    }

    if(count == 0) new_html = null ;
    return new_html ;
}

function html_show_all_data (formData) {
    // 3/17 show html在sweetalert2
    var TankID = formData.get('location') ;
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
    var Note = formData.get('Note') ;

    const map = new Map()
    map.set("tankid" , "TankID") ;
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
    map.set("Note" , "備註") ;

    //用 array 先把超過範圍的資料存起來
    var all_data_name = [] ;
    var all_data_num = [] ;
    
    all_data_name.push(map.get("tankid")) ;
    all_data_name.push(map.get("date")) ;
    all_data_name.push(map.get("no2")) ;
    all_data_name.push(map.get("no3")) ;
    all_data_name.push(map.get("pH_1")) ;
    all_data_name.push(map.get("pH_2")) ;
    all_data_name.push(map.get("pH_3")) ;
    all_data_name.push(map.get("O2_1")) ;
    all_data_name.push(map.get("O2_2")) ;
    all_data_name.push(map.get("O2_3")) ;
    all_data_name.push(map.get("TCBS")) ;
    all_data_name.push(map.get("ORP_1")) ;
    all_data_name.push(map.get("ORP_2")) ;
    all_data_name.push(map.get("ORP_3")) ;
    all_data_name.push(map.get("nh4")) ;
    all_data_name.push(map.get("Marine")) ;
    all_data_name.push(map.get("TCBS綠菌")) ;
    all_data_name.push(map.get("Alkalinity")) ;
    all_data_name.push(map.get("Temp_1")) ;
    all_data_name.push(map.get("Temp_2")) ;
    all_data_name.push(map.get("Temp_3")) ;
    all_data_name.push(map.get("Salinity_1")) ;
    all_data_name.push(map.get("Salinity_2")) ;
    all_data_name.push(map.get("Salinity_3")) ;
    all_data_name.push(map.get("螢光菌TCBS")) ;
    all_data_name.push(map.get("螢光菌Marine")) ;

    all_data_num.push(TankID)
    all_data_num.push(date) ;
    all_data_num.push(no2) ;
    all_data_num.push(no3) ;
    all_data_num.push(pH_1) ;
    all_data_num.push(pH_2) ;
    all_data_num.push(pH_3) ;
    all_data_num.push(O2_1) ;
    all_data_num.push(O2_2) ;
    all_data_num.push(O2_3) ;
    all_data_num.push(TCBS) ;
    all_data_num.push(ORP_1) ;
    all_data_num.push(ORP_2) ;
    all_data_num.push(ORP_3) ;
    all_data_num.push(nh4) ;
    all_data_num.push(Marine) ;
    all_data_num.push(TCBS綠菌) ;
    all_data_num.push(Alkalinity) ;
    all_data_num.push(Temp_1) ;
    all_data_num.push(Temp_2) ;
    all_data_num.push(Temp_3) ;
    all_data_num.push(Salinity_1) ;
    all_data_num.push(Salinity_2) ;
    all_data_num.push(Salinity_3) ;
    all_data_num.push(螢光菌TCBS) ;
    all_data_num.push(螢光菌Marine) ;

    if(Note != "") {
        all_data_name.push(map.get("Note")) ;
        all_data_num.push(Note) ;
    }

    var data_name = [] ;
    var data_num = [] ;
    var count = 0 ;

    if(parseInt(nh4) < 0 || parseInt(nh4) > 0.5) {
        data_name.push(map.get("nh4")) ;
        data_num.push(nh4) ;
        count ++ ;
    }
    if(parseInt(no2) < 0 || parseInt(no2) > 0.5) {
        data_name.push(map.get("no2")) ;
        data_num.push(no2) ;
        count ++ ;
    }
    if(parseInt(no3) < 0 || parseInt(no3) > 500) {
        data_name.push(map.get("no3")) ;
        data_num.push(no3) ;
        count ++ ;
    }
    if(parseInt(Salinity_1) < 20 || parseInt(Salinity_1) > 40) {
        data_name.push(map.get("Salinity_1")) ;
        data_num.push(Salinity_1) ;
        count ++ ;
    }
    if(parseInt(Salinity_2) < 20 || parseInt(Salinity_2) > 40) {
        data_name.push(map.get("Salinity_2")) ;
        data_num.push(Salinity_2) ;
        count ++ ;
    }
    if(parseInt(Salinity_3) < 20 || parseInt(Salinity_3) > 40) {
        data_name.push(map.get("Salinity_3")) ;
        data_num.push(Salinity_3) ;
        count ++ ;
    }
    if(parseInt(pH_1) < 6 || parseInt(pH_1) > 8) {
        data_name.push(map.get("pH_1")) ;
        data_num.push(pH_1) ;
        count ++ ;
    }
    if(parseInt(pH_2) < 6 || parseInt(pH_2) > 8) {
        data_name.push(map.get("pH_2")) ;
        data_num.push(pH_2) ;
        count ++ ;
    }
    if(parseInt(pH_3) < 6 || parseInt(pH_3) > 8) {
        data_name.push(map.get("pH_3")) ;
        data_num.push(pH_3) ;
        count ++ ;
    }
    if(parseInt(O2_1) < 2 || parseInt(O2_1) > 6) {
        data_name.push(map.get("O2_1")) ;
        data_num.push(O2_1) ;
        count ++ ;
    }
    if(parseInt(O2_2) < 2 || parseInt(O2_2) > 6) {
        data_name.push(map.get("O2_2")) ;
        data_num.push(O2_2) ;
        count ++ ;
    }
    if(parseInt(O2_3) < 2 || parseInt(O2_3) > 6) {
        data_name.push(map.get("O2_3")) ;
        data_num.push(O2_3) ;
        count ++ ;
    }
    if(parseInt(ORP_1) < 0 || parseInt(ORP_1) > 500) {
        data_name.push(map.get("ORP_1")) ;
        data_num.push(ORP_1) ;
        count ++ ;
    }
    if(parseInt(ORP_2) < 0 || parseInt(ORP_2) > 500) {
        data_name.push(map.get("ORP_2")) ;
        data_num.push(ORP_2) ;
        count ++ ;
    }
    if(parseInt(ORP_3) < 0 || parseInt(ORP_3) > 500) {
        data_name.push(map.get("ORP_3")) ;
        data_num.push(ORP_3) ;
        count ++ ;
    }
    if(parseInt(Temp_1) < 25 || parseInt(Temp_1) > 33) {
        data_name.push(map.get("Temp_1")) ;
        data_num.push(Temp_1) ;
        count ++ ;
    }
    if(parseInt(Temp_2) < 25 || parseInt(Temp_2) > 33) {
        data_name.push(map.get("Temp_2")) ;
        data_num.push(Temp_2) ;
        count ++ ;
    }
    if(parseInt(Temp_3) < 25 || parseInt(Temp_3) > 33) {
        data_name.push(map.get("Temp_3")) ;
        data_num.push(Temp_3) ;
        count ++ ;
    }
    if(parseInt(Alkalinity) < 0 || parseInt(Alkalinity) > 200) {
        data_name.push(map.get("Alkalinity")) ;
        data_num.push(Alkalinity) ;
        count ++ ;
    }
    if(parseInt(TCBS) < 0 || parseInt(TCBS) > 5000) {
        data_name.push(map.get("TCBS")) ;
        data_num.push(TCBS) ;
        count ++ ;
    }
    if(parseInt(TCBS綠菌) < 0 || parseInt(TCBS綠菌) > 5000) {
        data_name.push(map.get("TCBS綠菌")) ;
        data_num.push(TCBS綠菌) ;
        count ++ ;
    }
    if(parseInt(Marine) < 0 || parseInt(Marine) > 10000) {
        data_name.push(map.get("Marine")) ;
        data_num.push(Marine) ;
        count ++ ;
    }
    if(parseInt(螢光菌TCBS) < 0 || parseInt(螢光菌TCBS) > 5000) {
        data_name.push(map.get("螢光菌TCBS")) ;
        data_num.push(螢光菌TCBS) ;
        count ++ ;
    }
    if(parseInt(螢光菌Marine) < 0 || parseInt(螢光菌Marine) > 10000) {
        data_name.push(map.get("螢光菌Marine")) ;
        data_num.push(螢光菌Marine) ;
        count ++ ;
    }

    //建立一個新的html檔來當作提示訊息，append_div為要插入的訊息
    var new_html = document.createElement('div') ;

    //append 所有 data 上去
    var a_div = document.createElement('div') ;
    a_div.textContent = "請確認所有資料:\n " ;
    new_html.appendChild(a_div) ;

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
        if(data_name.indexOf(all_data_name[i]) != -1) second_span.style.color = 'red' ;
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

window.post = function (formData) {
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
            Swal.fire({
                title: backData,
                confirmButtonText: "確認",
            }).then((result) => {
                if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
                    window.location.href = 'add_水質';
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

function add_check (formData) {
    // 3/5 獲取前一天資料--------------------------------------------
    var TankID = formData.get('location') ;
    var date = formData.get('date') ;

    const map = new Map()
    map.set("TankID" , "TankID") ;
    map.set("date" , "日期") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "要取得前天資料，請填入:\n" ;
    if(TankID == null || TankID == "") {
        show_message += (map.get("TankID") + '、') ;
        count ++ ;
    }
    if(date == null || date == "") {
        show_message += (map.get("date") + '、') ;
        count ++ ;
    }

    if(count != 0) show_message = show_message.slice(0 , show_message.length - 1) ;
    else show_message = "" ;

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
            Swal.fire({
                title: backData,
                confirmButtonText: "確認",
            }).then((result) => {
                $('#backmsg').html("取得資料失敗...");
            });
        },
    });
    return ret_data ;
}

function put_into_form(before_data_array , form_id) {
    // 將昨日的值放入 html
    document.getElementById(form_id).elements["nh4"].value = before_data_array["NH4_N"] ;
    document.getElementById(form_id).elements["no2"].value = before_data_array['NO2'] ;
    document.getElementById(form_id).elements["no3"].value = before_data_array["NO3"] ;
    document.getElementById(form_id).elements["Salinity_1"].value = before_data_array["Salinity_1"] ;
    document.getElementById(form_id).elements["Salinity_2"].value = before_data_array["Salinity_2"] ;
    document.getElementById(form_id).elements["Salinity_3"].value = before_data_array["Salinity_3"] ;
    document.getElementById(form_id).elements["pH_1"].value = before_data_array["pH_1"] ;
    document.getElementById(form_id).elements["pH_2"].value = before_data_array["pH_2"] ;
    document.getElementById(form_id).elements["pH_3"].value = before_data_array["pH_3"] ;
    document.getElementById(form_id).elements["O2_1"].value = before_data_array["O2_1"] ;
    document.getElementById(form_id).elements["O2_2"].value = before_data_array["O2_2"] ;
    document.getElementById(form_id).elements["O2_3"].value = before_data_array["O2_3"] ;
    document.getElementById(form_id).elements["ORP_1"].value = before_data_array["ORP_1"] ;
    document.getElementById(form_id).elements["ORP_2"].value = before_data_array["ORP_2"] ;
    document.getElementById(form_id).elements["ORP_3"].value = before_data_array["ORP_3"] ;
    document.getElementById(form_id).elements["Temp_1"].value = before_data_array["WTemp_1"] ;
    document.getElementById(form_id).elements["Temp_2"].value = before_data_array["WTemp_2"] ;
    document.getElementById(form_id).elements["Temp_3"].value = before_data_array["WTemp_3"] ;
    document.getElementById(form_id).elements["Alkalinity"].value = before_data_array["Alkalinity"] ;
    document.getElementById(form_id).elements["TCBS"].value = before_data_array["TCBS"] ;
    document.getElementById(form_id).elements["TCBS綠菌"].value = before_data_array["TCBS綠菌"] ;
    document.getElementById(form_id).elements["Marine"].value = before_data_array["Marine"] ;
    document.getElementById(form_id).elements["螢光菌TCBS"].value = before_data_array["螢光菌TCBS"] ;
    document.getElementById(form_id).elements["螢光菌Marine"].value = before_data_array["螢光菌Marine"] ;
}

function data_transfer(from_data , form_id) {
    document.getElementById(form_id).elements["location"].value = from_data.get("location") ;
    document.getElementById(form_id).elements["date"].value = from_data.get('date') ;
    document.getElementById(form_id).elements["nh4"].value = from_data.get('nh4') ;
    document.getElementById(form_id).elements["no2"].value = from_data.get('no2') ;
    document.getElementById(form_id).elements["no3"].value = from_data.get("no3") ;
    document.getElementById(form_id).elements["Salinity_1"].value = from_data.get("Salinity_1") ;
    document.getElementById(form_id).elements["Salinity_2"].value = from_data.get("Salinity_2") ;
    document.getElementById(form_id).elements["Salinity_3"].value = from_data.get("Salinity_3") ;
    document.getElementById(form_id).elements["pH_1"].value = from_data.get("pH_1") ;
    document.getElementById(form_id).elements["pH_2"].value = from_data.get("pH_2") ;
    document.getElementById(form_id).elements["pH_3"].value = from_data.get("pH_3") ;
    document.getElementById(form_id).elements["O2_1"].value = from_data.get("O2_1") ;
    document.getElementById(form_id).elements["O2_2"].value = from_data.get("O2_2") ;
    document.getElementById(form_id).elements["O2_3"].value = from_data.get("O2_3") ;
    document.getElementById(form_id).elements["ORP_1"].value = from_data.get("ORP_1") ;
    document.getElementById(form_id).elements["ORP_2"].value = from_data.get("ORP_2") ;
    document.getElementById(form_id).elements["ORP_3"].value = from_data.get("ORP_3") ;
    document.getElementById(form_id).elements["Temp_1"].value = from_data.get("Temp_1") ;
    document.getElementById(form_id).elements["Temp_2"].value = from_data.get("Temp_2") ;
    document.getElementById(form_id).elements["Temp_3"].value = from_data.get("Temp_3") ;
    document.getElementById(form_id).elements["Alkalinity"].value = from_data.get("Alkalinity") ;
    document.getElementById(form_id).elements["TCBS"].value = from_data.get("TCBS") ;
    document.getElementById(form_id).elements["TCBS綠菌"].value = from_data.get("TCBS綠菌") ;
    document.getElementById(form_id).elements["Marine"].value = from_data.get("Marine") ;
    document.getElementById(form_id).elements["螢光菌TCBS"].value = from_data.get("螢光菌TCBS") ;
    document.getElementById(form_id).elements["螢光菌Marine"].value = from_data.get("螢光菌Marine") ;
    document.getElementById(form_id).elements["Note"].value = from_data.get("Note") ;
}

function modify_post(formData) {
    $.ajax({
        url: 'Update_水質.php',
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
                    window.location.href = 'find_水質';
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

//將資料庫的圖片載入至filereader中，才不會修改後圖片不見(因為update和upload都是看filereader中的內容)
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
    //show data on 詳細資料_水質
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
    document.getElementById(form_id).elements["location"].value = data.get("Tank") ;
    document.getElementById(form_id).elements["date"].value = data.get('Date') ;
    document.getElementById(form_id).elements["nh4"].value = data.get('nh4') ;
    document.getElementById(form_id).elements["no2"].value = data.get('no2') ;
    document.getElementById(form_id).elements["no3"].value = data.get("no3") ;
    document.getElementById(form_id).elements["Salinity_1"].value = data.get("Salinity_1") ;
    document.getElementById(form_id).elements["Salinity_2"].value = data.get("Salinity_2") ;
    document.getElementById(form_id).elements["Salinity_3"].value = data.get("Salinity_3") ;
    document.getElementById(form_id).elements["pH_1"].value = data.get("pH_1") ;
    document.getElementById(form_id).elements["pH_2"].value = data.get("pH_2") ;
    document.getElementById(form_id).elements["pH_3"].value = data.get("pH_3") ;
    document.getElementById(form_id).elements["O2_1"].value = data.get("O2_1") ;
    document.getElementById(form_id).elements["O2_2"].value = data.get("O2_2") ;
    document.getElementById(form_id).elements["O2_3"].value = data.get("O2_3") ;
    document.getElementById(form_id).elements["ORP_1"].value = data.get("ORP_1") ;
    document.getElementById(form_id).elements["ORP_2"].value = data.get("ORP_2") ;
    document.getElementById(form_id).elements["ORP_3"].value = data.get("ORP_3") ;
    document.getElementById(form_id).elements["Temp_1"].value = data.get("Temp_1") ;
    document.getElementById(form_id).elements["Temp_2"].value = data.get("Temp_2") ;
    document.getElementById(form_id).elements["Temp_3"].value = data.get("Temp_3") ;
    document.getElementById(form_id).elements["Alkalinity"].value = data.get("Alkalinity") ;
    document.getElementById(form_id).elements["TCBS"].value = data.get("TCBS") ;
    document.getElementById(form_id).elements["TCBS綠菌"].value = data.get("TCBS綠菌") ;
    document.getElementById(form_id).elements["Marine"].value = data.get("Marine") ;
    document.getElementById(form_id).elements["螢光菌TCBS"].value = data.get("螢光菌TCBS") ;
    document.getElementById(form_id).elements["螢光菌Marine"].value = data.get("螢光菌Marine") ;
    document.getElementById(form_id).elements["Note"].value = data.get("Note") ;
}


// ---------------------------------------------------------------------------------------------------

// 客製化查詢之function
function append_tankid() {
    const returnHTML = 
    `
    <div class="form-inline" style = "width: 100% ; height: 65px">
        <div style = "width: 1%"> </div>
        <div style = "width: 48%">
            <div> TankID </div>
            <div class="input-group">
                <select id="tank_select" name="tank_select" class="custom-select">
                    <option value="none" selected disabled hidden></option>
                    <option value=""></option>
                    <option value="M1">M1</option>
                    <option value="M2">M2</option>
                    <option value="M3">M3</option>
                    <option value="M4">M4</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-inline" style = "width: 100% ; height: 65px">
        <div style = "width: 1%"> </div>
        <button type="button" class="btn btn-primary" onclick="continue_time(this)">繼續填寫查詢項目</button>
    </div>
    `;

    return returnHTML;
}

function append_time() {
    const returnHTML = 
    `<div class="form-inline" style="width: 100%; height: 65px">
        <div style="width: 1%"></div>
        <div style="width: 48%">
            <div>查詢方式("及" or "或")</div>
            <div class="input-group">
                <select class='form-control' name="and_or_1" id="and_or_1">
                    <option value="and">及</option>
                    <option value="or">或</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-inline" style = "width: 100% ; height: 65px">
        <div style = "width: 1%"> </div>
        <div style = "width: 48%">
            <div> 起始日期 </div>
            <div class="input-group">
                <input type='date' class='form-control' name='start_date' id='start_date'>
            </div>
        </div>
        <div style = "width: 2%"> </div>
        <div style = "width: 48%">
            <div> 結束日期 </div>
            <div class="input-group">
                <input type='date' class='form-control' name='end_date' id='end_date'>
            </div>
        </div>
    </div>
    `;

    return returnHTML;
}