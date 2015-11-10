
    <?php require "header.php"?>
      <div class="col-md-3">
        <p class="lead">Shop Name</p>
        <div class="list-group">
            <a href="#" class="list-group-item">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
        </div>
    </div>

    <div class="col-md-9">

        <div class="row carousel-holder">

            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="http://lorempixel.com/800/300/" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://lorempixel.com/800/300/2" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://lorempixel.com/800/300/" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div>
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
                                    <a class="addpanier" href="addpanier.php?id=<?php echo $product->id ?>"> <span class="glyphicon glyphicon-shopping-cart"></span></a>

                                 </p>
                             </div>
                         </div>
                     </div>
                <?php endforeach; ?>


            </div>
    <?php require "footer.php"?>