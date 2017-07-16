<div style="margin: 30px 0; background-color: #ffc40d; padding: 20px;">
	<p>
		<label for="_use_new_episodes">
			<input type="checkbox" name="_use_new_episodes" id="_use_new_episodes" value="1"<?php checked( (int) $this->metadata['_use_new_episodes'] ); ?> />
			<strong>Use the new single episode structure.</strong>
		</label>
	</p>
	<p class="description">Click to enable the new parent/child structure for this lab.</p>
</div>
<div style="margin: 30px 0; background-color: #ccc; padding: 20px;">
	<p><label for="build_episode_playlist">
		<input type="checkbox" name="_build_episode_playlist" id="build_episode_playlist" value="1" />
		<strong>Build the Episode Playlist</strong>
	</label></p>
	<p class="description">Click to build/rebuild the episode playlist.</p>
</div>
<hr>
<h3>Lab Options</h3>
<p>
	<label for="ktc_coming_soon">
		<input type="checkbox" name="_ktc_coming_soon" id="ktc_coming_soon" value="1"<?php checked( (int) $this->metadata['_ktc_coming_soon'] ); ?> />
		<strong>Coming soon</strong>
	</label>
	<input type="text" name="_coming_soon_date" id="_coming_soon_date" value="<?php esc_attr_e( $this->metadata['_coming_soon_date'] ); ?>" style="text-align: right;" />
	<label for="_coming_soon_date">When is this content coming?</label>
</p>

<p>
	<label for="_is_free">
		<input type="checkbox" name="_is_free" id="_is_free" value="1"<?php checked( (int) $this->metadata['_is_free'] ); ?> />
		<strong>This content is free</strong>
	</label>
</p>


<h4>Video Stats</h4>
<p class="description">These fields are autopopulated when you build the episode playlist.</p>
<p>
	<input type="text" name="_video_runtime" id="video_runtime" value="<?php esc_attr_e( $this->metadata['_video_runtime'] ); ?>" style="text-align: right;" />
	<label for="video_runtime">Total Runtime for all of the Videos</label>
</p>
<p>
	<input type="text" name="_number_of_videos" id="number_of_videos" value="<?php echo (int) $this->metadata['_number_of_videos']; ?>" style="text-align: right;"  />
	<label for="number_of_videos">Total Number of Videos</label>
</p>

<h4>Series</h4>
<p>If this lab is part of a series, then fill in the information below.</p>
<p>
	<select id="_ktc_series_id" name="_ktc_series_id">
		<option value="0">-- Select Series Page --</option>
		<?php foreach( $this->series as $series ) : ?>
		<option value="<?php echo (int) $series->ID; ?>" <?php selected( (int) $series->ID, (int) $this->metadata['_ktc_series_id'] ); ?>><?php esc_html_e( $series->post_title ); ?></option>
		<?php endforeach; ?>
	</select><br/>
	<label for="_ktc_series_id">Series page for this lab</label>
</p>

<p>
	<input type="text" name="_ktc_series_sequence_number" id="_ktc_series_sequence_number" value="<?php echo (int) $this->metadata['_ktc_series_sequence_number']; ?>" style="text-align: right;"  />
	<label for="_ktc_series_sequence_number">Sequence number for this lab</label>
</p>
