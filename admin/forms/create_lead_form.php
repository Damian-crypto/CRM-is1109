<form action="leads.php?create_lead" method="GET">
    <caption>Create new lead</caption>
    <table>
        <tr>
            <td><label>Contact:</label></td>
            <td>
                <select name="personID">
                    <option selected>None</option>
                    <?php
                        $query = "SELECT * FROM person";
                        $data = getData($query, $connection);
                        $cnt = count($data);

                        for ($i = 0; $i < $cnt; $i++) { ?>
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
                <input type="text" name="leadSource" placeholder="by email, ..." />
            </td>
        </tr>
    </table>
    <input name="create_contact" value="true" hidden />
    <input type="submit" value="Save" />
</form>
