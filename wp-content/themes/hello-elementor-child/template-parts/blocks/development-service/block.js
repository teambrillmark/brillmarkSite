function changeServiceInfo() {
    const serviceInfo = document.querySelectorAll('.test-development-service .service-info');
    const serviceTitles = document.querySelectorAll('.test-development-service .service-title');

    if (serviceTitles.length === 0 || serviceInfo.length === 0) {
        return;
    }

    serviceTitles.forEach(tab => {
        tab.addEventListener('click', () => {
            // PHP uses id="panel-{tab_id}" for service-info, tab has id="{tab_id}"
            const panelId = 'panel-' + tab.id;
            serviceInfo.forEach(info => {
                info.classList.remove('active');
                info.removeAttribute('hidden');
                if (info.id === panelId) {
                    info.classList.add('active');
                } else {
                    info.setAttribute('hidden', '');
                }
            });
            serviceTitles.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
        });
    });
}

// Event delegation: one listener for all accordions (works even if script loads late)
function setupServiceAccordion() {
    document.addEventListener('click', function accordionClick(e) {
        const header = e.target.closest('.test-development-service .accordion-header');
        if (!header) return;

        const item = header.closest('.service-accordion-item');
        if (!item) return;

        const container = item.closest('.service-accordion');
        if (!container) return;

        const wasActive = item.classList.contains('active');
        container.querySelectorAll('.service-accordion-item').forEach(function (other) {
            other.classList.remove('active');
            var h = other.querySelector('.accordion-header');
            if (h) h.setAttribute('aria-expanded', 'false');
        });
        if (!wasActive) {
            item.classList.add('active');
            header.setAttribute('aria-expanded', 'true');
        }
    });
}

function init() {
    changeServiceInfo();
    setupServiceAccordion();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
