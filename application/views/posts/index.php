
<div class="page-header">
    <h3 class="text-center"><?php echo $title; ?></h3>
</div>
<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Posts <a href="<?php echo site_url('posts/add'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<div class="col-xs-12 col-sm-6 col-md-12">
					<table id="example" class="display" style="width:100%">
						<thead>
			            <tr>
			            	<th>Id</th>
			                <th>Title</th>
			                <th>Content</th>                
			                <th>Action</th>
			            </tr>
			        </thead>			        		    
					</table>
			    </div>


			</div>
		</div>

<script>
    $(document).ready(function () {
    	var dataSet = <?php echo json_encode($posts) ?>;
        var objectsArray = [];
        window.mybaseurl='<?php echo base_url();?>';
		for (i = 0; i < dataSet.length; i++) {
		var post_id = mybaseurl+"posts/"+dataSet[i]['id'];
        var action_icons = '<a href="'+post_id+'" class="glyphicon glyphicon-eye-open"></a><a href="'+post_id+'" class="glyphicon glyphicon-edit"></a><a href="<?php echo site_url('/posts'); ?>" class="glyphicon glyphicon-trash"></a>';
		    objectsArray.push([dataSet[i]['id'], dataSet[i]['title'], dataSet[i]['content'], action_icons]);
		//console.log(post_id);
		}
    	console.log(objectsArray);
    	$.fn.dataTable.render.ellipsis = function ( cutoff ) {
		    return function ( data, type, row ) {
		        return type === 'display' && data.length > cutoff ?
		            data.substr( 0, cutoff ) +'…' :
		            data;
		    }
		};
        var employeeData = $('#example').DataTable({
            "data": objectsArray,
	        "columns": [
	            { "title": "Id" },
	            { "title": "Title" },
	            { "title": "Content" },
	            { "title": "Action" }
	        ],
	        "columnDefs": [ {
		        "targets": 2,
        		"render": $.fn.dataTable.render.ellipsis(150)
		    } ]	 

	    });
    });
</script>
