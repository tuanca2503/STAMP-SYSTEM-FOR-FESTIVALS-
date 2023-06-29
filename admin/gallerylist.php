<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/gallery.php";
    // include_once "../lib/session.php";
    include_once "../helpers/format.php";

?>
<?php
  $fm = new Format();
  $gallery = new Gallery();
  $getFullDetailsFestivalGallery = $gallery->getFullDetailsFestivalGallery(); 
  
  if (isset($_GET['id']) && $_GET['id']>0) {
    $id = $_GET['id'];
    $deleteGallery = $gallery->deleteGallery($id);
  }
?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List of festivals
    </div>
    <?php
    if (isset($deleteGallery)) {
    echo '<span style="color:red; font-weight:bold">'.$deleteGallery.'.</span>';
    }
    ?> 
    
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID<th>
            <th>Image</th>
            <th>Festival</th>
            <th>World Festival</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            if ($getFullDetailsFestivalGallery) {
              $i = 0;
              while ($result = $getFullDetailsFestivalGallery->fetch_assoc()) {
                $i ++;
              
          ?>
          <tr>
            <td><?=$result['id']?><td>
            <td><img src='../uploads/<?=$result['source']?>' width="250px"/></td>
            <td><?=$result['festivalname']==null?'Null':$result['festivalname']?></td>
            <td><?=$result['worldname']?></td>      
            <td>
              <!-- <a href="festivaledit.php?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
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