import './bootstrap';

// Efek "air mengalir" pada navbar: gelembung ungu meluncur dari menu
// sebelumnya ke menu yang sedang aktif.
function setupNavPill() {
    const wrap = document.getElementById('nav-links');
    const pill = document.getElementById('nav-pill');
    if (!wrap || !pill) return;

    const links = [...wrap.querySelectorAll('.nav-link')];
    const activeIndex = links.findIndex((l) => l.classList.contains('nav-link-active'));
    if (activeIndex === -1) return; // halaman tanpa menu aktif: tidak ada gelembung

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const ease = 'cubic-bezier(0.34, 1.35, 0.64, 1)'; // sedikit memantul seperti air

    const place = (el) => {
        pill.style.width = `${el.offsetWidth}px`;
        pill.style.transform = `translateX(${el.offsetLeft}px)`;
    };

    let previous = null;
    try {
        previous = Number(sessionStorage.getItem('navPrevIndex'));
        if (sessionStorage.getItem('navPrevIndex') === null || !links[previous]) previous = null;
        sessionStorage.setItem('navPrevIndex', String(activeIndex));
    } catch (e) {
        previous = null;
    }

    // Mulai dari menu sebelumnya (tanpa animasi)
    pill.style.transition = 'none';
    place(links[previous ?? activeIndex]);
    wrap.classList.add('nav-links-ready');
    void pill.offsetWidth;

    // Lalu mengalir ke menu aktif
    if (previous !== null && previous !== activeIndex && !reduceMotion) {
        pill.style.transition = `transform 0.65s ${ease}, width 0.65s ${ease}`;
        place(links[activeIndex]);

        // Gelembung meregang saat bergerak, lalu kembali normal
        pill.animate(
            [
                { scale: '1 1' },
                { scale: '1.12 0.86', offset: 0.35 },
                { scale: '0.97 1.04', offset: 0.7 },
                { scale: '1 1' },
            ],
            { duration: 650, easing: 'ease-out' },
        );
    } else {
        place(links[activeIndex]);
    }

    // Jaga posisi saat jendela diubah ukurannya atau font selesai dimuat
    const settle = () => {
        pill.style.transition = 'none';
        place(links[activeIndex]);
    };
    window.addEventListener('resize', settle);
    document.fonts?.ready.then(settle);
}

document.addEventListener('DOMContentLoaded', setupNavPill);
