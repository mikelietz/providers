<?php

class Providers extends Plugin {

	/**
	 *
	 */
	public function action_init()
	{
		$this->add_template( 'providers', dirname( $this->get_file() ) . '/../../../system/admin/blank.php' );
	}

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
		$content = "<table><thead><th>Feature</th><th>Provided by</th></thead><tbody>";
		foreach( Plugins::provided() as $feature => $provided_by ) {
			$content .= _t( "<tr><td>%s</td><td>%s</td></tr>", array ($feature, implode( $provided_by, ", ") ));
		}
		$content .= "</tbody></table>";
		$theme->content = $content;
		$theme->display( 'providers' );
		exit;
	}
}
?>
