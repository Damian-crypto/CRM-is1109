<form action="leads.php" method="GET">
    <caption>Create new lead</caption>
    <table>
        <tr>
            <td><label>Contact:</label></td>
            <td>
                <select name="lead_person">
                    <option selected>None</option>
                    <?php
                        $query = "SELECT * FROM persons WHERE personID NOT IN (SELECT personID FROM leads)";
                        $data = getData($query, $connection);
                        $cnt = count($data);

                        for ($i = 0; $i < $cnt; $i++) {
                            ?>
                            <option value="<?php echo $data[$i]['personID']?>"><?php echo $data[$i]['fName'].' '.$data[$i]['lName']; ?></option>
                    <?php
                        }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Lead Source:</td>
            <td>
                <input type="text"  placeholder="YouTube, Facebook, etc..." />
            </td>
        </tr>
    </table>
    <input name="create_lead" value="true" hidden />
    <input type="submit" value="Save" />
</form>
