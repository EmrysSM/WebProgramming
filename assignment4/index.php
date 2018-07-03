<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Assignment 4</title>
      <link rel="stylesheet" type="text/css" href="assignment4.css">
  </head>
  <body>
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
            <textarea name="tarea" rows="10" cols="30">Enter the text for the page</textarea>
        </div>
        <input type="submit" value="submit">
    </form>
    <?php

    ?>
  </body>
</html>