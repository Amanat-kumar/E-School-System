<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_school_system";
session_start();

echo('<form method="post">
<input type="submit" value="DashBoard" name="dashboard">
</form>');

if(isset($_POST['dashboard'])){
    if($_SESSION['user_type'] == "admin"){
        header( 'Location: http://localhost/e-school%20system/Admin/HomeIndexAdmin.php' ) ;
    }
else if($_SESSION['user_type'] == "student"){
        header( 'Location: http://localhost/e-school%20system/Student/HomeIndexStudent.php' ) ;
    }
else if($_SESSION['user_type'] == "teacher"){
        header( 'Location: http://localhost/e-school%20system/Parent/HomeIndexParent.php' ) ;
    }
else if($_SESSION['user_type'] == "teacher"){
        header( 'Location: http://localhost/e-school%20system/teacher/HomeIndexteacher.php' ) ;
    }
    else if($_SESSION['user_type'] == "library"){
        header( 'Location: http://localhost/e-school%20system/Library/HomeIndexLibraryAdmin.php' ) ;
    }
else{
        header( 'Location: http://localhost/e-school%20system/' ) ;
    }
}


// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if notice ID is provided
if (isset($_GET['id'])) {
    $notice_id = $_GET['id'];

    // Retrieve notice details from the database
    $sql = "SELECT * FROM notices WHERE id = $notice_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];

        // Process notice deletion
        if (isset($_POST['delete'])) {
            $deleteSql = "DELETE FROM notices WHERE id = $notice_id";
            if ($conn->query($deleteSql) === TRUE) {
                echo '<p style="color:Green;">Notice deleted successfully.</p>';
                header( 'Location: index.php' );
                exit;
            } else {
                echo "Error deleting notice: " . $conn->error;
            }
        }
    } else {
        echo "Notice not found.";
        exit;
    }
} else {
    echo "Invalid notice ID.";
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Notice</title>

</head>
<body style="background-image: linear-gradient(90deg , beige, #3e423b  );">
    <h2>Delete Notice</h2>
    <p>Are you sure you want to delete the following notice?</p>
    <h3><?php echo $title; ?></h3>
    <p><?php echo $content; ?></p>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $notice_id; ?>">
        <input type="submit" name="delete" value="Delete Notice">
    </form>
</body>
</html>