function check (formData) {
    // 2/20 空值檢查--------------------------------------------
    var date = formData.get('date') ;
    var ovary_state = formData.get('ovarystate') ;
    var eye = formData.get('eye') ;
    const map = new Map()
    map.set("date" , "日期") ;
    map.set("ovary_state" , "卵巢狀態") ;
    map.set("eye" , "眼標") ;

    // 計算有幾個沒填
    var count = 0 ;
    var show_message = "資訊尚未填寫完成，請填入:\n" ;
    if(date == null || date == "") {
        show_message += (map.get("date") + '、') ;
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

    if(count != 0) show_message = show_message.slice(0 , show_message.length - 1) ;
    else show_message = "" ;
    
    return show_message ;
}

function html_show_all_data(formData) {
    // 3/17 show html在sweetalert2
    var date = formData.get('date') ;
    var ovary_state = formData.get('ovarystate') ;
    var eye = formData.get('eye') ;
    const map = new Map()
    map.set("date" , "日期") ;
    map.set("ovary_state" , "卵巢狀態") ;
    map.set("eye" , "眼標") ;

    //用 array 先把超過範圍的資料存起來
    var data_name = ["日期" , "卵巢狀態" , "眼標"] ;
    var data_num = [date , ovary_state , eye] ;

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
        url: 'Upload_卵巢.php',
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
                    window.location.href = 'add_卵巢';
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