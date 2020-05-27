<?php
    session_start();
    if(!isset($_SESSION['alogin']))
    {
		echo "<script>alert('Please Login First')</script>";
        header('Location: index.php');
    }

    include('db.php');

	if(isset($_REQUEST["find"]))
    {
		$table = "<h3 style='text-align:center'>FOLLOWING DATA IS CAPTURED</h3>";
		$table .= "<table cellpadding='10' text-align=center border=1 width='100%'>";
		$table .= "<thead><tr><th>#</th><th>Employee ID</th><th>First Name</th><th>Last Name</th></tr></thead><tbody>";

		$search = $_REQUEST["q"];
		$query = "SELECT * FROM employees WHERE LASTNAME like '%$search%' or FIRSTNAME like '%$search%'"; 
		$stmt = OCIParse($conn, $query); 
		if(OCIExecute($stmt))
		{
			while(OCIFetch($stmt))
			{
				$table .= "<tr>";
				$table .= "<td style='text-align:center'>".$count."</td>";
				$table .= "<td style='text-align:center'>".(OCIResult($stmt,"EMPLOYEE_ID"))."</td>";
				$table .= "<td style='text-align:center'>".(OCIResult($stmt,"FIRSTNAME"))."</td>";
				$table .= "<td style='text-align:center'>".(OCIResult($stmt,"LASTNAME"))."</td>";
				$table .= "</tr>";
				$count++;
			}
		}

		$current_data = file_get_contents('employees.json');
		$array_data = json_decode($current_data,true);

		$count = 1;
				
		$flag = 0;
		foreach ($array_data as $item) 
		{
			if($item['firstname'] == $search || $item['lastname'] == $search)
			{
				$table .= "<tr>";
				$table .= "<td style='text-align:center'>".$count."</td>";
				$table .= "<td style='text-align:center'>".$item['id']."</td>";
				$table .= "<td style='text-align:center'>".$item['firstname']."</td>";
				$table .= "<td style='text-align:center'>".$item['lastname']."</td>";
				$table .= "</tr>";
				$flag = 1;
				$count++;
			}
		}

		$table .= "</tbody></table>";

		if(OCIExecute($stmt) != false || $flag==1)
        {
			echo $table;
		}
		else
		{
			echo "<h3>No data matching your search results</h3>";
		}
	}
?>
