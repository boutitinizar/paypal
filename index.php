
    <?php require "header.php"?>
    <?php

      ?>


    <div class="row" xmlns="http://www.w3.org/1999/html">
                <?php   $products = $db->query('SELECT * FROM products');
                 foreach($products as $product): ?>
                     <div class="col-sm-4 col-lg-4 col-md-4">
                         <div class="thumbnail">
                             <img src="web/img/<?php echo $product->id ?>.jpg" alt="">
                             <div class="caption">
                                 <h4 class="pull-right"><?php echo number_format( $product->price,2,',',' ' ); ?> £</h4>
                                 <h4><a href="#"><?php echo $product->name ?></a>
                                 </h4>
                                 <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                             </div>
                             <div class="ratings">
                                 <p class="pull-right">15 reviews</p>
                                 <p>
                                    <a href="addpanier.php?id=<?php echo $product->id ?>"> <span class="glyphicon glyphicon-shopping-cart"></span></a>

                                 </p>
                             </div>
                         </div>
                     </div>
                <?php endforeach; ?>


            </div>
    <?php require "footer.php"?>