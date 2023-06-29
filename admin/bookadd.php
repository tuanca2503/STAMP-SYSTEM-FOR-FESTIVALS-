<?php
	include "inc/header.php";
	include "inc/sidebar.php";
    include "../classes/religion.php";
    include "../classes/festival.php";
    include "../classes/book.php";
?>
<?php
    $religion = new Religion();
   
    $book = new Book();
    if (isset($_POST['book_name']) && $_POST['book_name']) {
        $addBook = $book->addBook($_POST,$_FILES);
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
                            Form Add Book
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                            <?php
                            if (isset($addBook)) {
                                echo '<span style="color:red; font-weight:bold">'.$addBook.'.</span>';
                            }
                            ?>
                                <form class="cmxform form-horizontal " id="commentForm" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Religion</label>
                                        <div class="col-lg-6">
                                            <select name="idreligion"> 
                                            <?php
                                            $showlistReligion = $religion->religionList();
                                            if ($showlistReligion) {
                                                $i = 0;
                                                while ($resultReligion = $showlistReligion->fetch_assoc()) {                                              
                                            ?>
                                            <option value ="<?=$resultReligion['id']?>"><?=$resultReligion['name']?></option>
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
                                            <input class=" form-control" id="cname" name="book_name" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Description (optional)</label>
                                        <div class="col-lg-6">
                                           <textarea rows ="10" cols="58" name="book_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Image (required)</label>
                                        <div class="col-lg-6">
                                            <input type="file" class=" form-control" id="cname" name="book_image" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Price (required)</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="book_price" minlength="2" type="text" required="">
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Author</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="author" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Release date</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="release_date" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Genre</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="genre" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Language</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="language" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">In stock</label>
                                        <div class="col-lg-6">
                                            <input type="number" class=" form-control" id="cname" name="instock" minlength="2" max="2" min="1" step="1" required="">
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
