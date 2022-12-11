<?php
include_once('connection.php');
$number_per_page = 4;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $number_per_page;
$sql = "SELECT * FROM customers limit $start_from, $number_per_page";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Simple web for hotel management!</title>
</head>
<body>
<?php include "navigation.html" ?>


<div class="form-inline">
    <hr>
    <form method="POST">
        <input tupe="text" id="search" placeholder="Search...">
    </form>
</div>

<div id="getdata">
    <table class="table table-striped text-center">
        <tr>
            <th colspan="10">
                <h2 style="display: inline;">Список клиенты</h2>
                <a href="AddClient.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Добавить новый клиент</a>
            </th>
        </tr>

        <table class="table table-striped text-center">
            <t>
                <th scope="col">Номер клиента</th>
                <th scope="col">Имя клиента</th>
                <th scope="col">Телефон</th>
                <th scope="col">Адрес</th>
                <th scope="col">Эл.адрес</th>
                <th scope="col">VIP</th>
                <th scope="col">Password</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Пол</th>
                <th scope="col">Действие</th>
            </t>
            <?php while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['customer_id'] ?></td>
                    <td><?php echo $row['customer_name'] ?></td>
                    <td><?php echo $row['customer_phone'] ?></td>
                    <td><?php echo $row['customer_address'] ?></td>
                    <td><?php echo $row['customer_email'] ?></td>
                    <td><?php echo ($row['customer_vip'] == "1") ? "Yes" : "No"; ?></td>
                    <td><?php echo $row['customer_password'] ?></td>
                    <td><?php echo $row['customer_birthday'] ?></td>
                    <td><?php echo ($row['customer_gender'] == "1") ? "Female" : "Male"; ?></td>
                    <td>
                        <a href="UpdateClient.php?id=<?php echo $row['customer_id'] ?>" class="mr-3"
                           title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                        <a href="DeleteClient.php?id=<?php echo $row['customer_id'] ?>" title="Delete Record"
                           data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            <?php }
            ?>
        </table>

    </table>
</div>

<div id="showdata"></div>


<p class="text-center">
    <?php
    $sql = "select * from customers";
    $result = $mysqli->query($sql);
    $total_records = $result->num_rows;
    $total_pages = ceil($total_records / $number_per_page);
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a class='btn btn-primary mr-1' role='button' href='index.php?page=" . $i . "'>" . $i . "</a>";
    }
    ?>
</p>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        $("#search").keyup(function () {
            var value = $(this).val();
            if (value != "") {
                $.ajax({
                    url: 'FindClient.php',
                    method: 'POST',
                    data: {value: value},
                    success: function (data) {
                        $("#showdata").html(data);
                        $("#showdata").show();
                        $("#getdata").hide();

                    }
                });
            } else {
                $("#showdata").hide();
                $("#getdata").show();
            }
        });
    });
</script>
