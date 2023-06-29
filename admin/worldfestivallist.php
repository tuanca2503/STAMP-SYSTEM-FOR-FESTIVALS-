<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/worldfestival.php";
    include_once "../helpers/format.php";

?>
<?php
  $fm = new Format();
  $Worldfestival = new WorldFestival();
  $WorldFestivalList = $Worldfestival->WorldFestivalList(); 
  if (isset($_GET['id']) && $_GET['id']>0) {
    $id = $_GET['id'];
    $deleteWorldFestival = $Worldfestival->deleteWorldFestival($id);
  }
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List of World Festival
    </div>
    <?php
    if (isset($deleteWorldFestival)) {
    echo '<span style="color:red; font-weight:bold">'.$deleteWorldFestival.'.</span>';
    }
    ?> 
    
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Place</th>
            <th>Image</th>
            <th>Date</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            if ($WorldFestivalList) {
              $i = 0;
              while ($result = $WorldFestivalList->fetch_assoc()) {
                $i ++;
              
          ?>
          <tr>
            <td><?=$result['id']?></td>
            <td><?=$result['name']?></td>
            <td><?=$fm->textShorten($result['description'],100)?></td>
            <td><?=$result['place']?></td>
            <td><img src="../uploads/<?=$result['img']?>" height="100" width="150"/></td>
            <td><?=$fm->formatDate($result['time'])?></td>
            
            <td>
              <a href="worldfestivaledit.php?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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