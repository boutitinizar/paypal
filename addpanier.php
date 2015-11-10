<?php
/**
 * User: Nizar
 * Date: 08/11/2015
 * Time: 16:42
 */

 require "_header.php";
$json = array('error'=> true);

if(isset($_GET['id'])){
   $product = $db->query('SELECT id FROM products WHERE id=:id',array('id'=>$_GET['id']));
  if(empty($product)){
      $json['message'] = "Ce produit n'exite pas ";
  }
    $panier->add($product[0]->id);
    $json['error'] = false;
    $json['total'] = $panier->total();
    $json['count'] = $panier->count();

    $json['message'] =  'Le produit a bien été ajouter à votre panier ';
}else{
    $json['message'] =  "Vous n'avez pas sélectionné de produit à ajouter au panier" ;
}

echo json_encode($json);