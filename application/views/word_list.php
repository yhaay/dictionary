<ul class="list-group">
	<?php foreach($word_list as $list):?>
	<a href="/word/detail/<?=$list->wordidx?>" class="list-group-item list-group-item-info"><?= $list->word?></a>
	<li class="list-group-item">
	<?php if (!is_null($list->meaning)):?>
		<?= $list->meaning?>
		<span class="badge"><?= $list->referral?></span>
	<?php else: ?>
		nbsp;
	<?php endif; ?>
	</li>
	<input type="hidden" value="<?= $list->wordidx?>">
	<?php endforeach; ?>
</ul>