

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Assignment 4</title>
    <link rel="stylesheet" href="calendar.css">
</head>
<body>

<form method="POST">

    Hours to show: <input type="number" name="hours_to_show" value="12">

    <input type="submit" value="submit" name = "submit">

</form>
current displayed date: <?php echo date("Y/m/d")."<br>"; ?>
current displayed time: <?php echo date("h:i:a")."<br>"; ?>
<table id="event_table">
    <tr>
        <th></th>
        <th>Steve</th>
        <th>Sharon</th>
        <th>Samantha</th>
    </tr>
    <?php
    $num = $_POST['hours_to_show'];
    for ($i = 0; $i < $num; $i++) {
        $hours = date("h") + $i;
        $min = date("i");
        $period = date("a");
        echo "<tr><td><b>".$hours.":"."00".$period."</b></td><td> </td><td> </td><td> </td></tr>";
    }
    ?>
</table>
</body>
</html>
