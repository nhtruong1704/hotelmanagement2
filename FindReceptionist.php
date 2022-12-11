<?php
include 'connection.php';
?>

<table class="table table-striped text-center">
    <t>
        <th scope="col">Номер регистратора</th>
        <th scope="col">Имя регистратора</th>
        <th scope="col">Зарплата</th>
        <th scope="col">Действие</th>
    </t>
    <tbody>
    <?php
    if (isset($_POST['value'])) {
        $input = $_POST['value'];
        $query = "SELECT * FROM `receptionists` WHERE receptionist_id LIKE '%$input%' OR receptionist_name LIKE '%$input%' OR receptionist_salary LIKE '%$input%'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div>
                <tr>
                    <td><?php echo $row['receptionist_id'] ?></td>
                    <td><?php echo $row['receptionist_name'] ?></td>
                    <td><?php echo $row['receptionist_salary'] ?></td>
                    <td>
                        <a href="UpdateReceptionist.php?id=<?php echo $row['receptionist_id'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>

                    </td>
                </tr>
            </div>
            <?php
        }

    }
    ?>
    </tbody>
</table>


