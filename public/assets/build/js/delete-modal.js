/**
 * Blok
 */
$(document).on('click', '.del-button', function () {
    var blokID = $(this).attr('data-blokid');
    var namaBlok = $(this).attr('nama-blok');
    $('#nama_blok').val(namaBlok);
    $('#blok_id').val(blokID);
    $('#blokDelete').modal('show');
})

/**
 * Kamar
 */
$(document).on('click', '.del-button', function() {
    var idKamar = $(this).attr('data-idKamar');
    var noKamar = $(this).attr('no-kamar');
    $('#id_kamar').val(idKamar);
    $('#no_kamar').val(noKamar);
    $('#kamarDelete').modal('show');
})
 /**
  * 
  */