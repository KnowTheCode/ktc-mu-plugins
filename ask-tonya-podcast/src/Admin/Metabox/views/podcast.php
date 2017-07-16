<p>
	<label for="episode_coming_soon">
		<input type="checkbox" name="_asktonya_episode_metadata[episode_coming_soon]" id="episode_coming_soon" value="1"<?php checked( $this->metadata['_asktonya_episode_metadata']['episode_coming_soon'] ); ?> />
		<strong><?php _e( 'Checkie this little box if this episode is still under construction, meaning Tonya hasn\'t gotten off her backside to record the video for it yet. :)', 'asktonya' ); ?></strong>
	</label>
</p>
<p>
	<select name="_asktonya_episode_metadata[episode_access]" id="_episode_access">
		<?php foreach ( $this->config->access as $name => $label ): ?>
			<option name="<?php echo $name; ?>"<?php selected( $this->metadata['_asktonya_episode_metadata']['episode_access'], $name ); ?>><?php echo $label; ?></option>
		<?php endforeach; ?>
	</select>
	<label for="_episode_access"><?php _e( 'Membership Access Level', 'asktonya' ); ?></label>
</p>
<p>
	<input type="text" name="_asktonya_episode_metadata[episode_number]" id="_episode_number" value="<?php echo (int) $this->metadata['_asktonya_episode_metadata']['episode_number']; ?>" style="text-align: center;" />
	<label for="_episode_number"><?php _e( 'Episode Number', 'asktonya' ); ?></label>
</p>
<p>
	<input type="text" name="_asktonya_episode_metadata[vimeo_id]" id="_vimeo_id" value="<?php esc_attr_e( $this->metadata['_asktonya_episode_metadata']['vimeo_id'] ); ?>" style="text-align: center;" />
	<label for="_episode_number"><?php _e( 'Vimeo ID', 'asktonya' ); ?></label>
</p>
<p>Episode Runtime:<br/>
	<input type="text" name="_asktonya_episode_metadata[runtime][hours]" id="_episode_runtime_hours"
	       value="<?php echo (int) $this->metadata['_asktonya_episode_metadata']['runtime']['hours']; ?>" style="text-align: right;" />
	<label for="_episode_runtime_hours"><?php _e( 'Hours', 'asktonya' ); ?></label><br/>
	<input type="text" name="_asktonya_episode_metadata[runtime][minutes]" id="_episode_runtime_minutes"
	       value="<?php echo (int) $this->metadata['_asktonya_episode_metadata']['runtime']['minutes']; ?>" style="text-align: right;" />
	<label for="_episode_runtime_minutes"><?php _e( 'Minutes', 'asktonya' ); ?></label><br/>
	<input type="text" name="_asktonya_episode_metadata[runtime][seconds]" id="_episode_runtime_seconds"
	       value="<?php echo (int) $this->metadata['_asktonya_episode_metadata']['runtime']['seconds']; ?>" style="text-align: right;" />
	<label for="_episode_runtime_seconds"><?php _e( 'Seconds', 'asktonya' ); ?></label><br/>
</p>