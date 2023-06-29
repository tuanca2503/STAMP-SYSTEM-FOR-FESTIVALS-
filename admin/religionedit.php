<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/religion.php";
?>
<?php
    $religion = new Religion();
    if (isset($_GET['id'])&&$_GET['id']>0) {
        $id = $_GET['id'];
        $getReligionById = $religion->getReligionById($id);
    }
    if (isset($_POST['religion_name'])&&$_POST['religion_name']) {
		$religion_name = $_POST['religion_name'];
		$religion_description = ($_POST['religion_description']);
		$updateReligion = $religion->updateReligionById($id,$religion_name,$religion_description); 
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
                            Form Edit Religion
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <?php
                            if (isset($updateReligion)) {
                                echo '<span style="color:red; font-weight:bold">'.$updateReligion.'.</span>';
                            }
                            ?>                   
                            <div class=" form">
                                <form  class="cmxform form-horizontal " id="commentForm" method="post" novalidate="novalidate">
                                    <?php
                                    if ($getReligionById) {
                                        $i = 0;
                                        while ($getReligion = $getReligionById->fetch_assoc()) {
                                            $i++;
                                        
                                    ?>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Name (required)</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="religion_name" minlength="2" type="text" required="" value="<?=$getReligion['name']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Description (optional)</label>
                                        <div class="col-lg-6">
                                           <textarea rows ="10" cols="58" name="religion_description"><?=$getReligion['description']?></textarea>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        }
                                    }
                                    ?>
                                   
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
