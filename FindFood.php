<?php
include 'connection.php';
?>

<table class="table table-striped text-center">
    <t>
        <th scope="col">Номер блюда</th>
        <th scope="col">Имя блюда</th>
        <th scope="col">Цена</th>
        <th scope="col">Описание</th>
        <th scope="col">Действие</th>
    </t>
    <tbody>
    <?php
    if (isset($_POST['value'])) {
        $input = $_POST['value'];
        $query = "SELECT * FROM `fooditems` WHERE fooditem_id LIKE '%$input%' OR fooditem_name LIKE '%$input%' OR fooditem_price LIKE '%$input%'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div>
                <tr>
                    <td><?php echo $row['fooditem_id'] ?></td>
                    <td><?php echo $row['fooditem_name'] ?></td>
                    <td><?php echo $row['fooditem_price'] ?></td>
                    <td><?php echo $row['fooditem_description'] ?></td>
                    <td>
                        <a href="UpdateFood.php?id=<?php echo $row['fooditem_id'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>

                    </td>
                </tr>
            </div>
            <?php
        }

    }
    ?>
    </tbody>
</table>


