function check (formData) {
    // 2/20 空值檢查--------------------------------------------
    var TankID = formData.get('location') ;
    var date = formData.get('date') ;
    var tank_type = formData.get('tank_type') ;
    var male_shrimp = formData.get('male_shrimp') ;
    var female_shrimp = formData.get('female_shrimp') ;
    var dead_male_shrimp = formData.get('dead_male_shrimp') ;
    var dead_female_shrimp = formData.get('dead_female_shrimp') ;
    var peeling_male_shrimp = formData.get('peeling_male_shrimp') ;
    var peeling_female_shrimp = formData.get('peeling_female_shrimp') ;
    var avg_male_shrimp = formData.get('avg_male_shrimp') ;
    var avg_female_shrimp = formData.get('avg_female_shrimp') ;
    var total_weight = formData.get('total_weight') ;

    var food0900 = formData.get('food0900') ;
    var weight0900 = formData.get('weight0900') ;
    var remain0900 = formData.get('remain0900') ;
    var else_work_0900 = formData.get('else_work_0900') ;
    var food1100 = formData.get('food1100') ;
    var weight1100 = formData.get('weight1100') ;
    var remain1100 = formData.get('remain1100') ;
    var else_work_1100 = formData.get('else_work_1100') ;
    var food1400 = formData.get('food1400') ;
    var weight1400 = formData.get('weight1400') ;
    var remain1400 = formData.get('remain1400') ;
    var else_work_1400 = formData.get('else_work_1400') ;
    var food1600 = formData.get('food1600') ;
    var weight1600 = formData.get('weight1600') ;
    var remain1600 = formData.get('remain1600') ;
    var else_work_1600 = formData.get('else_work_1600') ;
    var food1900 = formData.get('food1900') ;
    var weight1900 = formData.get('weight1900') ;
    var remain1900 = formData.get('remain1900') ;
    var else_work_1900 = formData.get('else_work_1900') ;
    var food2300 = formData.get('food2300') ;
    var weight2300 = formData.get('weight2300') ;
    var remain2300 = formData.get('remain2300') ;
    var else_work_2300 = formData.get('else_work_2300') ;
    var food0300 = formData.get('food0300') ;
    var weight0300 = formData.get('weight0300') ;
    var remain0300 = formData.get('remain0300') ;
    var else_work_0300 = formData.get('else_work_0300') ;

    var FeedingRatio = formData.get('FeedingRatio') ;

    const map = new Map()
    map.set("TankID" , "TankID") ;
    map.set("date" , "日期") ;
    map.set("tank_type" , "蝦缸資訊") ;
    map.set("work" , "工作/餵食項目") ;
    map.set("else_work" , "其他工作/餵食項目") ;
    map.set("time" , "時間") ;
    map.set("male_shrimp" , "公蝦數量") ;
    map.set("female_shrimp" , "母蝦數量") ;
    map.set("dead_male_shrimp" , "死亡公蝦數量") ;
    map.set("dead_female_shrimp" , "死亡母蝦數量") ;
    map.set("peeling_male_shrimp" , "脫皮公蝦數量") ;
    map.set("peeling_female_shrimp" , "脫皮母蝦數量") ;
    map.set("avg_male_shrimp" , "公蝦均重") ;
    map.set("avg_female_shrimp" , "母蝦均重") ;
    map.set("total_weight" , "總重") ;
    map.set("food_weight" , "餵食量") ;
    map.set("food_remain" , "殘餌量") ;
    map.set("FeedingRatio" , "FeedingRatio") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "資訊尚未填寫完成，請填入:\n" ;
    if(TankID == null || TankID == "") {
        show_message += (map.get("TankID") + '、') ;
        count ++ ;
    }
    if(date == null || date == "") {
        show_message += (map.get("date") + '、') ;
        count ++ ;
    }
    if(tank_type == null || tank_type == "") {
        show_message += (map.get("tank_type") + '、') ;
        count ++ ;
    }
    if(food0900 == null || food0900 == "") {
        show_message += (map.get("work") + '、') ;
        count ++ ;
    }
    else {
        if(food0900 == "其他" && (else_work_0900 == "" || else_work_0900 == null) ) {
            show_message += (map.get("else_work") + '、') ;
            count ++ ;
        }
    }
    if(food1100 == null || food1100 == "") {
        show_message += (map.get("work") + '、') ;
        count ++ ;
    }
    else {
        if(food1100 == "其他" && (else_work_1100 == "" || else_work_1100 == null) ) {
            show_message += (map.get("else_work") + '、') ;
            count ++ ;
        }
    }
    if(food1400 == null || food1400 == "") {
        show_message += (map.get("work") + '、') ;
        count ++ ;
    }
    else {
        if(food1400 == "其他" && (else_work_1400 == "" || else_work_1400 == null) ) {
            show_message += (map.get("else_work") + '、') ;
            count ++ ;
        }
    }
    if(food1600 == null || food1600 == "") {
        show_message += (map.get("work") + '、') ;
        count ++ ;
    }
    else {
        if(food1600 == "其他" && (else_work_1600 == "" || else_work_1600 == null) ) {
            show_message += (map.get("else_work") + '、') ;
            count ++ ;
        }
    }
    if(food1900 == null || food1900 == "") {
        show_message += (map.get("work") + '、') ;
        count ++ ;
    }
    else {
        if(food1900 == "其他" && (else_work_1900 == "" || else_work_1900 == null) ) {
            show_message += (map.get("else_work") + '、') ;
            count ++ ;
        }
    }
    if(food2300 == null || food2300 == "") {
        show_message += (map.get("work") + '、') ;
        count ++ ;
    }
    else {
        if(food2300 == "其他" && (else_work_2300 == "" || else_work_2300 == null) ) {
            show_message += (map.get("else_work") + '、') ;
            count ++ ;
        }
    }
    if(food0300 == null || food0300 == "") {
        show_message += (map.get("work") + '、') ;
        count ++ ;
    }
    else {
        if(food0300 == "其他" && (else_work_0300 == "" || else_work_0300 == null) ) {
            show_message += (map.get("else_work") + '、') ;
            count ++ ;
        }
    }
    if(male_shrimp == null || male_shrimp == "") {
        show_message += (map.get("male_shrimp") + '、') ;
        count ++ ;
    }
    if(female_shrimp == null || female_shrimp == "") {
        show_message += (map.get("female_shrimp") + '、') ;
        count ++ ;
    }
    if(dead_male_shrimp == null || dead_male_shrimp == "") {
        show_message += (map.get("dead_male_shrimp") + '、') ;
        count ++ ;
    }
    if(dead_female_shrimp == null || dead_female_shrimp == "") {
        show_message += (map.get("dead_female_shrimp") + '、') ;
        count ++ ;
    }
    if(peeling_male_shrimp == null || peeling_male_shrimp == "") {
        show_message += (map.get("peeling_male_shrimp") + '、') ;
        count ++ ;
    }
    if(peeling_female_shrimp == null || peeling_female_shrimp == "") {
        show_message += (map.get("peeling_female_shrimp") + '、') ;
        count ++ ;
    }
    if(avg_male_shrimp == null || avg_male_shrimp == "") {
        show_message += (map.get("avg_male_shrimp") + '、') ;
        count ++ ;
    }
    if(avg_female_shrimp == null || avg_female_shrimp == "") {
        show_message += (map.get("avg_female_shrimp") + '、') ;
        count ++ ;
    }
    if(total_weight == null || total_weight == "") {
        show_message += (map.get("total_weight") + '、') ;
        count ++ ;
    }
    if(weight0900 == null || weight0900 == "") {
        show_message += (map.get("food_weight") + '、') ;
        count ++ ;
    }
    if(remain0900 == null || remain0900 == "") {
        show_message += (map.get("food_remain") + '、') ;
        count ++ ;
    }
    if(weight1100 == null || weight1100 == "") {
        show_message += (map.get("food_weight") + '、') ;
        count ++ ;
    }
    if(remain1100 == null || remain1100 == "") {
        show_message += (map.get("food_remain") + '、') ;
        count ++ ;
    }
    if(weight1400 == null || weight1400 == "") {
        show_message += (map.get("food_weight") + '、') ;
        count ++ ;
    }
    if(remain1400 == null || remain1400 == "") {
        show_message += (map.get("food_remain") + '、') ;
        count ++ ;
    }
    if(weight1600 == null || weight1600 == "") {
        show_message += (map.get("food_weight") + '、') ;
        count ++ ;
    }
    if(remain1600 == null || remain1600 == "") {
        show_message += (map.get("food_remain") + '、') ;
        count ++ ;
    }
    if(weight1900 == null || weight1900 == "") {
        show_message += (map.get("food_weight") + '、') ;
        count ++ ;
    }
    if(remain1900 == null || remain1900 == "") {
        show_message += (map.get("food_remain") + '、') ;
        count ++ ;
    }
    if(weight2300 == null || weight2300 == "") {
        show_message += (map.get("food_weight") + '、') ;
        count ++ ;
    }
    if(remain2300 == null || remain2300 == "") {
        show_message += (map.get("food_remain") + '、') ;
        count ++ ;
    }
    if(weight0300 == null || weight0300 == "") {
        show_message += (map.get("food_weight") + '、') ;
        count ++ ;
    }
    if(remain0300 == null || remain0300 == "") {
        show_message += (map.get("food_remain") + '、') ;
        count ++ ;
    }
    if(FeedingRatio == null || FeedingRatio == "") {
        show_message += (map.get("FeedingRatio") + '、') ;
        count ++ ;
    }

    
    console.log(show_message) ;
    // if(count != 0) show_message = show_message.slice(0 , show_message.length - 1) ;
    if (count != 0) show_message = "尚有資料未寫完，請再注意一下" ;
    else show_message = "" ;

    return show_message ;
    //----------------------------------------------------------
}

function post (formData) {
    $.ajax({
        url: 'Upload_餵食.php',
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
                    window.location.href = 'add_餵食';
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
    console.log(formData) ;
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
        url: 'get_feed.php',
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
    document.getElementById(form_id).elements["select_type"].value = before_data_array["shrimp"] ;
    document.getElementById(form_id).elements["male_shrimp"].value = before_data_array["No_Shrimp_Male"] ;
    document.getElementById(form_id).elements["female_shrimp"].value = before_data_array["No_Shrimp_Female"] ;
    document.getElementById(form_id).elements["dead_male_shrimp"].value = before_data_array["No_Dead_Male"] ;
    document.getElementById(form_id).elements["dead_female_shrimp"].value = before_data_array["No_Dead_Female"] ;
    document.getElementById(form_id).elements["peeling_male_shrimp"].value = before_data_array["No_Moults_Male"] ;
    document.getElementById(form_id).elements["peeling_female_shrimp"].value = before_data_array["No_Moults_Female"] ;
    document.getElementById(form_id).elements["avg_male_shrimp"].value = before_data_array["Avg_Weight_Male"] ;
    document.getElementById(form_id).elements["avg_female_shrimp"].value = before_data_array["Avg_Weight_Female"] ;
    document.getElementById(form_id).elements["total_weight"].value = before_data_array["Total_Weight"] ;
    document.getElementById(form_id).elements["food0900"].value = before_data_array["9_species"] ;
    document.getElementById(form_id).elements["weight0900"].value = before_data_array["9_weight"] ;
    document.getElementById(form_id).elements["remain0900"].value = before_data_array["9_remain"] ;
    document.getElementById(form_id).elements["food1100"].value = before_data_array["11_species"] ;
    document.getElementById(form_id).elements["weight1100"].value = before_data_array["11_weight"] ;
    document.getElementById(form_id).elements["remain1100"].value = before_data_array["11_remain"] ;
    document.getElementById(form_id).elements["food1400"].value = before_data_array["14_species"] ;
    document.getElementById(form_id).elements["weight1400"].value = before_data_array["14_weight"] ;
    document.getElementById(form_id).elements["remain1400"].value = before_data_array["14_remain"] ;
    document.getElementById(form_id).elements["food1600"].value = before_data_array["16_species"] ;
    document.getElementById(form_id).elements["weight1600"].value = before_data_array["16_weight"] ;
    document.getElementById(form_id).elements["remain1600"].value = before_data_array["16_remain"] ;
    document.getElementById(form_id).elements["food1900"].value = before_data_array["19_species"] ;
    document.getElementById(form_id).elements["weight1900"].value = before_data_array["19_weight"] ;
    document.getElementById(form_id).elements["remain1900"].value = before_data_array["19_remain"] ;
    document.getElementById(form_id).elements["food2300"].value = before_data_array["23_species"] ;
    document.getElementById(form_id).elements["weight2300"].value = before_data_array["23_weight"] ;
    document.getElementById(form_id).elements["remain2300"].value = before_data_array["23_remain"] ;
    document.getElementById(form_id).elements["food0300"].value = before_data_array["3_species"] ;
    document.getElementById(form_id).elements["weight0300"].value = before_data_array["3_weight"] ;
    document.getElementById(form_id).elements["remain0300"].value = before_data_array["3_remain"] ;
    document.getElementById(form_id).elements["FeedingRatio"].value = before_data_array["Feeding_Ratio"] ;
}

function data_transfer(from_data , form_id) {
    document.getElementById(form_id).elements["location"].value = from_data.get("location") ;
    document.getElementById(form_id).elements["date"].value = from_data.get("date") ;
    document.getElementById(form_id).elements["select_type"].value = from_data.get("tank_type") ;
    document.getElementById(form_id).elements["male_shrimp"].value = from_data.get("male_shrimp") ;
    document.getElementById(form_id).elements["female_shrimp"].value = from_data.get("female_shrimp") ;
    document.getElementById(form_id).elements["dead_male_shrimp"].value = from_data.get("dead_male_shrimp") ;
    document.getElementById(form_id).elements["dead_female_shrimp"].value = from_data.get("dead_female_shrimp") ;
    document.getElementById(form_id).elements["peeling_male_shrimp"].value = from_data.get("peeling_male_shrimp") ;
    document.getElementById(form_id).elements["peeling_female_shrimp"].value = from_data.get("peeling_female_shrimp") ;
    document.getElementById(form_id).elements["avg_male_shrimp"].value = from_data.get("avg_male_shrimp") ;
    document.getElementById(form_id).elements["avg_female_shrimp"].value = from_data.get("avg_female_shrimp") ;
    document.getElementById(form_id).elements["total_weight"].value = from_data.get("total_weight") ;
    
    document.getElementById(form_id).elements["food0900"].value = from_data.get("food0900") ;
    document.getElementById(form_id).elements["weight0900"].value = from_data.get("weight0900") ;
    document.getElementById(form_id).elements["remain0900"].value = from_data.get("remain0900") ;
    document.getElementById(form_id).elements["food1100"].value = from_data.get("food1100") ;
    document.getElementById(form_id).elements["weight1100"].value = from_data.get("weight1100") ;
    document.getElementById(form_id).elements["remain1100"].value = from_data.get("remain1100") ;
    document.getElementById(form_id).elements["food1400"].value = from_data.get("food1400") ;
    document.getElementById(form_id).elements["weight1400"].value = from_data.get("weight1400") ;
    document.getElementById(form_id).elements["remain1400"].value = from_data.get("remain1400") ;
    document.getElementById(form_id).elements["food1600"].value = from_data.get("food1600") ;
    document.getElementById(form_id).elements["weight1600"].value = from_data.get("weight1600") ;
    document.getElementById(form_id).elements["remain1600"].value = from_data.get("remain1600") ;
    document.getElementById(form_id).elements["food1900"].value = from_data.get("food1900") ;
    document.getElementById(form_id).elements["weight1900"].value = from_data.get("weight1900") ;
    document.getElementById(form_id).elements["remain1900"].value = from_data.get("remain1900") ;
    document.getElementById(form_id).elements["food2300"].value = from_data.get("food2300") ;
    document.getElementById(form_id).elements["weight2300"].value = from_data.get("weight2300") ;
    document.getElementById(form_id).elements["remain2300"].value = from_data.get("remain2300") ;
    document.getElementById(form_id).elements["food0300"].value = from_data.get("food0300") ;
    document.getElementById(form_id).elements["weight0300"].value = from_data.get("weight0300") ;
    document.getElementById(form_id).elements["remain0300"].value = from_data.get("remain0300") ;
    document.getElementById(form_id).elements["FeedingRatio"].value = from_data.get("FeedingRatio") ;
    document.getElementById(form_id).elements["Observation"].value = from_data.get("Observation") ;
}

function html_show_all_data (formData) {
    // 3/17 show html在sweetalert2
    var TankID = formData.get('location') ;
    var date = formData.get('date') ;
    var tank_type = formData.get('tank_type') ;
    var time = formData.get('time') ;
    var work = formData.get('work') ;
    var else_work = formData.get('else_work') ;
    var male_shrimp = formData.get('male_shrimp') ;
    var female_shrimp = formData.get('female_shrimp') ;
    var dead_male_shrimp = formData.get('dead_male_shrimp') ;
    var dead_female_shrimp = formData.get('dead_female_shrimp') ;
    var peeling_male_shrimp = formData.get('peeling_male_shrimp') ;
    var peeling_female_shrimp = formData.get('peeling_female_shrimp') ;
    var avg_male_shrimp = formData.get('avg_male_shrimp') ;
    var avg_female_shrimp = formData.get('avg_female_shrimp') ;
    var total_weight = formData.get('total_weight') ;
    var food_weight = formData.get('food_weight') ;
    var food_remain = formData.get('food_remain') ;
    var FeedingRatio = formData.get('FeedingRatio') ;
    var Observation = formData.get('Observation') ;

    const map = new Map()
    map.set("TankID" , "TankID") ;
    map.set("date" , "日期") ;
    map.set("tank_type" , "蝦缸資訊") ;
    map.set("work" , "工作/餵食項目") ;
    map.set("else_work" , "其他工作/餵食項目") ;
    map.set("time" , "時間") ;
    map.set("male_shrimp" , "公蝦數量") ;
    map.set("female_shrimp" , "母蝦數量") ;
    map.set("dead_male_shrimp" , "死亡公蝦數量") ;
    map.set("dead_female_shrimp" , "死亡母蝦數量") ;
    map.set("peeling_male_shrimp" , "脫皮公蝦數量") ;
    map.set("peeling_female_shrimp" , "脫皮母蝦數量") ;
    map.set("avg_male_shrimp" , "公蝦均重") ;
    map.set("avg_female_shrimp" , "母蝦均重") ;
    map.set("total_weight" , "總重") ;
    map.set("food_weight" , "餵食量") ;
    map.set("food_remain" , "殘餌量") ;
    map.set("FeedingRatio" , "FeedingRatio") ;
    map.set("Observation" , "備註") ;

    //用 array 先把超過範圍的資料存起來
    var all_data_name = [] ;
    var all_data_num = [] ;

    all_data_name.push(map.get("TankID")) ;
    all_data_name.push(map.get("time")) ;
    all_data_name.push(map.get("tank_type")) ;
    all_data_name.push(map.get("date")) ;
    all_data_name.push(map.get("work")) ;
    if(else_work != "") all_data_name.push(map.get("else_work")) ;
    all_data_name.push(map.get("male_shrimp")) ;
    all_data_name.push(map.get("female_shrimp")) ;
    all_data_name.push(map.get("dead_male_shrimp")) ;
    all_data_name.push(map.get("dead_female_shrimp")) ;
    all_data_name.push(map.get("peeling_male_shrimp")) ;
    all_data_name.push(map.get("peeling_female_shrimp")) ;
    all_data_name.push(map.get("avg_male_shrimp")) ;
    all_data_name.push(map.get("avg_female_shrimp")) ;
    all_data_name.push(map.get("total_weight")) ;
    all_data_name.push(map.get("food_weight")) ;
    all_data_name.push(map.get("food_remain")) ;
    all_data_name.push(map.get("FeedingRatio")) ;

    all_data_num.push(TankID) ;
    all_data_num.push(time) ;
    all_data_num.push(tank_type) ;
    all_data_num.push(date) ;
    all_data_num.push(work) ;
    if(else_work != "") all_data_num.push(else_work) ;
    all_data_num.push(male_shrimp) ;
    all_data_num.push(female_shrimp) ;
    all_data_num.push(dead_male_shrimp) ;
    all_data_num.push(dead_female_shrimp) ;
    all_data_num.push(peeling_male_shrimp) ;
    all_data_num.push(peeling_female_shrimp) ;
    all_data_num.push(avg_male_shrimp) ;
    all_data_num.push(avg_female_shrimp) ;
    all_data_num.push(total_weight) ;
    all_data_num.push(food_weight) ;
    all_data_num.push(food_remain) ;
    all_data_num.push(FeedingRatio) ;
    
    if(Observation != "") {
        all_data_name.push(map.get("Observation")) ;
        all_data_num.push(Observation) ;
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
        if(all_data_name[i] == "時間") second_span.textContent = all_data_num[i] + ":00" ;
        else second_span.textContent = all_data_num[i] ;
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

async function modify_put_into_form (data , form_id , is_modify) {
    var Filelist ;
    //show data on 詳細資料_餵食
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
    document.getElementById(form_id).elements["select_type"].value = data.get("shrimp") ;
    document.getElementById(form_id).elements["id"].value = data.get("id") ;
    document.getElementById(form_id).elements["date"].value = data.get("Date") ;
    document.getElementById(form_id).elements["location"].value = data.get('Tank') ;
    document.getElementById(form_id).elements["male_shrimp"].value = data.get("No_Shrimp_Male") ;
    document.getElementById(form_id).elements["female_shrimp"].value = data.get("No_Shrimp_Female") ;
    document.getElementById(form_id).elements["dead_male_shrimp"].value = data.get("No_Dead_Male") ;
    document.getElementById(form_id).elements["dead_female_shrimp"].value = data.get("No_Dead_Female") ;
    document.getElementById(form_id).elements["peeling_male_shrimp"].value = data.get("No_Moults_Male") ;
    document.getElementById(form_id).elements["peeling_female_shrimp"].value = data.get("No_Moults_Female") ;
    document.getElementById(form_id).elements["avg_male_shrimp"].value = data.get("Avg_Weight_Male") ;
    document.getElementById(form_id).elements["avg_female_shrimp"].value = data.get("Avg_Weight_Female") ;
    document.getElementById(form_id).elements["total_weight"].value = data.get("Total_Weight") ;
    document.getElementById(form_id).elements["FeedingRatio"].value = data.get("Feeding_Ratio") ;

    $option = new Set() ;
    $option.add("Polychaete") ;
    $option.add("Crab(去殼)") ;
    $option.add("Squid") ;
    $option.add("Mussel") ;
    $option.add("Epsilon") ;
    $option.add("日本飼料") ;
    $option.add("Krill") ;
    $option.add("Clam(母)") ;
    $option.add("Ezmate(海膽+蟹卵)") ;
    $option.add("Ezmate(海膽+蟹白)") ;
    $option.add("Ezmate(海膽+蟹黃)") ;
    $option.add("Ezmate(海膽)") ;
    if($option.has(data.get("9_species"))) document.getElementById(form_id).elements["food0900"].value = data.get("9_species") ;
    else {
        document.getElementById(form_id).elements["food0900"].value = "其他" ;
        document.getElementById(form_id).elements["else_work_0900"].value = data.get("9_species") ;
    }
    if($option.has(data.get("11_species"))) document.getElementById(form_id).elements["food1100"].value = data.get("11_species") ;
    else {
        document.getElementById(form_id).elements["food1100"].value = "其他" ;
        document.getElementById(form_id).elements["else_work_1100"].value = data.get("11_species") ;
    }
    if($option.has(data.get("14_species"))) document.getElementById(form_id).elements["food1400"].value = data.get("14_species") ;
    else {
        document.getElementById(form_id).elements["food1400"].value = "其他" ;
        document.getElementById(form_id).elements["else_work_1400"].value = data.get("14_species") ;
    }
    if($option.has(data.get("16_species"))) document.getElementById(form_id).elements["food1600"].value = data.get("16_species") ;
    else {
        document.getElementById(form_id).elements["food1600"].value = "其他" ;
        document.getElementById(form_id).elements["else_work_1600"].value = data.get("16_species") ;
    }
    if($option.has(data.get("19_species"))) document.getElementById(form_id).elements["food1900"].value = data.get("19_species") ;
    else {
        document.getElementById(form_id).elements["food1900"].value = "其他" ;
        document.getElementById(form_id).elements["else_work_1900"].value = data.get("19_species") ;
    }
    if($option.has(data.get("23_species"))) document.getElementById(form_id).elements["food2300"].value = data.get("23_species") ;
    else {
        document.getElementById(form_id).elements["food2300"].value = "其他" ;
        document.getElementById(form_id).elements["else_work_2300"].value = data.get("23_species") ;
    }
    if($option.has(data.get("3_species"))) document.getElementById(form_id).elements["food0300"].value = data.get("3_species") ;
    else {
        document.getElementById(form_id).elements["food0300"].value = "其他" ;
        document.getElementById(form_id).elements["else_work_0300"].value = data.get("3_species") ;
    }
    document.getElementById(form_id).elements["weight0900"].value = data.get("9_weight") ;
    document.getElementById(form_id).elements["remain0900"].value = data.get("9_remain") ;
    document.getElementById(form_id).elements["eating0900"].value = data.get("9_eating") ;
    document.getElementById(form_id).elements["weight1100"].value = data.get("11_weight") ;
    document.getElementById(form_id).elements["remain1100"].value = data.get("11_remain") ;
    document.getElementById(form_id).elements["eating1100"].value = data.get("11_eating") ;
    document.getElementById(form_id).elements["weight1400"].value = data.get("14_weight") ;
    document.getElementById(form_id).elements["remain1400"].value = data.get("14_remain") ;
    document.getElementById(form_id).elements["eating1400"].value = data.get("14_eating") ;
    document.getElementById(form_id).elements["weight1600"].value = data.get("16_weight") ;
    document.getElementById(form_id).elements["remain1600"].value = data.get("16_remain") ;
    document.getElementById(form_id).elements["eating1600"].value = data.get("16_eating") ;
    document.getElementById(form_id).elements["weight1900"].value = data.get("19_weight") ;
    document.getElementById(form_id).elements["remain1900"].value = data.get("19_remain") ;
    document.getElementById(form_id).elements["eating1900"].value = data.get("19_eating") ;
    document.getElementById(form_id).elements["weight2300"].value = data.get("23_weight") ;
    document.getElementById(form_id).elements["remain2300"].value = data.get("23_remain") ;
    document.getElementById(form_id).elements["eating2300"].value = data.get("23_eating") ;
    document.getElementById(form_id).elements["weight0300"].value = data.get("3_weight") ;
    document.getElementById(form_id).elements["remain0300"].value = data.get("3_remain") ;
    document.getElementById(form_id).elements["eating0300"].value = data.get("3_eating") ;
    document.getElementById(form_id).elements["Observation"].value = data.get("Observation") ;
}

function modify_post(formData) {
    $.ajax({
        url: 'Update_餵食.php',
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
                    window.location.href = 'find_餵食';
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

//必要!勿刪!
function modify_data_transfer(from_data , form_id) {
    document.getElementById(form_id).elements["location"].value = from_data.get("location") ;
    document.getElementById(form_id).elements["date"].value = from_data.get("date") ;
    document.getElementById(form_id).elements["select_type"].value = from_data.get("tank_type") ;
    document.getElementById(form_id).elements["male_shrimp"].value = from_data.get("male_shrimp") ;
    document.getElementById(form_id).elements["female_shrimp"].value = from_data.get("female_shrimp") ;
    document.getElementById(form_id).elements["dead_male_shrimp"].value = from_data.get("dead_male_shrimp") ;
    document.getElementById(form_id).elements["dead_female_shrimp"].value = from_data.get("dead_female_shrimp") ;
    document.getElementById(form_id).elements["peeling_male_shrimp"].value = from_data.get("peeling_male_shrimp") ;
    document.getElementById(form_id).elements["peeling_female_shrimp"].value = from_data.get("peeling_female_shrimp") ;
    document.getElementById(form_id).elements["avg_male_shrimp"].value = from_data.get("avg_male_shrimp") ;
    document.getElementById(form_id).elements["avg_female_shrimp"].value = from_data.get("avg_female_shrimp") ;
    document.getElementById(form_id).elements["total_weight"].value = from_data.get("total_weight") ;
    
    document.getElementById(form_id).elements["food0900"].value = from_data.get("food0900") ;
    document.getElementById(form_id).elements["weight0900"].value = from_data.get("weight0900") ;
    document.getElementById(form_id).elements["remain0900"].value = from_data.get("remain0900") ;
    document.getElementById(form_id).elements["eating0900"].value = from_data.get("eating0900") ;
    document.getElementById(form_id).elements["food1100"].value = from_data.get("food1100") ;
    document.getElementById(form_id).elements["weight1100"].value = from_data.get("weight1100") ;
    document.getElementById(form_id).elements["remain1100"].value = from_data.get("remain1100") ;
    document.getElementById(form_id).elements["eating1100"].value = from_data.get("eating1100") ;
    document.getElementById(form_id).elements["food1400"].value = from_data.get("food1400") ;
    document.getElementById(form_id).elements["weight1400"].value = from_data.get("weight1400") ;
    document.getElementById(form_id).elements["remain1400"].value = from_data.get("remain1400") ;
    document.getElementById(form_id).elements["eating1400"].value = from_data.get("eating1400") ;
    document.getElementById(form_id).elements["food1600"].value = from_data.get("food1600") ;
    document.getElementById(form_id).elements["weight1600"].value = from_data.get("weight1600") ;
    document.getElementById(form_id).elements["remain1600"].value = from_data.get("remain1600") ;
    document.getElementById(form_id).elements["eating1600"].value = from_data.get("eating1600") ;
    document.getElementById(form_id).elements["food1900"].value = from_data.get("food1900") ;
    document.getElementById(form_id).elements["weight1900"].value = from_data.get("weight1900") ;
    document.getElementById(form_id).elements["remain1900"].value = from_data.get("remain1900") ;
    document.getElementById(form_id).elements["eating1900"].value = from_data.get("eating1900") ;
    document.getElementById(form_id).elements["food2300"].value = from_data.get("food2300") ;
    document.getElementById(form_id).elements["weight2300"].value = from_data.get("weight2300") ;
    document.getElementById(form_id).elements["remain2300"].value = from_data.get("remain2300") ;
    document.getElementById(form_id).elements["eating2300"].value = from_data.get("eating2300") ;
    document.getElementById(form_id).elements["food0300"].value = from_data.get("food0300") ;
    document.getElementById(form_id).elements["weight0300"].value = from_data.get("weight0300") ;
    document.getElementById(form_id).elements["remain0300"].value = from_data.get("remain0300") ;
    document.getElementById(form_id).elements["eating0300"].value = from_data.get("eating0300") ;
    document.getElementById(form_id).elements["FeedingRatio"].value = from_data.get("FeedingRatio") ;
    document.getElementById(form_id).elements["Observation"].value = from_data.get("Observation") ;
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
        <button type="button" class="btn btn-primary" onclick="continue_shrimp(this)">繼續填寫查詢項目</button>
    </div>
    `;

    return returnHTML;
}

function append_shrimp() {
    const returnHTML = 
    `
    <div class="form-inline" style="width: 100%; height: 65px">
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
            <div> 蝦缸類別 </div>
            <div class="input-group">
                <select id="shrimp_select" name="shrimp_select" class="custom-select">
                    <option value="none" selected disabled hidden></option>
                    <option value=""></option>
                    <option value="公蝦缸">公蝦缸</option>
                    <option value="母蝦缸">母蝦缸</option>
                    <option value="交配缸">交配缸</option>
                    <option value="休養缸">休養缸</option>
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
                <select class='form-control' name="and_or_2" id="and_or_2">
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