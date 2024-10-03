jQuery(document).ready(function($) {

    // Fonction pour définir un cookie
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Fonction pour mettre à jour le bouton selon l'état du contraste
    function updateButton() {
        if (getCookie('highcontrast') === 'yes') {
            // Mode high-contrast activé
            $('.toggle-contrast').attr('title', contrastVars.restoreContrast);
            $('.toggle-contrast .icon').attr('src', contrastVars.contrastOff);
            $('.toggle-contrast .text').text(contrastVars.restoreContrast);

            $('body').addClass('high-contrast');
        } else {
            // Mode normal activé
            $('.toggle-contrast').attr('title', contrastVars.highContrast);
            $('.toggle-contrast .icon').attr('src', contrastVars.contrastOn);
            $('.toggle-contrast .text').text(contrastVars.highContrast);

            $('body').removeClass('high-contrast');
        }
    }

    // Initialisation : vérifier l'état du cookie et mettre à jour le bouton
    updateButton();

    // Toggle entre high contrast et mode normal lorsqu'on clique sur le bouton
    $('.toggle-contrast').click(function () {
        if (getCookie('highcontrast') === 'yes') {
            // Désactiver le contraste élevé
            setCookie('highcontrast', 'no', 7);
        } else {
            // Activer le contraste élevé
            setCookie('highcontrast', 'yes', 7);
        }
        updateButton();
    });
});