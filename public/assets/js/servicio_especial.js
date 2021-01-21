$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function print_contrato(id) {
    window.open("/servicio-especial/ver/"+id, "_blank");
}