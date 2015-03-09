<h3><?=$word->word?></h3>
<input type="hidden" value="<?=$word->wordidx?>">
<ul class="list-group">
	<?php foreach($meaning_list as $list):?>
	<li class="list-group-item">
		<?= $list->meaning?>
		<button type="button" class="btn btn-default btn-sm referral" meaningidx="<?=$list->meaningidx?>">
			<span class="glyphicon glyphicon-star"></span> <?= $list->referral?>
		</button>
	</li>
	<?php endforeach; ?>
</ul>

<div id="alert_refer" class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert">&times;</a> 추천되었습니다.
</div>


<script type="text/javascript">
	$('.alert').hide();

		$('.referral').click(function() {
			var button = $(this);
			var referral = parseInt($(this).html());
			var meaningidx = $(this).attr('meaningidx');
			var post_data = {
					'meaningidx' : meaningidx,
					'<?= $this->security->get_csrf_token_name() ?>': '<?=$this->security->get_csrf_hash()?>'
			};

			$.ajax({
				type: "POST",
				url: "/word/update_referral",
				data: post_data,
				success: function(message) {
					alert(message);
//					button.html(referral+1);
				},
				error: function(xhr, status, error) {
					alert("에러발생");
				}
			});
		});

</script>