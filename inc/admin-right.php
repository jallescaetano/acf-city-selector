<div class="admin_right">

    <h3><?php esc_html_e( 'About the plugin', 'acf-city-selector' ); ?></h3>
    <p><?php echo sprintf( esc_html__( 'This plugin is an extension for %s. It was created because there was no (properly working) plugin which did this.', 'acf-city-selector' ), '<a href="' . esc_url( 'https://www.advancedcustomfields.com/' ) . '" target="_blank">Advanced Custom Fields</a>' ); ?>
    <p><?php echo sprintf( __( '<a href="%s" target="_blank">Click here</a> for the \'official\' website.', 'acf-city-selector' ), esc_url( 'http://acfcs.berryplasman.com/?utm_source=wpadmin&utm_medium=about_plugin&utm_campaign=acf-plugin' ) ); ?></p>


    <hr />

    <h3><?php esc_html_e( 'Support', 'acf-city-selector' ); ?></h3>
    <p><?php echo sprintf( esc_html__( 'If you need support for this plugin or if you have some good suggestions for improvements and/or new features, please turn to %s.', 'acf-city-selector' ), '<a href="https://github.com/Beee4life/acf-city-selector/issues" target="_blank">Github</a>' ); ?>
    </p>

    <hr />

    <h3><?php esc_html_e( 'About Beee', 'acf-city-selector' ); ?></h3>
    <p><?php echo sprintf( __( 'If you need a Wordpress designer/coder for a project, contact me on me %s.', 'acf-city-selector' ), '<a href="http://www.berryplasman.com/?utm_source=wpadmin&utm_medium=about_plugin&utm_campaign=acf-plugin">berryplasman.com</a>' ); ?></p>

    <hr />

    <p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=24H4ULSQAT9ZL" target="_blank"><img src="<?php echo plugins_url( '/assets/img/paypal_donate.gif', dirname( __FILE__ )  ); ?>" alt="" class="donate_img" /></a>
		<?php esc_html_e( 'If you like this plugin, buy me a coke to show your appreciation so I can continue to develop it.', 'acf-city-selector' ); ?></p>
	<?php if ( defined( 'ENV' ) && ENV == 'dev' ) { ?>
        <p>
	        <?php echo sprintf( __( 'Or you can buy one of the <a href="%s" target="_blank">PRO packages</a> from the \'official\' website.', 'acf-city-selector' ), esc_url( 'http://acfcs.berryplasman.com/packages/?utm_source=wpadmin&utm_medium=about_plugin&utm_campaign=acf-plugin' ) ); ?>
        </p>
	<?php } ?>
</div><!-- end .admin_right -->
