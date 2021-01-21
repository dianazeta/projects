<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUD Operation on JSON File using PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="index.php">
    <button class="button" type="submit">Back</button>
</form>
<form method="POST">
    <table id="a">
    <tr>
        <th><label for="id">ID</label></th>
        <td><input type="text" id="id" name="id" pattern="^[0-9]{4}" placeholder="enter 4-digit ID number"></td>
    </tr>
    <tr>
        <th><label for="firstname">Firstname</label></th>
        <td><input type="text" id="firstname" name="firstname"></td>
    </tr>
    <tr>
        <th><label for="lastname">Lastname</label></th>
        <td><input type="text" id="lastname" name="lastname"></td>
    </tr>
    <tr>
        <th><label for="address">Address</label></th>
        <td><input type="text" id="address" name="address"></td>
    </tr>
    <tr>
        <th><label for="gender">Gender</label></th>
        <td><input type="text" id="gender" name="gender"></td>
    </tr>
    <tr>
        <th><label for="attendance">Attendance</label></th>
        <td><input type="text" id="attendance" name="attendance"></td>
    </tr>
    <tr>
        <th><label for="location">Location of site</label></th>
        <td><select name="location" id="location">
    <optgroup label="Kuching">
      <option value="Kuching">Kuching</option>
      <option value="Bau">Bau</option>
      <option value="Lundu">Lundu</option>
    </optgroup>
    <optgroup label="Samarahan">
      <option value="Samarahan">Samarahan</option>
      <option value="Asajaya">Asajaya</option>
      <option value="Simunjan">Simunjan</option>
    </optgroup>
  </select></td>
    </tr>
    <tr>
        <th><label for="period">Period</label></th>
        <td><input type="date" id="period" name="period" placeholder="dd-mm-yyyy" value=""></td>
    </tr>
    <tr>
        <th><label for="purpose">Purpose of Onsite</label></th>
        <td><input type="text" id="purpose" name="purpose"></td>
    </tr>
    <tr>
        <th><label for="equipment">Lists of equipment borrowed</label></th>
        <td><input type="text" id="equipment" name="equipment"></td>
    </tr>
    <input type="submit" name="save" value="Save" class="button1">
</table>
</form>

<?php
    if(isset($_POST['save'])){
        //open the json file
        $data = file_get_contents('members.json');
        $data = json_decode($data);
 
        //data in out POST
        $input = array(
            'id' => $_POST['id'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'address' => $_POST['address'],
            'gender' => $_POST['gender'],
            'attendance' => $_POST['attendance'],
            'location' => $_POST['location'],
            'period' => $_POST['period'],
            'purpose' => $_POST['purpose'],
            'equipment' => _POST['equipment']
        );
 
        //append the input to our array
        $data[] = $input;
        //encode back to json
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('members.json', $data);
 
        header('location: index.php');
    }
?>

</body>
</html>