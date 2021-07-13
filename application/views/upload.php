<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="<?php echo site_url('exam/upload')?>" method="post" enctype="multipart/form-data">
            Select Image File to Upload:
            <input type="file" name="img" required accept="image/*">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
</body>

</html>