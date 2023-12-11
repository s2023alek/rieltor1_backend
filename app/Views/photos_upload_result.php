<!DOCTYPE html>
<html>
<head>
    <title>Codeigniter 4 Image upload with preview example - Mywebtuts.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
<div class="container">

    <?php if ($msg) { ?>
        <div class="alert alert-info alert-dismissible">
            <?php echo $msg; ?><br>
            <img src="<?php echo $imagePath;?>" class="" width="200" height="150"/>

            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        </div>
    <?php } ?>

</div>
</body>
<html>
