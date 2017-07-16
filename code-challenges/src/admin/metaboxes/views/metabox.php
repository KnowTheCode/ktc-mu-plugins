<p>
	<label for="_is_code_challenge_task">
		<input type="checkbox" name="code_challenges[_is_code_challenge_task]" id="_is_code_challenge_task" value="1"<?php checked( genesis_get_custom_field( '_is_code_challenge_task' ) ); ?> />
		<strong><?php _e( 'Checkie this little box if this one is still under construction, meaning Tonya hasn\'t gotten off her backside to record the vids for it yet. :)', 'library' ); ?></strong>
	</label>
</p>
<hr>
<h4>Video Stats</h4>
<p>
	<input type="text" name="code_challenges[_video_runtime]" id="video_runtime" value="<?php esc_attr_e( genesis_get_custom_field( '_video_runtime' ) ); ?>" />
	<label for="video_runtime"><?php _e( 'Total Runtime for all of the Videos', 'library' ); ?></label>
</p>
<p>
	<input type="text" name="code_challenges[_number_of_videos]" id="number_of_videos" value="<?php echo (int) genesis_get_custom_field( '_number_of_videos' ); ?>" />
	<label for="number_of_videos"><?php _e( 'Total Number of Videos', 'library' ); ?></label>
</p>