<?php foreach($word_list as $list):?>
<div class="panel panel-info">
	<h3 class="panel-title">
		<a href="/word/detail/<?=$list->wordidx?>"
			class="list-group-item list-group-item-info"><?= $list->word?></a>
	</h3>
	<div class="panel-body">
	<?php if (!is_null($list->meaning)):?>
		<?= $list->meaning?>
		<span class="badge"><?= $list->referral?></span>
	<?php else: ?>
		등록된 뜻이 없습니다.
	<?php endif; ?>
	</div>
	<input type="hidden" value="<?= $list->wordidx?>">
</div>
<?php endforeach; ?>
