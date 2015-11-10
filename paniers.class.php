<?php
/**
 * User: Nizar
 * Date: 06/11/2015
 * Time: 17:52
 */

class panier{

  private $db;

  function __construct($DB){
    if(!isset($_SESSION)){
      session_start();
    }
     if(!isset($_SESSION['panier'])){
         $_SESSION['panier'] = array();
     }

      if(isset($_POST['panier']['quantity'])){
          $this->recalc();
      }
      $this->db = $DB;
  }
   public function recalc(){
 
       $_SESSION['panier'] = $_POST['panier']['quantity'];
   }
    public function count(){
        return array_sum($_SESSION['panier']);
    }

    public function total(){

        $total = 0;
        $keys  = array_keys($_SESSION['panier']);
        if(empty($keys)){
            $products = array();
        }else{
            $products = $this->db->query('SELECT id, price FROM products WHERE id IN ('.implode(',',$keys).')');
        }
        foreach($products as $product_id => $product){
             $total += $product->price * $_SESSION['panier'][$product->id];
        }

        return $total;

    }
    public function add($product_id){

        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id] ++ ;
        }else{
            $_SESSION['panier'][$product_id] = 1;
        }

    }
        public function del($id_product){
       unset($_SESSION['panier'][$id_product]);
    }
}