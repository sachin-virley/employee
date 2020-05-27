<?php

    include('db.php');
    $emp_id = "test";
	$first_name = "dhfsdg";
    $last_name = "qweqwe";

    $query = "INSERT INTO employees(employee_id, firstname, lastname) VALUES ('$emp_id', '$first_name', '$last_name')";
    $stmt = OCIParse($conn, $query); 		
    oci_execute($stid);
    
?>