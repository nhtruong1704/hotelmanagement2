<?php
require_once "connection.php";
$client_id = $client_name = $client_phone = $client_address = $client_email = $client_vip = $client_password = $client_birthday = $client_gender = "";
$client_id_err = $client_name_err = $client_phone_err = $client_address_err = $client_email_err = $client_vip_err = $client_password_err = $client_birthday_err = $client_gender_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_client_id = trim($_POST["client_id"]);
    if (empty($input_client_id) || $input_client_id == NULL) {
        $client_id_err = "Пожалуйста, введите идентификатор клиента";
    } else{
        $client_id = $input_client_id;
    }
    $input_client_name = trim($_POST["client_name"]);
    if (empty($input_client_name)) {
        $client_name_err = "Пожалуйста, введите имя клиента";
    } else{
        $client_name = $input_client_name;
    }
    $input_client_phone = trim($_POST["client_phone"]);
    if (empty($input_client_phone)) {
        $client_phone_err = "Пожалуйста, введите номер телефона";
    } else{
        $client_phone = $input_client_phone;
    }
    $input_client_address = trim($_POST["client_address"]);
    if (empty($input_client_address)) {
        $client_address_err = "Пожалуйста, введите адрес клиента";
    } else{
        $client_address = $input_client_address;
    }
    $input_client_email = trim($_POST["client_email"]);
    if (empty($input_client_email)) {
        $client_email_err = "Пожалуйста, введите Эл почта";
    } else{
        $client_email = $input_client_email;
    }
    $input_client_vip = trim($_POST["client_vip"]);
    if (empty($input_client_vip)) {
        $client_vip_err = "Пожалуйста, введите vip или нет";
    } else{
        $client_vip = $input_client_vip;
    }
    $input_client_password = trim($_POST["client_password"]);
    if (empty($input_client_password)) {
        $client_password_err = "Пожалуйста, введите паррол клиента";
    } else{
        $client_password = $input_client_password;
    }
    $input_client_birthday = trim($_POST["client_birthday"]);
    if (empty($input_client_birthday)) {
        $client_birthday_err = "Пожалуйста, введите дата рождения";
    } else{
        $client_birthday = $input_client_birthday;
    }
    $input_client_gender = trim($_POST["client_gender"]);
    if (empty($input_client_gender)) {
        $client_gender_err = "Пожалуйста, введите пол клиента";
    } else{
        $client_gender = $input_client_gender;
    }
    if(empty($client_id_err) && empty($client_name_err) && empty($client_phone_err) && empty($client_address_err)&& empty($client_email_err)&& empty($client_vip_err)&& empty($client_password_err)&& empty($client_birthday_err)&& empty($client_gender_err)){
        $sql = "INSERT INTO customers (customer_id, customer_name, customer_phone, customer_address, customers_email, customer_vip, customer_password	, customer_birthday, customer_gender) 
        VALUES ('$client_id', '$client_name', '$client_phone', '$client_address', '$client_email', '$client_vip', '$client_password', '$client_birthday', '$client_gender')";
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
                <h2 class="mt-5">Добавить новый клиент</h2>
                <p>Пожалуйста, заполните эту форму и отправьте, чтобы добавить запись о клиенте в базу данных.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Номер клиент</label>
                        <input type="text" name="client_id" class="form-control <?php echo (!empty($client_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_id; ?>">
                        <span class="invalid-feedback"><?php echo $client_id_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя клиента</label>
                        <input type="text" name="client_name" class="form-control <?php echo (!empty($client_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_name; ?>">
                        <span class="invalid-feedback"><?php echo $client_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Номер телефона</label>
                        <input type="text" name="client_phone" class="form-control <?php echo (!empty($client_phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_phone; ?>">
                        <span class="invalid-feedback"><?php echo $client_phone_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Адрес клиента</label>
                        <input type="text" name="client_address" class="form-control <?php echo (!empty($client_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_address; ?>">
                        <span class="invalid-feedback"><?php echo $client_address_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Эл почта</label>
                        <input type="text" name="client_email" class="form-control <?php echo (!empty($client_email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_email; ?>">
                        <span class="invalid-feedback"><?php echo $client_email_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>VIP</label>
                        <textarea type="text" name="client_vip" class="form-control <?php echo (!empty($client_vip_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_vip; ?>"></textarea>
                        <span class="invalid-feedback"><?php echo $client_vip_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Паррол клиента</label>
                        <textarea type="text" name="client_password" class="form-control <?php echo (!empty($client_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_password; ?>"></textarea>
                        <span class="invalid-feedback"><?php echo $client_password_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Дата рождения</label>
                        <input type="text" name="client_birthday" class="form-control <?php echo (!empty($client_birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_birthday; ?>">
                        <span class="invalid-feedback"><?php echo $client_birthday_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Пол клиента</label>
                        <input type="text" name="client_gender" class="form-control <?php echo (!empty($client_gender_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $client_gender; ?>">
                        <span class="invalid-feedback"><?php echo $client_gender_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
