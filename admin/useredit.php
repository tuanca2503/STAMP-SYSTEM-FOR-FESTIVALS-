<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/user.php";


?>
<?php
    $user = new User();
    if (isset($_GET['id'])&&$_GET['id']>0) {
        $id = $_GET['id'];
        $getUserLevelById = $user->getUserLevelById($id);
        if ($getUserLevelById) {
            $result= $getUserLevelById->fetch_assoc();
        }
    }
    if (isset($_POST['level'])&&$_POST['level']) {
        $level = $_POST['level']; 
        $id = $_POST['id']; 
		$updateUserLevel = $user->updateUserLevel($level,$id); 
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
                            Form Edit User
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <?php
                            if (isset($updateUserLevel)) {
                                echo '<span style="color:red; font-weight:bold">'.$updateUserLevel.'.</span>';
                            }
                            ?>                   
                            <div class=" form">
                                <form  class="cmxform form-horizontal " id="commentForm" method="post" novalidate="novalidate" enctype="multipart/form-data">

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Level</label>
                                        
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="level" minlength="2" type="number" max="2" step="1" min="1" required="" value="<?=$result['level']?>">
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
