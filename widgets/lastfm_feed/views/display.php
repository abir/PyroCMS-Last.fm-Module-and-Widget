<?php if(!empty($tracks)): ?>

	<ul>
	<?php foreach($tracks as $track): ?>
		<li>
			<em class="track"><?php echo $track['title'];?></em> <small class="date"> (<?php echo $track['when'];?>)</small>
		</li>
	<?php endforeach; ?>
	</ul>
	
<?php else: ?>
	<p><?php echo lang('lastfm_no_tracks');?></p>
<?php endif; ?>