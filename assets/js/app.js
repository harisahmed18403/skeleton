(function () {
    const navToggle = document.querySelector('[data-nav-toggle]');
    const mobileNav = document.querySelector('[data-mobile-nav]');
    const demoForm = document.querySelector('[data-demo-form]');
    const previewFields = new Map(
        Array.from(document.querySelectorAll('[data-preview-field]')).map((node) => [
            node.getAttribute('data-preview-field'),
            node,
        ])
    );

    if (navToggle && mobileNav) {
        navToggle.addEventListener('click', () => {
            const isOpen = !mobileNav.hasAttribute('hidden');

            if (isOpen) {
                mobileNav.setAttribute('hidden', '');
                navToggle.setAttribute('aria-expanded', 'false');
                return;
            }

            mobileNav.removeAttribute('hidden');
            navToggle.setAttribute('aria-expanded', 'true');
        });
    }

    if (!demoForm) {
        return;
    }

    const syncPreview = () => {
        const formData = new FormData(demoForm);

        previewFields.forEach((node, key) => {
            const value = String(formData.get(key) || '').trim();

            if (value !== '') {
                node.textContent = value;
            }
        });
    };

    demoForm.addEventListener('input', syncPreview);
    demoForm.addEventListener('change', syncPreview);
    syncPreview();
})();
