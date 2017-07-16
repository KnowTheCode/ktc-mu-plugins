<p>
	<span class="description"><?php printf( __( 'Heya, this metabox is for the Labs.  As it is an archive page, we need a place to enter the page opener.', 'library' ) ); ?></span>
</p>

<table class="form-table">
	<tbody>

	<tr valign="top">
		<th scope="row">
			<label for="<?php $this->field_id( 'labs_page_opener' ); ?>"><?php _e( 'Labs Page Opener Content', 'library' ); ?></label>
		</th>
		<td>
			<p>
				<textarea name="<?php $this->field_name( 'labs_page_opener' ); ?>" class="large-text" id="<?php $this->field_id( 'labs_page_opener' ); ?>" cols="78" rows="8"><?php echo esc_textarea( $this->get_field_value( 'labs_page_opener' ) ); ?></textarea>
			</p>
			<p>
				<span class="description"><?php printf( __( 'This is displayed under the page title.', 'library' ), genesis_code( '</head>' ) ); ?></span>
			</p>
		</td>
	</tr>

	</tbody>
</table>