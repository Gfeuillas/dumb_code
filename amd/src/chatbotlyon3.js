define('block_chatbotlyon3/chatbotlyon3', ['jquery'], function ($) {
    return {
        init: function () {
            console.log('Max - Chatbot Lyon 3 initialized');

            const container = $('#chatbotlyon3-container');
            const apikey = container.data('apikey');
            if (apikey) {
                console.debug('Chatbot Lyon 3 API key configured.');
            }

            // Afficher/masquer la fenêtre du chatbot lorsque la bulle est cliquée
            $('#chatbotlyon3-bubble').on('click', function () {
                container.toggleClass('active');
                container.css('display', container.hasClass('active') ? 'block' : 'none');
            });

            // Minimiser la fenêtre du chatbot
            $('#chatbotlyon3-minimize').on('click', function () {
                container.toggleClass('minimized');
            });

            // Maximiser la fenêtre du chatbot
            $('#chatbotlyon3-maximize').on('click', function () {
                container.toggleClass('maximized');
            });

            // Fermer la fenêtre du chatbot
            $('#chatbotlyon3-close').on('click', function () {
                container.removeClass('active maximized minimized');
                container.css('display', 'none');
            });
        }
    };
});
