<form method="get" id="searchform" class="submit-search-form" action="<?php echo home_url()  ?>/">
    <div class="searchform-left left"></div>
    <div id="s">
        <input type="text" name="s" class="search-input" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value=""/>
        <input type="submit" id="searchsubmit" class="search-submit-button" value="" />
    </div>
    <div class="searchform-right right"></div>  
</form>