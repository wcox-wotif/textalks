// Standard.js
// Contains all the standard functions for syncing data and changing the data.

;VOTE = {

    name: "VOTE",

    init: function(){

        this.placeVotes();
        this.vote();

    },

    addVote: function(code, up, down) {
        $.post("/php/addVote.php", { code: code, up: up, down: down })
        .done(function( data ) {
            VOTE.placeVotes();
        });
    },

    vote: function() {
        _this = this;
        $('a.upvote').click(function() {
            var code = $(this).closest('.masterRow').data('id');
            VOTE.addVote(code, 1, 0);
        });
        $('a.downvote').click(function() {
            var code = $(this).closest('.masterRow').data('id');
            VOTE.addVote(code, 0, 1);
        });
    },

    placeVotes: function() {
        $.post("/php/checkVote.php")
        .done(function( data ) {
            data = $.parseJSON(data)
            $(".post").each(function() {
                $this = $(this);
                var id = $this.data('id');
                if(id in data) {
                    var upValue = parseInt(data[id].up);
                    var downValue = parseInt(data[id].down);
                    var newCount = upValue - downValue;
                    $this.find('.count').text(newCount);
                }
            });
        });
    }

}

