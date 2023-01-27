<?php include('includes/error-reporting.php');include('includes/connx.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php  include('modules/head.php'); ?>
    <link href="css/styles.css" rel="stylesheet">

</head>


<body>

    <div class="container">
        <h2>Admin - employee records</h2>
        <table id="employees"><th>Employee_ID</th><th>Forename</th><th>Surname</th><th>Email</th><th>Phone_no</th><th>Department</th><th>Profile</th><th>Action</th><th></th>
                
        <?php
           //sql statement must return the unique identifier for all records. In this case it is employee_id
            if ($stmt = $conn->prepare("SELECT employee_id, fname, sname, email, phone_no, profile_pic, department FROM employee_details")) {
                $stmt->execute(); // execute sql statement
                $result = $stmt->get_result(); //returns the results from sql statement
        

                // output data of each row
                while ($row = $result->fetch_assoc()) { //fetches one row of data from the results set. Continues until there are no more rows
        ?>
                           <tr>
              <td><?php echo $row['employee_id']; ?></td>
              <td><?php echo $row['fname']; ?></td>
              <td><?php echo $row['sname']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['phone_no']; ?></td>
              <td><?php echo $row['department']; ?></td>
              <td><img src="<?php echo $row['profile_pic']; ?>" alt="<?php echo str_replace("images/", "", $row['profile_pic']); ?>" title="<?php echo str_replace("images/", "", $row['profile_pic']); ?>"></td>
            
            <!-- add a row with a link to a php page. The link is appended with a query which contains the record unique id -->            
              <td><a href="delete.php?employee_id=<?php echo $row['employee_id']?>">Delete</a></td>


              <td><a href="update-form.php?employee_id=<?php echo $row['employee_id']?>">Update</a></td> 

            </tr>
   
          <?php
                }

                $stmt->close(); // close sql statement - optional and depends on context
                $conn->close(); // close dbase connection - optional and depend on context
        
            }
        
          ?>  
 </table>
    <!-- Add records -->
    <a href="add_records.php"><input type="submit" name="submit" class="btn btn-primary btn-block mb-4" value="Add Records"></a>
    </div>

</body>

</html>

