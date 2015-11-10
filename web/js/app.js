(function($){
 $('.addpanier').click(function(event){
   event.preventDefault();
     $.get($(this).attr('href'),{},function(data){
     if(data.error){
alert(data.message);
     }else{
         if(confirm(data.message, "Voulez vous consulter votre panier ?")){
             location.href = "panier.php"
         }else{
             $('#count').empty().append(data.count);
             $('#total').empty().append(data.total);
         }
     }
    },'json');
   return false;
 });
})(jQuery);