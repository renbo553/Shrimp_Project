function check (formData) {
    // 2/20 空值檢查--------------------------------------------
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
    if(work == null || work == "") {
        show_message += (map.get("work") + '、') ;
        count ++ ;
    }
    else {
        if(work == "其他" && (else_work == "" || else_work == null) ) {
            show_message += (map.get("else_work") + '、') ;
            count ++ ;
        }
    }
    if(time == null || time == "") {
        show_message += (map.get("time") + '、') ;
        count ++ ;
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
    if(food_weight == null || food_weight == "") {
        show_message += (map.get("food_weight") + '、') ;
        count ++ ;
    }
    if(food_remain == null || food_remain == "") {
        show_message += (map.get("food_remain") + '、') ;
        count ++ ;
    }
    if(FeedingRatio == null || FeedingRatio == "") {
        show_message += (map.get("FeedingRatio") + '、') ;
        count ++ ;
    }

    if(count != 0) show_message = show_message.slice(0 , show_message.length - 1) ;
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
            window.alert(backData);
            if (backData.includes("抱歉") == false && backData.includes("失敗") == false) {
                window.location.href = 'add_餵食';
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
    console.log(formData) ;
    var TankID = formData.get('location') ;
    var date = formData.get('date') ;
    var time = formData.get('time') ;

    const map = new Map()
    map.set("TankID" , "TankID") ;
    map.set("date" , "日期") ;
    map.set("time" , "時間") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "要取得前天資料，請填入:" ;
    if(TankID == null || TankID == "") {
        show_message += (map.get("TankID") + '、') ;
        count ++ ;
    }
    if(date == null || date == "") {
        show_message += (map.get("date") + '、') ;
        count ++ ;
    }
    
    if(time == null || time == "") {
        show_message += (map.get("time") + '、') ;
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
            window.alert("取得資料失敗...");
            $('#backmsg').html("取得資料失敗...");
        },
    });
    return ret_data ;
}

function put_into_form(before_data_array) {
    // 將昨日的值放入 html
    let tank_type = document.getElementById("select_type") ;
    tank_type.value = before_data_array["shrimp"] ;
    let time = document.getElementById("select_time") ;
    time.value = before_data_array["time"] ;
    let work = document.getElementById("select_work") ;
    work.value = before_data_array["work"] ;
    let else_work = document.getElementById("else_work") ;
    else_work.value = before_data_array["else_work"] ;
    let male_shrimp = document.getElementById("male_shrimp") ;
    male_shrimp.value = before_data_array["No_Shrimp_Male"] ;
    let female_shrimp = document.getElementById("female_shrimp") ;
    female_shrimp.value = before_data_array["No_Shrimp_Female"] ;
    let dead_male_shrimp = document.getElementById("dead_male_shrimp") ;
    dead_male_shrimp.value = before_data_array["No_Dead_Male"] ;
    let dead_female_shrimp = document.getElementById("dead_female_shrimp") ;
    dead_female_shrimp.value = before_data_array["No_Dead_Female"] ;
    let peeling_male_shrimp = document.getElementById("peeling_male_shrimp") ;
    peeling_male_shrimp.value = before_data_array["No_Moults_Male"] ;
    let peeling_female_shrimp = document.getElementById("peeling_female_shrimp") ;
    peeling_female_shrimp.value = before_data_array["No_Moults_Female"] ;
    let avg_male_shrimp = document.getElementById("avg_male_shrimp") ;
    avg_male_shrimp.value = before_data_array["Avg_Weight_Male"] ;
    let avg_female_shrimp = document.getElementById("avg_female_shrimp") ;
    avg_female_shrimp.value = before_data_array["Avg_Weight_Female"] ;
    let total_weight = document.getElementById("total_weight") ;
    total_weight.value = before_data_array["Total_Weight"] ;
    let food_weight = document.getElementById("food_weight") ;
    food_weight.value = before_data_array["food_weight"] ;
    let food_remain = document.getElementById("food_remain") ;
    food_remain.value = before_data_array["food_remain"] ;
    let FeedingRatio = document.getElementById("FeedingRatio") ;
    FeedingRatio.value = before_data_array["Feeding_Ratio"] ;
}

function data_transfer(from_data , form_id) {
    document.getElementById(form_id).elements["location"].value = from_data.get("location") ;
    document.getElementById(form_id).elements["date"].value = from_data.get("date") ;
    document.getElementById(form_id).elements["select_type"].value = from_data.get("tank_type") ;
    document.getElementById(form_id).elements["select_time"].value = from_data.get("time") ;
    document.getElementById(form_id).elements["select_work"].value = from_data.get("work") ;
    document.getElementById(form_id).elements["else_work"].value = from_data.get("else_work") ;
    document.getElementById(form_id).elements["male_shrimp"].value = from_data.get("male_shrimp") ;
    document.getElementById(form_id).elements["female_shrimp"].value = from_data.get("female_shrimp") ;
    document.getElementById(form_id).elements["dead_male_shrimp"].value = from_data.get("dead_male_shrimp") ;
    document.getElementById(form_id).elements["dead_female_shrimp"].value = from_data.get("dead_female_shrimp") ;
    document.getElementById(form_id).elements["peeling_male_shrimp"].value = from_data.get("peeling_male_shrimp") ;
    document.getElementById(form_id).elements["peeling_female_shrimp"].value = from_data.get("peeling_female_shrimp") ;
    document.getElementById(form_id).elements["avg_male_shrimp"].value = from_data.get("avg_male_shrimp") ;
    document.getElementById(form_id).elements["avg_female_shrimp"].value = from_data.get("avg_female_shrimp") ;
    document.getElementById(form_id).elements["total_weight"].value = from_data.get("total_weight") ;
    document.getElementById(form_id).elements["food_weight"].value = from_data.get("food_weight") ;
    document.getElementById(form_id).elements["food_remain"].value = from_data.get("food_remain") ;
    document.getElementById(form_id).elements["FeedingRatio"].value = from_data.get("FeedingRatio") ;
    document.getElementById(form_id).elements["Observation"].value = from_data.get("Observation") ;
}