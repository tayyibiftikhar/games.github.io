		<footer class="footer">
			<div class="container">
				<span class="text-muted">Quiz Admin Panel.</span>
			</div>
		</footer>

		
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

		<script>
			$(document).ready(function(){
				var quiztable;
				var questiontable;
				$('#site_contact, #site_about, #site_privacy').summernote();
				
				//quiz table
                quiztable = $('#quizTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "pageLength": 20,
                    "ajax": {
                        "url": "<?php echo base_url('admin/list-quiz')?>",
                        "type": "POST"
                    },
                    "order": [[ 0, "desc" ]],
                    "columnDefs": [
                        {"targets": [-1], "orderable": false}
                    ],
                    responsive: true
                });


                //question table
                questiontable = $('#questionTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "pageLength": 20,
                    "ajax": {
                        "url": "<?php echo base_url('admin/list-question')?>",
                        "type": "POST"
                    },
                    "order": [[ 0, "desc" ]],
                    "columnDefs": [
                        {"targets": [2, -1], "orderable": false}
                    ],
                    responsive: true
                });


                //Delete quiz
	            $(document).on('click', '#delQuiz', function(e){
	                e.preventDefault();
	                var loc = $(this).attr('href');

	                var cmd = confirm('Are you confirm to delete this quiz!');

	                if(cmd){
	                	//Ajax Load data from ajax
	                    $.ajax({
	                        url : loc,
	                        type: "GET",
	                        success: function(data)
	                        {
	                            if(data){
	                                alert(data);
	                                quiztable.ajax.reload();
	                            }
	                        },
	                        error: function (jqXHR, textStatus, errorThrown)
	                        {
	                            alert('Error get data from ajax');
	                        }
	                    });
	                }
	            });


			});
		</script>
	</body>
</html>