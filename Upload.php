<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <title>upload file</title>
</head>
<body>


    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand">Video</a>
    </div>
    <div class="container-fluid">
      <a href="index1.php" class="navbar-brand">images</a>
    </div>
    <div class="container-fluid">
      <a href="Upload.php" class="navbar-brand">Files</a>
    </div>
  </nav>
  <br /><br />  
           <div class="container" style="width:500px;">  
                  <h3 class="text-primary"> **** Files pdf...docx......txt.... Upload</h3>
                  <br /><br />
   
   <?php
    $conn = mysqli_connect('localhost','root','','db_video');
    if(isset($_POST['submit'])){
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "files/".$fileName;
        
        $query = "INSERT INTO fieldownload(filename) VALUES ('$fileName')";
        $run = mysqli_query($conn,$query);
        
        if($run){
            move_uploaded_file($fileTmpName,$path);
            echo "success";
        }
        else{
            echo "error".mysqli_error($conn);
        }
        
    }
    
    ?>
   
   <table border="1px" align="center">
       <tr>
           <td>
               <form action="upload.php" method="post" enctype="multipart/form-data"
               class="btn btn-primary" data-toggle="modal" data-target="#form_modal">
               <br /><br />

                    <input type="file" name="file" class="btn btn-primary" data-toggle="modal" data-target="#form_modal">
                    <br /><br />

                    <!-- /*<button type="submit" name="submit"> Upload</button>*/ -->
                    <button type="submit" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Upload</button>

    <br /><br />
                </form>
           </td>
       </tr>
       <tr>
           <td>
              <?php
               $query2 = "SELECT * FROM fieldownload ";
               $run2 = mysqli_query($conn,$query2);
               
               while($rows = mysqli_fetch_assoc($run2)){
                   ?>
               <a href="download.php?file=<?php echo $rows['filename'] ?>">Download</a><br>
               <?php
               }
               ?>
               <br /><br />
           </td>
       </tr>
   </table>
    
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</html>