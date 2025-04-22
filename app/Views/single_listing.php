
<?php include 'header.php';?>
<div class="row mt-3">
  <div class="col-8 offset-2">

    <h3 class="offset-3"><?php echo $viewList['title']; ?> :</h3>
   
    <div >
      <div class="class col-6 offset-3 show-card listing-card">
        <img src="<?=base_url('upload/'.$viewList['image']);?>" class="card-img-top show-img" alt="llisting_image" height="300" width="200">
        <div class="card-body">
          <p class="card-text">
         
          <?php echo $viewList['description']; ?> <br>
          &#8377; <?php echo $viewList['price']; ?> <br>
          <?php echo $viewList['location']; ?> <br>
          <?php echo $viewList['country']; ?>

        </p>
        </div>
      </div>
    </div>
    </div></div>
    <br />

    <div class="btns offset-2">

      <a href="<?=base_url('img/edit/'.$viewList['id']);?>" class="btn btn-dark col-1 offset-3 edit-btn">Edit</a>
  
      <form method="get" action="<?=base_url('img/delete/'.$viewList['id']);?>">
        <button class="btn btn-dark offset-5">Delete</button>
      </form>

    </div>
   
    <?php include 'footer.php';?>