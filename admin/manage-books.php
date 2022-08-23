<?php
session_start();
include('includes/config.php');
$error=""; 
$msg=""; 
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblbooks  WHERE id='$id'";
$query = mysqli_query($db,$sql);
if($query)
{
$msg="Book deleted successfully";
 
}
else {
$error="Something Went Wrong";  
 
}

//$_SESSION['delmsg']="";
//header('location:manage-books.php');

}





if(strlen($_SESSION['alogin'])==0)
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
    <title>Online Library Management System | Manage Books</title>	
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


$query1 = "select ip from ipaddress";
$ip = mysqli_query($db,$query1);
//$getip = mysqli_fetch_assoc($ip);
$query = "select id,BookName,AuthurName,Quantity,Publisher,ISBNNumber,Location,BookPrice,UpdationDate,Edition,Pages from tblbooks";
$result = mysqli_query($db,$query);
$cnt=1;
$getip = mysqli_fetch_assoc($ip);
$savedIp = $getip["ip"];

if(mysqli_num_rows($result)>0)if(mysqli_num_rows($result)>0)

{
	
?>

<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Books</h4>
    </div>
	
	<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>            

	
	
	
	
     <div class="row">
   
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
                                             <th>Author Name</th>
                                             <th>Quantity</th>
                                             <th>Last UpDated</th>
                                             <th>Edition</th>
											 <th>Pages</th>
                                             <th>Publisher</th>
                                             <th>Price</th>
											 <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

<?php while($row = mysqli_fetch_assoc($result))
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
											<td class="center"><?php echo $row["BookPrice"];?> </td>												
																				  
											
                                            <td class="center">
                                            <a href="edit-book.php?bookid=<?php echo $row["id"];?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                          <a href="manage-books.php?del=<?php echo $row["id"];?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
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