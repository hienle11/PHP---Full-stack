<form method='POST' action='product.edit.imgs.php' enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="file" name='image'>
    <button class="btn form__btn--primary" type="submit" name='submit'>Upload</button>
</form>

<?php
require "./styles/edit.css.php"; //include CSS Style Sheet
if (isset($_POST['submit'])) {
    $file = $_FILES['image'];

    $fileExt = explode('.', $file['name']);
    $fileExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    print_r($fileExt);
    if (in_array($fileExt, $allowed)) {
        if ($file['error'] === 0) {
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

<div style="min-height: 250px"><img src='images/macbook3.png' alt='Responsive image' style="width: 200px"></div>

Just try this.

<table>
    <colgroup>
        <col width="150" />
        <col width="350" />
    </colgroup>
    <tbody>
        <tr>
            <div style="min-height: 250px"><img src='images/macbook3.png' alt='Responsive image' style="width: 200px"></div>
            <td style="background:url(../images/refresh.jpg);" width="100%"></td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered" style="background-color: #fff; margin-top: 2rem;">
    <form method="POST" action="../products/process" enctype="multipart/form-data">
        <tbody>
            <tr>
                <th scope="row">Name</th>
                <td><input type="text" name="product_name" class="form-control" placeholder="Product Name" value="<"></td>
            </tr>

            <tr>
                <th scope="row">Description</th>
                <td><input type="text" name="descript" class="form-control" placeholder="Product Description" value=""></td>
            </tr>

            <tr>
                <th scope="row">Price</th>
                <td><input type="text" name="price" class="form-control" placeholder="Product Price" value=""></td>
            </tr>

            <tr>
                <th scope="row">Quantity</th>
                <td><input type="text" name="quantity" class="form-control" placeholder="Product Quantity" value=""></td>
            </tr>

            <tr>
                <th scope="row">Category Id</th>
                <td><input type="text" name="category_id" class="form-control" placeholder="Category Id" value=""></td>
            </tr>

            <tr>
                <th scope="row">Image</th>
                <td>
                    <div style="height: 250px"><img style="height: 250px" src='images/macbook3.png' alt='Responsive image'></div>
                    <input type="file" name="image" class="form-control">
                </td>
            </tr>

            <tr>
                <th scope="row"></th>

                <td>
                    <ul class="list-button d-flex">
                        <?php
                        if ($_SESSION['update']) {   // if it is update action display update button
                            echo <<<UPDATE_BUTTON
                                        <li class="btn-custom"><button type="submit" name="action" value="Update" class="btn btn-warning">Update</button></li>
                                    UPDATE_BUTTON;
                        } else {                    // if not, which means create action, display create button
                            echo <<<CREATE_BUTTON
                                        <li class="btn-custom"><button type="submit" name="action" value="Create" class="btn btn-success">Create</button></li>
                                    CREATE_BUTTON;
                        }
                        ?>
                        <li onclick="location.href='../products'" class="btn-custom"><button type="button" class="btn btn-danger text-nowrap">Back </button></li>
                    </ul>
                </td>

            </tr>
        </tbody>
    </form>
</table>

<?php
end_module(True); // Enable Footer
?>