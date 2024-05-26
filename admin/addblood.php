<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/addblood.css">
        
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
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
                    <td colspan="1" class="nav-bar" >
                    <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Donate Now </p>
                          
                    </td>
                    <td width="25%">

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
                        <table border="0" width="100%">
                            <tr>
                                <td width="50%">

                                    <center>
                                        <table class="filter-container" style="border: none;" border="0">
                                            <tr>
                                                <td style="width: 25%;">
                                                    <button class="open-button" onclick="openForm()">Blood Donation</button>
                                                    <div class="form-popup" id="myForm"><br>
                                                        <form role="form" action="addedblood.php" method="post">
                                                            <div class="form-group">
                                                                <label>Enter Full Name</label>
                                                                <input class="form-control" type="text" placeholder="Harry Den" name="name" required>
                                                            </div>
                                        
                                                            <div class="form-group">
                                                                <label>Gender [ M/F ]</label>
                                                                <input class="form-control" placeholder="M or F" name="gender" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Enter Date of birth</label>
                                                                <input class="form-control" type="date" name="dob" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Enter Weight</label>
                                                                <input class="form-control" placeholder="Weight" type="number" name="weight" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Enter Blood Group</label>
                                                                <input class="form-control" placeholder="Eg: B+" name="bloodgroup" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Enter Address</label>
                                                                <input class="form-control" placeholder="Address" type="text" name="address" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Enter Contact Number</label>
                                                                <input class="form-control" placeholder="Contact Number" type="number" name="contact" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Blood Quantity</label>
                                                                <input class="form-control" placeholder="Blood Quantity" type="number" name="bloodqty" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Collection Date</label>
                                                                <input class="form-control" type="date" name="collection" required>
                                                            </div>
                                                            <button type="submit" class=" btn-primary-soft btn" style="border-radius: 0%;">Submit Form</button>
                                                            <button type="button" class=" btn-primary-soft btn" onclick="closeForm()">Close</button>
                                                            <button type="reset" class=" btn-primary-soft btn" style="border-radius: 0%;">Reset</button>
                                                        </form>
                                                    </div>
                                                    <script>
                                                    function openForm() {
                                                    document.getElementById("myForm").style.display = "block";
                                                    }

                                                    function closeForm() {
                                                    document.getElementById("myForm").style.display = "none";
                                                    }

                                                    </script>
                                                </td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                        </table>
                    </td>
                <tr>
            </table>
        </div>
    </div>
</body>
</html>

