<?php
require_once "connection.php";
$receptionist_id = $receptionist_name =  $receptionist_salary = "";
$receptionist_id_err = $receptionist_name_err  = $receptionist_salary_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_receptionist_id = trim($_POST["receptionist_id"]);
    if (empty($input_receptionist_id) || $input_receptionist_id == NULL) {
        $receptionist_id_err = "Пожалуйста, введите идентификатор регистратора";
    } else{
        $receptionist_id = $input_receptionist_id;
    }
    $input_receptionist_name = trim($_POST["receptionist_name"]);
    if (empty($input_receptionist_name)) {
        $receptionist_name_err = "Пожалуйста, введите имя регистратора";
    } else{
        $receptionist_name = $input_receptionist_name;
    }

    $input_receptionist_salary = trim($_POST["receptionist_salary"]);
    if (empty($input_receptionist_salary)) {
        $receptionist_salary_err = "Пожалуйста, введите зарплата регистратора";
    } else{
        $receptionist_salary = $input_receptionist_salary;
    }


    if(empty($receptionist_id_err) && empty($receptionist_name_err)  && empty($receptionist_salary_err)){
        $sql = "INSERT INTO receptionists (receptionist_id, receptionist_name, receptionist_position, receptionists_salary	) 
        VALUES ('$receptionist_id', '$receptionist_name',  '$receptionist_salary')";
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
                <h2 class="mt-5">Добавить новый регистратор</h2>
                <p>Пожалуйста, заполните эту форму и отправьте, чтобы добавить запись о грегистраторе в базу данных.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Номер регистратора</label>
                        <input type="text" name="receptionist_id" class="form-control <?php echo (!empty($receptionist_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $receptionist_id; ?>">
                        <span class="invalid-feedback"><?php echo $receptionist_id_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя регистратора</label>
                        <input type="text" name="receptionist_name" class="form-control <?php echo (!empty($receptionist_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $receptionist_name; ?>">
                        <span class="invalid-feedback"><?php echo $receptionist_name_err;?></span>
                    </div>

                    <div class="form-group">
                        <label>Зарплата </label>
                        <input type="text" name="receptionist_salary" class="form-control <?php echo (!empty($receptionist_salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $receptionist_salary; ?>">
                        <span class="invalid-feedback"><?php echo $receptionist_salary_err;?></span>
                    </div>


                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="receptionist.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
