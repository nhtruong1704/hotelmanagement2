<?php
require_once "connection.php";
$room_id = $room_name = $room_price =  $room_description = "";
$room_id_err = $room_name_err = $room_price_err = $room_description_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_room_id = trim($_POST["room_id"]);
    if (empty($input_room_id) || $input_room_id == NULL) {
        $room_id_err = "Пожалуйста, введите идентификатор комнаты";
    } else{
        $room_id = $input_room_id;
    }
    $input_room_name = trim($_POST["room_name"]);
    if (empty($input_room_name)) {
        $room_name_err = "Пожалуйста, введите имя комнаты";
    } else{
        $room_name = $input_room_name;
    }
    $input_room_price = trim($_POST["room_price"]);
    if (empty($input_room_price)) {
        $room_price_err = "Пожалуйста, введите цена ";
    } else{
        $room_price = $input_room_price;
    }

    $input_room_description = trim($_POST["room_description"]);
    if (empty($input_room_description)) {
        $room_description_err = "Пожалуйста, введите описание ";
    } else{
        $room_description = $input_room_description;
    }


    if(empty($room_id_err) && empty($room_name_err) && empty($room_price_err) && empty($room_description_err)){
        $sql = "INSERT INTO rooms (room_id, room_name, room_price, rooms_description	) 
        VALUES ('$room_id', '$room_name', '$room_price',  '$room_description')";
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
                <h2 class="mt-5">Добавить новый номер</h2>
                <p>Пожалуйста, заполните эту форму и отправьте, чтобы добавить запись о номере в базу данных.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Номер комната</label>
                        <input type="text" name="room_id" class="form-control <?php echo (!empty($room_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $room_id; ?>">
                        <span class="invalid-feedback"><?php echo $room_id_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя комната</label>
                        <input type="text" name="room_name" class="form-control <?php echo (!empty($room_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $room_name; ?>">
                        <span class="invalid-feedback"><?php echo $room_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Цена </label>
                        <input type="text" name="room_price" class="form-control <?php echo (!empty($room_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $room_price; ?>">
                        <span class="invalid-feedback"><?php echo $room_price_err;?></span>
                    </div>

                    <div class="form-group">
                        <label>Описание </label>
                        <input type="text" name="room_description" class="form-control <?php echo (!empty($room_description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $room_description; ?>">
                        <span class="invalid-feedback"><?php echo $room_description_err;?></span>
                    </div>


                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="room.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
