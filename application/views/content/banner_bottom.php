<div id="banner-bottom">
    <?php
        $appconfig = $app_config->row();
    ?>
    <div id="banner-bottom-left">
        <p class="banner-title">Related Links :</p>
        <a class="banner-link" href="http://<?php echo $appconfig->link1; ?>"><?php echo $appconfig->link1_desc; ?></a> <br/><br/>
        <a class="banner-link" href="http://<?php echo $appconfig->link2; ?>"><?php echo $appconfig->link2_desc; ?></a> <br/><br/>
        
    </div>
    <div id="banner-bottom-mid">
        <p class="banner-title">Technical Support : </p>
        <a class="banner-link" href="mailto:<?php echo $appconfig->tech_support; ?>"><?php echo $appconfig->tech_support; ?></a>
    </div>
    <div id="banner-bottom-right">
        <p class="banner-title">Powered By :</p>
        <img id="pic" height="100px" src="<?php echo base_url("css")."/".$appconfig->logo_url; ?>" />
    </div>
</div>
