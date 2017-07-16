<p>
    <label for="number_of_videos"><?php _e( 'Enter the labs in this series and separate by a comma', 'library' ); ?></label><br/>
    <input type="text" name="_labsinseries" id="_labsinseries" value="<?php esc_attr_e( genesis_get_custom_field( '_labsinseries' ) ); ?>" class="large-text" />
</p>

<hr/>
<h4>Video Stats</h4>
<p>
    <input type="text" name="_number_of_labs_in_series" id="_number_of_labs_in_series" value="<?php echo (int) genesis_get_custom_field( '_number_of_labs_in_series' ); ?>" />
    <label for="_number_of_labs_in_series"><?php _e( 'Number of Labs in this series', 'library' ); ?></label>
</p>
<p>
	<input type="text" name="_series_video_runtime" id="_series_video_runtime" value="<?php esc_attr_e( genesis_get_custom_field( '_series_video_runtime' ) ); ?>" />
	<label for="_series_video_runtime"><?php _e( 'Total Runtime for all of the Videos', 'library' ); ?></label>
</p>
<p>
	<input type="text" name="_number_of_videos_in_series" id="_number_of_videos_in_series" value="<?php echo (int) genesis_get_custom_field( '_number_of_videos_in_series' ); ?>" />
	<label for="_number_of_videos_in_series"><?php _e( 'Total Number of Videos', 'library' ); ?></label>
</p>