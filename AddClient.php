<?php
require_once "connection.php";
$customer_id = $customer_name = $customer_phone = $customer_address = $customer_email = $customer_vip = $customer_password = $customer_birthday = $customer_gender = "";
$customer_id_err = $customer_name_err = $customer_phone_err = $customer_address_err = $customer_email_err = $customer_vip_err = $customer_password_err = $customer_birthday_err = $customer_gender_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_customer_id = trim($_POST["customer_id"]);
    if (empty($input_customer_id) || $input_customer_id == NULL) {
        $customer_id_err = "Пожалуйста, введите идентификатор клиента";
    } else{
        $customer_id = $input_customer_id;
    }
    $input_customer_name = trim($_POST["customer_name"]);
    if (empty($input_customer_name)) {
        $customer_name_err = "Пожалуйста, введите имя клиента";
    } else{
        $customer_name = $input_customer_name;
    }
    $input_customer_phone = trim($_POST["customer_phone"]);
    if (empty($input_customer_phone)) {
        $customer_phone_err = "Пожалуйста, введите номер телефона";
    } else{
        $customer_phone = $input_customer_phone;
    }
    $input_customer_address = trim($_POST["customer_address"]);
    if (empty($input_customer_address)) {
        $customer_address_err = "Пожалуйста, введите адрес клиента";
    } else{
        $customer_address = $input_customer_address;
    }
    $input_customer_email = trim($_POST["customer_email"]);
    if (empty($input_customer_email)) {
        $customer_email_err = "Пожалуйста, введите Эл почта";
    } else{
        $customer_email = $input_customer_email;
    }
    $input_customer_vip = trim($_POST["customer_vip"]);
    if (empty($input_customer_vip)) {
        $customer_vip_err = "Пожалуйста, введите vip или нет";
    } else{
        $customer_vip = $input_customer_vip;
    }
    $input_customer_password = trim($_POST["customer_password"]);
    if (empty($input_customer_password)) {
        $customer_password_err = "Пожалуйста, введите паррол клиента";
    } else{
        $customer_password = $input_customer_password;
    }
    $input_customer_birthday = trim($_POST["customer_birthday"]);
    if (empty($input_customer_birthday)) {
        $customer_birthday_err = "Пожалуйста, введите дата рождения";
    } else{
        $customer_birthday = $input_customer_birthday;
    }
    $input_customer_gender = trim($_POST["customer_gender"]);
    if (empty($input_customer_gender)) {
        $customer_gender_err = "Пожалуйста, введите пол клиента";
    } else{
        $customer_gender = $input_customer_gender;
    }
    if(empty($customer_id_err) && empty($customer_name_err) && empty($customer_phone_err) && empty($customer_address_err)&& empty($customer_email_err)&& empty($customer_vip_err)&& empty($customer_password_err)&& empty($customer_birthday_err)&& empty($customer_gender_err)){
        $sql = "INSERT INTO customers (customer_id, customer_name, customer_phone, customer_address, customer_email, customer_vip, customer_password	, customer_birthday, customer_gender) 
        VALUES ('$customer_id', '$customer_name', '$customer_phone', '$customer_address', '$customer_email', '$customer_vip', '$customer_password', '$customer_birthday', '$customer_gender')";
        if (mysqli_query($mysqli, $sql)) {
            header("location: index.php");
            exit();
        } else {
            header("location: ErrorClient.php");
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
                        <input type="text" name="customer_id" class="form-control <?php echo (!empty($customer_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_id; ?>">
                        <span class="invalid-feedback"><?php echo $customer_id_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя клиента</label>
                        <input type="text" name="customer_name" class="form-control <?php echo (!empty($customer_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_name; ?>">
                        <span class="invalid-feedback"><?php echo $customer_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Номер телефона</label>
                        <input type="text" name="customer_phone" class="form-control <?php echo (!empty($customer_phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_phone; ?>">
                        <span class="invalid-feedback"><?php echo $customer_phone_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Адрес клиента</label>
                        <input type="text" name="customer_address" class="form-control <?php echo (!empty($customer_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_address; ?>">
                        <span class="invalid-feedback"><?php echo $customer_address_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Эл почта</label>
                        <input type="text" name="customer_email" class="form-control <?php echo (!empty($customer_email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_email; ?>">
                        <span class="invalid-feedback"><?php echo $customer_email_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>VIP</label>
                        <input type="text" name="customer_vip" class="form-control <?php echo (!empty($customer_vip_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_vip; ?>"></input>
                        <span class="invalid-feedback"><?php echo $customer_vip_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Паррол клиента</label>
                        <input type="text" name="customer_password" class="form-control <?php echo (!empty($customer_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_password; ?>"></input>
                        <span class="invalid-feedback"><?php echo $customer_password_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Дата рождения</label>
                        <input type="text" name="customer_birthday" class="form-control <?php echo (!empty($customer_birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_birthday; ?>">
                        <span class="invalid-feedback"><?php echo $customer_birthday_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Пол клиента</label>
                        <input type="text" name="customer_gender" class="form-control <?php echo (!empty($customer_gender_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_gender; ?>">
                        <span class="invalid-feedback"><?php echo $customer_gender_err;?></span>
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
