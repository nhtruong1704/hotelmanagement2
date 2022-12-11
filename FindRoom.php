<?php
include 'connection.php';
?>

<table class="table table-striped text-center">
    <t>
        <th scope="col">Номер</th>
        <th scope="col">Имя комнаты</th>
        <th scope="col">Цена</th>
        <th scope="col">Описание</th>
        <th scope="col">Действие</th>
    </t>
    <tbody>
    <?php
    if (isset($_POST['value'])) {
        $input = $_POST['value'];
        $query = "SELECT * FROM `rooms` WHERE room_id LIKE '%$input%' OR room_name LIKE '%$input%' OR room_price LIKE '%$input%'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div>
                <tr>
                    <td><?php echo $row['room_id'] ?></td>
                    <td><?php echo $row['room_name'] ?></td>
                    <td><?php echo $row['room_price'] ?></td>
                    <td><?php echo $row['room_description'] ?></td>
                    <td>
                        <a href="UpdateRoom.php?id=<?php echo $row['room_id'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>

                    </td>
                </tr>
            </div>
            <?php
        }

    }
    ?>
    </tbody>
</table>


