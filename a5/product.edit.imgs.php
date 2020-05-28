
<form method='POST' action='product.edit.imgs.php' enctype="multipart/form-data"
    class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="file" name='image' >
    <button class="btn form__btn--primary" type="submit" name='submit'>Upload</button>
</form>

<?php
    if(isset($_POST['submit'])) {
        $file = $_FILES['image'];
        
        $fileExt = explode('.', $file['name']);
        $fileExt = strtolower(end($fileExt));
        
        $allowed = array('jpg', 'jpeg', 'png');
        print_r($fileExt);
        if (in_array($fileExt, $allowed)) {
            if ($file['error'] === 0 ) {
                $file['id'] = uniqid('', true) . "." . $fileExt;
                $savedFile = 'images/' . $file['id'];
                move_uploaded_file($file['tmp_name'], $savedFile);
                 $savedFile;
                echo "<img src='$savedFile' class='img-fluid img-custom' alt='Responsive image'>";
                } else {
                echo "there was an error uploading your file";
            }
        } else {
            echo "You cannot upload files of this";
        }
    }
?>

<div style="min-height: 250px"><img src='images/macbook3.png'  alt='Responsive image' style="width: 200px"></div>

Just try this.

<table>
    <colgroup>
        <col width="150"/>
        <col width="350"/>
    </colgroup>
    <tbody>
        <tr>
            <div style="min-height: 250px"><img src='images/macbook3.png'  alt='Responsive image' style="width: 200px"></div>
            <td style="background:url(../images/refresh.jpg);" width="100%"></td>
        </tr>
    </tbody>
</table>