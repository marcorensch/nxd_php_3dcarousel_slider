# NXD PHP Carousel Slider
A 3D carousel slider for image without Javascript based on the Youtube Video from Lun Dev:
https://www.youtube.com/watch?v=yqaLSlPOUxM

Credits goes to Lun Dev for this amazing idea

## Additional Features
- Fully Responsive
- Optional Dialog on Item Click implemented

Preview:
<img src="/images/preview.jpg">

## Usage
You can define different Variables directly in PHP to style the slider / carousel:
- $autoRunDirection
  - Define the autoRun Option set "clockwise", "counter-clockwise" or leave empty to disable autoRun
- $showControls
  - true or false - leave like this to enable automatically if you set autoRunDirection
- $sliderElWidth
  - Width of the slider elements in pixels
- $previewRatio
  - Ratio (Wdith:Height) for the slider elements (responsive height)
- $rotationX
  - X-Rotation of the Carousel in degrees (only integer value here without "deg")
- $perspective
  - Perspective for the 3D Room in Pixels (only integer value here without "px")
- $filenamePrefix
  - The filename for the item images inside the images folder (default for demo: "example_")
- $itemsCount
  - Count of elements (make sure to check for image file names by default the carousel uses $filenamePrefix + 1,2,3,...)


### Changing count of elements
The carousel calculates the item positions based on the count of elements