
    document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion functionality
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');

    question.addEventListener('click', function() {
                    const isActive = item.classList.contains('active');

                    // Close all other FAQ items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
        otherItem.classList.remove('active');
                        }
                    });

    // Toggle current item
    if (isActive) {
        item.classList.remove('active');
                    } else {
        item.classList.add('active');
                    }
                });
            });

    // Search functionality
    const searchInput = document.getElementById('faqSearch');

    searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();

                faqItems.forEach(item => {
                    const questionText = item.getAttribute('data-question').toLowerCase();
    const questionElement = item.querySelector('.faq-question span').textContent
    .toLowerCase();

    if (questionText.includes(searchTerm) || questionElement.includes(searchTerm)) {
        item.style.display = 'block';
                    } else {
        item.style.display = 'none';
                    }
                });
            });
        });
