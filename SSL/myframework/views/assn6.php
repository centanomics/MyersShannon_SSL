<h6 class="mt-5">&nbsp;</h6>
<!-- <h1 class="mt-5">Hello</h1> -->
<div class="container">

<form action="/assn6/contactRecv" method="POST">
    <div class="form-group">
        <?
            if(@$_SESSION['loggedin'] == 0) {echo '<small id="emailHelp" class="text-warning">Login Failed</small><br>';}
        ?>
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
<?

function create_image($cap)
{
    // echo $cap;
    // $path = getcwd().'/views/assets/image1.png';
    // unlink($path);
    @unlink('./assets/image1');
    global $image;

    $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");
    $background_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 255, 255);
    $line_color = imagecolorallocate($image, 64, 64, 64);
    $pixel_color = imagecolorallocate($image, 0, 0, 255);

    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

    for ($i = 0; $i < 3; $i++) {
        imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
    }

    for ($i = 0; $i < 1000; $i++) {
        imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
    }

    $text_color = imagecolorallocate($image, 0, 0, 0);
    ImageString($image, 22, 30, 22, $cap, $text_color);

    // /************************************/

    // Create your session variable that carries the data, you will check against this in your controller.

    $_SESSION['captchas'] = $cap;

    // Something like $_SESSION[..]=....;

    // /*************************************/

    // imagepng($image, $path);
    imagepng($image, './assets/image1.png');

}

// $path = getcwd().'/views/assets/image1.png';

create_image($data["cap"]);
// echo "<img src='".$path."'>";
echo "<img src='/assets/image1.png'>";

?>
    <div class="form-group">
        <label for="captcha">Enter Captcha </label>
        <input name="captcha" type="captcha" id="captcha" placeholder="">
    </div>
    <button type="submit" name="submit" id="ajaxsubmit">Submit</button>
</form>
</div>

<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>


</script>
