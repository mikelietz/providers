<?php

class Providers extends Plugin {

	/**
	 *
	 */
	public function filter_admin_access( $access, $page, $post_type ) {
		if ( $page != 'providers' ) {
			return $access;
		}
		return true;
	}

	/**
	 *
	 */
	public function action_admin_theme_get_providers( $handler, $theme )
	{
		$content = "<div class='container'><table><thead><th>Feature</th><th>Provided by</th></thead><tbody>";
		foreach( Plugins::provided() as $feature => $provided_by ) {
			$content .= _t( "<tr><td>%s</td><td>%s</td></tr>", array ($feature, implode( $provided_by, ", ") ));
		}
		$content .= "</tbody></table></div>";
		$theme->content = $content;
		$theme->display( 'blank' );
		exit;
	}
}
?>
