<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUD Operation on JSON File using PHP</title>
    <header>Team 101 Tracking System</header>
    <p id="date"></p>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<script type="text/javascript">
    var d = new Date();
    document.getElementById("date").innerHTML = d;
</script>

<form action="add.php">
    <button class="button" type="submit">Add</button>
</form>
<br>
<table id="d">
    <thead>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Attendance</th>
        <th>Location</th>
        <th>Period</th>
        <th>Purpose on Site</th>
        <th>Lists of equipment borrowed</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
            //fetch data from json
            $data = file_get_contents('members.json');
            //decode into php array
            $data = json_decode($data);
 
            $index = 0;
            foreach($data as $row){
                echo "
                    <tr>
                        <td>".$row->id."</td>
                        <td>".$row->firstname."</td>
                        <td>".$row->lastname."</td>
                        <td>".$row->address."</td>
                        <td>".$row->gender."</td>
                        <td>".$row->attendance."</td>
                        <td>".$row->location."</td>
                        <td>".$row->period."</td>
                        <td>".$row->purpose."</td>
                        <td>".$row->equipment."</td>
                        <td>
                            <a href='edit.php?index=".$index."'>Edit</a> |
                            <a href='delete.php?index=".$index."'>Delete</a>
                        </td>
                    </tr>
                ";
 
                $index++;
            }
            
        ?>
    </tbody>
</table>
</body>
</html>