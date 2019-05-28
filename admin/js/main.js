$(document).ready(function(){

 $('#teacherorstudent').change(function (e) {
   var get_value=$(this).find('option:selected').val();
   var html_element=`
    <div class="form-group" id="roll">
                    <label for="roll">Roll</label>
                    <input type="text" name="roll" class="form-control">
     </div>
   `;

   if(get_value==='student' && !$('[for=roll]').length){
     $('#submit_div').prepend(html_element);
   }else{
     $('#roll').remove();
   }

 });

 if($('[for=roll]').length){
   console.log('good');
 }



});