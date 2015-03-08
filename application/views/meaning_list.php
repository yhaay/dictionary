<h3><?=$word->word?></h3>
<input type="hidden" value="<?=$word->wordidx?>">
<ul class="list-group">
	<?php foreach($meaning_list as $list):?>
	<li class="list-group-item">
		<?= $list->meaning?>
		<span meaningidx="<?=$list->meaningidx?>" class="badge"><?= $list->referral?></span>
	</li>
	<?php endforeach; ?>
</ul>

<script type="text/javascript">
	$(function() {
		$('.badge').click(function() {
			alert('test');
			var referral = parseInt($(this).html());
			var meaningidx = $(this).attr('meaningidx');
			var post_data = {
					'meaningidx' : meaningidx,
					'<?= $this->security->get_csrf_token_name(); ?>': '<?=$this->security->get_csrf_hash();?>'
			};

			$.ajax({
				type: "POST",
				url: "<?= base_url(); ?>word/update_referral",
				data: post_data,
				success: function(message) {
					$(this).html(referral+1);
					alert('추천되었습니다.');
				}
			});
		});
	});
</script>