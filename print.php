<?php

require("auth/connection.php");
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT `code`, `contact_id`, `event_id` FROM `attendance` WHERE code='".$_GET["code"]."';";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);


$contactId = $row["contact_id"];

$sql2 = "SELECT `name`, `mobile`, `company`, `job_title` FROM `address_book` WHERE id=$contactId;";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_array(MYSQLI_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/site.css" />
    <title>Your Badge</title>

    <style>
        html body
        {
            width :  2.047in;
            height: 3.385in;
            
        }

        #qrcode
        {
            width: 100%;
            align-items: center;
            text-align: center;


        }

        #qrcode img
        {
            position: relative;
            display: unset !important;
            max-width: 84px;
            margin: 0;
        }

        .card-section
{
    width :  4.047in;
    height: 6.385in;
    margin: auto;
    background-color: #fff;
    border-radius: 15px;
    padding: 0.1in;
}



.bg-light-beige
{
    background-color: #212529;
}

.logo
{
    width: 100%;
    display: block;
}

.logo img
{
 max-width: 100%;
}


.emp-photo
{
    margin-top: 10px;
    text-align: center;
}

.emp-photo img
{
    max-width: 120px;
    border-radius: 5px;
    border: solid #000 1px;
}

@font-face {
    font-family: 'Tajawal-Regular';
    src: url('static/fonts/Tajawal/Tajawal-Regular.ttf');
    font-weight: normal;
    font-style: normal;
}

body {

    font-family: 'Tajawal-Regular', sans-serif;
}

.input-badge
{
    border: 0;
    text-transform: uppercase;
}

.input-name
{
    font-size: 18px;
    font-weight: bold;
    border: 0;
    margin: 0;
    width: 100%;
}

.input-department
{
    font-size: 18px;
    font-weight: bold;
    border: 0;
    margin: 0;
    width: 100%;   
    text-align: center;
}

.input-detail
{
    border: 0;
    margin: 0;
    width: 100%;   
}

.table-detail
{
    border-collapse: separate;
    border-spacing: 40px 3px;
    margin: 10px;
}

.submit-btn
{
    text-align: center;
    margin-top: 10px;
    
}

.submit-btn input
{
    font-size: large;
    background-color: aquamarine;
    border: 0;
    border-radius: 10px;
    padding: 15px;
}

.submit-btn input:hover
{
    background-color: #4e9cc9;
    cursor: pointer;
}

.table-list
{
width: 100%;
}



.table-list tr td
{
    
    border-collapse: collapse;
    border: #000 solid 1px;
    text-align: center;
    background-color: #ffffffe3;
}

.print-btn
{
    background-color: cadetblue;
    padding: 10px;
    border-radius: 5px;
    color: #fff;
    text-decoration: none;
}




.card-section-print
{
    width :  2.047in;
    height: 3.385in;
    margin: auto;
    background-color: #fff;
    border-radius: 15px;
    border: #000 1px solid;
    padding: 0.1in;
    font-size: 10px;
}

.card-section-print img
{
   max-height: 90px;
}

.card-section-print table
{
    margin: 0;
    border-spacing: 10px 1px;
}

.department-txt
{
    text-align: center;
}


@media print {
    * {
        visibility: hidden;
    }

    .card-section-print * {
        visibility: initial;
    }
}
    </style>

<script src="static/js/QrCode.js" type="application/javascript"></script>

</head>
<body class="print-body">

   
    
<section class="card-section-print">

<div class="logo">
<img src="static/img/logo.png">
</div>

<div class="emp-photo">

Code # : <?=$row["code"]?>
</div>



<div>
<h3>
<?=$row2["name"]?>
</h3>
</div>
<div>
    <table class="table-detail">
       

       

     

        <tr>
            <td>Company</td>

            <td>
            <?=$row2["company"]?>
            </td>
        </tr>

       

        <tr>
            <td>Position</td>

            <td>
            <?=$row2["job_title"]?> 
            </td>
        </tr>

       

   </table>
</div>


<div id="qrcode"></div>
</section>





<script type="text/javascript">
         var qrcode = new QRCode("qrcode",{
            width:  130,
            height: 130,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.L
            
        });
        
        
                   
        qrcode.makeCode("<? $row["code"] ?>");
</script>


</body>
</html>