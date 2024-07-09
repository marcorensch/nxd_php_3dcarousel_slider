<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crazy 3D Image Slider Carousel</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
<div class="banner">
    <div class="slider counter-clockwise" style="--quantity:6">
        <?php for ($i = 1; $i <= 6; $i++):?>
            <div class="item" style="--position:<?php echo $i;?>">
                <img src="images/example_<?php echo $i;?>.jpg" alt="Example Image <?php echo $i;?>">
            </div>
        <?php endfor; ?>
    </div>
    <div class="content">
        <div class="model">

        </div>
    </div>

</div>
</body>
</html>