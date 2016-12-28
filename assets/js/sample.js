//var result = str.link("resource/wanted");
 
$(function(){
    $('#select_location').change(function(){
        $.ajax({
            url: ctrlr_func("pnp/json"),
            type: 'POST',
            data: {"station":$(this).val()},
            success: function (data, textStatus, jqXHR){
                jsondata = $.parseJSON(data);
                $('#test').text(''); 
                $.each(jsondata, function(index, value){
                    console.log(value["topten_id"], value["first_name"], value["station"], value["image_path"], value["rank"]); 
                    
		    var controls = '<div class="uk-width-medium-1-5 uk-text-center">' + '<div class="img-container">' +  
                              '<img style="width:200px;height:200px;" src="'+ site_url + value['image_path'] +' ">' + 
                              '<p class="wanted-name">' + value["first_name"] + '</p>' + 
                              '<p class="wanted-desc">' + value["station"] + '</p>' +
                              '<p class="wanted-name">' + '<strong>' + rank + '</strong>' + '&nbsp' + value["rank"] + '</p>';
		    if(accounttype == 0){
		        controls += '<a href=" '+ edit_wanted + value['topten_id'] +' " data-uk-tooltip="" data-cached-title=" ' + edit_view_name + ' " class="uk-button btn-save icn-edit-admin">' + '<i class="uk-icon-pencil">' + '</i>' + '</a>'
                        controls += '<a data-uk-tooltip="" purpose="delete" data-cached-title="Delete" class="uk-button btn-del icn-del" tid="'+value['topten_id']+'">' + '<i class="uk-icon-trash" purpose="delete" tid="'+value['topten_id']+'">'  + '</i>' + '</a>';
                    }
		    else{
		    	controls += '<a href=" '+ edit_wanted + value['topten_id'] +' " data-uk-tooltip="" data-cached-title=" ' + edit_view_name + ' " class="uk-button btn-save icn-edit-user">' + '<i class="uk-icon-pencil">' + '</i>' + '</a>'
		    }
		    controls += '</div>' + '</div>';
                    $('#test').append(controls);
                     
                });
                    
                
            },
            error: function  (jqXHR, textStatus, errorThrown) {
                
            },
            complete: function (jqXHR, textStatus) {

            }
        });
    });
    
    $('body').click(function(e){
	if($(e.target).attr('purpose')=="delete"){
	    var del_cfm=confirm("Are you sure you want to DELETE this?");
	    if(del_cfm==true){
	        window.location = delete_wanted + $(e.target).attr('tid')
	    }
	}
    });
});


