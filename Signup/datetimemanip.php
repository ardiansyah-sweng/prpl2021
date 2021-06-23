<html>
<html lang="en">
<link rel="stylesheet" type="signup1/php" href="signup1.php">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Primer - Date Time Manipulation</title>
</head>
<body>
    <table boder="1">
    <tr>
    <td>Date Time Manipulation</td>
    </tr>
    </table>
    <?php
        $datenow = getdate();
        echo "Today's Date : <br/>";
        echo $datenow['mday'] . '<br/>';
        echo $datenow['mon'] . '<br/>';
        echo $datenow['year'] . '<br/>';

        echo "Today's Date : ", $datenow['mday'] . '/' . $datenow['mon'] . '/' . $datenow['year'] . '<br/>';

        echo time() . '<br/>';

        print date("m/d/y G.i:s<br>",time()) . '<br/>';
        print "Today is ";
        print date("j of F Y, \a\\t g.i a", time());
    ?>
    </table>
</body>
</html>