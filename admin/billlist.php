<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/bill.php";
    include_once "../helpers/format.php";

?>
<?php
  $fm = new Format();
  $bill = new Bill();
  $billList = $bill->showBillAdmin(); 
  if (isset($_GET['id']) && $_GET['id']>0) {
    $id = $_GET['id'];
    $deleteBill = $bill->deleteBill($id);
  }
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List of Bills
    </div>
    <?php
    if (isset($deleteBill)) {
    echo '<span style="color:red; font-weight:bold">'.$deleteBill.'.</span>';
    }
    ?> 
    
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID<th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Items</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            if ($billList) {
              $i = 0;
              while ($result = $billList->fetch_assoc()) {
                $i ++;
              
          ?>
          <tr>
            <td><?=$result['id']?><td>
            <td><?=$result['fullname']?></td>
            <td><?=$result['phone']?></td>
            <td><?=$result['email']?></td>
            <td><?=$result['address']?></td>
            <td><?=$result['items']?></td>
            <td><?=$result['paymethod']?></td>
            <td><?=$result['status'] == 1?'Unpaid':'Paid'?></td>

            
            <td>
              <a href="billedit.php?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a onclick="alert('Are you sure to delete?');" href="?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-times text-delete text"></i></a>
            </td>
          </tr>
          <?php
            }
          }
          ?>

        </tbody>
      </table>
    </div>
    
  </div>
</div>
</section>
<?php
	include "inc/footer.php";
?>