<?php include('inc/header.php') ?>
<?php 
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetails;

if($request->getHas('id'))
{
	$id= $request->get('id');
}
else{
  $id=1;
}

$ord = new Order;
$order = $ord->selectId($id,"orders.*, sum(qty * price) As total");
// print_r($order);die;

$det = new OrderDetails;
$ordersDet =$det->selectWithProducts($id);
// print_r($ordersDet['name']);die;
// echo "<pre>";
// print_r($ordersDet);die;


?>


<div class="container py-5">
  <div class="row">

    <div class="col-md-6 offset-md-3">
      <h3 class="mb-3">Show Order : <?= $order['id']?></h3>
      <div class="card">
        <div class="card-body p-5">
          <table class="table table-bordered">
            <thead>
              <th colspan="2" class="text-center">Customer</th>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Name</th>
                <td><?= $order['name']?></td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td><?= $order['email'] ?? "..."?></td>
              </tr>
              <tr>
                <th scope="row">Phone</th>
                <td><?= $order['phone']?></td>
              </tr>
              <tr>
                <th scope="row">Address</th>
                <td><?= $order['address'] ?? "..."?></td>
              </tr>
              <tr>
                <th scope="row">Time</th>
                <td><?= date("d M ,Y h:i a",strtotime($order['created_at']))?></td>
              </tr>
              <tr>
                <th scope="row">Status</th>
                <td><?= $order['status']?></td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($ordersDet as $ordDet) :?>
              <tr>
                <td><?= $ordDet['name']?></td>
                <td><?= $ordDet['qty']?></td>
                <td>$<?= $ordDet['price']?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Total</th>
               <?php if($order['status'] == "pending"): ?>
                <th>Change Status</th>
               <?php endif;?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>$<?= $order['total']?></td>
                <?php if($order['status'] == "pending"): ?>
                <td>
                  <a class="btn btn-success" href="<?=AURL."handle/approved.php?id=".$order['id'];?>">Approve</a>
                  <a class="btn btn-danger" href="<?=AURL."handle/cancel.php?id=".$order['id'];?>">Cancel</a>
                </td>
                <?php endif;?>
              </tr>
            </tbody>
          </table>

          <a class="btn btn-dark" href="<?= AURL;?>orders.php">Back</a>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include('inc/footer.php') ?>