<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Assignment 3</title>
</head>
<body>
    <?php
        /**
         * Assignment 3 for Web Programming
         * Emrys Scott-Murrell
         * Date: 6/26/18
         */

        // Part 1
        function isBitten() {
            $result = True;
            if (rand(1,2) == 1) {
                $result = False;
            }

            return $result;
        }

        if (isBitten()) {
            echo "Charlie ate my lunch!";
        } else {
            echo "Charlie did not eat my lunch!";
        }
    ?>
</body>
</html>