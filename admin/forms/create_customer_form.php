<form action="customers.php?create_customer" method="GET">
    <caption>Create new customer</caption>
    <table>
        <tr>
            <td><label>Contact:</label></td>
            <td>
                <select name="customer_person">
                    <option selected>None</option>
                    <?php
                        $query = "SELECT * FROM leads";
                        $data = getData($query, $connection);
                        $cnt = count($data);

                        for ($i = 0; $i < $cnt; $i++) {
                            if ($data[$i]['status'] == 1) continue;
                            $query = "SELECT * FROM persons WHERE personID=".$data[$i]['personID']."";
                            $personData = getRawData($query, $connection);
                        ?>
                            <option value="<?php echo $personData['personID']?>"><?php echo $personData['fName'].' '.$personData['lName']; ?></option>
                    <?php
                        }
                ?>
                </select>
            </td>
        </tr>
    </table>
    <input name="create_customer" value="true" hidden />
    <input type="submit" value="Save" />
</form>
