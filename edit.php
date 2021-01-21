<?php
    //get the index from URL
    $index = $_GET['index'];
 
    //get json data
    $data = file_get_contents('members.json');
    $data_array = json_decode($data);
 
    //assign the data to selected index
    $row = $data_array[$index];
 
?>
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
        <td><input type="text" id="id" name="id" value="<?php echo $row->id; ?>"></td>
    </tr>
    <tr>
        <th><label for="firstname">Firstname</label></th>
        <td><input type="text" id="firstname" name="firstname" value="<?php echo $row->firstname; ?>"></td>
    </tr>
    <tr>
        <th><label for="lastname">Lastname</label></th>
        <td><input type="text" id="lastname" name="lastname" value="<?php echo $row->lastname; ?>"></td>
    </tr>
    <tr>
        <th><label for="address">Address</label></th>
        <td><input type="text" id="address" name="address" value="<?php echo $row->address; ?>"></td>
    </tr>
    <tr>
        <th><label for="gender">Gender</label></th>
        <td><input type="text" id="gender" name="gender" value="<?php echo $row->gender; ?>"></td>
    </tr>
    <tr>
        <th><label for="attendance">Attendance</label></th>
        <td><input type="text" id="attendance" name="attendance" value="<?php echo $row->attendance; ?>"></td>
    </tr>
    <tr>
        <th><label for="location">Location</label></th>
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
        <td><input type="text" id="period" name="period" value="<?php echo $row->period; ?>"></td>
    </tr>
    <tr>
        <th><label for="purpose">Purpose</label></th>
        <td><input type="text" id="purpose" name="purpose" value="<?php echo $row->purpose; ?>"></td>
    </tr>
    <tr>
        <th><label for="equipment">Equipments Borrowed</label></th>
        <td><input type="text" id="equipment" name="equipment" value="<?php echo $row->equipment; ?>"></td>
    </tr>
    <input type="submit" name="save" value="Save" class="button1">
</table>
</form>
 
<?php
    if(isset($_POST['save'])){
        //set the updated values
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
            'equipment' => $_POST['equipment']
        );
 
        //update the selected index
        $data_array[$index] = $input;
 
        //encode back to json
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents('members.json', $data);
 
        header('location: index.php');
    }
?>
</body>
</html>