<?php

include('includes/config.php');


    ?>
	
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
//$sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId";
//$query = $dbh -> prepare($sql);
//$query->execute();
//$results=$query->fetchAll(PDO::FETCH_OBJ);
$query = "select id,BookName,CatId,AuthorId,ISBNNumber,BookPrice,RegDate,UpdationDate from tblbooks";
//book_info where title like '%$search%' 
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
                <h4 class="header-line">Search And Locate Books</h4>
    </div>
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
                                            <th>Purchase Date</th>
                                            <th>Edition</th>
											<th>Pages</th>
                                            <th>Shelf Location</th>
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
                                            <td class="center"><?php// echo $row["AuthorName"];?> </td>
                                            <td class="center"><?php// echo $row["CategoryName"];?> </td>									
											<td class="center"><?php// echo $row["CategoryName"];?> </td>											
											<td class="center"><?php// echo $row["CategoryName"];?> </td>
                                            <td class="center"><?php// echo $row["BookPrice"];?> </td>
											<td class="center"><?php// echo $row["CategoryName"];?> </td>													
											<td class="center"><?php// echo $row["BookPrice"];?> </td>												
																				  
											
                                            <td class="center">
                                            <a href="edit-book.php?bookid=<?php echo $row["id"];?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Locate</button> 
                                          
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
