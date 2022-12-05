<?php
require_once "connection.php";
$housekeeping_id = $housekeeping_name =  $housekeeping_salary = "";
$housekeeping_id_err = $housekeeping_name_err  = $housekeeping_salary_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_housekeeping_id = trim($_POST["housekeeping_id"]);
    if (empty($input_housekeeping_id) || $input_housekeeping_id == NULL) {
        $housekeeping_id_err = "Пожалуйста, введите идентификатор горничная";
    } else{
        $housekeeping_id = $input_housekeeping_id;
    }
    $input_housekeeping_name = trim($_POST["housekeeping_name"]);
    if (empty($input_housekeeping_name)) {
        $housekeeping_name_err = "Пожалуйста, введите имя горничная";
    } else{
        $housekeeping_name = $input_housekeeping_name;
    }

    $input_housekeeping_salary = trim($_POST["housekeeping_salary"]);
    if (empty($input_housekeeping_salary)) {
        $housekeeping_salary_err = "Пожалуйста, введите зарплата горничная";
    } else{
        $housekeeping_salary = $input_housekeeping_salary;
    }


    if(empty($housekeeping_id_err) && empty($housekeeping_name_err)  && empty($housekeeping_salary_err)){
        $sql = "INSERT INTO housekeepings (housekeeping_id, housekeeping_name, housekeeping_position, housekeepings_salary	) 
        VALUES ('$housekeeping_id', '$housekeeping_name',  '$housekeeping_salary')";
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
                <h2 class="mt-5">Добавить новый горничная</h2>
                <p>Пожалуйста, заполните эту форму и отправьте, чтобы добавить запись о горничная в базу данных.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Номер горничная</label>
                        <input type="text" name="housekeeping_id" class="form-control <?php echo (!empty($housekeeping_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $housekeeping_id; ?>">
                        <span class="invalid-feedback"><?php echo $housekeeping_id_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя горничная</label>
                        <input type="text" name="housekeeping_name" class="form-control <?php echo (!empty($housekeeping_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $housekeeping_name; ?>">
                        <span class="invalid-feedback"><?php echo $housekeeping_name_err;?></span>
                    </div>

                    <div class="form-group">
                        <label>Зарплата </label>
                        <input type="text" name="housekeeping_salary" class="form-control <?php echo (!empty($housekeeping_salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $housekeeping_salary; ?>">
                        <span class="invalid-feedback"><?php echo $housekeeping_salary_err;?></span>
                    </div>


                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="housekeeping.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
