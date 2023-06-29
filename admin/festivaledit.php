<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/religion.php";
    include "../classes/festival.php";

?>
<?php
    $religion = new Religion();
    $festival = new Festival();
    if (isset($_GET['id'])&&$_GET['id']>0) {
        $id = $_GET['id'];
        $getFestivalById = $festival->getFestivalById($id);
        if ($getFestivalById) {
            $resultFestival = $getFestivalById->fetch_assoc();
        }
    }
    if (isset($_POST['festival_name'])&&$_POST['festival_name']) {
		$updateFestival = $festival->updateFestivalById($_POST,$_FILES,$id); 
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
                            if (isset($updateFestival)) {
                                echo '<span style="color:red; font-weight:bold">'.$updateFestival.'.</span>';
                            }
                            ?>                   
                            <div class=" form">
                                <form  class="cmxform form-horizontal " id="commentForm" method="post" novalidate="novalidate" enctype="multipart/form-data">

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Religion (required)</label>
                                        <div class="col-lg-6">
                                            <select name="idreligion"> 
                                            <?php
                                            $showlistReligion = $religion->religionList();
                                            if ($showlistReligion) {
                                                $i = 0;
                                                while ($result = $showlistReligion->fetch_assoc()) {   
                                                    if ($result['id']==$resultFestival['idreligion']) {
                                            ?>
                                            <option selected value ="<?=$result['id']?>"><?=$result['name']?></option>
                                            <?php
                                            }else{   
                                            ?>
                                            <option value ="<?=$result['id']?>"><?=$result['name']?></option>
                                            <?php
                                                }
                                              }
                                            }
                                            ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Name (required)</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="festival_name" minlength="2" type="text" required="" value="<?=$resultFestival['name']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Place (required)</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="festival_place" minlength="2" type="text" required="" value="<?=$resultFestival['place']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Image (required)</label>
                                        <div class="col-lg-6">
                                            <input type="file" class=" form-control" id="cname" name="festival_image" minlength="2" type="text" required=""> 
                                            <img width="500" height="200" src="../uploads/<?=$resultFestival['img']?>"/>
                                            <span><?=$resultFestival['img']?></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Description (optional)</label>
                                        <div class="col-lg-6">
                                           <textarea rows ="10" cols="58" name="festival_description"><?=$resultFestival['description']?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Time (required)</label>
                                        <div class="col-lg-6">
                                            <input  class=" form-control" id="cname" name="festival_time" minlength="2" type="text" value="<?=$resultFestival['time']?>" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Latitude (required)</label>
                                        <div class="col-lg-6">
                                            <input  class=" form-control" id="cname" name="latitude" minlength="2" type="text" required="" value="<?=$resultFestival['latitude']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Longtitude (required)</label>
                                        <div class="col-lg-6">
                                            <input  class=" form-control" id="cname" name="longtitude" minlength="2" type="text" required="" value="<?=$resultFestival['longtitude']?>">
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
