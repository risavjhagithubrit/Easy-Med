<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>eASY MED</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>

</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");

    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title">Administrator</p>
                                    <p class="profile-subtitle">admin@edoc.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-active" >
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td>
                        <a href="doctors.php" class="non-style-link-menu "><div><p class="menu-text">Doctors</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td>
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Appointment</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">Patients</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="pharmacy.php" class="non-style-link-menu"><div><p class="menu-text">Medicines</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="donation.php" class="non-style-link-menu"><div><p class="menu-text">Donation</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td>
                        <a href="transplant.php" class="non-style-link-menu"><div><p class="menu-text">Transplant</p></a></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                <tr>
                    <td colspan="2" class="nav-bar" >
                        <form action="organ.php" method="post" class="header-search">
                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Organ Name" list="doctors">&nbsp;&nbsp;
                                    
                            <?php
                            echo '<datalist id="organ">';

                            $conn=mysqli_connect('localhost','root','Ankit123456#','transplant');

                            $list11 = $conn->query("select organ_name,organ_no from organ;");
        
                            for ($y=0;$y<$list11->num_rows;$y++){
                                $row00=$list11->fetch_assoc();
                                $d=$row00["organ_name"];
                                $c=$row00["organ_no"];
                                echo "<option value='$d'><br/>";
                                echo "<option value='$c'><br/>";
                            };
        
                            echo ' </datalist>';
                            ?>
                                
                               
                            <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                
                        </form>    
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Kolkata');
        
                        $today = date('Y-m-d');
                        echo $today;

                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>
                </tr>
                
                <tr>
                     <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;: " border="0">
                            <br><br><br><br>
                            <tr>
                                <td style="width: 25%;">
                                    <div id="wrapper">
<div id="page-wrapper">
<div class="container-fluid">
<div class="row"> 
                <div class="row">
                        <div class=".col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Transplant requests
                                </div><br>
                                
                                 <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" style="border: blueviolet;: " border="2px"id="dataTables-example">
                                    
                                    <?php

						include "dbconn.php";

						$qry="select * from request order by date_reg asc";
						$result=mysqli_query($conn,$qry);


						echo"
						<thead>
						<tr>
							<th>Name</th>
							<th>Gender</th>
							<th>D.O.B</th>
							<th>Email</th>
							<th>City</th>
							<th>Contact</th>
                            <th>Date Registered</th>
                            <th>Comment</th>
                            <th>Status</th>
							<th>edit</th>
						</tr>
						</thead>";

						while($row=mysqli_fetch_array($result)){
						echo"
                        <tbody>
						<tr>
						    <td>".$row['name']."</td>
						    <td>".$row['gender']."</td>
						    <td>".$row['dob']."</td>
						    <td>".$row['email']."</td>
						    <td>".$row['city']."</td>
						    <td>".$row['phone']."</td>
                            <td>".$row['date_reg']."</td>
                            <td>".$row['comment']."</td>
                            <td>".$row['status']."</td>
						    <td><a href='editform1.php?id=".$row['id']."'>edit</a></td>
                        </tr>
                        </tbody>";
						}

						?>
                        </table>
                                    
                </div>
                </div>      
        </div>
        </div>  
        </div>  
        </div>
        </div>

</div>
                                </td>
                            </tr>
                        </table>
                        </center>
                    </td>
                </tr>
                
            </table>
        </div>
    </div>


</body>
</html>