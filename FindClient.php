<?php
include 'connection.php';
?>

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
    <tbody>
    <?php
    if (isset($_POST['value'])) {
        $input = $_POST['value'];
        $query = "SELECT * FROM `customers` WHERE customer_id LIKE '%$input%' OR customer_name LIKE '%$input%' OR customer_phone LIKE '%$input%'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div>
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
            </div>
            <?php
        }

    }
    ?>
    </tbody>
</table>
</body>