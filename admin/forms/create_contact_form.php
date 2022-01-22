<form action="index.php?message" method="GET">
    <caption>Create new contact</caption>
    <table>
        <tr>
            <td><label>First Name:</label></td>
            <td><input type="text" name="fName" placeholder="john" /></td>
        </tr>
        <tr>
            <td><label>Last Name:</label></td>
            <td><input type="text" name="lName" placeholder="doe" /></td>
        </tr>
        <tr>
            <td><label>Phone No:</label></td>
            <td><input type="text" name="phone_no" placeholder="+94 12345678" /></td>
        </tr>
        <tr>
            <td><label>Title:</label></td>
            <td><input type="text" name="title" placeholder="Business man" /></td>
        </tr>
        <tr>
            <td><label>email:</label></td>
            <td><input type="email" name="email" placeholder="john@gmail.com" /></td>
        </tr>
    </table>
    <input type="submit" value="Save" />
</form>