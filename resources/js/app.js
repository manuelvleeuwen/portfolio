import './bootstrap';
import Typed from 'typed.js';

function applyTheme() {
    const stored = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (stored === 'dark' || (!stored && prefersDark)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
}
applyTheme();

window.toggleTheme = function () {
    document.documentElement.classList.add('theme-transitions');
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    setTimeout(() => {
        document.documentElement.classList.remove('theme-transitions');
    }, 300);
};

document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementById('typed-text');
    if (el) {
        new Typed('#typed-text', {
            strings: window.typedStrings,
            typeSpeed: 50,
            backSpeed: 30,
            backDelay: 1500,
            loop: true,
        });
    }
});
