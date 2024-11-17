<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>test</h1>

    <?php
    $id = 12345;
    ?>

    <h1><?= $id; ?></h1>
    <a href="{{url('/test2/'. $id)}}">click here</a>
</body>
</html>
