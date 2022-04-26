
// $(document).ready(function() {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//       $(".update-cart").change(function (e) {
//         e.preventDefault();
//         var ele = $(this);
//         var route = $(this).attr("route");
//         var id_product = ele.attr("data-id");
//         var quantityVal = $("input[name='quantity']").val()
//         $.ajax({
//             url: route,
//             method: "POST",
//             data: {
//               id: id_product, 
//               quantity: quantityVal,
              
//           },
//             success: function (response) {
//                window.location.reload();
//             }
//         });
//     });
// });
$(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
$(".product-remove").click(function (e) {
  e.preventDefault();

  var ele = $(this);
  var route = $(this).attr("route");
  var id_product = ele.attr("data-id");
  if(confirm("Are you sure want to remove?")) {
      $.ajax({
          url: route ,
          method: "DELETE",
          data: {
              id: ele.attr("data-id")
          },
          success: function (response) {
              window.location.reload();
          }
      });
  }
});

});
