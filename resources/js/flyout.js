document.addEventListener('DOMContentLoaded', function () {
    const menus = document.querySelectorAll('.flyout-menu');

    menus.forEach(menu => {
        const button = menu.querySelector('.flyout-button');
        const content = menu.querySelector('.flyout-content');
        const chevron = menu.querySelector('.chevron-icon');

        if (!button || !content || !chevron) return;

        const toggleMenu = () => {
            const isOpen = content.classList.contains('!opacity-100');

            if (isOpen) {
                content.classList.add('opacity-0', 'translate-y-1');
                content.classList.remove('!opacity-100', '!translate-y-0');
                setTimeout(() => content.classList.add('hidden'), 150);
                button.classList.remove('text-gray-900');
                button.classList.add('text-gray-500');
                chevron.classList.remove('text-gray-600');
                chevron.classList.add('text-gray-400');
                button.setAttribute('aria-expanded', 'false');
            } else {
                content.classList.remove('hidden');
                setTimeout(() => {
                    content.classList.remove('opacity-0', 'translate-y-1');
                    content.classList.add('!opacity-100', '!translate-y-0');
                }, 10);
                button.classList.remove('text-gray-500');
                button.classList.add('text-gray-900');
                chevron.classList.remove('text-gray-400');
                chevron.classList.add('text-gray-600');
                button.setAttribute('aria-expanded', 'true');
            }
        };

        const closeMenu = () => {
            if (!content.classList.contains('hidden')) {
                content.classList.add('opacity-0', 'translate-y-1');
                content.classList.remove('!opacity-100', '!translate-y-0');
                setTimeout(() => content.classList.add('hidden'), 150);
                button.classList.remove('text-gray-900');
                button.classList.add('text-gray-500');
                chevron.classList.remove('text-gray-600');
                chevron.classList.add('text-gray-400');
                button.setAttribute('aria-expanded', 'false');
            }
        };

        button.addEventListener('click', (e) => {
            e.preventDefault();
            toggleMenu();
        });

        document.addEventListener('click', (e) => {
            if (!menu.contains(e.target)) {
                closeMenu();
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeMenu();
            }
        });
    });
});
