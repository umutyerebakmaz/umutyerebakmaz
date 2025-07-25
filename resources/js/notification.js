window.NotificationComponent = (function () {
    const wrapper = document.getElementById('notification-wrapper');

    const config = {
        success: {
            bg: 'bg-green-50',
            icon: `<svg class="text-green-400 size-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 10-1.414 1.414L9 13.414l4.707-4.707z" clip-rule="evenodd" />
                    </svg>`
        },
        error: {
            bg: 'bg-red-50',
            icon: `<svg class="text-red-400 size-6" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M8.257 3.099c.763-1.36 2.722-1.36 3.485 0l6.518 11.63A1.75 1.75 0 0116.518 17H3.482a1.75 1.75 0 01-1.742-2.271L8.257 3.1zM11 13a1 1 0 10-2 0 1 1 0 002 0zm-1-7a1 1 0 00-.993.883L9 7v4a1 1 0 001.993.117L11 11V7a1 1 0 00-1-1z" clip-rule="evenodd" />
                   </svg>`
        },
        info: {
            bg: 'bg-blue-50',
            icon: `<svg class="text-blue-400 size-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zM9 8a1 1 0 112 0v4a1 1 0 01-2 0V8zm0 6a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                    </svg>`
        }
    };

    function show(message = 'Bildirim', type = 'success', duration = 3000) {
        if (!wrapper) return;

        const toast = document.createElement('div');
        const settings = config[type] ?? config['success'];

        toast.className = `
            w-full max-w-sm overflow-hidden rounded-lg shadow-lg pointer-events-auto ring-1 ring-black/5 ring-opacity-5
            transform transition ease-out duration-300 translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2 ${settings.bg}
        `.trim();

        toast.innerHTML = `
            <div class="p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">${settings.icon}</div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-light text-gray-700">${message}</p>
                    </div>
                    <div class="flex flex-shrink-0 ml-4">
                        <button class="text-gray-400 hover:text-gray-600 transition" aria-label="Kapat">
                            <svg class="size-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `;

        wrapper.appendChild(toast);

        setTimeout(() => {
            toast.classList.remove('opacity-0', 'translate-y-2', 'sm:translate-x-2');
            toast.classList.add('opacity-100', 'translate-y-0', 'sm:translate-x-0');
        }, 10);

        toast.querySelector('button').addEventListener('click', () => removeToast(toast));

        setTimeout(() => removeToast(toast), duration);
    }

    function removeToast(toast) {
        toast.classList.remove('opacity-100', 'translate-y-0', 'sm:translate-x-0');
        toast.classList.add('opacity-0', 'translate-y-2', 'sm:translate-x-2');
        setTimeout(() => toast.remove(), 300);
    }

    return { show };
})();
