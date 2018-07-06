<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Assignment 4</title>
      <link rel="stylesheet" type="text/css" href="assignment4.css">
      <style>
      <?php
        $bgcolor = $_GET['bgcolor'];
        $fcolor = $_GET['fcolor'];
        $italic = $_GET['italic'];

        //get background color
        function getbgcolor($bg) {
            if ($bg == "blk") {
                return "black";
            } else if ($bg == "wht") {
                return "white";
            } else if ($bg == "yel") {
                return "yellow";
            } else {
                return "";
            }
        }

        //get font color
        function getfcolor($f) {
            if ($f == "blk") {
                return "black";
            } else if ($f == "wht") {
                return "white";
            } else if ($f == "grn") {
                return "green";
            } else {
                return "";
            }
        }

        //get if italic
        function getitalic($i) {
            if ($i) {
                return "italic";
            } else {
                return "";
            }
        }

        echo ".result { background-color:".getbgcolor($bgcolor)."; color:".getfcolor($fcolor)."; font-style:".getitalic($italic)."; }"
      ?>
      </style>
  </head>
  <body>
  <h1>Part 1</h1>
    <form action="index.php">
        <div class="formGroup">
            <label>Select a Background Color:</label>
            <select name="bgcolor">
                <option value="blk">Black</option>
                <option value="wht">White</option>
                <option value="yel">Yellow</option>
            </select>
        </div>
        <div class="formGroup">
            <label> Select a font color:</label>
            <div class="formElements">
                <input type="radio" name="fcolor" value="blk">Black<br>
                <input type="radio" name="fcolor" value="wht">White<br>
                <input type="radio" name="fcolor" value="grn">Green<br>
            </div>
        </div>
        <div class="formGroup">
            <label>Select if Italic:</label>
            <input type="checkbox" name="italic" value="ital">
        </div>
        <div class="formGroup">
            <textarea name="tarea" rows="10" cols="30"></textarea>
        </div>
        <input type="submit" value="submit">
    </form>

    <div class="result">
    <?php
        echo $_GET['tarea'];
    ?>
    </div>
  </body>
</html>