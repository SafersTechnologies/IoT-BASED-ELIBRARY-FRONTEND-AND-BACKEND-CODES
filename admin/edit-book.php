<?php
session_start();
include('includes/config.php');
$Eid=$_GET['bookid'];
$error=""; 
$msg=""; 
if(isset($_POST['add']))
{
$bookname=$_POST['bookname'];
$Location=$_POST['Location'];
$author=$_POST['AuthurName'];
$isbn=$_POST['isbn'];
$price=$_POST['price'];
$Quantity=$_POST['Quantity'];
$Publisher=$_POST['Publisher'];
$Edition=$_POST['Edition'];
$Pages=$_POST['Pages'];

$update = "UPDATE tblbooks SET BookName='$bookname',AuthurName='$author',Quantity='$Quantity',ISBNNumber='$isbn',BookPrice='$price',Edition='$Edition',Pages='$Pages',Location='$Location',Publisher='$Publisher' WHERE id=$Eid";

//$query = "INSERT INTO tblbooks(BookName,AuthurName,Quantity,ISBNNumber,BookPrice,Edition,Pages,Location,Publisher) values('$bookname','$author','$Quantity','$isbn','$price','$Edition','$Edition','$Location','$Publisher')";
$result = mysqli_query($db,$update);

if($result)
{
$msg="Book successfully Updated";
 
}
else {
$error="Something Went Wrong";  
 
}
//$_SESSION['msg']="Book Listed successfully";
//header('location:manage-books.php');

}

$query2 = "select id,BookName,AuthurName,Quantity,Publisher,ISBNNumber,Location,BookPrice,UpdationDate,Edition,Pages from tblbooks where id='$Eid'";
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
                <h4 class="header-line">Edit Book</h4>
                
                            </div>

</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>            

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>ISBN Number<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="isbn" value="<?php echo $row2["ISBNNumber"];?>" required="required" autocomplete="off"  />
<p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
</div>

<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="bookname" value="<?php echo $row2["BookName"];?>"  autocomplete="off"  required />
</div>

<div class="form-group">
<label>Author Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="AuthurName" value="<?php echo $row2["AuthurName"];?>"  required="required" autocomplete="off"  />
<p class="help-block">Name of Author</p>
</div>

<div class="form-group">
<label>Quantity<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="Quantity" value="<?php echo $row2["Quantity"];?>"  required="required" autocomplete="off"  />
<p class="help-block">Quantity</p>
</div>

<div class="form-group">
<label>Edition<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="Edition" value="<?php echo $row2["Edition"];?>"  required="required" autocomplete="off"  />
<p class="help-block">Edition</p>
</div>

<div class="form-group">
<label>Pages<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="Pages" value="<?php echo $row2["Pages"];?>"  required="required" autocomplete="off"  />
<p class="help-block">Pages</p>
</div>


<div class="form-group">
<label>Publisher<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="Publisher" value="<?php echo $row2["Publisher"];?>"  required="required" autocomplete="off"  />
<p class="help-block">Publisher</p>
</div>


 <div class="form-group">
 <label>Price<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="price" value="<?php echo $row2["BookPrice"];?>"  autocomplete="off"   required="required" />
 </div>
 
 <div class="form-group">
 <label>Location<span style="color:red;">*</span></label>
 <select class="form-control" name="Location" required="required">
<option value=""> Select Location</option>

<option value="1">Shelf A Row 1</option>
<option value="2">Shelf A Row 2</option>
<option value="3">Shelf A Row 3</option>
<option value="4">Shelf A Row 4</option>
<option value="5">Shelf A Row 5</option>

</select>
 </div>
 
<button type="submit" name="add" class="btn btn-info">Update Book </button>

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