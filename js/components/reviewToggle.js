const reviews = document.querySelectorAll('[data-role="review-item"]');

if (reviews) {
    reviews.forEach((item) => {
        const toggler = item.querySelector('[data-role="show-more"]');
        const text = item.querySelector('[data-role="review-text"]');

        if (text.scrollHeight > 76) {
            toggler.dataset.state = 'visible';
            toggler.addEventListener('click', (event) => {
                if (event.target.dataset.state === 'visible') {
                    if (text.dataset.state === 'hide') {
                        event.target.dataset.state = 'visible';
                        event.target.innerHTML = 'Свернуть отзыв';
                        text.dataset.state = 'visible';
                    } else {
                        event.target.innerHTML = 'Читать полный отзыв';
                        text.dataset.state = 'hide';
                    }
                }

                return false;
            });
        }
    });
}