<h3><?=$word->word?></h3>
<input type="hidden" value="<?=$word->wordidx?>">
<ul class="list-group">
	<?php foreach($meaning_list as $list):?>
	<li class="list-group-item">
		<?= $list->meaning?>
		<a href=""><span meaningidx="<?=$list->meaningidx?>"
			class="badge referral"><?= $list->referral?></span></a>
	</li>
	<?php endforeach; ?>
</ul>

<div id="alert_refer" class="alert alert-success">
	<a href="#" class="close" data-dismiss="alert">&times;</a> 추천되었습니다.
</div>

<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
				success: function() {
					button.html(referral+1);
					$('#alert_refer').show();
				}
			});
		});

</script>