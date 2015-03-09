<h3><?=$word->word?></h3>
<input type="hidden" value="<?=$word->wordidx?>">
<ul class="list-group">
	<?php foreach($meaning_list as $list):?>
	<li class="list-group-item">
		<?= $list->meaning?>
		<button type="button" class="btn btn-default btn-sm referral"
			meaningidx="<?=$list->meaningidx?>">
			<span class="glyphicon glyphicon-thumbs-up text-right"></span> <span id="span_count"><?= $list->referral?></span>
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
			var count = $(this).children('#span_count');
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
					if (message == "success") {
						alert("추천되었습니다." + referral);
						button.html(referral+1);
					}
					else if (message == "fail")
						alert("이미 추천하셨습니다.");
				},
				error: function(xhr, status, error) {
					alert("에러발생");
				}
			});
		});

</script>