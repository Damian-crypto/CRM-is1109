<form action="deals.php" method="GET">
    <caption>Create new deal</caption>
    <table>
        <tr>
            <td><label>Contact:</label></td>
            <td>
                <select name="deal_person">
                    <option selected>None</option>
                    <?php
                        $query = "SELECT * FROM persons";
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
            <td>Deal Name:</td>
            <td><input type="text" name="dealname" /></td>
        </tr>
        <tr>
            <td>Deal Amount:</td>
            <td><input type="number" name="dealamount" /></td>
        </tr>
        <tr>
            <td>Closing Date:</td>
            <td><input type="date" name="closingdate" /></td>
        </tr>
        <tr>
            <td>Stage(Description):</td>
            <td>
                <textarea name="description"></textarea>
            </td>
        </tr>
        <tr>
            <td>Contact:</td>
            <td>
                
            </td>
        </tr>
    </table>
    <input name="create_lead" value="true" hidden />
    <input type="submit" value="Save" />
</form>
