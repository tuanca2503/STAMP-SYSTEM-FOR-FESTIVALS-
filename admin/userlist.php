<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/user.php";
    // include_once "../lib/session.php";
    include_once "../helpers/format.php";

?>
<?php
  $fm = new Format();
  $user = new User();
  $showListUser = $user->showListUser(); 
  $countUser  = $user->countUser();
  
  if (isset($_GET['id']) && $_GET['id']>0) {
    $id = $_GET['id'];
    $deleteUser = $user->deleteUser($id);
  }
?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List of users
    </div>
    <?php
    if (isset($deleteUser)) {
    echo '<span style="color:red; font-weight:bold">'.$deleteUser.'.</span>';
    }
    ?> 
    
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID<th>
            <th>Username</th>
            <th>Email</th>
            <th>Fullname</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Level</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            if ($showListUser) {
              $i = 0;
              while ($result = $showListUser->fetch_assoc()) {
                $i ++;
              
          ?>
          <tr>
            <td><?=$result['id']?><td>
            <td><?=$result['username']?></td>
            <td><?=$result['email']?></td>
            <td><?=$result['fullname']?></td>
            <td><?=$result['address']?></td>
            <td><?=$result['telephone']?></td>
            <td><?=$result['level']==2?'User':'Admin'?></td>
            


            
            <td>
              <a href="useredit.php?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
<style>
    .rating i {
    color: green;
    font-size: 13px
}

</style>