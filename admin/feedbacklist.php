<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/feedback.php";
    include_once "../helpers/format.php";

?>
<?php
  $fm = new Format();
  $feedback = new Feedback();
  $showFeedBack = $feedback->showFeedBack(); 
  if (isset($_GET['id']) && $_GET['id']>0) {
    $id = $_GET['id'];
    $deleteFeedback = $feedback->deleteFeedback($id);
  }
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List of Feedbacks
    </div>
    <?php
    if (isset($deleteFeedback)) {
    echo '<span style="color:red; font-weight:bold">'.$deleteFeedback.'.</span>';
    }
    ?> 
    
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID<th>
            <th>Username</th>
            <th>Content</th>
            <th>Date</th>
            <th>Rate</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            if ($showFeedBack) {
              $i = 0;
              while ($result = $showFeedBack->fetch_assoc()) {
                $i ++;
              
          ?>
          <tr>
            <td><?=$result['id']?><td>
            <td><?=$result['username']?></td>
            <td><?=$result['content']?></td>
            <td><?=$result['feedbackdate']?></td>
            <td>
            <div class="rating">
            <?php
                
                for ($i=0; $i < $result['rate'] ; $i++) { 
                        echo '<i class="fa fa-star rating"></i>';   
                }
            ?>
            </div>
            </td>


            
            <td>
              <a href="feedbackedit.php?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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