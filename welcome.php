<?php
    session_start();
    if(!isset($_SESSION['alogin']))
    {
		echo "<script>alert('Please Login First')</script>";
        header('Location: index.php');
    }
?>
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
        <tr>
            <td style='text-align:center' colspan="4" width="100%">
                <br><br>
                <p>
                    <h2><u>WELCOME TO EMPLOYEES DATA MANAGEMENT SYSTEM</u></h2>
                    <br><br>
                </p>
            <p>
                <h3><em>Please choose one of the above options to start with.</em></h3>
                 <br>
                <p>
                    <br>Display employees data will show you all the data combined from employees.json and employees table in data base.
                    <br>
                    <br>Search employee data will let you search the employee data storedin both epmployees.json and employees table by first or last name.
                    <br>
                    <br>In Insert employee data, you can add a new employee data i.e. employee id, fistname and lastname of employee.
                </p>
        </tr>
    </td>
    </table>
</body>
</html>
