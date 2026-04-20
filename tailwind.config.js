/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './index.php',
        './templates/**/*.php',
        './src/**/*.php',
        './assets/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                graphite: 'var(--color-graphite)',
                cloud: 'var(--color-cloud)',
                sage: 'var(--color-sage)',
                paper: 'var(--color-paper)',
                mist: 'var(--color-mist)',
                rose: 'var(--color-rose)',
                ink: 'var(--color-ink)',
            },
            boxShadow: {
                soft: 'var(--shadow-soft)',
                strong: 'var(--shadow-strong)',
            },
            borderRadius: {
                xl: 'var(--radius-xl)',
            },
        },
    },
    plugins: [],
};
