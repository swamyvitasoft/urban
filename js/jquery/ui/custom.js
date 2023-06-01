jQuery(document).on('click','.nav-link',function(){
    var $this = jQuery(this);
    var $id = $this.data('href');
    jQuery('.nav-link').removeClass('active');
    $this.addClass('active');
    jQuery('.tab-pane').removeClass('active');
    jQuery('.tab-pane').removeClass('show');
    jQuery('.tab-pane').removeClass('gdlr-core-active');
    jQuery('#' + $id).addClass('active');
    //jQuery('#' + $id).addClass('show');
    jQuery('#' + $id).addClass('gdlr-core-active');
    jQuery('.nav-item').removeClass('current-menu-item');
    jQuery('.gdlr-core-tab-item-title').removeClass('gdlr-core-active');
    $this.closest('.nav-item').addClass('current-menu-item');
    $this.closest('.gdlr-core-tab-item-title').addClass('gdlr-core-active');
});