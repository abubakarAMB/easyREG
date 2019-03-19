$(function(){
$('.modalButton').click(function(){
   $('#visitor_modal').modal('show')
      .find('#modalContent')
      .load($(this).attr('value'));
 });

/**
Delete modal
*/
$('.deleteButton').click(function(){
   $('#delete_modal').modal('show')
      .find('#delete_content')
      .load($(this).attr('value'));
 });
/*

Js for select 2

jQuery('select[multiple]').multiselect({
            width:"50%",
            search: true,
 });
**/  
});