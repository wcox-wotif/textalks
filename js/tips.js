// Standard.js
// Contains all the standard functions for syncing data and changing the data.

;TIPS = {

    name: "tips",

    init: function(){

        this.placeVotes();
        this.vote();
        this.changeText();

    },

    addVote: function(code, up, down) {
        $.post("/php/addVote.php", { code: code, up: up, down: down })
        .done(function( data ) {
            _this.placeVotes();
        });
    },

    vote: function() {
        _this = this;
        $('a.upvote').click(function() {
            var code = $(this).parents('.row').data('id');
            _this.addVote(code, 1, 0);
        });
        $('a.downvote').click(function() {
            var code = $(this).parents('.row').data('id');
            console.log(code);
            _this.addVote(code, 0, 1);
        });
    },

    placeVotes: function() {
        $.post("/php/checkVote.php")
        .done(function( data ) {
            data = $.parseJSON(data)
            $(".post").each(function() {
                var id = $(this).data('id');
                var upValue = parseInt(data[id].up);
                var downValue = parseInt(data[id].down);
                var newCount = upValue - downValue;
                $(this).find('.count').text(newCount);
            });
        });
    },

    changeText: function() {

    }

}

