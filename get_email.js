function produce_register_email(username , time , email , password) {
    var new_html = document.createElement('div') ;

    var append_div = document.createElement('div') ;

    var first_span = document.createElement('span');
    first_span.textContent = "親愛的" + username + ":\n您在" + time + "提交了註冊請求。請點擊下方按鈕來繼續註冊。" ;
    first_span.style.color = 'black' ;
    append_div.append(first_span) ;

    var button = document.createElement("button") ;
    button.textContent = "繼續註冊" ;
    button.addEventListener('click', function() {
        var account_html = document.createElement('div') ;
        
        var a_div = document.createElement("div") ;

        var first_div = document.createElement("div") ;
        var second_div = document.createElement("div") ;
        var third_div = document.createElement("div") ;

        first_div.textContent = username ;
        first_div.id = username ;

        second_div.textContent = password ;
        second_div.id = password ;

        third_div.textContent = email ;
        third_div.id = email ;

        a_div.append(first_div) ;
        a_div.append(second_div) ;
        a_div.append(third_div) ;

        account_html.append(a.div) ;

        window.location.href = "http://localhost/Shrimp_Project-main/register_email.php?html=" .$account_html ;
    });

    new_html.append(append_div) ;

    return new_html ;
}

function produce_modify_password_email(username , time , email) {
    var new_html = document.createElement('div') ;

    var append_div = document.createElement('div') ;

    var first_span = document.createElement('span');
    first_span.textContent = "親愛的" + username + ":\n您在" + time + "提交了修改密碼請求。請點擊下方按鈕來重置密碼。" ;
    first_span.style.color = 'black' ;
    append_div.append(first_span) ;

    var button = document.createElement("button") ;
    button.textContent = "重置密碼" ;
    button.addEventListener('click', function() {
        var account_html = document.createElement('div') ;
        
        var a_div = document.createElement("div") ;

        var first_div = document.createElement("div") ;
        var second_div = document.createElement("div") ;
        var third_div = document.createElement("div") ;

        first_div.textContent = username ;
        first_div.id = username ;

        third_div.textContent = email ;
        third_div.id = email ;

        a_div.append(first_div) ;
        a_div.append(third_div) ;

        account_html.append(a.div) ;

        window.location.href = "http://localhost/Shrimp_Project-main/reset_password.php?html=" .$account_html ;
    });

    new_html.append(append_div) ;

    return new_html ;
}