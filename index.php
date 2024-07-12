<?php

$extensionID = 21;
$useDialog = false;
$autoRunDirection = ""; // counter-clockwise | clockwise | ""
$showControls = $autoRunDirection === '';
$sliderElWidth = "250px";
$previewRatio = "16:14";
$rotationX = -20;
$perspective = 1000;
$itemsCount = 8;
$filenamePrefix = "example_";

$previewRatioW = intval(explode(':', $previewRatio)[0]);
$previewRatioH = intval(explode(':', $previewRatio)[1]);
$paddingPercent = 100 / $previewRatioW * $previewRatioH;

$cssVars = <<<CSS
        #module_{$extensionID} {
                --sliderElWidth: 10vw; /* 200px    */
                --sliderElHeight: 250px; /* 250px    */
                --sliderElHPaddingPrecent: {$paddingPercent}%; /* 100% */
                --sliderTopMargin: 20%;
                --rotateX: {$rotationX}deg; /* -10deg   */
                --perspective: {$perspective}px; /* 1000px   */
                --radius: 30vw; /* 550px    */
                --duration: 20s; /* 20s      */
                --modalBackgroundColor: rgba(12, 12, 12, 1);
                --modalTextColor: #d6d6d6;
                --modalBorderRadius: .6rem;
                --previewBorderRadius: .2rem;
        }
CSS;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crazy 3D Image Slider Carousel</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css?v=1.0.13">
    <style>
        <?php echo $cssVars;?>
    </style>
    <script type="module">
        import {NxdSlider3D} from "./assets/js/nxd-slider-3d.js?v=1.0.4";

        document.addEventListener("DOMContentLoaded", () => {
            const nxd3DSlider = new NxdSlider3D("#module_<?php echo $extensionID; ?>");
            nxd3DSlider.setRotationX(<?php echo $rotationX;?>);
            nxd3DSlider.setPerspective(<?php echo $perspective;?>);
            const autoRunDirection = "<?php echo $autoRunDirection; ?>";
            const showControls = <?php echo $showControls;?>;
            if (!autoRunDirection.trim() && showControls) {
                nxd3DSlider.addControllerEventListeners();
            }
        });
    </script>
</head>
<body>
<div class="nxd-slider-container">
    <div id="module_<?php echo $extensionID; ?>">
        <div class="banner">
            <div class="slider-container">
                <div class="slider <?php echo $autoRunDirection; ?>" style="--quantity:<?php echo $itemsCount;?>">
                    <?php for ($i = 1; $i <= $itemsCount; $i++): ?>
                        <div class="item" style="--position:<?php echo $i; ?>"
                             data-image="images/example_<?php echo $i; ?>.jpg">
                            <img src="images/<?php echo $filenamePrefix . $i; ?>.jpg" alt="Example Image <?php echo $i; ?>">
                            <?php if($useDialog):?>
                            <dialog>
                                <div class="lightbox-close">
                                    <div>&#x2715;</div>
                                </div>
                                <img src="images/example_<?php echo $i; ?>.jpg" alt="Example Image <?php echo $i; ?>">
                                <div class="lightbox-content">
                                    <h3>Image in Dialog</h3>
                                    <div class="lightbox-text">a little bit of text inside the modal for my fellow
                                        friends
                                    </div>
                                </div>
                            </dialog>
                            <?php endif;?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="content">
                <div class="model"></div>
                <div class="model-text">
                    <h1>NXD CRAZY 3D SLIDER</h1>
                    <p class="credits">Credits: Original Code by Lun Dev: <a href="https://www.youtube.com/watch?v=yqaLSlPOUxM" target="_blank">Link</a>.
                        <br>Images by <a href="https://unsplash.com" target="_blank">unsplash.com</a></p>
                </div>
            </div>
            <?php if ($showControls): ?>
                <div class="controls-container">
                    <div class="prev-container" data-click="prev">
                        &lsaquo;
                    </div>
                    <div class="next-container" data-click="next">
                        &rsaquo;
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div style="height: 100vh; background: black;">
    Next Container
</div>
</body>
</html>