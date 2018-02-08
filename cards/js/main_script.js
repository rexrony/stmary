  /*function check_label(){
	alert('test');
  $(this).addClass('has-value');
$('.input-group input').focusout(function(){
    
    var text_val = $(this).val();
    
    if(text_val === "") {
      
      $(this).removeClass('has-value');
      
    } else {
      
      $(this).addClass('has-value');
      
    }
    
  });
  
}
*/
$(function(){
  
  $('.cards_con_form .input-group input').focusout(function(){
    
    var text_val = $(this).val();
    
    if(text_val === "") {
      
      $(this).removeClass('has-value');
      
    } else {
      
      $(this).addClass('has-value');
      
    }
    
  });
  
});