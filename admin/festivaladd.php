<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/religion.php";
    include "../classes/festival.php";
?>
<?php
    $religion = new Religion();
    $festival = new Festival();
    if (isset($_POST['festival_name']) && $_POST['festival_name']) {
        $addFestival = $festival->addFestival($_POST,$_FILES);
    }

?>
<scritpt>

</script>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Form Add Festival
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                            <?php
                            if (isset($addFestival)) {
                                echo '<span style="color:red; font-weight:bold">'.$addFestival.'.</span>';
                            }
                            ?>
                                <form class="cmxform form-horizontal " id="commentForm" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Religion</label>
                                        <div class="col-lg-6">
                                            <select required name="idreligion"> 
                                            <?php
                                            $showlistReligion = $religion->religionList();
                                            if ($showlistReligion) {
                                                $i = 0;
                                                while ($result = $showlistReligion->fetch_assoc()) {                                              
                                            ?>
                                            <option value ="<?=$result['id']?>"><?=$result['name']?></option>
                                            <?php
                                              }
                                            }
                                            ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Name (required)</label>
                                        <div class="col-lg-6">
                                            <input  class=" form-control" id="cname" name="festival_name" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Description (optional)</label>
                                        <div class="col-lg-6">
                                           <textarea required rows ="10" cols="58" name="festival_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Image (required)</label>
                                        <div class="col-lg-6">
                                            <input  type="file" class=" form-control" id="cname" name="festival_image" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Place (required)</label>
                                        <div class="col-lg-6">
                                            <input  class=" form-control" id="cname" name="festival_place" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Time (required)</label>
                                        <div class="col-lg-6">
                                            <input  class=" form-control" id="cname" name="festival_time" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Latitude (required)</label>
                                        <div class="col-lg-6">
                                            <input  class=" form-control" id="cname" name="latitude" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Longtitude (required)</label>
                                        <div class="col-lg-6">
                                            <input  class=" form-control" id="cname" name="longtitude" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" name="add">Save</button>
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
