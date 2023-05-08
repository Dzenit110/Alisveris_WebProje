$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Emin misiniz?',
                    text: "Bu Veri Silinmek mi Istiyorsunuz?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Silin!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Silindi!',
                        'Dosyanız silindi.',
                        'success'
                      )
                    }
                  }) 


    });

  });

  /// Cnayla Sıparış
$(function(){
  $(document).on('click','#confirm',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Onaylamak istediğinizden emin misiniz?',
                  text: "Bu sıparış tekrak beklemede olmayacak",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Evet, Onayla!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Onayla!',
                      'Değişikliği Onayla',
                      'success'
                    )
                  }
                }) 


  });

});

/// Processing 
$(function(){
  $(document).on('click','#processing',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'İşlediğinizden emin misiniz??',
                  text: "Bu sıparış İşlenyior kısımda gidecek",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Evet'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'İşleniyor!',
                      'İşlem Değişikliği',
                      'success'
                    )
                  }
                }) 


  });

});


/// Teslim Edildi 
$(function(){
  $(document).on('click','#delivered',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Teslim edileceğinden emin misin?',
                  text: "Teslim edildikten sonra tekrar tekrak bu seçeneği olmayacak",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Evet, Teslim Et!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Teslim Edildi!',
                      'Teslim Edilen Değişiklik',
                      'success'
                    )
                  }
                }) 


  });

});
/// End Teslim Siparis

/// Iade Onay Sıparış 
$(function(){
  $(document).on('click','#approved',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Onaylanacağından emin misin?',
                  text: "İade Siparişi Onaylanacak",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Evet, Onayla!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Onaylandı!',
                      'Onaylanmış Değişiklik',
                      'success'
                    )
                  }
                }) 


  });


});