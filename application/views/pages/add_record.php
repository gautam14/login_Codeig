<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
<div class="row"><!-- row class is used for grid system in Bootstrap-->
  <div class="page-header">
    <h3 class="text-center">Signup form</h3>
  </div>
    <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
        <div class="login-panel panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Please do Registration here</h3>
            </div>
            <div class="panel-body">
			<?php 
			if($this->session->flashdata('success')){
			?>
			<div class="alert alert-success"> 
			<?php  echo $this->session->flashdata('success'); ?>
		    </div>
			<?php    
			} else if($this->session->flashdata('error')){
			?>
			<div class = "alert alert-success">
			<?php echo $this->session->flashdata('error'); ?>
			</div>
			<?php } ?>
              <?php 
              echo validation_errors();
              $attribute_form = array(
                'role'=> 'form', 
                'method'=> 'post', 
                'class'=> 'register_form', 
                'id'=> 'register_form'
              );
              echo form_open("add_record/submit_form", $attribute_form);
              echo form_fieldset();

              $data_name = array(
                'type'=> 'text',
                'name'=> 'user_name', 
                'value'=> set_value('user_name'),
                'class'=> 'form-control', 
                'placeholder'=> 'Please enter Name',
                'autofocus'=> true
              );
              echo "<div class='form-group'>".form_input($data_name)."</div>";              

              $data_position = array(
                'type'=> 'text', 
                'name'=> 'user_position',
                'value'=> set_value('user_position'), 
                'class'=> 'form-control', 
                'placeholder'=> 'Please enter position',
                'autofocus'=> true
              );
              echo "<div class='form-group'>".form_input($data_position)."</div>";

              $data_office = array(
              	'type'=> 'text',
                'name'=> 'user_office',
                'value'=> set_value('user_office'),  
                'class'=> 'form-control', 
                'placeholder'=> 'Enter office'
              );
              echo "<div class='form-group'>".form_input($data_office)."</div>";

              $data_age = array(
                'type'=> 'number', 
                'name'=> 'user_age',
                'value'=> set_value('user_age'),  
                'class'=> 'form-control', 
                'placeholder'=> 'Enter your age'
              );
              echo "<div class='form-group'>".form_input($data_age)."</div>";

              $data_date = array(
                'type'=> 'date', 
                'name'=> 'user_date',
                'value'=> set_value('user_date'),  
                'class'=> 'form-control', 
                'placeholder'=> 'Enter date'
              );
              echo "<div class='form-group'>".form_input($data_date)."</div>";

              $data_salary = array(
                'type'=> 'number', 
                'name'=> 'user_salary',
                'value'=> set_value('user_salary'),  
                'class'=> 'form-control', 
                'placeholder'=> 'Enter salary'
              );
              echo "<div class='form-group'>".form_input($data_salary)."</div>";

              $data_btn = array(
                'type'=> 'submit',
                'name'=> 'register',
                'class'=> 'btn btn-lg btn-success btn-block',                
                'value'=> 'Register'
              );
              echo form_submit($data_btn);
              
              echo form_fieldset_close();
              echo form_close();
              ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-12">
		<table id="example" class="display" style="width:100%">
			<thead>
            <tr>
            	<th>Id</th>
                <th>Name</th>
                <th>Position</th>                
                <th>Office</th>
                <th>Age</th>
                <th>Date</th>
                <th>Salary</th>
                <th></th>
				<th></th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Position</th>                
                <th>Office</th>
                <th>Age</th>
                <th>Date</th>
                <th>Salary</th>
                <th></th>
				<th></th>
            </tr>
        </tfoot>		    
		</table>
    </div>
</div>
</div>
<!-- <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal">Launch Demo Modal</a> -->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="panel-title">Update user record</h3>
        </div>
        <?php
          if($this->session->flashdata('edit_success')){
        ?>
        <div class="alert alert-success"> 
        <?php  echo $this->session->flashdata('edit_success'); ?>
          </div>
        <?php    
        } else if($this->session->flashdata('edit_error')){
        ?>
        <div class = "alert alert-success">
        <?php echo $this->session->flashdata('edit_error'); ?>
        </div>
        <?php }
          $attribute_form = array(
            'role'=> 'form', 
            'method'=> 'post', 
            'class'=> 'edit_form', 
            'id'=> 'edit_form'
            );
        echo form_open("add_record/update_user_record", $attribute_form);
        echo form_fieldset();
        ?>
        <div class="modal-body">          
        	<div class="login-panel panel panel-success">
        		<div class="panel-body">
	        		<?php
		        		
			            $u_name = array(
		                'type'=> 'text',
		                'name'=> 'u_name', 
		                'value'=> "",
		                'class'=> 'form-control u_name', 
		                'placeholder'=> 'Please enter Name',
		                'autofocus'=> true
			            );
			            echo "<div class='form-group'>".form_input($u_name)."</div>";

                  $u_position = array(
                    'type'=> 'text', 
                    'name'=> 'u_position',
                    'value'=> "", 
                    'class'=> 'form-control u_position', 
                    'placeholder'=> 'Please enter position'
                  );
                  echo "<div class='form-group'>".form_input($u_position)."</div>";

                  $u_office = array(
                    'type'=> 'text',
                    'name'=> 'u_office',
                    'value'=> "",  
                    'class'=> 'form-control u_office', 
                    'placeholder'=> 'Enter office'
                  );
                  echo "<div class='form-group'>".form_input($u_office)."</div>";

                  $u_age = array(
                    'type'=> 'number', 
                    'name'=> 'u_age',
                    'value'=> "",  
                    'class'=> 'form-control u_age', 
                    'placeholder'=> 'Enter your age'
                  );
                  echo "<div class='form-group'>".form_input($u_age)."</div>";

                  $u_date = array(
                    'type'=> 'date', 
                    'name'=> 'u_date',
                    'value'=> "",  
                    'class'=> 'form-control u_date', 
                    'placeholder'=> 'Enter date'
                  );
                  echo "<div class='form-group'>".form_input($u_date)."</div>";

                  $u_salary = array(
                    'type'=> 'number', 
                    'name'=> 'u_salary',
                    'value'=> "",  
                    'class'=> 'form-control u_salary', 
                    'placeholder'=> 'Enter salary'
                  );
                  echo "<div class='form-group'>".form_input($u_salary)."</div>";
		              ?>
        		</div>
        	</div>
        </div>
        <div class="modal-footer">
          <?php 

          $hidden_data = array(
            'type'  => 'hidden',
            'name'  => 'empId',
            'id'    => 'empId',
            'value' => '',
            'class' => 'empId'
          );

          echo form_input($hidden_data);
          // <input type="hidden" name="empId" id="empId" value="4412">

          $data_btn = array(
            'type'=> 'submit',
            'name'=> 'edit_record',
            'class'=> 'btn btn-success',                
            'value'=> 'Save'
          );
          echo form_submit($data_btn); 
          ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      <?php
      echo form_fieldset_close();
      echo form_close();
      ?>

      </div>
      
    </div>
  </div>


<script>
	// $(document).ready(function() {
	// 	$('#example').DataTable();
	// } );
    $(document).ready(function () {
        var employeeData = $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
		     "url": "<?php echo base_url('add_record/get_records') ?>",
		     "dataType": "json",
		     "type": "POST"
		        },
	        "columnDefs":[
				{
					"targets":[0],
					"orderable":false,
				},
			],
	    "columns": [
		          { "data": "id" },
		          { "data": "name" },
		          { "data": "position" },
		          { "data": "office" },
		          { "data": "age" },
		          { "data": "date" },
		          { "data": "salary" },
		          { "data": "edit" },
		          { "data": "delete" },
		       ]	 

	    });

		function alignModal(){
			var modalDialog = $(this).find(".modal-dialog");
			// Applying the top margin on modal dialog to align it vertically center
			modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
		}
		// Align modal when it is displayed
		$(".modal").on("shown.bs.modal", alignModal);

		// Align modal when user resize the window
		$(window).on("resize", function(){
			$(".modal:visible").each(alignModal);
		});


		$("#example").on('click', '.update', function(){
			var user_id = $(this).attr('id');
			//console.log(user_id);
			$.ajax({
				url:'<?php echo base_url()."add_record/get_user_record" ?>',
				method:"POST",
				data:{'user_id':user_id},
				dataType:"json",
				success:function(data){
					//console.log(data[0].id);
          $('#myModal').modal('show');
          $('#myModal .empId').val(data[0].id);
          $('#myModal .u_name').val(data[0].name);
          $('#myModal .u_position').val(data[0].position);
          $('#myModal .u_office').val(data[0].office);
          $('#myModal .u_age').val(data[0].age);
          $('#myModal .u_date').val(data[0].date);
          $('#myModal .u_salary').val(data[0].salary);          
				}
			})

		})

    $("#example").on('click', '.delete', function(){
      var user_id = $(this).attr('id');
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url:'<?php echo base_url()."add_record/delete_user_record" ?>',
            method:"POST",
            data:{'user_id':user_id},
            dataType:"json",
            success:function(data){
              employeeData.ajax.reload();

            }
          })
    
          swal("User record has been deleted!", {
            icon: "success",
          });
        }
      });




  
      



    })

    });
</script>