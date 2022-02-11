<script>
$(document).ready(function (){

    $("#allManagement").click(function() {
       if($(this).is(':checked'))  
           $('input[type=checkbox]').prop('checked', true);
       else    
           $('input[type=checkbox]').prop('checked', false);
   })

});


   function checkPermissionByGroup(className,checkThis){
       const groupIdName=$("#"+checkThis.id);
       const classCheckBox=$('.'+className+' input');
       if(groupIdName.is(':checked')){  
        classCheckBox.prop('checked', true);
       }else{   
        classCheckBox.prop('checked', false);
       }
       implementAllChecked();

   }
   function checkSinglePermission(groupClassName,groupID,countTotalPermission){
       const classCheckbox=$('.'+groupClassName+ ' input');
       const groupIDCheckBox=$("#"+groupID);
       if($('.'+groupClassName+ ' input:checked').length==countTotalPermission){
        groupIDCheckBox.prop('checked',true);

       }else{
        groupIDCheckBox.prop('checked',false);


       }
       implementAllChecked();

   }
   function implementAllChecked(){
       const countPermissions=<?php echo e(count($all_permissions)); ?>;
       const countPermissionGroups=<?php echo e(count($permission_groups)); ?>;

    //    console.log((countPermissions + countPermissionGroups));
    //    console.log($(' input[type="checkbox"]:checked').length);

       if($(' input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
        $("#checkPermissionAll").prop('checked',true);

       }else{
        $("#checkPermissionAll").prop('checked',false);

       }

   }





  
    </script><?php /**PATH C:\xampp\htdocs\ansondistributing_barua\resources\views/roles/partials/scripts.blade.php ENDPATH**/ ?>