<?php


 include('inc/header.php') ?>
<?php 

use TechStore\Classes\Models\Admin;

$ads = new Admin;
$admins = $ads->selectAll("id,name,email");


?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admins as $index=>$admin) :?>
                      <tr>
                        <th scope="row"><?= $index+1 ?></th>
                        <td><?= $admin['name'] ; ?></td>
                        <td><?= $admin['email'] ; ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="<?= AURL."handle/delete.admin.php?id=".$admin['id']; ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <?php include('inc/footer.php') ?>
