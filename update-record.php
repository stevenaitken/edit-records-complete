<?php
require('includes/connx.php');
require('includes/error-reporting.php');
//declaring and assigning values to variables using the $_GET method

//test to check whether you are receiving the variable values
//
if (isset($_POST['employee_id'])) { // you can add more conditions here is you wish too

  $employee_id = $_POST['employee_id'];
  $fname = $_POST['fname'];
  $sname = $_POST['sname'];
  $email = $_POST['email'];
  $phone_no = $_POST['phone'];
  $profile_pic = $_POST['profile_pic'];
  $location = $_POST['department'];

  //echo $employee_id;
  /*echo $fname;
  echo $sname;
  echo $email;
  echo $phone_no;
  echo $profile_pic;
  echo $department;

  */

  // prepare sql statement
  $stmt = $conn->prepare("UPDATE employee_details SET  fname = ?, sname=?, email=?, phone_no=?, profile_pic=?, department=? WHERE  employee_id=?"); //prepare sql statement

  $stmt->bind_param("sssssss", $fname, $sname, $email, $phone_no, $profile_pic, $location, $employee_id); //bind the variables to the sql statement as parameters
  $stmt->execute(); //Execute the prepared statement 
  header( 'Location: admin-home.php' ) ; //return to home page
  $stmt->close();//close SQL statement 
  $conn->close();//close connection 
}

?>