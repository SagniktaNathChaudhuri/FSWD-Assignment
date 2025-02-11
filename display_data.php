<html>
    <head>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'> 


</head>
    <body>

    <?php

include "Navbar.php";

?>

<div class="container">
            <div class="row main">
                <div class="panel-heading">
                   <div class="panel-title text-center">
                           <h1 class="title">𝐑𝐞𝐠𝐢𝐬𝐭𝐞𝐫 𝐃𝐞𝐭𝐚𝐢𝐥𝐬</h1>
                           <hr />
                       </div>
                </div> 

    <?php

if(isset($_GET['status'])){
  if($_GET['status'] == 1){
      echo "Bill details updated successfully";
  } else {
      echo "Failed to update bill details";
  }
}
?>

    <div class="container">
        <div class="row main">
    
            <div class="table-responsive">
    
                <table class="table table-bordered table-hover">
                    <tr class="table-primary">
                        <td>Bill_No</td>
                        <td>Description</td>
                        <td>Budget_Head</td>
                        <td>Bill_Date</td>
                        <td>Bill_Amount</td>
                        <td>Status</td>
                        <td>Remarks</td>
                        <td>actions</td>
                    </tr>
    
    
    
                    <?php
    
     //Database connection
    
     $conn = new mysqli('localhost','root','','etdc');
        
     if($conn->connect_error){
         die('Connect Failed : '.$conn->connect_error);
     }
    $sql = "SELECT * FROM register_details";
    $result = mysqli_query($conn,$sql);
    
    $num=mysqli_num_rows($result);
    //echo "Number of records ". $num;
    //echo "<br>";
    
    if($num> 0){
        while($row = mysqli_fetch_assoc($result)){
        
        
    ?>
    
                    <tr>
                        <td>
                            <?php echo $row['Bill_No']; ?>
                        </td>
                        <td>
                            <?php echo $row['Description']; ?>
                        </td>
                        <td>
                            <?php echo $row['Budget_Head']; ?>
                        </td>
                        <td>
                            <?php echo $row['Bill_Date']; ?>
                        </td>
                        <td>
                            <?php echo $row['Bill_Amount']; ?>
                        </td>
                        <td>
                            <?php echo $row['Status']; ?>
                        </td>
                        <td>
                            <?php echo $row['Remarks']; ?>
                        </td>
                        <td>
                            <a href="edit_data.php?billid=<?php echo $row['Bill_Id']; ?>" >Edit</a>
                            <a href="delete_data.php?billid=<?php echo $row['Bill_Id']; ?>" >Delete</a>
                        </td>
    
                    </tr>
    
                    <?php
    
    //echo "<br>";
       }
    }
    
    $conn->close();
    
    ?>
                    <!-- <ol>
      <li><a href="display_data.php">register_details</a></li>
      <li><a href="template.php"></a>Bill Records</li>
      
    </ol> -->
                </table>
            </div>
        </div>
    </div>
    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>
