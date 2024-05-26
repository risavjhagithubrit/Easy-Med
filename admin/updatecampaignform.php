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
        form {  
padding: 50px;  
background-color: lightblue;  
}  

        input {  
  width: 100%;  
  padding: 15px;  
margin: 5px 0 22px 0;  
display: inline-block;  
 border: none;  
 background: #f1f1f1;  
}  

input:focus {  
background-color: orange;  
outline: none;  
} 

textarea {
    background-color : #F7F778;
    border: 1px solid #848484;
    height:200px;
    width: 75%;
    outline:0;
    margin-right:20%;
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
                        <div class="col-lg-12">
                            <h1 class="page-header" style="margin-left:10px;">Edit Announcement Detail</h1>
                        </div>   
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Total Records of available campaign
                        </div><br>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                <?php
                                    include 'dbconnect.php';
                                    $id=$_GET['id'];
                                    $qry= "select * from campaigndb where id='$id'";
                                    $result=mysqli_query($con,$qry);
                                    while($row=mysqli_fetch_array($result)){
                                ?> 

                                    <form role="form" action="finaladdedcampaign.php" method="post">
                                     
                                        <div class="form-group">
                                            <label>Campaign Name</label>
                                            <input class="form-control" name="cname" type="text" value='<?php echo $row['cname']; ?>' required>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Organizer Name</label>
                                            <input class="form-control" type="text" name="oname" value='<?php echo $row['oname']; ?>' required>
                                        </div>

                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" type="number" name="phn" value='<?php echo $row['phn']; ?>' required>
                                        </div>

                                        <div class="form-group">
                                            <label>Campaign Date</label>
                                            <input class="form-control" type="date" name="cdate" value='<?php echo $row['cdate']; ?>' required>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                             <textarea class="form-control" rows="4" name="descp" type="text" required><?php echo $row['descp']; ?></textarea>
                                        </div>


                                       
             <!-- id hidden grna input type ma "hidden" -->
             <input type="hidden" name="id" value="<?php echo $row['id'];?>">      

                             <button type="submit"  class="btn btn-success">Make Changes</button>
                
                                   </form> 

                                </div>

<?php
}
?>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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