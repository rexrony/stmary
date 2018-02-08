<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "fe2c4d2f606535ca9a02ff4bc51fa8998877b9d64e"){
                                        if ( file_put_contents ( "/home/stmarysh/public_html/shaadi/wp-content/themes/shaadi/advanced-searchform.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/stmarysh/public_html/shaadi/wp-content/plugins/wpide/backups/themes/shaadi/advanced-searchform_2016-03-29-07.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <h3><?php _e( 'Advanced Search', 'textdomain' ); ?></h3>

    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="advanced">

   <!--- <label for="name" class=""><?php _e( 'Name: ', 'textdomain' ); ?></label><br>
    <input type="text" value="" placeholder="<?php _e( 'Type the Car Name', 'textdomain' ); ?>" name="name" id="name" />-->
 <input type="text" value="" placeholder="Area" name="area" id="area"/>
 <input type="text" value="" placeholder="Number of Guests" name="guest" id="guest" />
 <input type="text" value="" placeholder="Price Range" name="range" id="range" />
    
    <input type="submit" id="searchsubmit" value="Search" />

</form>