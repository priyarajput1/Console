
<!DOCTYPE html>
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
echo "Connected successfully";
echo "Connected successfully";
// $date = $_POST["record"];
// $sql = "SELECT * FROM data where date = '$date' ";
// $sql = "SELECT * FROM data ";
// $result = $conn->query($sql);
               
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  
</head>
<style>
    #box
    {
        position: absolute;
        top:0%;
        left: 0%;
        width: 100%;
        height: 190%;
        background-image: linear-gradient(to left, #189DDB ,#82CAEB); 
        font-family:arial;
        
        /* margin:auto; */
    }
    #container
    {
        position: relative;
        top:4%;
        border-radius: 5px;
        width: 80%;
        padding: 10px;
        height: 90%;
        margin:auto;
        background-color:#FFFFFF;
        overflow-y:auto;
        overflow-x:hidden;
    }
    #client
    {
        border-radius: 0px 5px 5px 0px;
        position:relative;
        top:-3%;
        left:17%;
        height:105%;
        /* margin: auto; */
        width: 90%;
        background-color:#F4F7FF;
        overflow-y:auto;
        overflow-x:hidden;


    }
    #tab
    {
        border-radius:5px;
        position:relative;
        top:-43%;
        left:3%;
        height:310px;
        /* margin: auto; */
        width:87%;
        background-color:#FFFFFF;
        box-shadow:  0px 0px 5px -1px #ededed;
        overflow-y:auto;
        overflow-x:hidden;
    

    }
    #bar
    {
        border-radius:5px;
        position:relative;
        top:40%;
        left:3%;
        text-align:center;
        height:310px;
        /* margin: auto; */
        width:87%;
        background-color:#FFFFFF;
        box-shadow:  0px 0px 5px -1px #ededed;
        /* overflow-y:auto; */
        overflow:hidden;

    }
    #pie
    {
        border-radius:5px;
        position:relative;
        top:44%;
        left:3%;
        height:310px;
        /* margin: auto; */
        width:87%;
        background-color:#FFFFFF;
        box-shadow:  0px 0px 5px -1px #ededed;
        overflow-y:auto;
        overflow-x:hidden;

    }
     .progress-bar {

    position:relative;
    top:20%;
    left:60.5%;
    background-color: lightgray;
    width:30%;
    height: 8%;
    display: inline-block;
}
.progress-value {
   
    color: #fff;
    text-align: center;
    background-color: #673ab7;
    transition: .3s all linear;
    height: 100%;
    display: inline-block;
} 
.b2{
    position:relative;
    top:45%;
    left:30%;
}
.b3{
    position:relative;
    top:70%;
    left:-0.5%;
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
/* th, td {
  padding: 5px;
} */
input{
font-family:arial;
font-size:14px;
position:relative;
top:-50%;
left:3%;
}
@media screen and (max-width:500px) {
 #piee,#pie,#mychart{
     left:0%;
     width:40%;
 }
}
</style>

<body>
<form action="data.php" method="post" >
<div id="box">
   <div id="container">
   <div id="client">
   <div id="bar">
     <div id="barrr" style="width:80%;height:98%;top:5%;position:absolute;">
            <canvas  id="chartjs_bar" ></canvas> 
     </div>
        
   </div>
    <div id="pie">
            
            <div id="piee" style="position:absolute;left:5%;width:30%">
            <canvas id="myChart" ></canvas>
            </div>
            <div id="head1" style="position:absolute;top:10%;left:60%;width:30%;text-align:center;font-size:18px;text-transform:Capitalize"></div>
            <div class="progress-bar">
            <div id="barr" class="progress-value" style="width: 2%;line-height:1.5">
            <span id="value" style="font-size:14px;line-height:1.6">0%</span>
            </div>
            </div>
            <div id="head2" style="position:absolute;top:35%;left:60%;width:30%;text-align:center;font-size:18px;text-transform:Capitalize"></div>
            <div class="progress-bar b2">
            <div id="barr2" class="progress-value" style="width: 2%;line-height:1.5">
            <span id="value2" style="font-size:14px;line-height:1.6">0%</span>
            </div>
            </div>
            <div id="head3" style="position:absolute;top:60%;left:60%;width:30%;text-align:center;font-size:18px;text-transform:Capitalize"></div>
            <div class="progress-bar b3">
            <div id="barr3" class="progress-value" style="width: 2%;line-height:1.5">
            <span id="value3" style="font-size:14px;line-height:1.6">0%</span>
            </div>
            </div>
            
            
   </div>
   <input type="date"  name="from_date" >
         <input type="date"  name="to_date" style="left:22%">
        
   
         <button type="submit" name="someAction" value="Submit" style="position:absolute;top:5.2%;left:40%">Submit</button>       
        
   <div id="tab">
   

         
                <table style="width:100%;position:relative;top:-1%;font-size:15px;text-align:center">
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
               if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
               {
            
                  $fromdate = $_POST["from_date"];
                  $todate = $_POST["to_date"];
       
                  $sql = "SELECT BU,flipkart_budget,revenue,sum(hcrevenue) as hcrevenue,sum(bal_budget) as bal_budget,sum(run_rate)as run_rate,sum(current_avg)as current_avg,sum(budget_usage_percentage) 
                 as budget_usage_percentage FROM data WHERE date BETWEEN '$fromdate' AND '$todate' group by BU order by hcrevenue desc";
               $sql2 = "SELECT sum(flipkart_budget) as flipkart_budget,sum(hcrevenue) as hcrevenue,sum(bal_budget) as bal_budget FROM data WHERE date BETWEEN '$fromdate' AND '$todate'";
               $result = $conn->query($sql);
               $result2 = $conn->query($sql2);
               if ($result2->num_rows > 0) 
               {
               
                while($row = $result2->fetch_assoc()) 
                {       
                    $hcrr = $row["hcrevenue"];
                    $bb = ($row["flipkart_budget"]-$row["hcrevenue"]);
                   
                }
                $record = array($hcrr,$bb);
            }
               if ($result->num_rows > 0) 
               {
               
                while($row = $result->fetch_assoc()) 
                {       
                    $bu[] = $row["BU"];
                    $hcr[] = $row["hcrevenue"];
                    $bal[] = ($row["flipkart_budget"]-$row["hcrevenue"]);
                    $fb[] = $row["flipkart_budget"];
                    
                    echo "<tr>";
                    echo "<td>" . $row["BU"]. "</td>";
    	            echo "<td>" . $row["flipkart_budget"]. "</td>";
                    echo "<td>" . $row["hcrevenue"]. "</td>";
                    echo "<td>" . number_format($row["flipkart_budget"]-$row["hcrevenue"]). "</td>";
	                echo "<td>" . $row["run_rate"]. "</td>";
	                echo "<td>" . $row["current_avg"]. "</td>";
	                echo "<td>" . $row["budget_usage_percentage"]. "</td>";
                    echo "</tr>";
                    
                   
                }

                if(count($bal)==1 && count($fb)==1 || count($bal)>1 && count($fb)>1)
                {
                    if($bal[0]!= 0 && $fb[0]!= 0)
                    {
                        $p1 = 100-(($bal[0]/$fb[0])*100);
                        $bu0 = $bu[0];
                    }
                        else{$p1=0;
                        $bu0 = "None";}
                }
             
                if(count($bal)>1 && count($fb)>1)
                {
                    if($bal[1]!= 0 && $fb[1]!= 0)
                    {
                        $p2 = 100-(($bal[1]/$fb[1])*100);
                        $bu1 = $bu[1];
                    }
                    else{$p2=0;}

                    if($bal[2]!= 0 && $fb[2]!= 0)
                    {
                        $p3 = 100-(($bal[2]/$fb[2])*100);
                        $bu2 = $bu[2];
                    }
                    else{$p3=0;}
                }
                else{
                    $p2=0;
                    $p3=0;
                    $bu1 = "None";
                    $bu2 = "None";
                }
    
                
                // // echo($p1);
                // $width= array($hcr[0],$hcr[1],$hcr[2]);
              
            }
           
            else 
            {
                echo "0 results";
            }
                 }
        else{
            $sql = "SELECT BU,flipkart_budget,sum(hcrevenue) as hcrevenue,sum(bal_budget) as bal_budget,sum(run_rate)as run_rate,sum(current_avg)as current_avg,sum(budget_usage_percentage) 
            as budget_usage_percentage FROM data WHERE date in (select max(date) from data) group by BU order by hcrevenue desc;";
            $sql2 = "SELECT sum(flipkart_budget) as flipkart_budget,sum(hcrevenue) as hcrevenue,sum(bal_budget) as bal_budget FROM data WHERE date in (select max(date) from data)";
            $result = $conn->query($sql);
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) 
            {
            
             while($row = $result2->fetch_assoc()) 
             {       
                 $hcrr = $row["hcrevenue"];
                 $bb = ($row["flipkart_budget"]-$row["hcrevenue"]);
                
             }
             $record = array($hcrr,$bb);
         }
         if ($result->num_rows > 0) 
         {
          while($row = $result->fetch_assoc()) 
                {       
                    $bu[] = $row["BU"];
                    $hcr[] = $row["hcrevenue"];
                    $bal[] = ($row["flipkart_budget"]-$row["hcrevenue"]);
                    $fb[] = $row["flipkart_budget"];
                    
                    echo "<tr>";
                    echo "<td>" . $row["BU"]. "</td>";
    	            echo "<td>" . $row["flipkart_budget"]. "</td>";
                    echo "<td>" . $row["hcrevenue"]. "</td>";
                    echo "<td>" . number_format($row["flipkart_budget"]-$row["hcrevenue"]). "</td>";
	                echo "<td>" . $row["run_rate"]. "</td>";
	                echo "<td>" . $row["current_avg"]. "</td>";
	                echo "<td>" . $row["budget_usage_percentage"]. "</td>";
                    echo "</tr>";
                    
                   
                }
      
                    if(count($bal)==1 && count($fb)==1 || count($bal)>1 && count($fb)>1)
                    {
                        if($bal[0]!= 0 && $fb[0]!= 0)
                        {
                            $p1 = 100-(($bal[0]/$fb[0])*100);
                            $bu0 = $bu[0];
                        }
                            else{$p1=0;
                            $bu0 = "None";}
                    }
                 
                    if(count($bal)>1 && count($fb)>1)
                    {
                        if($bal[1]!= 0 && $fb[1]!= 0)
                        {
                            $p2 = 100-(($bal[1]/$fb[1])*100);
                            $bu1 = $bu[1];
                        }
                        else{$p2=0;}

                        if($bal[2]!= 0 && $fb[2]!= 0)
                        {
                            $p3 = 100-(($bal[2]/$fb[2])*100);
                            $bu2 = $bu[2];
                        }
                        else{$p3=0;}
                    }
                    else{
                        $p2=0;
                        $p3=0;
                        $bu1 = "None";
                        $bu2 = "None";
                    }
        
      
      }
      else 
      {
          echo "0 results";
      }
        }
 ?>
                
        
</div>
</div>  
       
</div>    
</div>
</form>


</body>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
var bu = [<?php echo json_encode($p1);?>,<?php echo json_encode($p2);?>,<?php echo json_encode($p3);?>]

document.getElementById("head1").innerHTML = <?php echo json_encode($bu0);?>;
document.getElementById("head2").innerHTML = <?php echo json_encode($bu1);?>;
document.getElementById("head3").innerHTML = <?php echo json_encode($bu2);?>;
var elem = document.getElementById("barr");   
  var width = 0;
  var id = setInterval(frame, 100);
  function frame() {
    if (width >= <?php echo json_encode($p1); ?>) {
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
    if (width >=<?php echo json_encode($p2); ?> ) {
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
    if (width >= <?php echo json_encode($p3); ?>) {
      clearInterval(id3);
    } else {
      width++; 
      elem3.style.width = width + '%'; 
      document.getElementById("value3").innerHTML = width  + '%';
    }
  }


var revenue = <?php echo json_encode($hcr);?>;
var bal = <?php echo json_encode($bal);?>;

var ff = <?php echo json_encode($record);?>

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
            data: <?php echo json_encode($record); ?>,
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

// var ctx = document.getElementById("half").getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'doughnut',
//     data: {
//         labels:['revenue','budget'],
//         datasets: [{
//             backgroundColor: [
                               
//                                 "#FB6E00",
//                                 "#EDEBEC"
//                             ],
//             label: 'Series 1', // Name the series
//             data:[revenue[0],bal[0]],
//             fill: false,
//             borderColor: '#2196f3', // Add custom color border (Line)
//             // backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
//             borderWidth: 1 // Specify bar border width
//         }]},
        
//     options: {
//       responsive: true, // Instruct chart js to respond nicely.
//       maintainAspectRatio:false, // Add to prevent default behaviour of full-width/height
//       rotation: 1 * Math.PI,
//       circumference: 1 * Math.PI, 
      
//     }
// });
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
                            ],
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

    </script> 
</html>