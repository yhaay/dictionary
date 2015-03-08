<ul class="list-group">
	<?php foreach($word_list as $list):?>
	<a href="/word/detail/<?=$list->wordidx?>" class="list-group-item list-group-item-info"><?= $list->word?></a>
	<?php if (!is_null($list->meaning)):?>
	<li class="list-group-item">
		<?= $list->meaning?>
		<span class="badge"><?= $list->referral?></span>
	</li>
	<?php endif; ?>
	<input type="hidden" value="<?= $list->wordidx?>">
	<?php endforeach; ?>
</ul>