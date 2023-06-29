<?php
    include "inc/header.php";
?>
<?php
    $getFestivalGallery = $gallery->getFestivalGallery();
    $getFestival = $festival->getFestival();
    // $getWorldFestival = $gallery->getWorldFestival();
    
?>
<?php
    if (isset($_GET['action'])&&$_GET['action']=='worldfestival') {
        $getWorldFestival = $gallery->getWorldFestival();
    }
?>
<?php
    if (isset($_GET['idfestival'])&&$_GET['idfestival']>0) {
        $id = $_GET['idfestival'];
        $getGalleryByReligionId = $gallery->getGalleryByReligionId($id);
    }
?>
    <div class="container mb-5">
                    
                    <div class="newspaper-x-breadcrumbs">
                        <span>
                            <a itemprop="url" href="index.php">
                                <span itemprop="title">Home </span>
                            </a>
                        </span>
                        <span class="newspaper-x-breadcrumb-sep">/</span>
                        <span>
                        <a itemprop="url" href="#">
                            <span itemprop="title">Gallery</span>
                        </a>
                        </span>
                        <br>
                           
                    </div>
    </div>
 <div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>
            <h4 class="text-center"><i>Where to save memories</i></h4>
        </div>

        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all"><a href="?action=all">All</a></button>
            <?php
            if ($getFestival) {
                $i = 0;
                while($result = $getFestival->fetch_assoc()){
                        
            ?>
            <button class="btn btn-default filter-button" data-filter="hdpe"><a style="color:black" href="?action=religionfestival&idfestival=<?=$result['id']?>"><?=$result['name']?></a></button>
            <?php
              }
            }
            ?>
            <button class="btn btn-default filter-button" data-filter="hdpe"><a style="color:black" href="?action=worldfestival">World Festivals</a></button>         
        </div>
        <br/>


        <?php
        if ($_GET['action']=='all') {
            
            if ($getFestivalGallery) {
                $i = 0;
                while($result = $getFestivalGallery->fetch_assoc()){
                    $i++;
           
        ?>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="uploads/<?=$result['source']?>" width="365" height="365" class="img-responsive">
            </div>
        <?php
                }
            }
        }
        ?>

        <?php
         if ($_GET['action']=='religionfestival') {
             if ($getGalleryByReligionId) {
                 $i = 0;
                 while ($result = $getGalleryByReligionId->fetch_assoc()) {
                     $i++; ?>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="uploads/<?=$result['source']?>" width="365" height="365" class="img-responsive">
            </div>
        <?php
                 }
             }
        }
        ?>
        <?php
        if ($_GET['action']=='worldfestival') {
            if ($getWorldFestival) {
                $i = 0;
                while ($result = $getWorldFestival->fetch_assoc()) {
                    $i++; ?>
        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="uploads/<?=$result['source']?>" width="365" height="365" class="img-responsive">
        </div>
        <?php
                }
            }
        }
        ?>




        </div>
    </div>

<?php
    include "inc/footer.php";
?>
<style>
    .gallery-title
{
    font-size: 36px;
    color: #04132d;
    text-align: center;
    font-weight: 500;
    margin-bottom: 20px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{
    font-size: 18px;
    border: 1px solid #04132d;
    border-radius: 5px;
    text-align: center;
    color: #04132d;
    margin-bottom: 30px;

}
.filter-button:hover
{
    font-size: 18px;
    border: 1px solid #04132d;
    border-radius: 5px;
    text-align: center;
    color: #ffffff;
    background-color:#04132d;

}
.btn-default:active .filter-button:active
{
    background-color: #04132d;
    color: white;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}

</style>