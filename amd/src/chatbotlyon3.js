define('block_chatbotlyon3/chatbotlyon3', ['jquery'], function ($) {
    return {
        init: function () {
            console.log('Max - Chatbot Lyon 3 initialized');

            //$('#chatbotlyon3-bubble').on('click', function(){$('#chatbotlyon3-container').toggleClass('active');});

            // Afficher/masquer la fenêtre du chatbot lorsque la bulle est cliquée
            $('#chatbotlyon3-bubble').on('click', function () {
                $('#chatbotlyon3-container').toggleClass('active');
                $('#chatbotlyon3-container').css('display', 'block');
            });

            $('#chatbotlyon3-container').toggleClass('minimized');

            // Maximiser la fenêtre du chatbot
            $('#chatbotlyon3-maximize').on('click', function () {
                $('#chatbotlyon3-container').toggleClass('maximized');
            });

            // Fermer la fenêtre du chatbot
            $('#chatbotlyon3-close').on('click', function () {
                $('#chatbotlyon3-container').css('display', 'none');
            });
        }
    };
});