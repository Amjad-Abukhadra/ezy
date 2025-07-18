document.addEventListener('DOMContentLoaded', () => {
    // Image URLs as strings
    const images = [
        "/photos/group 2225.png",
        "/photos/group 2226.png",
        "/photos/group 2227.png",
        "/photos/group 2228.png"
    ];

    const sliderImage = document.getElementById('slider-image');
    const dots = document.querySelectorAll('.slider-dot');

    function showSlide(index) {
        sliderImage.src = images[index];
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            const index = parseInt(dot.dataset.index);
            showSlide(index);
        });
    });

    // Show first slide initially
    showSlide(0);
});

document.addEventListener('DOMContentLoaded', () => {
    fetch('/get-courses')  // Update this URL to your actual route
        .then(response => {
            if (!response.ok) throw new Error('Network error');
            return response.json();
        })
        .then(data => {
            const container = document.getElementById('courses-container');
            container.innerHTML = '';

            if (!data.success) {
                container.innerHTML = `<p class="text-muted">${data.message}</p>`;
                return;
            }

            if (data.data.length === 0) {
                container.innerHTML = '<p class="text-muted">No courses available.</p>';
                return;
            }

            data.data.forEach(course => {
                const photoUrl = course.photo ? `/storage/${course.photo}` : 'https://via.placeholder.com/400x200?text=No+Image';
                const courseHTML = `
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="${photoUrl}" class="card-img-top" alt="${course.name}">
                            <div class="card-body">
                                <h5 class="card-title">${course.name}</h5>
                                <p class="card-text">${course.description ? course.description.substring(0, 100) : ''}</p>
                                <span class="badge bg-${course.status ? 'success' : 'secondary'}">
                                    ${course.status ? 'Active' : 'Inactive'}
                                </span>
                            </div>
                        </div>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', courseHTML);
            });
        })
        .catch(error => {
            const container = document.getElementById('courses-container');
            container.innerHTML = `<p class="text-danger">Failed to load courses: ${error.message}</p>`;
        });
});
