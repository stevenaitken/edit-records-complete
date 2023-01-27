<?php include('includes/error-reporting.php');include('includes/connx.php');?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
body{font-family: 'Roboto', sans-serif;}

button, input[type=submit], input[type=reset] {
    background-color: #04AA6D;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    display: inline-block;
  }

  input[type=text], input[type=email], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    width:90%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>

<meta charset="utf-8">
<title><?php echo 'Edit record: '?></title>
</head>

<body>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['employee_id'])) { //add as many checks as required

  $employee_id = $_GET['employee_id']; //store $_GET value

  if ($stmt = $conn->prepare("SELECT employee_id, fname, sname, email, phone_no, profile_pic, department  FROM employee_details WHERE employee_id=?")) {

    $stmt->bind_param("i", $employee_id); //bind the variables to the sql statement as parameters
    $stmt->execute(); //Execute the prepared statement
    $result = $stmt->get_result(); //returns the results from sql statement

    while ($row = $result->fetch_assoc()) {
?>  
<h2>Update record for employee ID: <?php echo $row['employee_id']; ?><h2>
<div>

<form action="update-record.php" method="POST">
  
<input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">

	<table>
  <tbody>
    <tr>
      <td><label for="fname">Firstname:</label></td>
      <td><input type="text" name="fname" value="<?php echo $row['fname']; ?>"></td>
    </tr>

    <tr>
      <td><label for="sname">Surname:</label></td>
      <td><input type="text" name="sname" value="<?php echo $row['sname']; ?>"></td>
    </tr>

    <tr>
      <td><label for="email">Email:</label></td>
      <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
    </tr>

  <tr>
      <td><label for="phone">Phone No:</label></td>
      <td><input type="text" name="phone" value="<?php echo $row['phone_no']; ?>"></td>
    </tr>

    <tr>
      <td><label for="profile_pic">Profile:</label></td>
      <td><input type="text" name="profile_pic" value="<?php echo $row['profile_pic']; ?>"></td>
    </tr>

    <tr>
      <td><label for="department">Department:</label></td>
      <td><input type="text" name="department" value="<?php echo $row['department']; ?>"></td>
    </tr>

    <tr>
      <td><input type="submit" value="Update Record"></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</form>
    </div>


<?php

    } // end while loop


 } // end statement if


} // end server request if
?>












</body>
</html>