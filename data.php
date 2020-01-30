
<?php
        session_start();
        $_SESSION["user"];
        // echo $_SESSION["date"];
        if(!isset($_SESSION["user"]))
        {
            header("Location: index.php");  
        }
        if(isset($_POST['logoutt']) || $_SESSION["date"] != date("Y-m-d")){
            unset($_SESSION["user"]);
            
            header("Location: index.php");  
        }

?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hcurve";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "Fail";
}
// echo "Connected successfully";
// echo "Connected successfully";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Visualization Console</title>
</head>

<style>

body{
    font-family:arial;
    /* font-size:1.12em; */
    line-height: 1.5;
    padding:0;
    margin:0;
    background-color: #ffffff;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
    text-align: center; 
 
}
.box{
    width: 100%;
    min-height: 100vh;
    background-image: linear-gradient(to left, #189DDB ,#82CAEB);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow:hidden;

    }

.container {
    width: 82%;
    height: 94%;
    margin: 3% 0%;
    background-color:white;
    display: flex;
    flex-flow: row;
    border-radius:5px;
    overflow:hidden;
    /* justify-content:center; */
}

.cleft{
    border-radius:5px;
    height:100%;
    padding-top:2%;
    width: 17%;
    background-color: white;
    overflow:hidden;
    display:flex;
    justify-content:center;
    align-items:center;
    /* border:1px solid black; */
}

.cright{
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    display: flex;
    flex-flow: column;
    /* justify-content:center; */
    align-items:center;
    height:100%;
    width: 83%;
    background-color:#F4F7FF;
    border-radius: 0px 5px 5px 0px;

}

.child {
    width: 100%;
    min-height: 100px;
    /* padding: 1%; */
    background-color: #ffffff;
    /* border: 1px solid black; */
}
#top{
    font-size:26px;
    font-weight:bolder;
    text-transform:uppercase;
    color:#2E8FD9;
    background-color:transparent;
    display:flex;
    justify-content:space-around;
    align-items:center;
}
#date{
    width:45%;
    min-height:95px;
    display:flex;
    flex-flow:row wrap;
    justify-content:flex-end;
    align-items:center;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
#tab{
    width:95%;
    border-radius:5px;
    box-shadow:  0px 0px 5px -1px #ededed;
}
.head1{
    min-height:50px;
    font-size:22px;
    font-weight:bolder;
    display:flex;
    justify-content:center;
    align-items:center;
    text-transform:uppercase;
    line-height:1.8;
    background-color:transparent;
}
#bar{
    min-height:330px;
    width:95%;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:5px;
    box-shadow:  0px 0px 5px -1px #ededed;
}
#pie{
    width:95%;
    display:flex;
    justify-content:space-around;
    flex-flow:row wrap;
    border-radius:5px;
    box-shadow:  0px 0px 5px -1px #ededed;
}

.progress-bar {

/* position:relative;
top:20%;
left:60.5%; */
background-color: lightgray;
width:100%;
height: 10%;
display: inline-block;
}
.progress-value {

color: #fff;
/* text-align: center; */
background-color: #673ab7;
transition: .3s all linear;
height: 100%;
/* display: inline-block; */
} 
input{
font-family:arial;
font-size:14px;
}
input[type=submit]{
  background-color: #2E8FD9;
  width:100px;
  height:30px;
  color: white;
  border-radius:5px;
 
}
button {
  background-color: white;
  border: none;
  color: black;
  padding: 8px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<body>
<!-- <form method="post">
<div style="position:fixed;top:1%;right:1%;">
     <a href="index.php">
     <input type="submit" name="logoutt" value="Logout" >  
</a>
</div>
</form> -->

<form action="" method="post" >
    <div class="box">
        <div class="container">
        <div style="position:fixed;top:1%;right:1%;">

<input type="submit" name="logoutt" value="Logout" >  

</div>
            <div class="cleft">
            <img src="https://s.hcurvecdn.com/hockeycurve.png" style="width:150px">
            </div>
            <div class="cright">


                <div class="child" id="top" > 
                        <div style="margin-right:6%"> flipkart dashboard</div>
                        <div id="date">
                            <div style="display:flex;flex-flow:column;width:40%;min-height:90px;justify-content:space-evenly;">
                                <input type="date"  name="from_date" value="<?php echo ($_POST['from_date']); ?>" >
                                <input type="date"  name="to_date" value="<?php echo ($_POST['to_date']); ?>">
                            </div>
                            <div style="width:31%;min-height:100px;display:flex;justify-content:flex-end;align-items:center;min-height:50px">
                                <input type="submit" name="someAction" value="Submit" >   
                            </div> 
                        </div>  
                        
        
                </div>
                

                <div class="child" id="tab">
                    <table>
                    <tr>
                    <th>BU</th>
                    <th>Flipkart Budget</th> 
                    <th>Hc Revenue</th>
                    <th>Balance Budget</th>
                    <th>Run rate</th>
                    <th>Current Average</th>
                    <th>Budget usage% </th>
                    </tr>
                    <?php
                        
                     
                        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
                        {

                            $fromdate = $_POST["from_date"];
                            $todate = $_POST["to_date"];

                            $sql = "SELECT BU,REPLACE(`flipkart_budget`,',','')  AS flipkart_budget,revenue,sum(hcrevenue) as hcrevenue,(flipkart_budget-sum(hcrevenue)) as bal_budget, run_rate,(sum(hcrevenue)/count(date)) as current_avg,budget_usage_percentage
                                     FROM data WHERE date BETWEEN '$fromdate' AND '$todate' group by BU order by hcrevenue desc";
                            $sql2 = "SELECT BU,REPLACE(`flipkart_budget`,',','') AS flipkart_budget,(flipkart_budget-sum(hcrevenue)) as bal_budget,round(100-(((flipkart_budget-sum(hcrevenue))/flipkart_budget)*100),2)as budget_usage_percentage 
                                     FROM data WHERE date BETWEEN '$fromdate' AND '$todate' group by BU order by budget_usage_percentage desc";
                            $result = $conn->query($sql);
                            $result2 =  $conn->query($sql2);

                            if ($result2->num_rows > 0)
                            {

                                while ($row = $result2->fetch_assoc())
                                {$bbp[] = $row["budget_usage_percentage"];
                                 $bup[] = str_replace(array(
                                        'ElectronicsDevices',
                                        'ElectronicsAccessories'
                                    ) , array(
                                        'E-Devices',
                                        'E-Accessories'
                                    ) , $row["BU"]);
                                }
                            }
                    
                            if ($result->num_rows > 0)
                            {

                                while ($row = $result->fetch_assoc())
                                {
                                    // $bu[] = str_replace('ElectronicsDevices','E-Devices',$row["BU"]);
                                    $bu[] = str_replace(array(
                                        'ElectronicsDevices',
                                        'ElectronicsAccessories'
                                    ) , array(
                                        'E-Devices',
                                        'E-Accessories'
                                    ) , $row["BU"]);
                                    $hcr[] = $row["hcrevenue"];
                                    $bal[] = ($row["flipkart_budget"] - $row["hcrevenue"]);
                                    $fb[] = $row["flipkart_budget"];
                                    

                                    echo "<tr>";
                                    echo "<td>" . $row["BU"] . "</td>";
                                    echo "<td>" . number_format($row["flipkart_budget"]) . "</td>";
                                    echo "<td>" . number_format($row["hcrevenue"]) . "</td>";
                                    echo "<td>" . number_format($row["bal_budget"]) . "</td>";
                                    echo "<td>" . number_format($row["run_rate"]) . "</td>";
                                    echo "<td>" . number_format($row["current_avg"]) . "</td>";
                                    echo "<td>" . round((($row["bal_budget"]/$row["flipkart_budget"])*100),2) . "</td>";
                                    echo "</tr>";

                                }
                                $balance = array_sum($bal);
                                $hcrevenue = array_sum($hcr);

                            }

                            else
                            {
                                echo "<tr>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "</tr>";

                                $bbp = ["0","0","0"];
                                $bup = ["none","none","none"];
                                $hcrevenue = 0;
                                $balance = 100;
                                $hcr = [0];
                                $bal = 0;
                                $bu = ["none"];

                            }
                        }
                        else
                        {
                            $sql = "SELECT BU,REPLACE(`flipkart_budget`,',','')  AS flipkart_budget,sum(hcrevenue) as hcrevenue,(flipkart_budget-sum(hcrevenue)) as bal_budget, run_rate,(sum(hcrevenue)/count(date)) as current_avg,budget_usage_percentage 
                                    FROM data WHERE date in (select max(date) from data) group by BU order by hcrevenue desc;";
                            
                            $sql2 = "SELECT BU,REPLACE(`flipkart_budget`,',','') AS flipkart_budget,(flipkart_budget-sum(hcrevenue)) as bal_budget,round(100-(((flipkart_budget-sum(hcrevenue))/flipkart_budget)*100),2)as budget_usage_percentage 
                                     FROM data WHERE date in (select max(date) from data) group by BU order by budget_usage_percentage desc";
                            $result = $conn->query($sql);
                            $result2 =  $conn->query($sql2);

                            if ($result2->num_rows > 0)
                            {

                                while ($row = $result2->fetch_assoc())
                                {$bbp[] = $row["budget_usage_percentage"];
                                 $bup[] = str_replace(array(
                                        'ElectronicsDevices',
                                        'ElectronicsAccessories'
                                    ) , array(
                                        'E-Devices',
                                        'E-Accessories'
                                    ) , $row["BU"]);
                                }
                            }
                            

                            if ($result->num_rows > 0)
                            {
                                while ($row = $result->fetch_assoc())
                                {
                                    // $bu[] = str_replace('ElectronicsDevices','E-Devices',$row["BU"]);
                                    $bu[] = str_replace(array(
                                        'ElectronicsDevices',
                                        'ElectronicsAccessories'
                                    ) , array(
                                        'E-Devices',
                                        'E-Accessories'
                                    ) , $row["BU"]);
                                    $hcr[] = $row["hcrevenue"];
                                    $bal[] = ($row["flipkart_budget"] - $row["hcrevenue"]);
                                    $fb[] = $row["flipkart_budget"];

                                    echo "<tr>";
                                    echo "<td>" . $row["BU"] . "</td>";
                                    echo "<td>" . number_format($row["flipkart_budget"]) . "</td>";
                                    echo "<td>" . number_format($row["hcrevenue"]) . "</td>";
                                    echo "<td>" . number_format($row["bal_budget"]) . "</td>";
                                    echo "<td>" . number_format($row["run_rate"]) . "</td>";
                                    echo "<td>" . number_format(round($row["current_avg"],2)) . "</td>";
                                    echo "<td>" . round((($row["bal_budget"]/$row["flipkart_budget"])*100),2) . "</td>";
                                    echo "</tr>";

                                }
                                $balance = array_sum($bal);
                                $hcrevenue = array_sum($hcr);

                            }
                            else
                            {
                                echo "<tr>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "<td>" . "N/A" . "</td>";
                                echo "</tr>";

                                 $bbp = ["0","0","0"];
                                $bup = ["none","none","none"];
                                $hcrevenue = 0;
                                $balance = 100;
                                $hcr = [0];
                                $bu = ["none"];
                                $bal = 0;

                            }
                        }
                        ?>
                    </table>
            </div>
                <div class="child head1">Revenue graph</div>
                <div class="child" id="bar">
                    <div style="width:75%;display:flex;align-items:center"> 
                        <canvas  id="chartjs_bar"></canvas> 
                   </div>
                </div>

                <div class="child head1" > 
                <div>Balance Budget</div>
                </div>

                <div class="child" id="pie" >
                 <div id="piee" style="width:28%">
                    <canvas id="myChart" ></canvas>
                 </div>
                        <div style="display:flex;flex-flow:column;width:26%;justify-content:space-evenly;align-items:center">
                            <div id="head1" style="width:100%;text-align:center;font-size:18px;text-transform:Capitalize"></div>
                            <div class="progress-bar">
                            <div id="barr" class="progress-value" style="width: 0%;line-height:1.5">
                            <span id="value" style="font-size:14px;line-height:1.6">0%</span>
                            </div>
                            </div>
                            <div id="head2" style="width:100%;text-align:center;font-size:18px;text-transform:Capitalize"></div>
                            <div class="progress-bar b2">
                            <div id="barr2" class="progress-value" style="width: 0%;line-height:1.5">
                            <span id="value2" style="font-size:14px;line-height:1.6">0%</span>
                            </div>
                            </div>
                            <div id="head3" style="width:100%;text-align:center;font-size:18px;text-transform:Capitalize"></div>
                            <div class="progress-bar b3">
                            <div id="barr3" class="progress-value" style="width: 0%;line-height:1.5">
                            <span id="value3" style="font-size:14px;line-height:1.6">0%</span>
                            </div>
                            </div>
                    </div>
                </div>
                    
                <div class="chlid" style="min-height:40px"></div>

            </div>
        </div>
    </div>
</form>
</body>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">


var bbp = <?php echo json_encode($bbp);?>;
var bup = <?php echo json_encode($bup);?>;
//   Bar Graph

        var ctx = document.getElementById("chartjs_bar").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels:<?php echo json_encode($bu); ?>,
                            datasets: [{
                                backgroundColor: [
                                "#5969ff",
                                    "#ff407b",
                                    "#25d5f2",
                                    "#ffc750",
                                    "#2ec551",
                                    "#7040fa",
                                    "#ff004e",
                                    "#bcb5b5"
                                ], label: ' Revenue',
                                data:<?php echo json_encode($hcr); ?>,
                            }]
                        },
                        options: {
                            legend: {
                            display: true,
                            position: 'bottom',
                            responsive:true,
                            maintainAspectRatio:false,
                            
                            labels: {
                                fontColor: '#71748d',
                                fontFamily: 'Arial',
                                fontSize: 10,
                            }
                        },


                    }
                    });

    // Pie chart

    var piechart = [<?php echo json_encode($hcrevenue);?>,<?php echo json_encode($balance);?>]

            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels:['revenue','budget'],
                    datasets: [{
                        backgroundColor: [
                                            "#5969ff",
                                            "#ff407b"
                                        ],
                        label: 'Series 1', // Name the series
                        data: piechart,
                        fill: false,
                        borderColor: '#2196f3', // Add custom color border (Line)
                        // backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                        borderWidth: 1 // Specify bar border width
                    }]},
                    
                options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio:false, // Add to prevent default behaviour of full-width/height 
                
                }
        });


    // Progress Bar


    document.getElementById("head1").innerHTML = bup[0];
    document.getElementById("head2").innerHTML = bup[1];
    document.getElementById("head3").innerHTML = bup[2];

            var elem = document.getElementById("barr");   
            var width = 0;
            var id = setInterval(frame, 100);
            function frame() {
                if (width >= bbp[0]) {
                clearInterval(id);
                } else {
                width++; 
                elem.style.width = width + '%'; 
                document.getElementById("value").innerHTML = width  + '%';
                }
            }

            var elem2 = document.getElementById("barr2");   
            var width = 0;
            var id2 = setInterval(frame2, 200);
            function frame2() {
                if (width >=bbp[1] ) {
                clearInterval(id2);
                } else {
                width++; 
                elem2.style.width = width + '%'; 
                document.getElementById("value2").innerHTML = width  + '%';
                }
            }


            var elem3 = document.getElementById("barr3");   
            var width = 0;
            var id3 = setInterval(frame3, 300);
            function frame3() {
                if (width >= bbp[2]) {
                clearInterval(id3);
                } else {
                width++; 
                elem3.style.width = width + '%'; 
                document.getElementById("value3").innerHTML = width  + '%';
                }
            }

</script> 
</html>