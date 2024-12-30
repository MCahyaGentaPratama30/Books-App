const btn = document.getElementById('menu-toggle');
const menu = document.getElementById('mobile-menu');

btn.addEventListener('click', () => {
    const isOpen = menu.classList.contains('block');
    if (isOpen) {
        menu.classList.remove('block');
        menu.classList.add('hidden');
        btn.setAttribute('aria-expanded', 'false');
    } else {
        menu.classList.remove('hidden');
        menu.classList.add('block');
        btn.setAttribute('aria-expanded', 'true');
    }
});
