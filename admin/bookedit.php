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
    if (isset($_GET['id'])&&$_GET['id']>0) {
        $id = $_GET['id'];
        $getBookById = $book->getBookById($id);
        if ($getBookById) {
            $resultBook= $getBookById->fetch_assoc();
        }
    }
    if (isset($_POST['book_name'])&&$_POST['book_name']) {
		$updateBook = $book->updateBookById($_POST,$_FILES,$id); 
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
                            Form Edit Book
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <?php
                            if (isset($updateBook)) {
                                echo '<span style="color:red; font-weight:bold">'.$updateBook.'.</span>';
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
                                                    if ($result['id']==$resultBook['idreligion']) {
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
                                            <input class=" form-control" id="cname" name="book_name" minlength="2" type="text" required="" value="<?=$resultBook['name']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Price (required)</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="book_price" minlength="2" type="text" required="" value="<?=$resultBook['price']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Image (required)</label>
                                        <div class="col-lg-6">
                                            <input type="file" class=" form-control" id="cname" name="book_image" minlength="2" type="text" required=""> 
                                            <img width="500" height="200" src="../uploads/<?=$resultBook['img']?>"/>
                                            <span><?=$resultBook['img']?></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Description (optional)</label>
                                        <div class="col-lg-6">
                                           <textarea rows ="10" cols="58" name="book_description"><?=$resultBook['description']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Author</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="author" minlength="2" type="text" required="" value="<?=$resultBook['author']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Release date</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="release_date" minlength="2" type="text" required=""value="<?=$resultBook['release_date']?>" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Genre</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="genre" minlength="2" type="text" required=""value="<?=$resultBook['genre']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Language</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="language" minlength="2" type="text" required=""value="<?=$resultBook['language']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">In stock</label>
                                        <div class="col-lg-6">
                                            <input type="number" class=" form-control" id="cname" name="instock" minlength="2" max="2" min="1" step="1" required=""value="<?=$resultBook['instock']?>">
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
