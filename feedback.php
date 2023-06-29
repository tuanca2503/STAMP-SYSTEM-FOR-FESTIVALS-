<?php
    include "inc/header.php";
?>
<?php
    if(isset($_POST['content'])&&$_POST['content']){
        $insertFeedback = $feedback->insertFeedback($_POST);
    }
    $showFeedBack = $feedback->showFeedBack();
    $countFeedback = $feedback->countFeedback();
    
?>
		<div class="container">
				
                <div class="newspaper-x-breadcrumbs">
                    <span>
                        <a itemprop="url" href="index.php">
                            <span itemprop="title">Home </span>
                        </a>
                    </span>
                    <span class="newspaper-x-breadcrumb-sep">/</span>
                    <span>
                    <a itemprop="url" href="#">
                        <span itemprop="title">Feedback</span>
                    </a>
                    </span>
                    <br>
                    <?php 
                        if (isset($insertFeedback)) {
                            echo $insertFeedback;
                        }			
                    ?>
                </div>
            </div>
        <?php
            if (Session::get('id')!=null) {
            
        ?>
        <div class="container ">
            <div class="card mt-5 pb-5">
                <div class="d-flex flex-row justify-content-between p-3 adiv text-white"> <i class="fas fa-chevron-left"></i> <span class="pb-3">feedback</span> <i class="fas fa-times"></i> </div>
                <div class="mt-2 p-4 text-center">
                    <h6 class="mb-0">Your feedback help us to improve.</h6> <small class="px-3">Please let us know about your chat experience.</small>
                        <form method="post">
                            <input name="feedbackdate" type="hidden" value="<?=date("m/d/Y");?>"/>
                            <div class="form-group mt-4  mb-4">
                                <div class="d-flex flex-row justify-content-center mt-2 mb-3"> 
                                    <input required type="radio" name="rate" value="1"/><div><img class="img" src="https://img.icons8.com/emoji/48/000000/angry-face-emoji--v2.png" /></div> 
                                    <input required type="radio" name="rate" value="2"/><div><img  class="img" src="https://img.icons8.com/fluent/48/000000/sad.png"   /></div> 
                                    <input required type="radio" name="rate" value="3"checked/><div><img class="img" src="https://img.icons8.com/color/48/000000/happy.png" /> </div> 
                                    <input required type="radio" name="rate" value="4"/><div><img  class="img"src="https://img.icons8.com/emoji/48/000000/smiling-face.png"  /></div>  
                                    <input required type="radio" name="rate" value="5"/><div><img  class="img"src="https://img.icons8.com/color/48/000000/lol.png"  /></div>  
                                </div>
                                <textarea required class="form-control mb-5" rows="4" placeholder="Message" name="content"></textarea> 
                                <div class="mt-2" > 
                                    <button type="submit" class="btn btn-default btn-block" style="background-color:#04132d; color:white"><span>Send feedback</span></button> 
                                </div>
                            </div>
                        </form>
                    <p class="mt-3" style="font-size:14px"><a href="index.php">Continue without sending feedback</a></p>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded">
                        <h6>Reviews[<?=Session::get('countFeedback')?>]</h6>
                        <div class="review mt-4">
                        <?php
                            if ($showFeedBack) {
                                $i = 0;
                               while ($result = $showFeedBack->fetch_assoc()) {      
                                $i ++;          
                        ?>
                            <div class="d-flex flex-row comment-user">
                                <div class="ml-2">
                                    <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold"><?=$result['fullname']?></span><span class="dot"></span><span class="date"><?=$format->formatDate($result['feedbackdate'])?></span></div>
                                    <div class="rating">
                                        <?php
                                        for ($i=0; $i < $result['rate'] ; $i++) { 
                                            echo '<i class="fa fa-star"></i>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text"><?=$result['content']?></p>
                            </div>
                        <?php
                            }
                        }
                        ?>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
            }else{
                echo"<br><h1 class='text-center'>Please <a href='login.php'>log in</a> or <a href='register.php'>register</a> to give feedback!</h1><br>";
        ?>
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded">
                        <h6>Reviews [<?=Session::get('countFeedback')?>]</h6>
                        <div class="review mt-4">
                        <?php
                            if ($showFeedBack) {
                                $i = 0;
                               while ($result = $showFeedBack->fetch_assoc()) {      
                                $i ++;          
                        ?>
                            <div class="d-flex flex-row comment-user">
                                <div class="ml-2">
                                    <div class="d-flex flex-row align-items-center"><span class="name font-weight-bold"><?=$result['fullname']?></span><span class="dot"></span><span class="date"><?=$format->formatDate($result['feedbackdate'])?></span></div>
                                    <div class="rating">
                                        <?php
                                        for ($i=0; $i < $result['rate'] ; $i++) { 
                                            echo '<i class="fa fa-star"></i>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text"><?=$result['content']?></p>
                            </div>
                        <?php
                            }
                        }
                        ?>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
<?php
    include "inc/footer.php";
?>
<style>
    .dot {
    height: 6px;
    width: 6px;
    margin-left: 3px;
    margin-right: 3px;
    margin-top: 2px;
    background-color: rgb(91, 92, 91);
    border-radius: 50%;
    display: inline-block
}

.name {
    font-size: 14px
}

.date {
    font-size: 12px
}

.rating i {
    color: green;
    font-size: 13px
}

   
    .img{
        margin-right: 10px;
        width: 35px;
        height: 35px;
        cursor: pointer;
    }
    .img:hover{
        transform: translateY(-50px);
        transition:0,5s;
       
    }
    .adiv {
    background: #04132d;
    border-radius: 15px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    font-size: 12px;
    height: 46px
}


.fas {
    cursor: pointer
}

.fa-chevron-left {
    color: #fff
}

h6 {
    font-size: 20px;
    font-weight: bold
}

small {
    font-size: 18px;
    color: #898989
}

.form-control {
    border: none;
    background: #F6F7FB;
    font-size: 18px
}

.form-control:focus {
    box-shadow: none;
    background: #F6F7FB
}

.form-control::placeholder {
    font-size: 18px;
    color: #B8B9BD
}

.btn-primary {
    background: #0063FF;
    padding: 4px 0 7px;
    border: none
}

.btn-primary:focus {
    box-shadow: none
}

.btn-default span {
    font-size: 18px;
    color: white
}

p.mt-3 {
    font-size: 11px;
    color: #B8B9BD;
    cursor: pointer
}
</style>