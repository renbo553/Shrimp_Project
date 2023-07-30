<?php
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["userid"])||$_SESSION["authority"]>1)
      header("location:home");
};
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>餵食 - 分析折線/長條圖</title>
    <!--Head-->
	<?php require_once "head.html"?>
    <!--//Head-->
</head>

<body>
    <!--Header-->
    <?php require_once "header.php" ?>
    <!--//Header-->

    <style>
        /* span:target */
        #M1:target,
        #M2:target{
        border: solid 1px red;
        }
        /*頁籤變換*/
        #M1:target ~ #tab > ul li a[href$="#M1"],
        #M2:target ~ #tab > ul li a[href$="#M2"]{
            border: solid 1px black;
        }

        /*頁籤內容顯示*/
        #M1:target ~ #tab > div.tab-content-1,
        #M2:target ~ #tab > div.tab-content-2{
            border: solid 1px black;
        }

        #tab{
        position: relative;
        left: 50%;
        transform: translate(-50%, 0%);
        width: auto;
        background: gray;
        border: solid 1px #333;
        }
        /* 頁籤ul */
        #tab>ul{
        overflow: hidden;
        margin: 0;
        padding: 10px 20px 0 20px;
        }
        #tab>ul>li{
        list-style-type: none;
        }
        #tab>ul>li>a{
        border: #333;
        text-decoration: none;
        font-size: 13px;
        color: white;
        float: left;
        padding: 10px;
        margin-left: 5px;
        }

        /*頁籤div內容*/
        #tab>div {
        border: #333;
        clear:both;
        padding:0 15px;
        height:0;
        overflow:hidden;
        visibility:hidden;
        -webkit-transition:all .4s ease-in-out;
        -moz-transition:all .4s ease-in-out;
        -ms-transition:all .4s ease-in-out;
        -o-transition:all .4s ease-in-out;
        transition:all .4s ease-in-out;
        }

        /* span:target */
        #M1:target,
        #M2:target{
        border: solid 1px red;
        }

        /*第一筆的底色*/
        span:target ~ #tab > ul li:first-child a {
            background: gray;
            color: #fff;
        }
        span:target ~ #tab > div:first-of-type {
        visibility:hidden;
        height:0;
        padding:0 15px;
        }

        /*頁籤變換&第一筆*/
        span ~ #tab > ul li:first-child a,
        #M1:target ~ #tab > ul li a[href$="#M1"],
        #M2:target ~ #tab > ul li a[href$="#M2"]{
            background: white ;
            color: #333 ;
        }
        
        /*頁籤內容顯示&第一筆*/
        span ~ #tab > div:first-of-type,
        #M1:target ~ #tab > div.feeding_ratio,
        #M2:target ~ #tab > div.tank_analysis{
        border: solid 1px black;
        visibility:visible;
        height:auto;
        width: auto;
        background: #fff;
        }
    </style>
    <!-- table style -->

    <!-- table -->
    <div>
    <span id="M1"></span>
    <span id="M2"></span>
    <div id="tab">
    <!– 頁籤按鈕 –>
    <ul>
    <li><a href="#M1">Feeding Ratio</a></li>
    <li><a href="#M2">單月各缸死亡、蛻皮總量</a></li>
    </ul>
    <!– 頁籤的內容區塊 –>
    <div class="feeding_ratio"><p>
        <section>
            <form id = "feeding_ratio" method="post" enctype="multipart/form-data">
                <?php require_once "utility.php"; ?>

                <!-- 2/18 修改之UI -->
                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> 起始日期 </div>
                        <div class="input-group">
                            <?php 
                                utility_date("start_date", "起始日期");
                            ?>
                        </div>
                    </div>
                    <div style = "width: 2%"> </div>
                    <div style = "width: 48%">
                        <div> 結束日期 </div>
                        <div class="input-group">
                            <?php 
                                utility_date("end_date", "結束日期");
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> TankID </div>
                        <div class="input-group">
                            <?php
                                $tank_option_array = array();
                                $tank_option_array["M1"] = "M1";
                                $tank_option_array["M2"] = "M2";
                                $tank_option_array["M3"] = "M3";
                                $tank_option_array["M4"] = "M4";
                                utility_selectbox("tank_select", "TankID", $tank_option_array);
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 10px"> </div>

                <div class="form-inline" style = "width: 100% ; height: 40px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: auto"> 
                        <?php
                            utility_button("submit", "查詢");
                        ?>
                    </div>
                    <div style = "width: 1%"> </div>
                    <div style = "width: auto">
                        <?php
                            // feeding ratio 繪製
                            // utility_button_onclick("???.php", "匯出");
                        ?>
                    </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
            </form>
        </section>
    </p></div>
    <div class="tank_analysis"><p>
        <section>
            <form id = "tank_analysis" method="post" enctype="multipart/form-data">
                <?php require_once "utility.php"; ?>
                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> 年份(西元) </div>
                        <div class="input-group">
                            <input id="year" name="year" type="text" class="form-control">
                        </div>
                    </div>
                    <div style = "width: 2%"> </div>
                    <div style = "width: 48%">
                        <div> 月份 </div>
                        <div class="input-group">
                            <input id="month" name="month" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-inline" style = "width: 100% ; height: 65px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: 48%">
                        <div> 繪製項目 </div>
                        <select id="type" name="type" class="custom-select">
                            <option value="none" selected disabled hidden></option>
                            <option value="蛻皮">蛻皮</option>
                            <option value="死亡">死亡</option>
                        </select>
                    </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 10px"> </div>
                <div class="form-inline" style = "width: 100% ; height: 40px">
                    <div style = "width: 1%"> </div>
                    <div style = "width: auto"> 
                        <button type="button" class="btn btn-primary" onclick="draw_barchart()">繪製</button>
                    </div>
                </div>

                <div class="form-inline" style = "width: 100% ; height: 10px"> </div>

                <div id = "canvasContainer"> </div>
            </form>
        </section>
    </p></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script>
        function draw_barchart() {
            const canvas_item = document.getElementById('chart') ;
            const canvasContainer = document.getElementById("canvasContainer") ;
            if(canvas_item) {
                canvasContainer.removeChild(canvas_item);
            }

            const canvas = document.createElement('canvas');
            canvas.setAttribute("id", "chart");
            canvas.width = 350;
            canvas.height = 400;
            canvasContainer.appendChild(canvas);

            var ctx = document.getElementById('chart').getContext('2d');
            var year = document.getElementById("year").value ;
            var month = document.getElementById("month").value ;
            var type = document.getElementById("type").value ;
            var chart_title = year + "年" + month + "月各缸" + type + "總數" ;

            ctx.clearRect(0, 0, 350 , 400);

            // var myForm = $("#tank_analysis")[0];
            var formData = new FormData(document.getElementById("tank_analysis"));

            let num = [] ;
            let tank_array = ["M1" , "M2" , "M3" , "M4"] ;

            var ret_data ;
            $.ajax({
                url: 'barchart.php',
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
            // console.log(ret_data) ;
            for(var i = 0 ; i < 4 ; i ++ ) {
                var count = 0 ;
                for(var j = 0 ; j < ret_data.length ; j ++ ) {
                    if( (ret_data[j]["Tank"] == tank_array[i]) && (type == "蛻皮") ) {
                        count += parseInt(ret_data[j]["No_Moults_Female"]) + parseInt(ret_data[j]["No_Moults_Male"]) ;
                        // count += ret_data[j]["No_Moults_Female"] + ret_data[j]["No_Moults_Male"] ;
                    }
                    if( (ret_data[j]["Tank"] == tank_array[i]) && (type == "死亡") ) {
                        count += parseInt(ret_data[j]["No_Dead_Female"]) + parseInt(ret_data[j]["No_Dead_Male"]) ;
                        // count += ret_data[j]["No_Moults_Female"] + ret_data[j]["No_Moults_Male"] ;
                    }
                }
                num.push(count) ;
            }
            // console.log(num) ;

            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["M1", "M2", "M3", "M4"],
                    datasets: [{
                        backgroundColor: [
                        'rgba(0, 0, 255, 0.9)',
                        'rgba(0, 0, 255, 0.9)',
                        'rgba(0, 0, 255, 0.9)',
                        'rgba(0, 0, 255, 0.9)',
                        ],
                        borderColor: [
                        'rgb(0, 0, 255)',
                        'rgb(0, 0, 255)',
                        'rgb(0, 0, 255)',
                        'rgb(0, 0, 255)',
                        ],
                        borderWidth: 1,
                        label:type + "數量" ,
                        data: [num[0], num[1], num[2], num[3]]
                    }]
                },
                options: {
                    // 在這裡設置圖表的大小
                    responsive: false, // 禁止響應式，使得指定的寬度和高度生效
                    maintainAspectRatio: false, // 不保持長寬比，這樣可以更精確地控制大小
                    // 設置寬度和高度
                    width: 400,
                    height: 300,
                    title: {
                        display: true,
                        text: chart_title
                    },
                    // plugins: {
                    //     datalabels: {
                    //         anchor: 'end', // 標籤的錨點，這裡設置為條形的結束位置
                    //         align: 'top', // 標籤的對齊方式，這裡設置為在條形的上方顯示
                    //         color: 'black', // 標籤的顏色
                    //         font: {
                    //             size: 12, // 標籤的字體大小
                    //         },
                    //         formatter: function(value) {
                    //             return value; // 這裡返回條形上的數值
                    //         }
                    //     }
                    // }
                }
            });
        }
    </script>

    <!--Footer-->
    <?php require_once "footer.html" ?>
    <!--//Footer-->

    <!--Other Script-->
	<?php require_once "other_script.html" ?>
    <!--//Other Script-->
</body>

</html>