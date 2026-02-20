(function () {
    const sections = document.querySelectorAll('.test-development-process');
    sections.forEach(function (section) {
        const tabs = section.querySelectorAll('.process-tab');
        const panels = section.querySelectorAll('.process-panel');
        const accordionHeaders = section.querySelectorAll('.accordion-header');
        const accordionItems = section.querySelectorAll('.accordion-item');

        function setActive(step) {
            const stepNum = String(step);
            tabs.forEach(function (tab) {
                const isActive = tab.getAttribute('data-step') === stepNum;
                tab.classList.toggle('active', isActive);
                tab.setAttribute('aria-selected', isActive);
            });
            panels.forEach(function (panel) {
                const isActive = panel.getAttribute('data-step') === stepNum;
                panel.classList.toggle('active', isActive);
                panel.hidden = !isActive;
            });
        }

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                setActive(tab.getAttribute('data-step'));
            });
        });

        accordionHeaders.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var item = btn.closest('.accordion-item');
                var contentId = btn.getAttribute('aria-controls');
                var content = contentId ? document.getElementById(contentId) : null;
                var isExpanded = item.classList.contains('active');

                accordionItems.forEach(function (other) {
                    other.classList.remove('active');
                    var otherBtn = other.querySelector('.accordion-header');
                    var otherContentId = otherBtn && otherBtn.getAttribute('aria-controls');
                    var otherContent = otherContentId ? document.getElementById(otherContentId) : null;
                    if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                    if (otherContent) otherContent.hidden = true;
                });

                if (!isExpanded) {
                    item.classList.add('active');
                    btn.setAttribute('aria-expanded', 'true');
                    if (content) content.hidden = false;
                }
            });
        });
    });
})();
