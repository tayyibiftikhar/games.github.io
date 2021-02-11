			<!-- Begin page content -->
			<main role="main" class="container main-container">
				<h1 class="mt-5">
					Q - <?php echo $question->q_title;?>
					<a class="btn btn-warning float-right" href="<?php echo base_url('admin/add-answer/'.$question->q_id);?>">Add New Answer</a>
				</h1>
				<p class="lead">
					Below are the list of answers for the above question. You can add answer for the above question. <strong class="text-danger">If you want to add answer, keep in mind you can't delete it. You can only edit that. So be carefull. Don't add unwanted answer.</strong>
				</p>
				<p class="lead">
					
					<table class="table table-striped display" style="width:100%">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>Answer</th>
	                            <th>Thumbnail</th>
	                            <th>Option</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    <?php
	                    	$i = 1;
	                    	foreach ($answer as $ans) {
	                    		echo '
	                    			<tr>
	                    				<td>'.$i.'</td>
	                    				<td>'.$ans->a_text.'</td>
	                    				<td><img class="img-thumbnail img-fluid" src="'.base_url('upload/'.$ans->a_thumb).'"></td>
	                    				<td>
	                    					<a href="'.base_url("admin/edit-answer/".$ans->a_id).'" class="btn btn-success btn-sm p-1 mb-1 text-white">Edit</a>
	                    				</td>
	                    			</tr>
	                    		';
	                    		$i++;
	                    	}  
	                    ?>
	                    </tbody>
	                    <tfoot>
	                        <tr>
	                           	<th>#</th>
	                            <th>Answer</th>
	                            <th>Thumbnail</th>
	                            <th>Option</th>
	                        </tr>
	                    </tfoot>
	                </table>
				</p>
			</main>

			