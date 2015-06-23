// Standard.js
// Contains all the standard functions for syncing data and changing the data.

;MENU = {

    name: "MENU",

    init: function(){

        this.showMenu();
        this.hideMenu();

    },

    showMenu: function() {
        $('.header.compressed .menu_icon, .header.compressed .logo').click(function() {
            $('.header.compressed').hide();
            $('.header.uncompressed').show();
            $('.video_container').addClass("menu_out");
            $('.youTubeVideo').addClass("menu_out");
            $('.presentation_details').addClass("menu_out");
            COLLAGE.startLayout();
        });
    },

    hideMenu: function() {
        $('.header.uncompressed .menu_close').click(function() {
            $('.header.uncompressed').hide();
            $('.header.compressed').show();
            $('.video_container').removeClass("menu_out");
            $('.youTubeVideo').removeClass("menu_out");
            $('.presentation_details').removeClass("menu_out");
            COLLAGE.startLayout();
        });
    }

}

