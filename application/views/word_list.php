<ul>
	<?php foreach($word_list as $list):?>
	<li><?= $list->word?></li>
	<li><?= $list->meaning?>
	<?= $list->referral?></li>
	<input type="hidden" value="<?= $list->wordidx?>">
	<?php endforeach; ?>
</ul>