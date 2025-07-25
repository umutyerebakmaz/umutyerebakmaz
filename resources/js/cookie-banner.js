document.addEventListener('DOMContentLoaded', function () {

    function getCookie(name) {
        const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? decodeURIComponent(match[2]) : null;
    }

    function hasCookieDecision() {
        const cookieValue = getCookie('pestpoint_cookies_accepted');
        const localStorageValue = localStorage.getItem("pestpointCookiesAccepted");

        return ['yes', 'no'].includes(cookieValue) || ['true', 'false'].includes(localStorageValue);
    }

    function setCookieBannerVisibility(show = true) {
        const banner = document.getElementById('cookie-banner');
        if (banner) {
            banner.classList.toggle('hidden', !show);  // show=false → hidden sınıfı eklenir
            banner.classList.toggle('flex', show);     // show=true → flex sınıfı eklenir
        }
    }

    if (!hasCookieDecision()) {
        setCookieBannerVisibility(true);
    }

    const acceptButton = document.getElementById('accept-cookies');
    const rejectButton = document.getElementById('reject-cookies');

    if (acceptButton) {
        acceptButton.addEventListener('click', function () {
            fetch('/accept-cookies', {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(() => {
                localStorage.setItem('pestpointCookiesAccepted', 'true');
                setCookieBannerVisibility(false);
            });
        });
    }

    if (rejectButton) {
        rejectButton.addEventListener('click', function () {
            fetch('/reject-cookies', {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(() => {
                localStorage.setItem('pestpointCookiesAccepted', 'false');
                setCookieBannerVisibility(false);
            });
        });
    }

});
