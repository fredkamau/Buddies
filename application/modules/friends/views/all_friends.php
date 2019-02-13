<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/themes/custom/styles.css">
	<link href="<?php base_url();?>../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php base_url();?>assets/vendor/jquery/jquery-3.3.1.slim.min.js" rel="stylesheet">

</head>

<body>

	
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
		   <h2>My Buddies</h2>   
       </div>
       <div>
	   <?php //echo anchor("friends/new_friend", "Add Friend", "class='addfriend_tag btn btn-info btn-md'");?>  

	   
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
				<!-- <td>
					<?php //echo anchor("friends/delete/".$id,"Delete", "class='btn btn-danger'");?>
					<a href="<?php //echo site_url()?>friends/welcome/">
				</td> -->
				<td>
                   <?php echo anchor("friends/delete_friend/".$id, "Delete", "class='btn btn-danger'");?>
               </td>

			</tr>
			<?php 
                }
            }
?>
			</tbody>
		</table>
		<p><?php echo $this->pagination->create_links(); ?></p>

        </div>	
	</div>

	<?php $this->load->view("site/layouts/includes/footer.php"); ?>
</body>

</html>
