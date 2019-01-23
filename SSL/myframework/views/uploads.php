<h6 class="mt-5">&nbsp;</h6>
<!-- <h1 class="mt-5">Hello</h1> -->
<div class="container">
<h2><? echo $_GET['msg'] ?></h2>
<form action="/uploads/uploadFile" method="POST" enctype="multipart/form-data">
    <label for="myFile">Select a file to upload:</label>
    <input type="file" name="myFile" id="myFile"/>
    <button type="submit" name="submit" id="submit">Submit</button>
</form>
</div>