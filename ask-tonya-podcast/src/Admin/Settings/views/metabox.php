<p>
	<span class="description"><?php printf( __( 'Heya, this metabox is for the podcast.  As it is an archive page, we need a place to enter the page opener.', 'asktonya' ) ); ?></span>
</p>

<table class="form-table">
	<tbody>

	<tr valign="top">
		<th scope="row">
			<label for="<?php $this->field_id( 'asktonya_page_opener' ); ?>"><?php _e( 'Ask Tonya Podcast Page Opener Content', 'asktonya' ); ?></label>
		</th>
		<td>
			<p>
				<textarea name="<?php $this->field_name( 'asktonya_page_opener' ); ?>" class="large-text" id="<?php $this->field_id( 'asktonya_page_opener' ); ?>" cols="78" rows="8"><?php echo esc_textarea( $this->get_field_value( 'asktonya_page_opener' ) ); ?></textarea>
			</p>
			<p>
				<span class="description"><?php printf( __( 'This is displayed under the page title.', 'asktonya' ), genesis_code( '</head>' ) ); ?></span>
			</p>
		</td>
	</tr>

    <tr valign="top">
        <th scope="row">
            <label for="<?php $this->field_id( 'asktonya_og_image' ); ?>"><?php esc_html_e( 'Open Graph Image', 'asktonya' ); ?></label>
        </th>
        <td>
            <p>
                <input type="text" name="<?php $this->field_name( 'asktonya_og_image' ); ?>" class="large-text" id="<?php $this->field_id( 'asktonya_og_image' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'asktonya_og_image' ) ); ?>" />
                <br /><small><strong><?php esc_html_e( 'Open Graph (Facebook) Image for the og:image meta', 'asktonya' ); ?></strong></small>
            </p>
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">
            <label for="<?php $this->field_id( 'asktonya_twitter_image' ); ?>"><?php esc_html_e( 'Twitter Image', 'asktonya' ); ?></label>
        </th>
        <td>
            <p>
                <input type="text" name="<?php $this->field_name( 'asktonya_twitter_image' ); ?>" class="large-text" id="<?php $this->field_id( 'asktonya_twitter_image' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'asktonya_twitter_image' ) ); ?>" />
                <br /><small><strong><?php esc_html_e( 'Twitter (Facebook) Image for the twitter:image meta', 'asktonya' ); ?></strong></small>
            </p>
        </td>
    </tr>

	</tbody>
</table>