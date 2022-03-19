<?php include('inc/header.php')?>

<?php

use TechStore\Classes\Models\Cats;

if($request->getHas('id')){
  $id=$request->get('id');
}
else
{
  $id = 1;
}

$cat = new Cats;
$oneCat = $cat->selectId($id,"name");

?>



<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Edit Category : name here</h3>
            <div class="card">
                <div class="card-body p-5">
                    <form method="POST" action="<?= AURL ;?>handle/edit-cat.php">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?= $oneCat['name']?>">

                            <input type="hidden" name="id" value="<?= $id ?>"/>
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="#">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<?php include('inc/footer.php') ?>