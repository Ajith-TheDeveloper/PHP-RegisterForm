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
$gender = isset($row['gender']) ? $row['gender'] : '';
$subscription = $row['subscription'];
$agree_terms = $row['agree_terms'];
$is_student = $row['is_student'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : ''; 
    $subscription = $_POST['subscription'];
    $agree_terms = isset($_POST['agree_terms']) ? 1 : 0;
    $is_student = $_POST['is_student'];

    $sql = "UPDATE student SET name='$name', address='$address', mobile='$mobile', gender='$gender', subscription='$subscription', agree_terms='$agree_terms', is_student='$is_student' WHERE id='$edit'";

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

                            <div class="form-group">
                                <label>Are you a student?</label><br>
                                <input type="radio" name="is_student" value="Yes" required> Yes
                                <input type="radio" name="is_student" value="No"> No
                            </div>

                            <label>Subscription Plan</label>
            <select name="subscription" class="form-control">
                <option value="Free" <?php if($subscription == 'Free') echo 'selected'; ?>>Free</option>
                <option value="Basic" <?php if($subscription == 'Basic') echo 'selected'; ?>>Basic</option>
                <option value="Premium" <?php if($subscription == 'Premium') echo 'selected'; ?>>Premium</option>
            </select>

            <label>Agree to Terms & Conditions</label>
            <input type="checkbox" name="agree_terms" <?php if ($agree_terms) echo 'checked'; ?>>

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
