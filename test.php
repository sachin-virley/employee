<?php

    include('db.php');
    $query = "SELECT * FROM Login"; 
    $stmt = OCIParse($conn, $query); 
    if(!$stmt)
    {
         echo "An error occurred in parsing the SQL string.\n";
    } 
    else
    {
        while(OCIFetch($stmt)) 
        { 
            echo (OCIResult($stmt,"id")); 
            echo "<br>";
            echo (OCIResult($stmt,"firstname")); 
            echo "<br>";
            echo (OCIResult($stmt,"lastname"));
            echo "<br>";
        }

        OCILogOff ($connect); 
    }
?>