<?php include('inc/header.php') ?>
<?php

use TechStore\Classes\Models\Product;
use TechStore\Classes\Models\Cats;


if ($request->getHas('id')) {
    $id =  $request->get('id');
} else {
    $id = 1;
}


$c = new Cats;
$cats = $c->selectAll("id , name");

$pr = new Product;
$product = $pr->selectId($id, "products.name  as prodName , products.desc ,products.img ,products.price ,
products.piece_num ,products.cat_id");




?>

<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Edit Product : <?= $product['prodName'] ?></h3>
            <div class="card">
                <div class="card-body p-5">
                    <form method="POST" action="<?= AURL."handle/edit-product.php"?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="<?= $product['prodName']?>"  name="name">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="cat_id">
                                <?php foreach ($cats as $cat) : ?>
                                    <option <?php if ($cat['id'] == $product['cat_id']) {
                                                echo "selected";
                                            }; ?> value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                            <input type="hidden" value="<?= $id ; ?>" name="id">


                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" value="<?= $product['price'] ?>" name="price">
                        </div>

                        <div class="form-group">
                            <label>Pieces</label>
                            <input type="number" class="form-control" value="<?= $product['piece_num'] ?>" name="piece_num">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="desc"><?= $product['desc']?></textarea>
                        </div>

                        <div class="mb-3 d-flex justify-content-center">
                            <img src="<?= URL . "upload/" . $product['img']; ?>" alt="update_img" height="100px">

                        </div>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="img">
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="<?= AURL ;?>products.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('inc/footer.php') ?>