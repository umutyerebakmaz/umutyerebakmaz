// alerts.js
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.alert-container').forEach(container => {
        const button = container.querySelector('.alert-close');
        if (!button) return;

        button.addEventListener('click', function () {
            container.style.transition = 'opacity 0.3s ease, height 0.3s ease, margin 0.3s ease, padding 0.3s ease';
            container.style.overflow = 'hidden';

            const height = container.offsetHeight + 'px';
            container.style.height = height;
            container.offsetHeight; // reflow tetikle
            container.style.opacity = '0';
            container.style.height = '0px';
            container.style.paddingTop = '0';
            container.style.paddingBottom = '0';
            container.style.marginTop = '0';
            container.style.marginBottom = '0';

            setTimeout(() => {
                container.style.display = 'none';
            }, 300);
        });
    });
});
