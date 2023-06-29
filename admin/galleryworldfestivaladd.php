<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/worldfestival.php";
    include "../classes/gallery.php";
?>
<?php
    $worldfestival = new WorldFestival();
    $gallery = new Gallery();
    if (isset($_POST['idworldfestival']) && $_POST['idworldfestival']) {
        $addGallery2 = $gallery->addGallery2($_POST,$_FILES);
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
                            Form Add Gallery
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                            <?php
                            if (isset($addGallery2)) {
                                echo '<span style="color:red; font-weight:bold">'.$addGallery2.'.</span>';
                            }
                            ?>
                                <form class="cmxform form-horizontal " id="commentForm" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group " style="padding-left:10px">
                                        <label for="cname" class="control-label col-lg-3">World Festival</label>
                                        <div class="col-lg-6">
                                            <select required name="idworldfestival"> 
                                            <?php
                                            $WorldFestivalList = $worldfestival->WorldFestivalList();
                                            if ($WorldFestivalList) {
                                                $i = 0;
                                                while ($result = $WorldFestivalList->fetch_assoc()) {                                              
                                            ?>
                                            <option value ="<?=$result['id']?>"><?=$result['name']?></option>
                                            <?php
                                              }
                                            }
                                            ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="form-group  " >
                                        <label for="cname" class="control-label col-lg-3 text-right">Source (required)</label>
                                        <div class="col-lg-6" style="">
                                            <input style="width:320px; margin-bottom:10px"   class=" form-control" id="cname" name="source" minlength="2" type="file" required="">
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
