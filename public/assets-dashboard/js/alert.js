document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;
    const successMessage = body.dataset.message;
    const errMassage = body.dataset.error;

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: successMessage,
            showConfirmButton: false,
            timer: 2500
        });
    }

    if (errMassage) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: errMassage
        });
    }
});