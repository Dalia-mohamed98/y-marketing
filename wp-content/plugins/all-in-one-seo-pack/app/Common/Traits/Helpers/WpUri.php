<?php
namespace AIOSEO\Plugin\Common\Traits\Helpers;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Contains all WordPress related URL, URI, path, slug, etc. related helper methods.
 *
 * @since 4.1.4
 */
trait WpUri {
	/**
	 * Returns the site domain.
	 *
	 * @since 4.0.0
	 *
	 * @return string The site's domain.
	 */
	public function getSiteDomain() {
		return wp_parse_url( home_url(), PHP_URL_HOST );
	}

	/**
	 * Returns the site URL.
	 * NOTE: For multisites inside a sub-directory, this returns the URL for the main site.
	 * This is intentional.
	 *
	 * @since 4.0.0
	 *
	 * @return string The site's domain.
	 */
	public function getSiteUrl() {
		return wp_parse_url( home_url(), PHP_URL_SCHEME ) . '://' . wp_parse_url( home_url(), PHP_URL_HOST );
	}

	/**
	 * Returns the current URL.
	 *
	 * @since 4.0.0
	 *
	 * @param  boolean $canonical Whether or not to get the canonical URL.
	 * @return string             The URL.
	 */
	public function getUrl( $canonical = false ) {
		if ( is_singular() ) {
			$object = get_queried_object_id();

			return $canonical ? wp_get_canonical_url( $object ) : get_permalink( $object );
		}

		global $wp;

		return trailingslashit( home_url( $wp->request ) );
	}

	/**
	 * Gets the canonical URL for the current page/post.
	 *
	 * @since 4.0.0
	 *
	 * @return string $url The canonical URL.
	 */
	public function canonicalUrl() {
		static $canonicalUrl = '';
		if ( $canonicalUrl ) {
			return $canonicalUrl;
		}

		$metaData = [];
		$post     = $this->getPost();
		if ( $post ) {
			$metaData = aioseo()->meta->metaData->getMetaData( $post );
		}

		if ( is_category() || is_tag() || is_tax() ) {
			$metaData = aioseo()->meta->metaData->getMetaData( get_queried_object() );
		}

		if ( $metaData && ! empty( $metaData->canonical_url ) ) {
			return $metaData->canonical_url;
		}

		$url = $this->getUrl( true );
		if ( aioseo()->options->searchAppearance->advanced->noPaginationForCanonical && 1 < $this->getPageNumber() ) {
			$url = preg_replace( '#(\d+\/|(?<=\/)page\/\d+\/)$#', '', $url );
		}

		$url = $this->maybeRemoveTrailingSlash( $url );

		// Get rid of /amp at the end of the URL.
		if ( ! apply_filters( 'aioseo_disable_canonical_url_amp', false ) ) {
			$url = preg_replace( '/\/amp$/', '', $url );
			$url = preg_replace( '/\/amp\/$/', '/', $url );
		}

		$searchTerm = get_query_var( 's' );
		if ( is_search() && ! empty( $searchTerm ) ) {
			$url = add_query_arg( 's', $searchTerm, $url );
		}

		return apply_filters( 'aioseo_canonical_url', $url );
	}

	/**
	 * Formats a given URL as an absolute URL if it is relative.
	 *
	 * @since 4.0.0
	 *
	 * @param  string $url The URL.
	 * @return string $url The absolute URL.
	 */
	public function makeUrlAbsolute( $url ) {
		if ( 0 !== strpos( $url, 'http' ) && '/' !== $url ) {
			if ( 0 === strpos( $url, '//' ) ) {
				$scheme = wp_parse_url( home_url(), PHP_URL_SCHEME );
				$url    = $scheme . ':' . $url;
			} else {
				$url = home_url( $url );
			}
		}

		return $url;
	}

	/**
	 * Sanitizes a given domain.
	 *
	 * @since 4.0.0
	 *
	 * @param  string       $domain The domain to sanitize.
	 * @return mixed|string         The sanitized domain.
	 */
	public function sanitizeDomain( $domain ) {
		$domain = trim( $domain );
		$domain = strtolower( $domain );
		if ( 0 === strpos( $domain, 'http://' ) ) {
			$domain = substr( $domain, 7 );
		} elseif ( 0 === strpos( $domain, 'https://' ) ) {
			$domain = substr( $domain, 8 );
		}
		$domain = untrailingslashit( $domain );

		return $domain;
	}

	/**
	 * Remove trailing slashes if not set in the permalink structure.
	 *
	 * @since 4.0.0
	 *
	 * @param  string $url The original URL.
	 * @return string      The adjusted URL.
	 */
	public function maybeRemoveTrailingSlash( $url ) {
		$permalinks = get_option( 'permalink_structure' );
		if ( $permalinks && ( ! is_home() || ! is_front_page() ) ) {
			$trailing = substr( $permalinks, -1 );
			if ( '/' !== $trailing ) {
				$url = untrailingslashit( $url );
			}
		}

		// Don't slash urls with query args.
		if ( false !== strpos( $url, '?' ) ) {
			$url = untrailingslashit( $url );
		}

		return $url;
	}

	/**
	 * Removes image dimensions from the slug of a URL.
	 *
	 * @since 4.0.0
	 *
	 * @param  string $url The image URL.
	 * @return string      The formatted image URL.
	 */
	public function removeImageDimensions( $url ) {
		return $this->isValidAttachment( $url ) ? preg_replace( '#(-[0-9]*x[0-9]*)#', '', $url ) : $url;
	}

	/**
	 * Returns the URL for the WP content folder.
	 *
	 * @since 4.0.5
	 *
	 * @return string The URL.
	 */
	public function getWpContentUrl() {
		$info = wp_get_upload_dir();

		return isset( $info['baseurl'] ) ? $info['baseurl'] : '';
	}

	/**
	 * Checks whether the given path is unique or not.
	 *
	 * @since 4.1.4
	 *
	 * @param  string  $path The path.
	 * @return boolean       Whether the path exists.
	 */
	public function pathExists( $path ) {
		$url = $this->isUrl( $path )
			? $path
			: trailingslashit( home_url() ) . trim( $path, '/' );

		$status = wp_remote_retrieve_response_code( wp_remote_get( $url ) );
		if ( ! $status ) {
			// If there is no status code, we might be in a local environment with CURL misconfigured.
			// In that case we can still check if a post exists for the path by quering the DB.
			// TODO: Add support for terms here.
			$post = $this->getPostbyPath( $path, OBJECT, $this->getPublicPostTypes( true ) );

			return is_object( $post );
		}

		return 200 === $status;
	}

	/**
	* Retrieves a post by its given path.
	* Based on the built-in get_page_by_path() function, but only checks ancestry if the post type is actually hierarchical.
	*
	* @since 4.1.4
	*
	* @param  string       $path     The path.
	* @param  string       $output   The output type. OBJECT, ARRAY_A, or ARRAY_N.
	* @param  string|array $postType The post type(s) to check against.
	* @return Object|false           The post or false on failure.
	*/
	public function getPostByPath( $path, $output = OBJECT, $postType = 'page' ) {
		$lastChanged = wp_cache_get_last_changed( 'aioseo_posts_by_path' );
		$hash        = md5( $path . serialize( $postType ) );
		$cacheKey    = "get_page_by_path:$hash:$lastChanged";
		$cached      = wp_cache_get( $cacheKey, 'aioseo_posts_by_path' );

		if ( false !== $cached ) {
			// Special case: '0' is a bad `$path`.
			if ( '0' === $cached || 0 === $cached ) {
				return false;
			}

			return get_post( $cached, $output );
		}

		$path          = rawurlencode( urldecode( $path ) );
		$path          = str_replace( '%2F', '/', $path );
		$path          = str_replace( '%20', ' ', $path );
		$parts         = explode( '/', trim( $path, '/' ) );
		$reversedParts = array_reverse( $parts );
		$postNames     = "'" . implode( "','", $parts ) . "'";

		$postTypes = is_array( $postType ) ? $postType : [ $postType, 'attachment' ];
		$postTypes = "'" . implode( "','", $postTypes ) . "'";

		$posts = aioseo()->db->start( 'posts' )
			->select( 'ID, post_name, post_parent, post_type' )
			->whereRaw( "post_name in ( $postNames )" )
			->whereRaw( "post_type in ( $postTypes )" )
			->run()
			->result();

		$foundId = 0;
		foreach ( $posts as $post ) {
			if ( $post->post_name === $reversedParts[0] ) {
				$count = 0;
				$p     = $post;

				// Loop through the given path parts from right to left, ensuring each matches the post ancestry.
				while ( 0 !== (int) $p->post_parent && isset( $posts[ $p->post_parent ] ) ) {
					$count++;
					$parent = $posts[ $p->post_parent ];
					if ( ! isset( $reversedParts[ $count ] ) || $parent->post_name !== $reversedParts[ $count ] ) {
						break;
					}
					$p = $parent;
				}

				if (
					0 === (int) $p->post_parent &&
					( ! is_post_type_hierarchical( $p->post_type ) || count( $reversedParts ) === $count + 1 ) &&
					$p->post_name === $reversedParts[ $count ]
				) {
					$foundId = $post->ID;
					if ( $post->post_type === $postType ) {
						break;
					}
				}
			}
		}

		// We cache misses as well as hits.
		wp_cache_set( $cacheKey, $foundId, 'aioseo_posts_by_path' );

		return $foundId ? get_post( $foundId, $output ) : false;
	}

	/**
	 * Validates a URL.
	 *
	 * @since 4.1.2
	 *
	 * @param  string $url The url.
	 * @return bool        Is it a valid/safe url.
	 */
	public function isUrl( $url ) {
		return esc_url_raw( $url ) === $url;
	}

	/**
	 * Retrieves the parameters for a given URL.
	 *
	 * @since 4.1.5
	 *
	 * @param  string $url          The url.
	 * @return array                The parameters.
	 */
	public function getParametersFromUrl( $url ) {
		$parsedUrl  = wp_parse_url( wp_unslash( $url ) );
		$parameters = [];

		if ( empty( $parsedUrl['query'] ) ) {
			return [];
		}

		wp_parse_str( $parsedUrl['query'], $parameters );

		return $parameters;
	}
}