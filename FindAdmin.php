<?php
include 'connection.php';
?>

<table class="table table-striped text-center">
    <t>
        <th scope="col">Номер администратор</th>
        <th scope="col">Имя администратор</th>
        <th scope="col">Телефон</th>
        <th scope="col">Эл.адрес</th>
        <th scope="col">Password</th>
        <th scope="col">Действие</th>
    </t>
    <tbody>
    <?php
    if (isset($_POST['value'])) {
        $input = $_POST['value'];
        $query = "SELECT * FROM `admins` WHERE admin_id LIKE '%$input%' OR admin_name LIKE '%$input%' OR admin_phone LIKE '%$input%'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div>
                <tr>
                    <td><?php echo $row['admin_id'] ?></td>
                    <td><?php echo $row['admin_name'] ?></td>
                    <td><?php echo $row['admin_phone'] ?></td>
                    <td><?php echo $row['admin_email'] ?></td>
                    <td><?php echo $row['admin_password'] ?></td>
                    <td>
                        <a href="UpdateAdmin.php?id=<?php echo $row['admin_id'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>

                    </td>
                </tr>
            </div>
            <?php
        }

    }
    ?>
    </tbody>
</table>

