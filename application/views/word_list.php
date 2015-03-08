<ul class="list-group">
	<?php foreach($word_list as $list):?>
	<a href="#" class="list-group-item"><?= $list->word?></a>
	<li class="list-group-item list-group-item-info">
		<?= $list->meaning?>
		<span class="badge"><?= $list->referral?></span>
	</li>
	<input type="hidden" value="<?= $list->wordidx?>">
	<?php endforeach; ?>
</ul>