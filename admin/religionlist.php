<?php
	include "inc/header.php";
	include "inc/sidebar.php";
  include "../classes/religion.php";

?>
<?php
  $religion = new Religion();
  $religionList = $religion->religionList(); 
  if (isset($_GET['id']) && $_GET['id']>0) {
    $id = $_GET['id'];
    $deleteReligion = $religion->deleteReligion($id);
  }
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List of Religion
    </div>
    <?php
    if (isset($deleteReligion)) {
    echo '<span style="color:red; font-weight:bold">'.$deleteReligion.'.</span>';
    }
    ?> 
    
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            if ($religionList) {
              $i = 0;
              while ($result = $religionList->fetch_assoc()) {
                $i ++;
              
          ?>
          <tr>
            <td><?=$result['id']?></td>
            <td><?=$result['name']?></td>
            <td><?=$result['description']?></td>
            <td>
              <a href="religionedit.php?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a href="religionlist.php?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-times text-delete text"></i></a>
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