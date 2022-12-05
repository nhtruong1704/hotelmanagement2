<?php
require_once "connection.php";
$chef_id = $chef_name = $chef_position =  $chef_salary = "";
$chef_id_err = $chef_name_err = $chef_position_err = $chef_salary_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_chef_id = trim($_POST["chef_id"]);
    if (empty($input_chef_id) || $input_chef_id == NULL) {
        $chef_id_err = "Пожалуйста, введите идентификатор повара";
    } else{
        $chef_id = $input_chef_id;
    }
    $input_chef_name = trim($_POST["chef_name"]);
    if (empty($input_chef_name)) {
        $chef_name_err = "Пожалуйста, введите имя повара";
    } else{
        $chef_name = $input_chef_name;
    }
    $input_chef_position = trim($_POST["chef_position"]);
    if (empty($input_chef_position)) {
        $chef_position_err = "Пожалуйста, введите положение повара";
    } else{
        $chef_position = $input_chef_position;
    }

    $input_chef_salary = trim($_POST["chef_salary"]);
    if (empty($input_chef_salary)) {
        $chef_salary_err = "Пожалуйста, введите зарплата повара";
    } else{
        $chef_salary = $input_chef_salary;
    }


    if(empty($chef_id_err) && empty($chef_name_err) && empty($chef_position_err) && empty($chef_salary_err)){
        $sql = "INSERT INTO chefs (chef_id, chef_name, chef_position, chefs_salary	) 
        VALUES ('$chef_id', '$chef_name', '$chef_position',  '$chef_salary')";
        if (mysqli_query($mysqli, $sql)) {
            header("location: index.php");
            exit();
        } else {
            header("location: error.php");
            exit();
        }
        mysqli_close($mysqli);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Добавить новый повар</h2>
                <p>Пожалуйста, заполните эту форму и отправьте, чтобы добавить запись о поваре в базу данных.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Номер повара</label>
                        <input type="text" name="chef_id" class="form-control <?php echo (!empty($chef_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $chef_id; ?>">
                        <span class="invalid-feedback"><?php echo $chef_id_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя повара</label>
                        <input type="text" name="chef_name" class="form-control <?php echo (!empty($chef_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $chef_name; ?>">
                        <span class="invalid-feedback"><?php echo $chef_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Положение повара</label>
                        <input type="text" name="chef_position" class="form-control <?php echo (!empty($chef_position_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $chef_position; ?>">
                        <span class="invalid-feedback"><?php echo $chef_position_err;?></span>
                    </div>

                    <div class="form-group">
                        <label>Зарплата повара</label>
                        <input type="text" name="chef_salary" class="form-control <?php echo (!empty($chef_salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $chef_salary; ?>">
                        <span class="invalid-feedback"><?php echo $chef_salary_err;?></span>
                    </div>


                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="chef.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
