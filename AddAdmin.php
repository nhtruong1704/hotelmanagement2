<?php
require_once "connection.php";
$admin_id = $admin_name = $admin_phone =  $admin_email = $admin_password = "";
$admin_id_err = $admin_name_err = $admin_phone_err = $admin_email_err = $admin_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_admin_id = trim($_POST["admin_id"]);
    if (empty($input_admin_id) || $input_admin_id == NULL) {
        $admin_id_err = "Пожалуйста, введите идентификатор администратора";
    } else{
        $admin_id = $input_admin_id;
    }
    $input_admin_name = trim($_POST["admin_name"]);
    if (empty($input_admin_name)) {
        $admin_name_err = "Пожалуйста, введите имя администратора";
    } else{
        $admin_name = $input_admin_name;
    }
    $input_admin_phone = trim($_POST["admin_phone"]);
    if (empty($input_admin_phone)) {
        $admin_phone_err = "Пожалуйста, введите номер телефона";
    } else{
        $admin_phone = $input_admin_phone;
    }

    $input_admin_email = trim($_POST["admin_email"]);
    if (empty($input_admin_email)) {
        $admin_email_err = "Пожалуйста, введите Эл почта";
    } else{
        $admin_email = $input_admin_email;
    }

    $input_admin_password = trim($_POST["admin_password"]);
    if (empty($input_admin_password)) {
        $admin_password_err = "Пожалуйста, введите паррол администратора";
    } else{
        $admin_password = $input_admin_password;
    }

    if(empty($admin_id_err) && empty($admin_name_err) && empty($admin_phone_err) && empty($admin_email_err) && empty($admin_password_err)){
        $sql = "INSERT INTO admins (admin_id, admin_name, admin_phone, admins_email, admin_password	) 
        VALUES ('$admin_id', '$admin_name', '$admin_phone',  '$admin_email',  '$admin_password')";
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
                <h2 class="mt-5">Добавить новый администратор</h2>
                <p>Пожалуйста, заполните эту форму и отправьте, чтобы добавить запись о администраторе в базу данных.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Номер администратор</label>
                        <input type="text" name="admin_id" class="form-control <?php echo (!empty($admin_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $admin_id; ?>">
                        <span class="invalid-feedback"><?php echo $admin_id_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя администратора</label>
                        <input type="text" name="admin_name" class="form-control <?php echo (!empty($admin_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $admin_name; ?>">
                        <span class="invalid-feedback"><?php echo $admin_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Номер телефона</label>
                        <input type="text" name="admin_phone" class="form-control <?php echo (!empty($admin_phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $admin_phone; ?>">
                        <span class="invalid-feedback"><?php echo $admin_phone_err;?></span>
                    </div>

                    <div class="form-group">
                        <label>Эл почта</label>
                        <input type="text" name="admin_email" class="form-control <?php echo (!empty($admin_email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $admin_email; ?>">
                        <span class="invalid-feedback"><?php echo $admin_email_err;?></span>
                    </div>

                    <div class="form-group">
                        <label>Паррол администратора</label>
                        <textarea type="text" name="admin_password" class="form-control <?php echo (!empty($admin_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $admin_password; ?>"></textarea>
                        <span class="invalid-feedback"><?php echo $admin_password_err;?></span>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="admin.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
