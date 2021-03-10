<?php

/**
 * functions의 모든 wordpress hook 가져오기
 * 하위 폴더포함 모든 php hook!
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

//  검색관련
add_filter( 'relevanssi_results', 'rlv_exact_boost' );
function rlv_exact_boost( $results ) {
	$query = strtolower( get_search_query() );
	foreach ( $results as $post_id => $weight ) {
		$post = relevanssi_get_post( $post_id );

		// Boost cases where query appears in the title
		if ( stristr( $post->post_title, $query ) !== false ) {
			$results[ $post_id ] = $weight * 700;
        }

      	// Boost cases where query is exactly the title
  		if ( strtolower( $post->post_title ) === $query ) {
			$results[ $post_id ] = $weight * 700;
        }

		// Boost query appearances in post content
		if ( stristr( $post->post_content, $query ) !== false ) {
			$results[ $post_id ] = $weight * 700;
        }

		// Boost exact matches in a custom field
		if ( get_post_meta( $post_id, '_sku', true ) === $query ) {
			$results[ $post_id ] = $weight * 700;
        }
	}
	return $results;
}


$fileinfos = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator(plugin_dir_path(__FILE__)),
  RecursiveIteratorIterator::LEAVES_ONLY,
  RecursiveIteratorIterator::CATCH_GET_CHILD
);


foreach ($fileinfos as $pathname => $fileinfo) {
  if (!$fileinfo->isFile()) continue;
  if (strpos($pathname, '.php') !== false) {
    include_once($pathname);
  }
}
