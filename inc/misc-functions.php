<?php
	function acfcs_sort_array_with_quotes( $a, $b ) {
		return strnatcasecmp(
			acfcs_custom_sort_with_quotes( $a[ 'label' ] ),
			acfcs_custom_sort_with_quotes( $b[ 'label' ] )
		);
	}

	function acfcs_custom_sort_with_quotes( $city ) {
		// strip quote marks
		$city = trim( $city, '\'s ' );
		$city = preg_replace('/^\s*\'s \s+/i', '', $city );

		return $city;
	}


	/**
	 * Get all cities from a specific country
	 *
	 * @param string $country_code
	 *
	 * @return array|bool|mixed
	 */
	function acfcs_get_cities( $country_code = false ) {

		if ( false == $country_code ) {
			return false;
		}

		// get transient
		$output = get_transient( 'acfcs_cities_' . $country_code );

		// if transient doesn't exist, create a new one
		if ( false == $output ) {

			global $wpdb;
			// get all cities from database
			$db = $wpdb->get_results( "
                SELECT * FROM " . $wpdb->prefix . "cities
                  WHERE country_code = '{$country_code}'
                order by country DESC, city_name ASC
            " );

			// if has items
			if ( count( $db ) > 0 ) {
				$output = array();
				// build new array for transient
				foreach ( $db as $data ) {
					$output[] = array(
						'label' => $data->city_name,
						'value' => $data->city_name,
						'state' => strtoupper( $country_code ) . '-' . $data->state_code,
					);
				}
				// sort special "'s" for Holland
				uasort( $output, 'sort_array_with_quotes' );

				// create new transient
				set_transient( 'acfcs_cities_' . $country_code, $output, 24 * HOUR_IN_SECONDS );
			}
		}

		return $output;
	}

	/**
	 * Get all countries from db
	 *
	 * @return array|mixed
	 */
	function acfcs_get_countries() {

		$output = get_transient( 'acfcs_countries' );
		if ( false == $output ) {

			global $wpdb;
			$db = $wpdb->get_results( "
			        SELECT * FROM " . $wpdb->prefix . "cities
			        group by country_code
			        order by country ASC
		        " );

			// if there is at least 1 country
			if ( count( $db ) > 0 ) {
				$countries = array();
				foreach ( $db as $data ) {
					$countries[] = array(
						'value' => $data->country_code,
						'label' => $data->country,
					);
				}

				if ( count( $countries ) > 1 ) {
					$output = $countries;
				}
				set_transient( 'acfcs_countries', $output, 24 * HOUR_IN_SECONDS );

			}
		}

		return $output;
	}
