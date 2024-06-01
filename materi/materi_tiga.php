<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "test 1";
    function showMessage() {
        echo "ini pesan dari showMessage";
        // akan menyebabkan fatal error 
        // karena tidak ada function alert
        // alert("dari javascript)
    }

    showMessage();
    
    echo "test 2";
    echo "test 3";

    echo $a;
    ?>
</body>
</html>