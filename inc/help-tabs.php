<?php

	/**
	 * Add help tabs
	 *
	 * @param $old_help  string
	 * @param $screen_id int
	 * @param $screen    object
	 */
	function acfcs_help_tabs( $old_help, $screen_id, $screen ) {

		// echo '<pre>'; var_dump($screen_id); echo '</pre>'; exit;

		$screen_array = array(
			'settings_page_acfcs-options',
			'settings_page_acfcs-settings',
		);
		if ( ! in_array( $screen_id, $screen_array ) ) {
			return false;
		}

		if ( 'settings_page_acfcs-options' == $screen_id ) {
			$screen->add_help_tab( array(
				'id'      => 'import-file',
				'title'   => esc_html__( 'Import CSV from file', 'acf-city-selector' ),
				'content' =>
					// '<h5>Import CSV from file</h5>
					'<p>' . esc_html__( 'On this page you can import a CSV file which contains cities to import.', 'acf-city-selector' ) . '</p>'
			) );

			$screen->add_help_tab( array(
				'id'      => 'import-raw',
				'title'   => esc_html__( 'Import raw CSV data', 'acf-city-selector' ),
				'content' =>
					'<h5>Import cities through CSV data</h5>
					<p>' . esc_html__( 'On this page you can import cities. You can select cities from The Netherlands, Belgium and Luxembourg which come included in the plugin.', 'acf-city-selector' ) . '</p>
					<p>' . esc_html__( 'You can also import raw csv data, but this has to be formatted (and ordered) in a certain way, otherwise it won\'t work.', 'acf-city-selector' ) . '</p>
					<p>' . esc_html__( 'The required order is "City,State code,State,Country code,Country".', 'acf-city-selector' ) . '</p>
					<table class="" cellpadding="0" cellspacing="0">
					<thead>
					<tr>
					<th>' . esc_html__( 'Field', 'acf-city-selector' ) . '</th>
					<th>' . esc_html__( 'What to enter', 'acf-city-selector' ) . '</th>
					<th>' . esc_html__( 'Note', 'acf-city-selector' ) . '</th>
					</tr>					
					</thead>
					<tbody>
					<tr>
					<td>' . esc_html__( 'City', 'acf-city-selector' ) . '</td>
					<td>' . esc_html__( 'full name', 'acf-city-selector' ) . '</td>
					<td>&nbsp;</td>
					</tr>
					<tr>
					<td>' . esc_html__( 'State code', 'acf-city-selector' ) . '</td>
					<td>' . esc_html__( 'state abbreviation', 'acf-city-selector' ) . '</td>
					<td>' . esc_html__( 'exactly 2 characters', 'acf-city-selector' ) . '</td>
					</tr>
					<tr>
					<td>' . esc_html__( 'State', 'acf-city-selector' ) . '</td>
					<td>' . esc_html__( 'full state name', 'acf-city-selector' ) . '</td>
					<td>&nbsp;</td>
					</tr>
					<tr>
					<td>' . esc_html__( 'Country code', 'acf-city-selector' ) . '</td>
					<td>' . esc_html__( 'country abbreviation', 'acf-city-selector' ) . '</td>
					<td>' . esc_html__( 'exactly 2 characters', 'acf-city-selector' ) . '</td>
					</tr>
					<tr>
					<td>' . esc_html__( 'Country', 'acf-city-selector' ) . '</td>
					<td>' . esc_html__( 'full country name', 'acf-city-selector' ) . '</td>
					<td>&nbsp;</td>
					</tr>
					</tbody>
					</table>'
			) );

		}

		get_current_screen()->set_help_sidebar(
			'<p><strong>' . esc_html__( 'Author\'s website', 'acf-city-selector' ) . '</strong></p>' .
			'<p><a href="http://www.berryplasman.com?utm_source=' . $_SERVER[ 'SERVER_NAME' ] . '&utm_medium=plugin_admin&utm_campaign=free_promo">berryplasman.com</a></p>'
		);

		return $old_help;
	}
	add_filter( 'contextual_help', 'acfcs_help_tabs', 5, 3 );
