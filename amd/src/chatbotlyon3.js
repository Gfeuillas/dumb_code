define('block_chatbotlyon3/chatbotlyon3', ['jquery'], function ($) {
    const appendLog = (container, message) => {
        const logArea = container.find('#chatbotlyon3-log');
        if (!logArea.length) {
            return;
        }

        const line = $('<div>').addClass('chatbotlyon3-logline').text(message);
        logArea.append(line);
    };

    return {
        init: function () {
            console.log('Max - Chatbot Lyon 3 initialized');

            const container = $('#chatbotlyon3-container');
            const apikey = container.data('apikey');
            const apiendpoint = container.data('endpoint');

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

            // Envoyer une requête HTTPS lorsque l'utilisateur soumet une question
            $('#chatbotlyon3-form').on('submit', function (event) {
                event.preventDefault();
                const questionInput = $('#chatbotlyon3-question');
                const question = questionInput.val().trim();

                if (!question) {
                    appendLog(container, 'Merci de saisir une question.');
                    return;
                }

                if (!apiendpoint) {
                    appendLog(container, 'Aucun point d\'accès configuré.');
                    return;
                }

                const headers = {
                    'Content-Type': 'application/json',
                };

                if (apikey) {
                    headers['Authorization'] = 'Bearer ' + apikey;
                }

                appendLog(container, 'Envoi en cours...');

                $.ajax({
                    url: apiendpoint,
                    method: 'POST',
                    data: JSON.stringify({ question: question }),
                    contentType: 'application/json',
                    headers: headers,
                }).done(function () {
                    appendLog(container, 'Votre question a été envoyée.');
                    questionInput.val('');
                }).fail(function (jqXHR, textStatus) {
                    appendLog(container, 'Erreur lors de l\'envoi : ' + textStatus);
                });
            });
        }
    };
});
