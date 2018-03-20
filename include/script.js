$(function () {
   $(".post .like").on("click", function () {
       var number = $(this).find('.count');
       var likeCount = number.text()*1;

       $.ajax({
           url: '',
           data: {
               act: 'like',
               post_id: 1
           },
           type: 'GET',
           dataType: 'json',
           success: function (data) {
               if (data.is_like) {
                   number.addClass('liked');
               }
               number.text(data.likeCount);
           },
           error: function (data) {
           }
       });


   });
});