<h3><?=$word->word?></h3>
<input type="hidden" value="<?=$word->wordidx?>">
<ul class="list-group">
	<?php foreach($meaning_list as $list):?>
	<li class="list-group-item">
		<?= $list->meaning?>
		<span class="badge"><?= $list->referral?></span>
		<input type="hidden" value="<?=$list->meaningidx?>">
	</li>
	<?php endforeach; ?>
</ul>