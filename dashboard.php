<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>

<?php 


$query11 = "select ip from ipaddress";
$ip = mysqli_query($db,$query11);
//$getip = mysqli_fetch_assoc($ip);
$query111 = "select id,BookName,AuthurName,Quantity,Publisher,ISBNNumber,Location,BookPrice,UpdationDate,Edition,Pages from tblbooks";
$result111 = mysqli_query($db,$query111);
$cnt=1;
$getip = mysqli_fetch_assoc($ip);
$savedIp = $getip["ip"];



$sid=$_SESSION['stdid'];
$query3 = "select FullName from tblstudents where id='$sid'";
$result3 = mysqli_query($db,$query3);
$row = mysqli_fetch_assoc($result3);
?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line"><?php echo $row["FullName"];?> DASHBOARD</h4>
                
                            </div>

        </div>
             
             <div class="row">



            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
<?php 
$sid=$_SESSION['stdid'];
$query = "select id from tblbooks";
$result = mysqli_query($db,$query);
$Books = mysqli_num_rows($result);
?>

                            <h3><?php echo $Books;?> </h3>
                            Available Book
                        </div>
                    </div>
             
               
        </div>
		
		




 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>ISBN No</th>
                                             <th>Book Title</th>
                                             <th>Authur Name</th>
                                             <th>Quantity</th>
                                             <th>Last UpDated</th>
                                             <th>Edition</th>
											 <th>Pages</th>
                                             <th>Publisher</th>
											 <!--<th>Price</th>-->
											 <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

<?php while($row = mysqli_fetch_assoc($result111))
{
	
?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo $cnt;?></td>											
											<td class="center"><?php echo $row["ISBNNumber"];?> </td>
                                            <td class="center"><?php echo $row["BookName"];?> </td>
                                            <td class="center"><?php echo $row["AuthurName"];?> </td>
                                            <td class="center"><?php echo $row["Quantity"];?> </td>									
											<td class="center"><?php echo $row["UpdationDate"];?> </td>											
											<td class="center"><?php echo $row["Edition"];?> </td>
                                            <td class="center"><?php echo $row["Pages"];?> </td>
											 <td class="center"><?php echo $row["Publisher"];?> </td>										
											<!-- <td class="center"><?php //echo $row["BookPrice"];?> </td>	-->							
																				  
											
                                            <td class="center">
                                            <a href="http://<?php echo $savedIp;?>/<?php echo $row["Location"];?>/on" target="iframe1"><button class="btn btn-success" onclick="myFunction()"><i class="glyphicon glyphicon-eye-open"></i> Locate</button> 
                                            </td>
                                        </tr>
<?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
<iframe name="iframe1" src="target.html" width="5px" height="5px"></iframe>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            
    </div>






            
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
	
	 <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
