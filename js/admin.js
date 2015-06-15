// Standard.js
// Contains all the standard functions for syncing data and changing the data.

;ADMIN = {

    name: "admin",

    init: function(){

        // this.submitTalk();

    },

    addNewTalk: function(youtube_id, presenter, topic, date, presentation_link) {
        $.post("/php/addNewTalk.php", { youtube_id: youtube_id, presenter: presenter, topic: topic, date: date, presentation_link: presentation_link })
        .done(function( data ) {
            if(data == 'success'){
                alert('Congrats. The following talk was added: ' + presenter + ' - ' + topic + '');
                ADMIN.clearForm();
            }
        });
    },

    submitTalk: function() {        
        $('.newTalkSubmit').click(function() {
            var youtube_id =       $('.addTalkForm input[name="youtube_id"]').val();
            var presenter =         $('.addTalkForm input[name="presenter"]').val();
            var topic =             $('.addTalkForm input[name="topic"]').val();
            var date =              $('.addTalkForm input[name="date"]').val();
            var presentation_link = $('.addTalkForm input[name="presentation_link"]').val();
            ADMIN.addNewTalk(youtube_id, presenter, topic, date, presentation_link);

        });
    },

    clearForm: function () {
        $('.addTalkForm input[name="youtube_id"]').val('');
        $('.addTalkForm input[name="presenter"]').val('');
        $('.addTalkForm input[name="topic"]').val('');
        $('.addTalkForm input[name="date"]').val('');
        $('.addTalkForm input[name="presentation_link"]').val('');
    },

    login: function(){

        $('#login').validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                username: 'required',
                password: 'required'
            },

            submitHandler: function(form){
                form.submit();
            }
        });

    }

}

