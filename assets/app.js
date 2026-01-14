/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

import './styles/app.css';

// Add loading states to forms
document.addEventListener('DOMContentLoaded', function() {
    // Add loading state to all forms on submit
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton && !submitButton.classList.contains('btn-loading')) {
                submitButton.classList.add('btn-loading');
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';
            }
        });
    });

    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });

    // Add smooth scroll to top on page load
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

console.log('Mini App - Design System Loaded! 🎨');

// Password toggle helper: buttons with `data-password-target` toggle the target input
document.addEventListener('click', function (e) {
    const btn = e.target.closest('[data-password-target]');
    if (!btn) return;
    const selector = btn.getAttribute('data-password-target');
    const input = document.querySelector(selector);
    if (!input) return;
    if (input.type === 'password') {
        input.type = 'text';
        btn.innerHTML = 'Hide';
    } else {
        input.type = 'password';
        btn.innerHTML = 'Show';
    }
});
