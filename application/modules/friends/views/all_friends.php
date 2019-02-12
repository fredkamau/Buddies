<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/themes/custom/styles.css">
	<link href="<?php base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php base_url();?>assets/vendor/jquery/jquery-3.3.1.slim.min.js" rel="stylesheet">
	<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
	
	</script>

</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Dashboard</a>
		<input id="myInput" class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="#">Sign out</a>
			</li>
		</ul>
	</nav>
	
<script>

// window.onload = function() {
//     if (window.jQuery) {  
//         // jQuery is loaded  
//         alert("Yeah!");
//     } else {
//         // jQuery is not loaded
//         alert("Doesn't Work");
//     }
// }

</script>


	<div class="container">
		<?php 
        $success = $this-> session ->flashdata("success_message");
        $error = $this-> session ->flashdata("error_message");


        if(!empty($success)){
            echo $success;
        }

        if(!empty($error)){
            echo $error;
        }
        ?>
       <div class="buddies_tag">
           <h2>Buddies.Com</h2>
       </div>
       <div>
       <?php echo anchor("friends/new_friend", "Add Friend", "class='addfriend_tag btn btn-primary'");?>
		<table class="table table-hover">
            
       </div>
             <thead>  
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Age</th>
                <th>Gender</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
                

			</tr>
	      
			<?php
            if ($all_friends->num_rows() > 0) {
                $count = 0;
                foreach ($all_friends->result() as $row) {
                    $count++;
                    $id = $row->friend_id;
                    $name = $row->friend_name;
                    $age = $row->friend_age;
					$gender = $row->friend_gender;?>
			</thead>
			<tbody id="myTable">
			<tr>
				<td>
					<?php echo $count; ?>
				</td>
				<td>
					<?php echo $name; ?>
				</td>
				<td>
					<?php echo $age; ?>
				</td>
				<td>
					<?php echo $gender; ?>
				</td>
				<td>
					<?php echo anchor("friends/welcome/".$id,"View", "class='btn btn-primary'");?>
					<a href="<?php echo site_url()?>friends/welcome/">
				</td>
				<td>
					<?php echo anchor("friends/edit/".$id,"Edit", "class='btn btn-warning'");?>
					<a href="<?php echo site_url()?>friends/welcome/">
				</td>
				<td>
					<?php echo anchor("friends/delete/".$id,"Delete", "class='btn btn-danger'");?>
					<a href="<?php echo site_url()?>friends/welcome/">
				</td>

			</tr>
			<?php 
                }
            }

?>


			</tbody>
	
		</table>
        </div>
		
		
	</div>
</body>

</html>
