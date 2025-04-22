
<?php include 'header.php';?>




<div class="container">
    
          <h3>All Houses</h3>
          
          <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
          <?php if($listings):?>
        
        <?php foreach($listings as $data): ?>
      
        <a href="<?=  base_url('img/view/'.$data['id']);?>"  class="listing-link">
      <div class="card col listing-card">
          <img src="<?= "upload/".$data['image']; ?>" class="card-img-top" alt="Listing_image" style="height: 20rem;"  >
          
          <div class="card-img-overlay"></div>
          
        <div class="card-body">
            <b class="card-text"><?php echo $data['title']; ?> <br>
             &#8377; <?php echo $data['price']; ?> / night
            </b>
        </div>
      </div>
        </a>
        
   

        <?php endforeach; ?>

        <?php endif; ?>
        </div>
        </div>
      </body>


      <?php include 'footer.php';?>
