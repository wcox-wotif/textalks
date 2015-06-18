// Standard.js
// Contains all the standard functions for syncing data and changing the data.

;TALKS = {

    name: "TALKS",

    init: function(){

        this.submitTalk();
        this.submitLike();

    },

    addComment: function(talk_id, comment) {
        $.post("/php/addVideoComment.php", { talk_id: talk_id, comment: comment })
        .done(function( data ) {
            if(data == 'success'){
                _this.submitMessage("Thanks for your feedback. When's your next talk?", 'success');
            } else {
                _this.submitMessage('Snap! Something went wrong. Quick, walk away before someone sees what you did...', 'fail');
            }
        });
    },

    submitTalk: function() {
      _this = this;       
        $('.comment_submit').click(function() {
            var talk_id = $('.comments_form input[name="talk_id"]').val();
            var comment = $('.comments_form input[name="comment"]').val();
            if(comment != "") {
                _this.addComment(talk_id, comment);
            } else {
                _this.submitMessage('Snap! Something went wrong. Quick, walk away before someone sees what you did...', 'fail');
            }
        });
    },

    submitMessage: function(message, successOrFail) {
        var $submit_message = $('.submit_message');

        $submit_message.addClass(successOrFail).html(message);
        setTimeout(function() { 
            $submit_message.removeClass('fail success').html('');
        }, 5000);
    },

    addLikes: function(talk_id) {
        $.post("/php/addVideoLikes.php", { talk_id: talk_id})
        .done(function( data ) {
            if(data == 'success'){
                _this.submitMessage("Thanks. We like you too ;)", 'success');
            } else {
                _this.submitMessage('Snap! Something went wrong. Quick, walk away before someone sees what you did...', 'fail');
            }
        });
    },

    submitLike: function() {
      _this = this;       
        $('.like_stats .heart').click(function() {
            var pageInfo = $.parseJSON($('.page_info_json').html());
            console.log(pageInfo);
            var talk_id = pageInfo.talk.id;
            if(talk_id != "") {
                _this.addLikes(talk_id);
            } else {
                _this.submitMessage('Snap! Something went wrong. Also your boss is standing behind you...', 'fail');
            }
        });
    }



}

