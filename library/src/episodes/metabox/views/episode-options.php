<p>
	<label for="episode_coming_soon">
		<input type="checkbox" name="_episode_config[episode_coming_soon]" id="episode_coming_soon" value="1"<?php checked( $this->metadata['_episode_config']['episode_coming_soon'] ); ?> />
		<strong><?php _e( 'Checkie this little box if this episode is still under construction, meaning Tonya hasn\'t gotten off her backside to record the video for it yet. :)', 'library' ); ?></strong>
	</label>
</p>
<p>
	<select name="_episode_config[episode_access]" id="_episode_access">
		<?php foreach ( $this->config->access as $name => $label ): ?>
			<option name="<?php echo $name; ?>"<?php selected( $this->metadata['_episode_config']['episode_access'], $name ); ?>><?php echo $label; ?></option>
		<?php endforeach; ?>
	</select>
	<label for="_episode_access"><?php _e( 'Membership Access Level', 'library' ); ?></label>
</p>
<p>
	<input type="text" name="_episode_config[episode_number]" id="_episode_number" value="<?php echo (int) $this->metadata['_episode_config']['episode_number']; ?>" style="text-align: center;" />
	<label for="_episode_number"><?php _e( 'Episode Number', 'library' ); ?></label>
</p>
<p>
	<input type="text" name="_episode_config[vimeo_id]" id="_vimeo_id" value="<?php esc_attr_e( $this->metadata['_episode_config']['vimeo_id'] ); ?>" style="text-align: center;" />
	<label for="_episode_number"><?php _e( 'Vimeo ID', 'library' ); ?></label>
</p>
<p>Episode Runtime:<br/>
	<input type="text" name="_episode_config[runtime][hours]" id="_episode_runtime_hours"
	       value="<?php echo (int) $this->metadata['_episode_config']['runtime']['hours']; ?>" style="text-align: right;" />
	<label for="_episode_runtime_hours"><?php _e( 'Hours', 'library' ); ?></label><br/>
	<input type="text" name="_episode_config[runtime][minutes]" id="_episode_runtime_minutes"
	       value="<?php echo (int) $this->metadata['_episode_config']['runtime']['minutes']; ?>" style="text-align: right;" />
	<label for="_episode_runtime_minutes"><?php _e( 'Minutes', 'library' ); ?></label><br/>
	<input type="text" name="_episode_config[runtime][seconds]" id="_episode_runtime_seconds"
	       value="<?php echo (int) $this->metadata['_episode_config']['runtime']['seconds']; ?>" style="text-align: right;" />
	<label for="_episode_runtime_seconds"><?php _e( 'Seconds', 'library' ); ?></label><br/>
</p>