<?php
    session_start();
    if(!isset($_SESSION['alogin']))
    {
		echo "<script>alert('Please Login First')</script>";
        header('Location: index.php');
    }

    include('db.php');

	if(isset($_REQUEST['submit_json']))
	{
        $current_data = file_get_contents('employees.json');
        $array_data = json_decode($current_data,true);
        $extra = array(

            "id" => $_REQUEST['empid'],
            "firstname" => $_REQUEST['firstname'],
            "lastname" => $_REQUEST['lastname']
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        
        file_put_contents('employees.json',$final_data);
    }
    
    if(isset($_REQUEST['submit_db']))
	{
        $emp_id = $_REQUEST['empid'];
	$first_name = $_REQUEST['firstname'];
        $last_name = $_REQUEST['lastname'];

        $query = "INSERT INTO EMPLOYEES(EMPLOYEE_ID, FIRSTNAME, LASTNAME) VALUES ('$emp_id', '$first_name', '$last_name')";
        $stmt = OCIParse($conn, $query); 		
        OCIExecute($stid);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
        <table border=1 width=100% cellpadding="10">
                <tr style="border-style:hidden">
                    <td height="100" width="20%">
                        <font size="40" color="brown" >KUNICA's FRIEND</font>
                    </td>
                    <td style='text-align:center' height="100" width="60%" colspan=2>
                        <font size="30" color="brown" >INSERT EMPLOYEE DATA</font>
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
                    <td style='text-align:center' height="100" width="75%" colspan=4>
                        <b>EMPLOYEE ID :</b> <input type="number" id="empid" name="empid" required placeholder="Employee ID">
                        <b>FIRST NAME</b> : <input type="text" id="firstname" name="firstname" required placeholder="First Name">
                        <b>LAST NAME :</b>  <input type="text" id="lastname" name="lastname" required placeholder="Last Name">
                    </td>
                </tr>
        
                
                <tr>
                    <td style="background-color:brown"></td>
                    <td style='text-align:center'><button class="btn btn-primary" id="submit_in_db" type="button">Add to employees table</button></td>
                    <td style='text-align:center'><button class="btn btn-primary" id="submit_in_json" type="button">Add to employees.json</button></td>
                    <td style="background-color:brown"></td>
                </tr>
            </table>

    <script>
            $(document).ready(function()
            {
                $("#submit_in_json").click(function()
                {
                    if ($("#empid").val() == '' ||$("#firstname").val() == '' || $("#lastname").val() == '') 
                    {
                            alert("Please enter some data");
                    }
                    else
                    {
                        $.post("functionality.php",
                        {
                                submit_json: "true",
                                empid: $("#empid").val(),
                                firstname: $("#firstname").val(),
                                lastname: $("#lastname").val()
                        },
                    
                        function(data,status)
                        {
                            $("#empid").val('');
                            $("#firstname").val('');
                            $("#lastname").val('');
                            if(status == "success")
                            {
                                alert("Successfull entery in employees.json")
                            }
                            else
                            {
                                alert("Something went wrong");
                            }
                        });
                    }
                });
    
                $("#submit_in_db").click(function()
                {
                    if ($("#empid").val() == '' ||$("#firstname").val() == '' || $("#lastname").val() == '') 
                    {
                            alert("Please enter some data");
                    }
                    else
                    {
                        $.post("input.php",
                        {                        
                                submit_db: "true",
                                empid: $("#empid").val(),
                                firstname: $("#firstname").val(),
                                lastname: $("#lastname").val()
                        },
                    
                        function(data,status)
                        {
                            $("#empid").val('');
                            $("#firstname").val('');
                            $("#lastname").val('');
                            if(status == "success")
                            {
                                alert("Successfull entery in employees table")
                            }
                            else
                            {
                                alert("Something went wrong");
                            }
                        });
                    }
                });
            })
        </script>

</body>
</html>
