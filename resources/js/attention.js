document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('attention-container');
    const button = document.getElementById('dismiss-attention-button');

    if (button && container) {
        button.addEventListener('click', function () {
            // yükseklik ve opaklık için geçiş efektleri
            container.style.transition = 'opacity 0.3s ease, height 0.3s ease, margin 0.3s ease, padding 0.3s ease';
            container.style.overflow = 'hidden';

            // Şu anki yüksekliği manuel olarak ayarla, sonra sıfıra düşür
            const height = container.offsetHeight + 'px';
            container.style.height = height; // başlangıç yüksekliğini sabitle
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
    }
});
