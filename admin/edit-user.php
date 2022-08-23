<?php
session_start();
include('includes/config.php');
$Eid=$_GET['userid'];
$error=""; 
$msg=""; 
if(isset($_POST['add']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];
$mobilenumber=$_POST['mobilenumber'];
$studentid=$_POST['studentid'];

$update = "UPDATE tblstudents SET StudentId='$studentid',FullName='$fname',EmailId='$email',MobileNumber='$mobilenumber' WHERE id=$Eid";

//$query = "INSERT INTO tblbooks(BookName,AuthurName,Quantity,ISBNNumber,BookPrice,Edition,Pages,Location,Publisher) values('$bookname','$author','$Quantity','$isbn','$price','$Edition','$Edition','$Location','$Publisher')";
$result = mysqli_query($db,$update);

if($result)
{
$msg="User Details successfully Updated";
 
}
else {
$error="Something Went Wrong";  
 
}


//$_SESSION['msg']="Book Listed successfully";
//header('location:manage-books.php');

}

$query2 = "select id,FullName,EmailId,MobileNumber,StudentId from tblstudents where id='$Eid'";
$result2 = mysqli_query($db,$query2);
$row2 = mysqli_fetch_assoc($result2);
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
    <title>Online Library Management System || Edit Book</title>
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
<!-- MENU SECTION END-->
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit User</h4>
                
                            </div>

</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>            

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
User Info
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Full Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="fname" value="<?php echo $row2["FullName"];?>" required="required" autocomplete="off"  />

</div>

<div class="form-group">
<label>Email<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="email" value="<?php echo $row2["EmailId"];?>"  autocomplete="off"  required readonly />
</div>

<div class="form-group">
<label>Mobile Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="mobilenumber" value="<?php echo $row2["MobileNumber"];?>"  required="required" autocomplete="off"  />
</div>

<div class="form-group">
<label>Student ID<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="studentid" value="<?php echo $row2["StudentId"];?>"  required="required" autocomplete="off"  />

</div>
 
<button type="submit" name="add" class="btn btn-info">Update User </button>

                                    </form>
                            </div>
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
</body>
</html>

<?php } ?>