// Standard.js
// Contains all the standard functions for syncing data and changing the data.

;MENU = {

    name: "MENU",

    init: function(){

        this.showMenu();
        this.hideMenu();


    },

    showMenu: function() {
        $('.header.compressed .menu_icon').click(function() {
            $('.header.compressed').hide();
            $('.header.uncompressed').show();
            $('.video_container').addClass("menu_out");
            COLLAGE.startLayout();
        });
    },

    hideMenu: function() {
        $('.header.uncompressed .menu_close').click(function() {
            $('.header.uncompressed').hide();
            $('.header.compressed').show();
            $('.video_container').removeClass("menu_out");
            COLLAGE.startLayout();
        });
    }

}

