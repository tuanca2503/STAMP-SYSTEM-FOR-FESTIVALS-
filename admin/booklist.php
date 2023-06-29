<?php
	  include "inc/header.php";
	  include "inc/sidebar.php";
    include "../classes/religion.php";
    include "../classes/festival.php";
    include "../classes/book.php";
    include_once "../helpers/format.php";

?>
<?php
  $fm = new Format();
  $religion = new Religion();
  $book = new Book();
  $bookList = $book->bookList(); 
  if (isset($_GET['id']) && $_GET['id']>0) {
    $id = $_GET['id'];
    $deleteBook = $book->deleteBook($id);
  }
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List of Book
    </div>
    <?php
    if (isset($deleteBook)) {
    echo '<span style="color:red; font-weight:bold">'.$deleteBook.'.</span>';
    }
    ?> 
    
    
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Religion</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            if ($bookList) {
              $i = 0;
              while ($result = $bookList->fetch_assoc()) {
                $i ++;
              
          ?>
          <tr>
            <td><?=$result['id']?></td>
            <td><?=$result['name']?></td>
            <td><?=$fm->textShorten($result['description'],100)?></td>
            <td><?=$fm->currency_format($result['price'])?></td>
            <td><img src="../uploads/<?=$result['img']?>" height="200" width="150"/></td>
            <td><?=$result['religioname']?></td>
            
            <td>
              <a href="bookedit.php?id=<?=$result['id']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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