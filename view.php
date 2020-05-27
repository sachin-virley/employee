<?php
    session_start();
    if(!isset($_SESSION['alogin']))
    {
		echo "<script>alert('Please Login First')</script>";
        header('Location: index.php');
	}

	else
	{
		include('db.php');

        $query = "SELECT * FROM employees";
        $stmt = OCIParse($conn, $query); 		

		$current_data = file_get_contents('employees.json');
		$array_data = json_decode($current_data,true);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <table border=1 width=100% cellpadding="10">
        <tr style="border-style:hidden">
            <td height="100" width="20%">
                <font size="40" color="brown" ></font>
            </td>
            <td style='text-align:center' height="100" width="60%" colspan=2>
                <font size="30" color="brown" >WELCOME</font>
            </td>
            <td style='text-align:center'width="20%" border:0'>
                    <button onclick="window.location.href='leave.php'">Log Out</button>
            </td>
        </tr>

        <tr>
            <td><a href="welcome.php">WELCOME</a></td>
            <td><a href="view.php">DISPLAY EMPLOYEES DATA</a></td>
            <td><a href="find.php">SEARCH EMPLOYEE DATA</a></td>
            <td><a href="input.php">INSERT EMPLOYEE DATA</a></td>
        </tr>
        </table>
        <br>
        <div id="table-content">
        <table cellpadding='10' text-align=center border=1 width='100%'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $count = 1;
    foreach ($array_data as $item) 
    {
        echo "<tr>";
        echo "<td style='text-align:center'>".$count++."</td>";
        echo "<td style='text-align:center'>".$item['id']."</td>";
        echo "<td style='text-align:center'>".$item['firstname']."</td>";
        echo "<td style='text-align:center'>".$item['lastname']."</td>";
        echo "</tr>";
    }

    if(OCIExecute($stmt))
    {
        while(OCIFetch($stmt))
		{
            echo "<tr>";
            echo "<td style='text-align:center'>".$count++."</td>";
            echo "<td style='text-align:center'>".(OCIResult($stmt,"EMPLOYEE_ID"))."</td>";
            echo "<td style='text-align:center'>".(OCIResult($stmt,"FIRSTNAME"))."</td>";
            echo "<td style='text-align:center'>".(OCIResult($stmt,"LASTNAME"))."</td>";
            echo "</tr>";
        }
    }
    ?>
                                    </tbody>
                                </table>
                </div>
    </section>
</body>
</html>
