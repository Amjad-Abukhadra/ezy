document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const responseMessage = document.getElementById('responseMessage');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(form);
        responseMessage.innerHTML = '';

        fetch(contactSubmitUrl, {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
            .then(response => {
                if (!response.ok) throw response;
                return response.json();
            })
            .then(data => {
                responseMessage.innerHTML = `
                            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                                <strong>Success!</strong> Message sent successfully!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>`;
                form.reset();
                responseMessage.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            })
            .catch(async (error) => {
                let errMsg = "Something went wrong.";
                if (error.json) {
                    const json = await error.json();
                    errMsg = Object.values(json.errors || {}).flat().join("<br>");
                }
                responseMessage.innerHTML = `
                            <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                                <a>eskz</a>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>`;
                responseMessage.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            });
    });
});
