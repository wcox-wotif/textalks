// Standard.js
// Contains all the standard functions for syncing data and changing the data.

;FEEDBACK = {

    name: "feedback",

    init: function(){

        this.placePositiveFeedback();
        this.sendFeedbackForm();

    },

    addFeedback: function(code, type, feedback) {
        $.post("/php/addFeedback.php", { type: type, feedback: feedback, code: code})
        .done(function( data ) {
            FEEDBACK.placePositiveFeedback();
        });
    },

    sendFeedbackForm: function() {
        _this = this;
        $('.submit_feedback').click(function() {
            var type = $(this).data('type');
            console.log(type);
            var feedback = $('.feedback_form textarea[name="feedback"]').val();
            console.log(feedback);
            var code = $(this).parents('.masterRow').data('id');
            FEEDBACK.addFeedback(code, type, feedback);

        });

    },

    placePositiveFeedback: function() {
        _this = this;
        $(".place_feedback").each(function() {
            var feedback = $(this);
            var type = feedback.data("type");
            $.post("/php/getFeedback.php", { type: type })
            .done(function( data ) {
                feedback.html('');
                feedback.html(data);
                VOTE.placeVotes();
                VOTE.vote();
                console.log('now');
                // FEEDBACK.sendFeedbackForm();
            });
        });
    },

    placeFeedback: function() {
        $.post("/php/getFeedback.php")
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

