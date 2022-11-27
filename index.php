<?php
include_once('connection.php');
$number_per_page = 15;
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
    <title>Simple web for hotel management!</title>
</head>
<body>
<?php include "navigation.html" ?>

<table class="table table-striped text-center">
    <tr>
        <th colspan="10">
            <h2 style="display: inline;">Список клиенты</h2>
            <a href="AddClient.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Добавить новый клиент</a>
        </th>
    </tr>
    <t>
        <th>Номер клиента</th>
        <th>Имя клиента</th>
        <th>Телефон</th>
        <th>Адрес</th>
        <th>Эл.адрес</th>
        <th>VIP</th>
        <th>Password</th>
        <th>Дата рождения</th>
        <th>Пол</th>
        <th>Действие</th>
    </t>
    <?php
    foreach($result as $row)
    {
        ?>
        <tr>
            <td><?php echo $row['номер_клиента'] ?></td>
            <td><?php echo $row['имя_клиента'] ?></td>
            <td><?php echo $row['телефон'] ?></td>
            <td><?php echo $row['адрес'] ?></td>
            <td><?php echo $row['Эл_адрес'] ?></td>
            <td><?php echo $row['VIP'] ?></td>
            <td><?php echo $row['Password'] ?></td>
            <td><?php echo $row['Дата_рождения'] ?></td>
            <td><?php echo $row['Пол'] ?></td>
            <td>
                <a href="UpdateClient.php?id=<?php echo $row['номер_клиент'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                <a href="DeleteClient.php?id=<?php echo $row['номер_клиент'] ?>" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<p class="text-center">
    <?php
    $sql = "select * from customers";
    $result= $mysqli->query($sql);
    $total_records = $result->num_rows;
    $total_pages=ceil($total_records/$number_per_page);
    for($i=1;$i<=$total_pages;$i++)
    {
        echo "<a class='btn btn-primary mr-1' role='button' href='index.php?page=".$i."'>".$i."</a>" ;
    }
    ?>
</p>
</body>
</html>