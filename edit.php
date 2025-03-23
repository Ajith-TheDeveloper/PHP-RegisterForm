<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "dbcrud");
$edit = $_GET['edit'];

$sql = "SELECT * FROM student WHERE id = '$edit'";
$run = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($run);

$uid = $row['id'];
$name = $row['name'];
$address = $row['address'];
$mobile = $row['mobile'];
$gender = $row['gender'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender']; 

    $sql = "UPDATE student SET name='$name', address='$address', mobile='$mobile', gender='$gender' WHERE id='$edit'";

    if (mysqli_query($connection, $sql)) {
        echo '<script> location.replace("index.php")</script>';
    } else {
        echo "Something Error: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Student</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Gender</label><br>
                                <input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?>> Male
                                <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') echo 'checked'; ?>> Female
                                <input type="radio" name="gender" value="Other" <?php if ($gender == 'Other') echo 'checked'; ?>> Other
                                <input type="radio" name="gender" value="Prefer not to say" <?php if ($gender == 'Prefer not to say') echo 'checked'; ?>> Prefer not to say
                            </div>

                            <br/>
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
