<?php
    $insert=false;
    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($server,$username,$password);
        
        $name = $_POST['name'];
        $phase = $_POST['phase'];
        $block = $_POST['block'];
        $members = $_POST['members'];
        $years = $_POST['years'];
        $complaintype = $_POST['complaintype'];
        $complaint = $_POST['complaint'];
        $sql= "INSERT INTO `complaint`.`complaint` (`name`, `phase`, `block`, `members`, `years`, 
        `complaintype`, `complaint`) VALUES ('$name', '$phase', '$block', '$members', '$years', 
        '$complaintype', '$complaint');";
        
        if($conn->query($sql)==true){
            $insert=true;
        } else{
            echo "error";
        }
        $conn->close();        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint filling</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id='container'>
        <h2>Complaint filling form<br></h2>
        <h4>For the residents of Sushant Lok</h4>
    </div>
    <form action="main.php" method="POST">
        <input type="text" class="ip" placeholder="Enter your Name" id='name' name="name"><br>
        <span>Phase number: </span><select class='select' id='phase' name="phase">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select><br>
        <span>Block:</span> <select class='select' id='block' name="block">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select><br>
        <input type="number" id='members' class="ip" name="members" placeholder="Number of members in family"><br>
        <input type="number" id='years' class="ip" name="years" placeholder="Years stayed in SL"><br>
        <span>Complaint type:</span> <select class='select' name="complaintype" id="complaintype">
            <option value="electricity">Electricity</option>
            <option value="water">Water</option>
            <option value="pollution">Pollution</option>
            <option value="neighbour">Neighbour</option>
            <option value="construction">Construction</option>
            <option value="other">Other</option>
        </select><br>
        <textarea id='complaint' class="ip" name="complaint" placeholder="Type your complaint in here" cols=30 rows=10></textarea><br>
        <button type="submit" id='submit'>Submit</button>
    </form>
    <?php
        if ($insert==1) {
            echo "<div id='message'>Thanks for submitting, we'll look into it soon.</div>";
        }
    ?>
</body>
</html>