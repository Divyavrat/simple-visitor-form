<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
</head>
<body>
<style>
*{margin:0;padding:0;box-sizing:border-box;}
.parent {
    display: grid;
    place-items: center;
    min-height:100vh;
    background: #222 url('https://images.unsplash.com/photo-1610967874184-40ec45307693?ixid=MXwxMjA3fDB8MHx0b3BpYy1mZWVkfDU0fGFldTZyTC1qNmV3fHxlbnwwfHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2048&q=60') no-repeat center center;
  }
form{
    text-align:center;
    background-color:rgba(0,0,0,0.4);
    border-radius:50px;
    padding:50px;
    display:flex;
    flex-direction:column;
}
.mb{margin-bottom:20px;}
.alert{
    background-color: #007965;
    color:#ffffff;
    padding:30px;
    border-radius:10px;
}
.alert.error{background-color:#ec4646;}
</style>
    <div class="parent">

<?php
error_reporting(0);
$erroralert='<div class="error alert">Some error occured. Contact Us Please.</div>';
if(isset($_POST['studentFormSave']))
{
    $conn = new mysqli('localhost', 'root', '', 'studentform');
    if ($conn != false) {
        $stmt = $conn->prepare("INSERT INTO formentries (rollno, fullname, phone, address) VALUES (?,?,?,?);");
        
        if($stmt){
            $rollno = $_POST['rollno'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            if(strlen($rollno)<=0 && strlen($fullname)<=0 && strlen($phone)<=0 && strlen($address)<=0){
                echo $erroralert;
                die;
            }
            $stmt->bind_param('isss', $rollno,$fullname,$phone,$address);
            $stmt->execute();
            echo('<div class="alert">Your form was saved! Thank You.</div>');
        }
        else echo $erroralert;
    }
    else echo $erroralert;
    mysqli_close($conn);
}
else {
?>
        <form method="post" action="">
            <input type="text" name="rollno" placeholder="Roll No." class="mb" required="required">
            <input type="text" name="fullname" placeholder="Name" class="mb" required="required">
            <input type="text" name="phone" placeholder="Phone" class="mb" required="required">
            <textarea name="address" rows="5" placeholder="Address" required="required"></textarea>
            <button class="button-primary" name="studentFormSave" type="submit">Send</button>
        </form>
<?php } ?>
    </div>
</body>
</html>