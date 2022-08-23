<?php
session_start();
include('includes/config.php');

if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblbooks  WHERE id='$id'";
$query = mysqli_query($db,$sql);
$_SESSION['delmsg']="Category deleted scuccessfully ";
header('location:manage-books.php');

}
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
    ?>
	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Students</title>	
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>

      <!------MENU SECTION START-->
<?php include('includes/header.php');?>

<?php 

$query = "select id,StudentId,FullName,RegDate,EmailId,mobileNumber from tblstudents";
$result = mysqli_query($db,$query);
$cnt=1;

if(mysqli_num_rows($result)>0)if(mysqli_num_rows($result)>0)

{
	
?>

<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Users</h4>
    </div>
	
	
	
	
	
     <div class="row">
   
        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Users Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>User Id</th>
                                            <th>Full Name</th>
                                            <th>Users Email</th>
                                            <th>Mobile Number</th>
											<th>Reg Date</th>
											 <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

<?php while($row = mysqli_fetch_assoc($result))
{
	
?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo $cnt;?></td>
											<td class="center"><?php echo $row["StudentId"];?> </td>
											<td class="center"><?php echo $row["FullName"];?> </td>
                                            <td class="center"><?php echo $row["EmailId"];?> </td>
                                            <td class="center"><?php echo $row["mobileNumber"];?> </td>
											<td class="center"><?php echo $row["RegDate"];?> </td>
                                            		  
											
                                            <td class="center">
                                            <a href="edit-user.php?userid=<?php echo $row["id"];?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>   
                                            </td>
                                        </tr>
<?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>

                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
	
</body>
</html>

<?php } ?>