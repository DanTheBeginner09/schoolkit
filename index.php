<?php
    if(!isset($_SESSION)){
        session_start();
    }

if (isset($_SESSION['UserLogin'])) {
    if ($_SESSION['Access'] == 'Admin') {
        echo "Welcome Admin " . $_SESSION['UserLogin'];
    } else {
        echo "Welcome " . $_SESSION['UserLogin'];
    }
} else {
    echo "Welcome Guest";
}

include_once("connections/connection.php");

$con = connection();




$sql = "SELECT * FROM student_list ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

//print_r($row);
// do{

//     echo $row['first_name']." ".$row['last_name']; 

// }while($row = $students->fetch_assoc());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>


<a href="logout.php">Logout</a> <br>

<br><br><a href="add.php">Add New</a> <br>
    <form action="result.php"  method="get"> 
    <input type="text" name="search" id="search">
        <button type="submit" >search</button>
        

    </form>

<table>
        
        <thead>
        
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><a href="details.php?ID=<?php echo $row['id'];  ?>">view</a></td>
            <td><?php echo $row ['first_name'];?></td>
            <td><?php echo $row ['last_name']; ?></td>
        </tr>
        <?php }while($row = $students->fetch_assoc())?>
        </tbody>
    </table>
</body>
</html>