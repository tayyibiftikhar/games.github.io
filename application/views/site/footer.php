
		<!-- Start footer -->
		<div class="footer">
			<ul>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li><a href="<?php echo base_url('about-us');?>">About Us</a></li>
				<li><a href="<?php echo base_url('privacy-policy');?>">Privacy Policy</a></li>
				<li><a href="<?php echo base_url('contact-us');?>">Contact Us</a></li>
			</ul>
		</div>

		<!--JavaScript -->
		<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.circle-progress.js');?>"></script>
		<script src="<?php echo base_url('assets/js/custom.js');?>"></script>


		<script>
			$(document).ready(function(){

			<?php
				if(isset($page) && $page == 'home'){
			?>
				var qCount = 1;
				jsonObj = [];

				$('#skipBtn').click(function(){
					skipQuestion();
				});

				function skipQuestion(){
					var parent = $(".question-wrapper");
					var question = parent.children();

					var firstChild = question.eq(0);
					firstChild.appendTo(parent).addClass('d-none');
					firstChild.addClass('d-none');

					question = parent.children();
					question.eq(0).removeClass('d-none');
				}


				$('.qns').on('click', function(){
					const clickSound = new Audio("<?php echo base_url('assets/sound/click.wav');?>");
      				clickSound.play();
					
					var parent = $(this).closest('.question');
					$(this).children().addClass('active');


					item = {};
					item [parent.attr('id')] = $(this).attr('val');

					jsonObj.push(item);

					if(qCount<20){
						setTimeout(function(){
							parent.fadeOut(300, function(){
								this.remove();
								var qparent = $(".question-wrapper");
								var question = qparent.children();
								question.eq(0).removeClass('d-none');
								processQuestion();
							});
						}, 100);
						
						qCount++;
					}else{
						$('.quiz-wrapper').remove();
						$('.process').show();

						setTimeout(function(){

							$.ajax({
						        url : '<?php echo base_url('gresponse');?>',
						        type: "POST",
						        data: {
						        	'response' : JSON.stringify(jsonObj)
						        },
						        dataType: "text",
						        beforeSend: function(){
						        	
						        },
						        success: function(data)
						        {
						        	$('.process').remove();
						        	$('.quiz-div').html(data);
						        },
						        error: function (jqXHR, textStatus, errorThrown)
						        {
						            alert('Error get data from ajax');
						        }
						    });

						},2000);

					}
				});

				function processQuestion(){
					$('.countdown li').each(function(){
						$(this).removeClass('active');
					});
					$('.countdown li').eq(qCount-1).addClass('active');
				}
			<?php }?>


			<?php
				if(isset($page) && $page == 'challenge'){
			?>

				var total_question = <?php echo $quiz->quiz_count;?>;
				var qa_array = <?php echo $quiz->JSON;?>;
				var score_count = 0;
				var qCount = 1;
				
				
				jsonObj = [];

				$('.qns').on('click', function(){


					var parent = $(this).closest('.question');
					var question = parent.attr('id');
					var answer = $(this).attr('val');

					
					if(qa_array[question] == answer){
						$(this).children().addClass('right');
						score_count++;
						const rightSound = new Audio("<?php echo base_url('assets/sound/right.wav');?>");
      					rightSound.play();
					}else{
						const wrongSound = new Audio("<?php echo base_url('assets/sound/wrong.wav');?>");
      				wrongSound.play();
						$(this).children().addClass('wrong');
						parent.find("[val='"+qa_array[question]+"']").children().addClass('right');
					}

					if(qCount<total_question){
						setTimeout(function(){
							parent.fadeOut(500, function(){
								this.remove();
								var qparent = $(".question-wrapper");
								var q_div = qparent.children();
								q_div.eq(0).removeClass('d-none');
								processQuestion();
							});
						}, 800);
					}else{
						$('.quiz-wrapper').fadeOut(1000, function(){
							this.remove();
							$('.process').show();

							setTimeout(function(){

								$.ajax({
							        url : '<?php echo base_url('save-challenge/'.$quiz_id);?>',
							        type: "POST",
							        data: {
							        	'score' : score_count,
							        },
							        dataType: "text",
							        beforeSend: function(){
							        	
							        },
							        success: function(data)
							        {
							        	$('.process').remove();
							        	$('.quiz-div').html(data);
							        	$('.score-check').circleProgress({
											max: 20,
											value: score_count,
											textFormat: 'vertical',
										});
							        },
							        error: function (jqXHR, textStatus, errorThrown)
							        {
							            alert('Error get data from ajax');
							        }
							    });

							},2000);

						});
					}

				});

				function processQuestion(){
					qCount++;
					$('.countdown li').each(function(){
						$(this).removeClass('active');
					});
					$('.countdown li').eq(qCount-1).addClass('active');
				}


			<?php }

				if(isset($page) && $page == 'result'){

					echo "
					$('.score-check').circleProgress({
						max: 20,
						value: ".$answer_details->c_score.",
						textFormat: 'vertical',
					});
					";
				}

			?>

			});
		</script>

		<!-- Custom footer -->
		<?php echo $site->site_custom_footer;?>

		<!--// End of Custom footer -->
	</body>
</html>