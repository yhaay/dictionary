<ul>
	<?php foreach($word_list as $list):?>
	<?= $list->word?>
	<?= $list->meaning?>
	<?= $list->referral?>
	<input type="hidden" value="<?= $list->wordidx?>">
	<?php endforeach; ?>
</ul>