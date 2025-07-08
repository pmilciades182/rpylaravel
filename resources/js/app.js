import './bootstrap';

// Microsoft Fluent Design System - JavaScript
// App.js - Main application JavaScript

// Theme management
const FluentTheme = {
    init() {
        this.loadSavedTheme();
        this.setupEventListeners();
    },

    loadSavedTheme() {
        const savedTheme = localStorage.getItem('fluent-theme') || 'light';
        document.body.setAttribute('data-theme', savedTheme);
    },

    toggleTheme() {
        const body = document.body;
        const currentTheme = body.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        body.setAttribute('data-theme', newTheme);
        localStorage.setItem('fluent-theme', newTheme);
    },

    setupEventListeners() {
        // Theme toggle button if it exists
        const themeToggle = document.querySelector('[data-theme-toggle]');
        if (themeToggle) {
            themeToggle.addEventListener('click', () => this.toggleTheme());
        }
    }
};

// Alert management
const FluentAlerts = {
    init() {
        this.setupAlerts();
    },

    setupAlerts() {
        const alerts = document.querySelectorAll('.fluent-alert');
        alerts.forEach(alert => {
            // Auto-dismiss after 5 seconds
            setTimeout(() => {
                this.dismissAlert(alert);
            }, 5000);

            // Setup close button
            const closeBtn = alert.querySelector('.fluent-alert-close');
            if (closeBtn) {
                closeBtn.addEventListener('click', () => this.dismissAlert(alert));
            }
        });
    },

    dismissAlert(alert) {
        alert.style.transition = 'all 0.3s ease';
        alert.style.opacity = '0';
        alert.style.transform = 'translateY(-10px)';
        setTimeout(() => {
            alert.style.display = 'none';
        }, 300);
    }
};

// Form enhancements
const FluentForms = {
    init() {
        this.setupTextareas();
        this.setupSubmitButtons();
        this.setupValidation();
    },

    setupTextareas() {
        const textareas = document.querySelectorAll('.fluent-textarea');
        textareas.forEach(textarea => {
            // Auto-resize
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        });
    },

    setupSubmitButtons() {
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function() {
                const submitButton = form.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = true;
                    const originalText = submitButton.innerHTML;
                    submitButton.innerHTML = '<i class="fluent-icon fluent-icon-16 fluent-icon-spin"></i> Enviando...';
                    
                    // Re-enable after timeout (in case of client-side validation failure)
                    setTimeout(() => {
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalText;
                    }, 5000);
                }
            });
        });
    },

    setupValidation() {
        const inputs = document.querySelectorAll('.fluent-input');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value.trim()) {
                    this.classList.add('fluent-input-error');
                } else {
                    this.classList.remove('fluent-input-error');
                }
            });
        });
    }
};

// Animations
const FluentAnimations = {
    init() {
        this.setupScrollAnimations();
        this.setupHoverEffects();
    },

    setupScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fluent-fade-in');
                }
            });
        });

        document.querySelectorAll('.fluent-card, .fluent-section').forEach(el => {
            observer.observe(el);
        });
    },

    setupHoverEffects() {
        // Add ripple effect to buttons
        const buttons = document.querySelectorAll('.fluent-button');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('fluent-ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    }
};

// Utilities
const FluentUtils = {
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }
};

// Initialize everything when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    FluentTheme.init();
    FluentAlerts.init();
    FluentForms.init();
    FluentAnimations.init();
    
    // Add loading complete class to body
    document.body.classList.add('fluent-loaded');
});

// Export for global use
window.Fluent = {
    Theme: FluentTheme,
    Alerts: FluentAlerts,
    Forms: FluentForms,
    Animations: FluentAnimations,
    Utils: FluentUtils
};
