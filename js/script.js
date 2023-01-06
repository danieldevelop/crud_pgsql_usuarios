function confirmDelete(delURL) 
{
    Swal.fire({
        title: '¿Está seguro?',
        text: "¡No podrás revertir esto!",
        confirmButtonColor: '#154773',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: "SI",
        cancelButtonText: "NO",
        allowOutsideClick: false

    }).then((result) => {
        if (result.isConfirmed) {
            document.location = delURL;
        } else {
            Swal.fire({
                title: 'Cancelado',
                text: "El registro seleccionado está a salvo!!",
                confirmButtonColor: '#154773',
                confirmButtonText: "Aceptar",
                allowOutsideClick: false
            });
        }
    });
}
