<ul>
	<?php foreach($word_list):?>
	<?= $word_list->word?>
	<?= $word_list->meaning?>
	<?= $word_list->referral?>
	<input type="hidden" value="<?= $word_list->wordidx?>">
	<?php endforeach; ?>
</ul>