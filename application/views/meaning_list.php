<h3><?=$word->word?></h3>
<input type="hidden" id="wordidx" name="wordidx"
	value="<?=$word->wordidx?>">
<ul class="list-group">
	<?php foreach($meaning_list as $list):?>
	<li class="list-group-item">
		<?= $list->meaning?>
		<button type="button" class="btn btn-default btn-sm referral"
			meaningidx="<?=$list->meaningidx?>">
			<span class="glyphicon glyphicon-thumbs-up"></span> <span><?= $list->referral?></span>
		</button>
	</li>
	<?php endforeach; ?>
</ul>

<div class="input-group">
	<input type="text" class="form-control" id="new-meaning"
		name="new-meaning"> <span class="input-group-btn">
		<button class="btn btn-default new-meaning" type="submit">등록</button>
	</span>
</div>

<script type="text/javascript">

	$('.new-meaning').click(function() {
		var meaning = $('#new-meaning').val();
		var wordidx = $('#wordidx').val();
		var post_data = {
				'wordidx' : wordidx,
				'meaning' : meaning,
				'<?= $this->security->get_csrf_token_name() ?>': '<?=$this->security->get_csrf_hash()?>'
		};
		
		$.ajax({
			type: "POST",
			url: "/word/insert_meaning",
			data: post_data,
			success: function(message) {
				location.reload();
			},
			error: function(xhr, status, error) {
				alert("에러발생");
			}
		});
		
	});

		$('.referral').click(function() {
			var count = $(this).children().last();
			var referral = parseInt(count.html());
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
						count.html(referral+1);
						alert("추천되었습니다.");
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