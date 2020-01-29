<form class="search" role="search" method="get" id="searchform" action="<?php echo site_url()?>" >
    <fieldset>
        <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_html_e('Type here...', 'olins')?>" />
        <input type="submit" id="searchsubmit" class="headerfont" value="<?php esc_html_e('Search', 'olins')?>" />
    </fieldset>
</form>