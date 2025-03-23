<?php
$connection = mysqli_connect("localhost", "root", "", "dbcrud");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;  // Ensure gender is set
    $agree_terms = isset($_POST['agree_terms']) ? 1 : 0;  // Checkbox (1 if checked, 0 if not)
    $subscription = isset($_POST['subscription']) ? $_POST['subscription'] : "Free";  // Dropdown
    $is_student = isset($_POST['is_student']) ? $_POST['is_student'] : "No";  // Radio button

    // Ensure all values match the columns in the student table
    $sql = "INSERT INTO student (name, address, mobile, gender, agree_terms, subscription, is_student) 
            VALUES ('$name', '$address', '$mobile', '$gender', '$agree_terms', '$subscription', '$is_student')";

    if (mysqli_query($connection, $sql)) {
        echo '<script> location.replace("index.php")</script>';
    } else {
        echo "Something Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Add Student</h1>
                    </div>
                    <div class="card-body">
                        <form action="add.php" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Gender</label><br>
                                <input type="radio" name="gender" value="Male" required> Male
                                <input type="radio" name="gender" value="Female"> Female
                                <input type="radio" name="gender" value="Other"> Other
                                <input type="radio" name="gender" value="Prefer not to say"> Prefer not to say
                            </div>

                            <div class="form-group">
                                <label>Are you a student?</label><br>
                                <input type="radio" name="is_student" value="Yes" required> Yes
                                <input type="radio" name="is_student" value="No"> No
                            </div>

                            <div class="form-group">
                                <label>Subscription Plan</label>
                                <select name="subscription" class="form-control">
                                    <option value="Free">Free</option>
                                    <option value="Basic">Basic</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="agree_terms"> I agree to the Terms & Conditions
                            </div>

                            <br/>
                            <input type="submit" class="btn btn-primary" name="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
