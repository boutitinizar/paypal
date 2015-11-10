<?php require "header.php"?>
<?php if(isset($_GET['del'])){
    $panier->del($_GET['del']);
} ?>

<form method="post" action="panier.php">


<table class="table">
 <tr>
     <th></th>
     <th>Product name</th>
     <th>Price</td>
     <th>Quancity</th>
     <th>Subtotal</th>
     <th>Actions</th>
 </tr>
    <?php
    $keys  = array_keys($_SESSION['panier']);
    if(empty($keys)){
        $products = array();
    }else{
        $products = $db->query('SELECT * FROM products WHERE id IN ('.implode(',',$keys).')');
    }

    foreach($products as $product):
    ?>


    <tr>
        <td>      <img height="70" src="web/img/<?php echo $product->id ?>.jpg" alt=""></td>
        <td><?php echo $product->name ?></td>
        <td><?php echo number_format( $product->price,2,',',' ' ); ?> £</td>
        <td> <input name="panier[quantity][<?php echo $product->id ?>]" type="text" value="<?php echo $_SESSION['panier'][$product->id ] ?>"> </td>
        <td><?php echo number_format( $product->price * 1.8,2,',',' ' ); ?> £</td>
        <td><a href="panier.php?del=<?php echo $product->id ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
    </tr>

    <?php endforeach; ?>
</table>
    <input type="submit" value="Recalculer"  class="btn btn-primary">
</form>
<?php require "footer.php"?>