<?php

include("header.php");
include("top_header.php");
include("side_navigation.php");

?>

<div id="wrapper">



    <div class="content animate-panel">

             <div class="row">
        <div class="col-lg-10">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    Add Blog:
                </div>
                <div class="panel-body">
                <form method="get" class="form-horizontal">
                <div class="form-group"><label class="col-sm-2 control-label">Title:</label>

                    <div class="col-sm-10"><input type="text" name = "blog_title"  id ="blog_title" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group"><label class="col-sm-2 control-label">Content:</label>

                    <div class="col-sm-10"><textarea  id ="blog_content"  name ="blog_content" class="form-control" rows="10"></textarea></div>
                </div>

                <div class="form-group" id="blog_cat"><label class="col-sm-2 control-label">Category:</label>

                    <div class="col-sm-10">
                    <select class="form-control m-b" name="blog_category" id ="blog_category">
                             <option value='Select'>Select</option>
                            <option value='Environment'>Environment</option>
                            <option  value='Technology'>Technology</option>
                            <option  value='Travel'>Travel</option>
                            <option    value='Foodie'>Foodie</option>
                            <option value='Story Board'>Story Board</option>
                            <option  value='Fashion'>Fashion</option>
                            <option  value='Entrepreneur'>Entrepreneur</option>
                            <option  value='Sports'>Sports</option>
                            <option    value='Gallery'>Gallery</option>
                            <option  value='Videos'>Videos</option>
                            <option    value='Miscellaneous'>Miscellaneous</option>
                        </select>
                        </div>
                </div>

                
                <div class="form-group"><label class="col-sm-2 control-label">Image Upload:</label>

                    <div class="col-sm-10"><input type="file" class="form-control"  id ="blog_image" name ="blog_image"></div>
                </div>
               
                 <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button class="btn btn-default" type="submit">Cancel</button>
                        <input type ="button" class="btn btn-primary" value ="save" id ="btn_save">
                    </div>
                </div>
                </form>
                </div>
            </div>
        </div>
        
    </div>



    </div>

</div>

  <div class="modal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="color-line"></div>
                                <div class="modal-header">
                                    <h4 class="modal-title">TheoriesApart Says</h4>
                                    <small class="font-bold"></small>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Do you want to publish right now. </strong> 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" id ="publish_now" class="btn btn-primary">publish</button>
                                </div>
                            </div>
                        </div>
    </div>

<script>
function updateStatus()
{
    
$.ajax({
            url: 'updateBlogStatus.php', 
            cache: false,                       
            type: 'post',
            success: function(data)
            {   
               alert ("published");
             }
            
          });


}
$( document ).ready(function() {


    $("#publish_now").click(function(){

            updateStatus();

    });

    $("#btn_save").click(function(){

        var blog_tiltle = $("#blog_title").val();
        var blog_content = $("#blog_content").val();
        var blog_category = $("#blog_category").val();
        var sub_blog_category = $("#sub_blog_category").val();
         var file_data = $("#blog_image").prop('files')[0];   
          var file_valid = $("#blog_image").val(); 
        if(sub_blog_category==undefined)
        {
            sub_blog_category=null;
        }
        //validation
        if(blog_tiltle=="")
        {
            alert("Please Enter Title");
            $("#blog_title").focus();
            return false;

        }
        if(blog_content=="")
        {
            alert("Please Enter Content");
            $("#blog_content").focus();
            return false;

        }
         if(blog_category=="Select")
        {
            alert("Please Select Category");
            $("#blog_category").focus();
            return false;

        }
        if(sub_blog_category=="Select")
        {
            alert("Please select  Sub Category");
            $("#sub_blog_category").focus();
            return false;

        }
        /*if(file_valid=="")
        {
            alert("Please select Image");
            $("#blog_image").focus();
            return false;

        }*/
/*if()
        alert(blog_tiltle);
        alert(blog_content);
        alert(blog_category);*/

   
      var form_data = new FormData();                  
      form_data.append('userImage', file_data);
      form_data.append('blog_tiltle', blog_tiltle);
      form_data.append('blog_content', blog_content);
      form_data.append('blog_category',blog_category);  
      form_data.append('sub_blog_category',sub_blog_category);  
      form_data.append('action',"upload_blog");      
      
        $.ajax({
        url: 'upload.php', 
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(data)
        {   

            //alert(data);
            if(data >0){
    
             $('#myModal6').modal('show');
   
               
                }else{
                    alert("Server error  to upload Blog !!!!");
                }

                //location.reload();
                console.log(data);
        }
         
       
        
      });





    });

$( "#blog_category" ).change(function() {
    
var blog_sub_category = $("#blog_category").val();
  //alert( blog_sub_category );
   $.ajax({
            url: 'sub_category.php', 
            cache: false,
            dataType: "json",
            data: { category:blog_sub_category },                        
            type: 'post',
            success: function(data)
            {   
                  var result = eval(data);
              
             
                if(result.msg!="no")
                {
                    var element="<div class='form-group' id= 'sub_div'><label class='col-sm-2 control-label'>Sub Category:</label><div class='col-sm-10' id='subCategory'>";


                    element+="<select class='form-control m-b' id ='sub_blog_category'><option value='Select'>Select</option>";


                    for(var i=0; i<result.data.length; i++) {
                         element += '<option value="' + result.data[i].sub_category+ '">' + result.data[i].sub_category+ '</option>';
                    }

                    element += '</select></div> </div>';
                    $('#blog_cat').append(element);
                }
                else
                {
                    $('#sub_div').remove();
                }
           
            },
              error: function (request, status, error) {
                                    
    }
            
          });




});

    });



</script>

<?php

include("footer.php");

?>

