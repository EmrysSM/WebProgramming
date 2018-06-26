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
            echo "Charlie ate my lunch!\n";
        } else {
            echo "Charlie did not eat my lunch!\n";
        }

        // Part 2
        echo "<table>\n";
        for ($i = 0; $i < 7; $i++) {
            echo "<tr>\n";
            for ($j = 0; $j < 7; $j++) {
                if (($i % 2) == 0) {
                    if (($j % 2) == 0) {
                        echo "<td style=\"background-color:red\"></td>\n";
                    } else {
                        echo "<td style=\"background-color:black\"></td>\n";
                    }
                } else {
                    if (($j % 2) == 0) {
                        echo "<td style=\"background-color:black\"></td>\n";
                    } else {
                        echo "<td style=\"background-color:red\"></td>\n";
                    }
                }
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    ?>
</body>
</html>