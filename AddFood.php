<?php
require_once "connection.php";
$fooditem_id = $fooditem_name = $fooditem_price =  $fooditem_description = "";
$fooditem_id_err = $fooditem_name_err = $fooditem_price_err = $fooditem_description_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_fooditem_id = trim($_POST["fooditem_id"]);
    if (empty($input_fooditem_id) || $input_fooditem_id == NULL) {
        $fooditem_id_err = "Пожалуйста, введите идентификатор блюда";
    } else{
        $fooditem_id = $input_fooditem_id;
    }
    $input_fooditem_name = trim($_POST["fooditem_name"]);
    if (empty($input_fooditem_name)) {
        $fooditem_name_err = "Пожалуйста, введите имя блюда";
    } else{
        $fooditem_name = $input_fooditem_name;
    }
    $input_fooditem_price = trim($_POST["fooditem_price"]);
    if (empty($input_fooditem_price)) {
        $fooditem_price_err = "Пожалуйста, введите цена блюда";
    } else{
        $fooditem_price = $input_fooditem_price;
    }

    $input_fooditem_description = trim($_POST["fooditem_description"]);
    if (empty($input_fooditem_description)) {
        $fooditem_description_err = "Пожалуйста, введите описание блюда";
    } else{
        $fooditem_description = $input_fooditem_description;
    }


    if(empty($fooditem_id_err) && empty($fooditem_name_err) && empty($fooditem_price_err) && empty($fooditem_description_err)){
        $sql = "INSERT INTO fooditems (fooditem_id, fooditem_name, fooditem_price, fooditems_description	) 
        VALUES ('$fooditem_id', '$fooditem_name', '$fooditem_price',  '$fooditem_description')";
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
                <h2 class="mt-5">Добавить новый блюдо</h2>
                <p>Пожалуйста, заполните эту форму и отправьте, чтобы добавить запись о блюде в базу данных.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Номер блюда</label>
                        <input type="text" name="fooditem_id" class="form-control <?php echo (!empty($fooditem_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fooditem_id; ?>">
                        <span class="invalid-feedback"><?php echo $fooditem_id_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Имя блюда</label>
                        <input type="text" name="fooditem_name" class="form-control <?php echo (!empty($fooditem_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fooditem_name; ?>">
                        <span class="invalid-feedback"><?php echo $fooditem_name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Цена </label>
                        <input type="text" name="fooditem_price" class="form-control <?php echo (!empty($fooditem_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fooditem_price; ?>">
                        <span class="invalid-feedback"><?php echo $fooditem_price_err;?></span>
                    </div>

                    <div class="form-group">
                        <label>Описание </label>
                        <input type="text" name="fooditem_description" class="form-control <?php echo (!empty($fooditem_description_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fooditem_description; ?>">
                        <span class="invalid-feedback"><?php echo $fooditem_description_err;?></span>
                    </div>


                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="food.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
