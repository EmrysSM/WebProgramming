<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Assignment 3</title>
    <link rel="stylesheet" href="assignment3.css">
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

        echo "<p>";
        if (isBitten()) {
            echo "Charlie ate my lunch!\n";
        } else {
            echo "Charlie did not eat my lunch!\n";
        }
        echo "</p>";

        // Part 2
        echo "<table>\n";
        for ($i = 0; $i < 7; $i++) {
            echo "<tr>\n";
            for ($j = 0; $j < 7; $j++) {
                if (($i % 2) == 0) {
                    if (($j % 2) == 0) {
                        echo "<td class='red'></td>\n";
                    } else {
                        echo "<td class='black'></td>\n";
                    }
                } else {
                    if (($j % 2) == 0) {
                        echo "<td class='black'></td>\n";
                    } else {
                        echo "<td class='red'></td>\n";
                    }
                }
            }
            echo "</tr>\n";
        }
        echo "</table>\n";

        // Part 3.1
        $month = array ('January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December');

        echo "<p>";
        for ($i = 0; $i < sizeof($month); $i++) {
            echo "$month[$i] ";
        }
        echo "</p>";

        // Part 3.2
        echo "<p>";
        sort($month);
        for ($i = 0; $i < sizeof($month); $i++) {
            echo "$month[$i] ";
        }
        echo "</p>";

        // Part 3.3
        $month = array ('January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December');

        echo "<p>";
        foreach ($month as $item) {
            echo "$item ";
        }
        echo "</p>";

        echo "<p>";
        sort($month);
        foreach ($month as $item) {
            echo "$item ";
        }
        echo "</p>";

        // Part 4
        $restaurants = array("Chama Gaucha"=>"40.50", "Aviva by Kameel"=>"15.00",
            "Bone's Restaurant"=>"65.00", "Umi Sushi Buckhead"=>"40.50", "Fandangles"=>"30.00",
            "Capital Grill"=>"60.50", "Canoe"=>"35.50", "One Flew South"=>"21.00",
            "Fox Bros. BBQ"=>"15.00", "South City Kitchen Midtown"=>"29.00");

        echo "<table>\n<tr>\n<th>Restaurant</th>\n<th>Avg. Cost</th>\n</tr>\n";
        foreach ($restaurants as $restaurant => $cost) {
            echo "<tr>\n<td>$restaurant</td>\n<td>$cost</td>\n</tr>\n";
        }
        echo "</table>";

        asort($restaurants);
        echo "<table>\n<tr>\n<th>Restaurant</th>\n<th>Avg. Cost</th>\n</tr>\n";
        foreach ($restaurants as $restaurant => $cost) {
            echo "<tr>\n<td>$restaurant</td>\n<td>$cost</td>\n</tr>\n";
        }
        echo "</table>";

        ksort($restaurants);
        echo "<table>\n<tr>\n<th>Restaurant</th>\n<th>Avg. Cost</th>\n</tr>\n";
        foreach ($restaurants as $restaurant => $cost) {
            echo "<tr>\n<td>$restaurant</td>\n<td>$cost</td>\n</tr>\n";
        }
        echo "</table>";
    ?>
</body>
</html>