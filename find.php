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
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
        <table border=1 width=100% cellpadding="10">
            <tr style="border-style:hidden">
                <td height="100" width="20%">
                    <font size="40" color="brown" > KUNICA's FRIEND</font>
                </td>
                <td style='text-align:center' height="100" width="60%" colspan=2>
                    <font size="30" color="brown" >SEARCH EMPLOYEE DATA</font>
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
                        <td height="100" width="75%" colspan=4>
                           <b>SEARCH BY FIRST OR LAST NAME</b> : <input type="text" class="form-control" id="search" required>
                           <button id="search2" type="submit">Search</button>
                        </td>
                </tr>
            </table>

    <div id="table-content"></div>
   
    <script>
            $(document).ready(function()
            {
                $("#search").keyup(function()
                {
                    if($("#search").val() == '')
                    {
                        $("#table-content").html('');
                    }
                });
        
                $("#search2").click(function()
                {
                    $.post("functionality.php",
                    {
                            find: "true",
                            q: $("#search").val()
                    },
                
                    function(data,status)
                    {
                        $("#table-content").html(data);
                    });
                });
            });
            </script>

</body>
</html>