<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/feedback.php";


?>
<?php
    $feedback = new Feedback();
    if (isset($_GET['id'])&&$_GET['id']>0) {
        $id = $_GET['id'];
        $getFeedbackById = $feedback->getFeedbackById($id);
        if ($getFeedbackById) {
            $result= $getFeedbackById->fetch_assoc();
        }
    }
    if (isset($_POST['content'])&&$_POST['content']) {
        $content = $_POST['content']; 
        $id = $_POST['id']; 
        $rate = $_POST['rate'];
        $feedbackdate = $_POST['feedbackdate'];
		$updateFeedback = $feedback->updateFeedback($content,$id,$rate,$feedbackdate); 
	}
?>


<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Form Edit bill
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <?php
                            if (isset($updateFeedback)) {
                                echo '<span style="color:red; font-weight:bold">'.$updateFeedback.'.</span>';
                            }
                            ?>                   
                            <div class=" form">
                                <form  class="cmxform form-horizontal " id="commentForm" method="post" novalidate="novalidate" enctype="multipart/form-data">

                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Content</label>
                                        <div class="col-lg-6">
                                           <textarea required rows ="10" cols="58" name="content"><?=$result['content']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Date</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="feedbackdate" minlength="2" type="text" required="" value="<?=$result['feedbackdate']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Rate</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="rate" minlength="2" type="number" min="1" max="5" step="1" required="" value="<?=$result['rate']?>">
                                            <?php
                
                                                for ($i=0; $i < $result['rate'] ; $i++) { 
                                                        echo '<i class="fa fa-star rating"></i>';   
                                                }
                                            ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="id" minlength="2" type="hidden" required="" value="<?=$result['id']?>">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
                                        
                                        </div>
                                       
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
           
            <!-- page end-->
        </div>
</section>
<?php
	include "inc/footer.php";
?>
