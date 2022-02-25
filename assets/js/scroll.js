$(window).scroll(function(){
    // alert(($(window).height() - $(document).height()))
    if($(window).scrollTop() >= $('#postBox').offset().top + $('#postBox').outerHeight() - window.innerHeight +100){
      // alert('scroll')




      $.ajax({
        url:'scrollView.php',
        type: 'GET',
        data:{
          type : 'vacancy',
        }, 
        success: function(data){
          $('#allin').append(data)
        }
      })
    }
  })