Scale images in php
===================

A demo for a quick, get-the-job-done drop-in dynamic php image scaler
to generate jpg thumbnails in realtime.

## Dependencies
PHP (tested on 7.4)
GD2 (`yum install php-gd` or `sudo apt-get install php7.0-gd` or similar)

## Get started
Download the project (via Zip or Git download)

in a terminal:
`cd` into the project root

Run
```bash
php -S localhost:8000
```

visit http://localhost:8000/thumbnail.php?file=IMG_9326_Samuel_Pearce.jpg

You will see a photo, which loaded fast, but is only ~600kB rather than the original 5.8MB.
The url can be treated like any image file, so the thumbnail is invisible to the application.

e.g.
```html
  <a target="_blank" href="/path/to/original.jpg">
    <img src="/thumbnail.php?file=IMG_9326_Samuel_Pearce.jpg">
  </a>
```
This HTML will display the smaller thumbnail version of the file.

Please don't use this file directly in production. The input is not validated or safe to use.
I'd suggest the input is some kind of database id with a safe lookup to the image filename

## License
Code: MIT, unless otherwise stated
Photos: CC-BY 4.0 (Author: Samuel Pearce)
