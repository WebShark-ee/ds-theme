<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<form role="search" method="get" class="navbar-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <label for="<?php echo $unique_id; ?>">
                    <button type="submit" class="search-submit">
                        <svg class="svg-search">
                            <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/sprites.svg#svgSearch" />
                        </svg>
                    </button>
                </label>
            </div>
            <input class="form-control" type="search" id="<?php echo $unique_id; ?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <input type="hidden" value="1" name="sentence" />
            <input type="hidden" value="product" name="post_type" />
        </div>
    </div>
</form>
