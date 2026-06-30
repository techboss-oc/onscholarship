
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Global theme store — accessible via $store.theme from any Alpine component
Alpine.store('theme', {
    dark: false,
    init() {
        this.dark = localStorage.theme === 'dark' ||
                    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme:dark)').matches);
        this._apply();
    },
    toggle() {
        this.dark = !this.dark;
        localStorage.theme = this.dark ? 'dark' : 'light';
        this._apply();
    },
    _apply() {
        if (this.dark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
});

Alpine.start();
