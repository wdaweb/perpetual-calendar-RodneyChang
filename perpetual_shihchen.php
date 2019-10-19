<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>綜合練習-萬年曆製作</title>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Concert+One|Dosis&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/google.css">
    <style>
    *{
        list-style-type:none; /*去掉li前面的點點*/
        
    }
    body {
    
    background-image:url(bg1.jpg);
    background-size:cover;
    background-attachment:fixed;
    font-family:'Playfair Display', serif;
    width:513px;
    height:675px;
    margin:auto;
    position:relative;
   
    }

    
    
    
    .bg{
        background:rgba(225,187,25,0.5);
        color:white !important;
        
    }

    
        .main{
        
        width:513px;
        height:675px;
        margin-top:145px;
        position:relative;
        
        }

        table{   
        display:inline-block;
        margin:auto;
        background-color:rgba(255,255,255,0.7);
        width:513px;
        height:450px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        bottom:0px;
        position:absolute;
        text-align:center;
        border-radius: 0px 0px 30px 30px
        }
        
        .submain{
        width: 513px;
        height: 225px;
        background-color:rgba(225,187,25,0.6);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: auto;
        position: absolute;
        border-radius: 30px 30px 0px 0px
        }



        .btn1{ 
        display:inline-block;
        position:absolute;
        top:110px;
        left:200px;
        padding-top:55px;
        -webkit-click-transition:opacity 0;
        -moz-click-transition:opacity 0;
        -o-click-transition:opacity 0;
        transition:opacity 0;
        
        }

        .btn1 img:last-child:hover{
        opacity:0;
        }

        .btn2{ 
        display:inline-block;
        position:absolute;
        left:275px;
        top:110px;
        padding-top:55px;
        }

        .btn2 img:last-child:hover{
        opacity:0;
        }



        table td{  
            padding:22px;
            box-sizing:border-box;
            font-family: 'Concert One', cursive;
            text-align:center;
            margin:auto;
        
            }


        img {
            
            width:40px;
            position:absolute;
            }


        h2 {
        color:white;
        font-size:75px;
        font-family: 'Concert One', cursive;
        display:inline-block;
        margin-left:40px;
        text-align:center;
        }
        

        table td:first-child , table td:last-child{
        color:#EAC100;
        
        }
    



    </style>
</head>
<body>

<?php
date_default_timezone_set("Asia/Taipei");

if (!empty($_GET['month'])) {
   $month = $_GET['month'];
} else {
   $month = date("m");
}

if (!empty($_GET['year'])) {
   $year = $_GET['year'];
} else {
   $year = date("Y");
}


?>

<?php

    $today=date("Y-M-d");
    $todayDays=date("d");
    $start="$year-$month-01";
    $startDay=date("w",strtotime($start)); //這個月的第一天是星期幾 從0開始到6 星期日是0
    $days=date("t",strtotime($start)); //這個月有幾天
    $endDay=date("w",strtotime("$year-$month-$days")); //這個月的最後一天是星期幾
    
?>


<?php



// 1. 上個月和下個月的判別式  年的變數 ＄year 月的變數 $month 變化的關係
if (($month - 1) > 0) {
    $premonth = $month - 1;
    $preyear = $year;
 } else {
    $premonth = 12;
    $preyear = $year - 1;
 }

 if (($month + 1) <= 12) {
    $nextmonth = $month + 1;
    $nextyear = $year;
 } else {
    $nextmonth = 1;
    $nextyear = $year + 1;
 }
?>

<!-- 2.做出 上個月 及下個月的超連結按鈕 -->
<!-- ＆表示合併多個連結 -->
<div class="main">
<div class="submain">

    <?php echo "<h2 class='tilte1'>".date("Y",strtotime($start));?>

    <?php echo "<h2 class='tilte2'>".date("M",strtotime($start));?>

    <?php echo "<h2 class='tilte3'>".date("m",strtotime($start));?>
</div>
<div class="btn1">
    <a href="perpetual_shihchen.php?month=<?=$premonth?>&year=<?=$preyear?>"><img src="btn--1.png"></a> 
    <a href="perpetual_shihchen.php?month=<?=$premonth?>&year=<?=$preyear?>"><img src="btn--3.png"></a> 
</div>
<br>
<br>
<br>
<div class="btn2">
    <a href="perpetual_shihchen.php?month=<?=$nextmonth?>&year=<?=$nextyear?>"><img src="btn--2.png"></a>
    <a href="perpetual_shihchen.php?month=<?=$nextmonth?>&year=<?=$nextyear?>"><img src="btn--4.png"></a>
</div>
</div>

<table>
    <tr>
        <td class="holiday">Sun</td>
        <td>Mon</td>
        <td>Tue</td>
        <td>Wed</td>
        <td>Thr</td>
        <td>Fri</td>
        <td class="holiday">Sat</td>
    </tr>
<?php
for($i=0;$i<6;$i++){

    echo "<tr>";

    for($j=0;$j<7;$j++){
        if(!empty($sd[$i*7+$j+1-$startDay])){
            $str="";
        }else{
            $str="";
        }
        if($i==0){

            if($j<$startDay){
                 echo "<td></td>";

            }else{
                if(($i*7+$j+1-$startDay)==$todayDays){
                    
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{

                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }
        }else{

            if(($i*7+$j+1-$startDay)<=$days){
                if(($i*7+$j+1-$startDay)==$todayDays){
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }else{
                echo "    <td></td>";    
            }
        }
   }
    echo "</tr>";
}

?>
   
</table>
</div>
</body>
</html>