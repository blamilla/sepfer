<?php 

/**
 * acf_decode_post_id
 *
 * Returns an array containing the object type and id for the given post_id string.
 *
 * @date	25/1/19
 * @since	5.7.11
 *
 * @param	(int|string) $post_id The post id.
 * @return	array()
 */
function acf_decode_post_id( $post_id = 0 ) {
	
	// Default data
	$data = array(
		'type'	=> 'post',
		'id'	=> $post_id
	);
	
	// Check if is numeric.
	if( is_numeric($post_id) ) {
		$data['id'] = (int) $post_id;
	
	// Check if is string.
	} elseif( is_string($post_id) ) {
		
		// Determine "{$type}_{$id}" from string.
		$bits = explode( '_', $post_id );
		$id = array_pop( $bits );
		$type = implode( '_', $bits );
		
		// Check if $type is meta.
		if( function_exists("get_{$type}_meta") ) {
			$data['type'] = $type;
			$data['id'] = (int) $id;
		
		// Check if is taxonomy name.
		} elseif( taxonomy_exists($type) ) {
			$data['type'] = 'term';
			$data['id'] = (int) $id;
			
		// Otherwise, default to option.
		} else {
			$data['type'] = 'option';
			$data['id'] = $post_id;
		}
	}
	
	/**
	 * Filters the $data array after it has been decoded.
	 *
	 * @date	12/02/2014
	 * @since	5.0.0
	 *
	 * @param	array $data The type and id array.
	 */
	return apply_filters( "acf/decode_post_id", $data, $post_id );
}

/**
 * acf_get_meta
 *
 * Returns an array of "ACF only" meta for the given post_id.
 *
 * @date	9/10/18
 * @since	5.8.0
 *
 * @param	mixed $post_id The post_id for this data.
 * @return	array
 */
function acf_get_meta( $post_id = 0 ) {
	
	// Allow filter to short-circuit load_value logic.
	$pre = apply_filters( "acf/pre_load_meta", null, $post_id );
    if( $pre !== null ) {
	    return $pre;
    }
    
	// Decode $post_id for $type and $id.
	extract( acf_decode_post_id($post_id) );
	
	// Use get_$type_meta() function when possible.
	if( function_exists("get_{$type}_meta") ) {
		$allmeta = call_user_func("get_{$type}_meta", $id, '', true);
	
	// Default to wp_options.
	} else {
		$allmeta = acf_get_option_meta( $id );
	}
	
	// Loop over meta and check that a reference exists for each value.
	$meta = array();
	foreach( $allmeta as $key => $value ) {
		
		// If a reference exists for this value, add it to the meta array.
		if( isset($allmeta["_$key"]) ) {
			$meta[ $key ] = $allmeta[ $key ][0];
			$meta[ "_$key" ] = $allmeta[ "_$key" ][0];
		}
	}
	
	/**
	 * Filters the $meta array after it has been loaded.
	 *
	 * @date	25/1/19
	 * @since	5.7.11
	 *
	 * @param	array $meta The arary of loaded meta.
	 * @param	string $post_id The $post_id for this meta.
	 */
	return apply_filters( "acf/load_meta", $meta, $post_id );
}


/**
 * acf_get_option_meta
 *
 * Returns an array of meta for the given wp_option name prefix in the same format as get_post_meta().
 *
 * @date	9/10/18
 * @since	5.8.0
 *
 * @param	string $prefix The wp_option name prefix.
 * @return	array
 */
function acf_get_option_meta( $prefix = '' ) {
	
	// Globals.
	global $wpdb;
	
	// Vars.
	$meta = array();
	$search = "{$prefix}_%";
	$_search = "_{$prefix}_%";
	
	// Escape underscores for LIKE.
	$search = str_replace('_', '\_', $search);
	$_search = str_replace('_', '\_', $_search);
	
	// Query database for results.
	$rows = $wpdb->get_results($wpdb->prepare(
		"SELECT * 
		FROM $wpdb->options 
		WHERE option_name LIKE %s 
		OR option_name LIKE %s",
		$search,
		$_search 
	), ARRAY_A);
	
	// Loop over results and append meta (removing the $prefix from the option name).
	$len = strlen("{$prefix}_");
	foreach( $rows as $row ) {
		$meta[ substr($row['option_name'], $len) ][] = $row['option_value'];
	}
	
	// Return unserialized results.
	return array_map('maybe_unserialize', $meta);
}

/**
 * acf_get_metadata
 *
 * Retrieves specific metadata from the database.
 *
 * @date	16/10/2015
 * @since	5.2.3
 *
 * @param	(int|string) $post_id The post id.
 * @param	string $name The meta name.
 * @param	bool $hidden If the meta is hidden (starts with an underscore).
 * @return	mixed
 */
function acf_get_metadata( $post_id = 0, $name = '', $hidden = false ) {
	
	// Decode $post_id for $type and $id.
	extract( acf_decode_post_id($post_id) );
	
	// Hidden meta uses an underscore prefix.
	$prefix = $hidden ? '_' : '';
	
	// Bail early if no $id (possible during new acf_form).
	if( !$id ) {
		return null;
	}
	
	// Check option.
	if( $type === 'option' ) {
		return get_option( "{$prefix}{$id}_{$name}", null );
		
	// Check meta.
	} else {
		$meta = get_metadata( $type, $id, "{$prefix}{$name}", false );
		return isset($meta[0]) ? $meta[0] : null;
	}
}

/**
 * acf_update_metadata
 *
 * Updates metadata in the database.
 *
 * @date	16/10/2015
 * @since	5.2.3
 *
 * @param	(int|string) $post_id The post id.
 * @param	string $name The meta name.
 * @param	mixed $value The meta value.
 * @param	bool $hidden If the meta is hidden (starts with an underscore).
 * @return	(int|bool) Meta ID if the key didn't exist, true on successful update, false on failure.
 */
function acf_update_metadata( $post_id = 0, $name = '', $value = '', $hidden = false ) {
	
	// Decode $post_id for $type and $id.
	extract( acf_decode_post_id($post_id) );
	
	// Hidden meta uses an underscore prefix.
	$prefix = $hidden ? '_' : '';
	
	// Bail early if no $id (possible during new acf_form).
	if( !$id ) {
		return false;
	}
	
	// Update option.
	if( $type === 'option' ) {
		
		// Unslash value to match update_metadata() functionality.
		$value = wp_unslash( $value );
		$autoload = (bool) acf_get_setting('autoload');
		return update_option( "{$prefix}{$id}_{$name}", $value, $autoload );
		
	// Update meta.
	} else {
		return update_metadata( $type, $id, "{$prefix}{$name}", $value );
	}
}

/**
 * acf_delete_metadata
 *
 * Deletes metadata from the database.
 *
 * @date	16/10/2015
 * @since	5.2.3
 *
 * @param	(int|string) $post_id The post id.
 * @param	string $name The meta name.
 * @param	bool $hidden If the meta is hidden (starts with an underscore).
 * @return	bool
 */
function acf_delete_metadata( $post_id = 0, $name = '', $hidden = false ) {
	
	// Decode $post_id for $type and $id.
	extract( acf_decode_post_id($post_id) );
	
	// Hidden meta uses an underscore prefix.
	$prefix = $hidden ? '_' : '';
	
	// Bail early if no $id (possible during new acf_form).
	if( !$id ) {
		return false;
	}
	
	// Update option.
	if( $type === 'option' ) {
		$autoload = (bool) acf_get_setting('autoload');
		return delete_option( "{$prefix}{$id}_{$name}" );
		
	// Update meta.
	} else {
		return delete_metadata( $type, $id, "{$prefix}{$name}" );
	}
}

/**
 * acf_copy_postmeta
 *
 * Copies meta from one post to another. Useful for saving and restoring revisions.
 *
 * @date	25/06/2016
 * @since	5.3.8
 *
 * @param	(int|string) $from_post_id The post id to copy from.
 * @param	(int|string) $to_post_id The post id to paste to.
 * @return	void
 */
function acf_copy_metadata( $from_post_id = 0, $to_post_id = 0 ) {
	
	// Get all postmeta.
	$meta = acf_get_meta( $from_post_id );
	
	// Check meta.
	if( $meta ) {
		
		// Slash data. WP expects all data to be slashed and will unslash it (fixes '\' character issues).
		$meta = wp_slash( $meta );
		
		// Loop over meta.
		foreach( $meta as $name => $value ) {
			acf_update_metadata( $to_post_id, $name, $value );	
		}
	}
}

/**
 * acf_copy_postmeta
 *
 * Copies meta from one post to another. Useful for saving and restoring revisions.
 *
 * @date	25/06/2016
 * @since	5.3.8
 * @deprecated 5.7.11
 *
 * @param	int $from_post_id The post id to copy from.
 * @param	int $to_post_id The post id to paste to.
 * @return	void
 */
function acf_copy_postmeta( $from_post_id = 0, $to_post_id = 0 ) {
	return acf_copy_metadata( $from_post_id, $to_post_id );
}

/**
 * acf_get_meta_field
 *
 * Returns a field using the provided $id and $post_id parameters.
 * Looks for a reference to help loading the correct field via name.
 *
 * @date	21/1/19
 * @since	5.7.10
 *
 * @param	string $key The meta name (field name).
 * @param	(int|string) $post_id The post_id where this field's value is saved.
 * @return	(array|false) The field array.
 */
function acf_get_meta_field( $key = 0, $post_id = 0 ) {
	
	// Try reference.
	$field_key = acf_get_reference( $key, $post_id );
	
	if( $field_key ) {
		$field = acf_get_field( $field_key );
		if( $field ) {
			$field['name'] = $key;
			return $field;
		}
	}
	
	// Return false.
	return false;
}
