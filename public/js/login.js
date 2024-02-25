document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();
        fetch(this.action, {
                method: this.method,
                body: new FormData(this),
                headers: {
                    "X-CSRF-Token": "{{ csrf_token() }}"
                }
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "{{ route('homePage') }}";
                } else {
                    console.error('Đăng nhập không thành công');
                }
            })
            .catch(error => console.error(error));
    });
});
