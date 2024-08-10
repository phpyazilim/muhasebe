


$(document).ready(function() {

    $(".sortable").sortable();


});


$(".card-body").on("sortupdate", '.sortable',  function(event, ui){
    //   alert()
    //   $(".sortable").on("sortupdate",function(event,ui){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var $data = $(this).sortable("serialize");
    var $data_url = $(this).data("url");
    console.log(csrfToken)
    console.log($data)
    console.log($data_url)
    $.post($data_url,{data:$data,_token: csrfToken,},function(response){

        console.log(response)
    });
});



$(".card-body").on('change', '.isActive', function(){

     var $data = $(this).prop("checked");
      var $data_url = $(this).data("url");
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
        console.log($data)
        console.log("***************")
        $.post($data_url, {data:$data,_token: csrfToken,}, function (response) {
           //  alert(response);
            console.log(response)
        });

    }

})




//  $(".card-body").on('change', '.isCover', function() {
// //   $(".card-body").on('change', 'input.isCover', function() {
//
//      var $data = $(this).prop("checked");
//       var $data_url = $(this).data("url");
//     var csrfToken = $('meta[name="csrf-token"]').attr('content');
//     if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
//      //   alert($data)
//         console.log($data)
//         console.log("***************")
//         $.post($data_url, {data:$data,_token: csrfToken,}, function (response) {
//
//             console.log(response)
//             $(".image_refresh_div").html(response);
//         });
//
//     }
//
// })


$(document).ready(function() {

    $(document).on('change', '.isCover', function() {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        if (typeof $data !== "undefined" && typeof $data_url !== "undefined") {
            $.post($data_url, { data: $data, _token: csrfToken }, function(response) {
                console.log(response);
                $(".image_refresh_div").html(response);
            });
        }
    });
});




// $(".card-body").on('change', '.isActive', function(){
//
//      var $data = $(this).prop("checked");
//       var $data_url = $(this).data("url");
//     var csrfToken = $('meta[name="csrf-token"]').attr('content');
//     if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){
//
//         $.post($data_url, {data:$data,_token: csrfToken,}, function (response) {
//            //  alert(response);
//         });
//
//     }
//
// })


/*
$(".card-body").on("click", '.remove-btn',  function(event, ui){

Swal.fire({
    title: "Silmek istediğinize eminmisiniz?",
    text: "Bu işlem geri alınamaz!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Evet, Kaydı Sil ",
    cancelButtonText: "Vazgeç"
}).then((result) => {
    if (result.isConfirmed) {
        // Swal.fire({
        //     title: "Deleted!",
        //     text: "Your file has been deleted.",
        //     icon: "success"
        // });
       // document.getElementById("myForm").submit();
        $("#removeForm").submit()

    }
});

});
*/



$(".card-body").on("click", '.remove-btn',  function(event, ui){
    var form = $(this).closest("form");
    Swal.fire({
        title: "Silmek istediğinize eminmisiniz?",
        text: "Bu işlem geri alınamaz!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Evet, Kaydı Sil ",
        cancelButtonText: "Vazgeç"
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});






$(document).ready(function() {

    $('.summernote').summernote({
        height: 300
    });


    $(".tarihi").datepicker({
        dateFormat: "dd/mm/yy"
    });




    var uploadSection = Dropzone.forElement("#dropzone")
    uploadSection.on("complete",function(file){

        var $data_url = $("#dropzone").data("url");

        var $data = $(this).prop("checked");
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.post($data_url, {data:$data,_token: csrfToken,data_url:$data_url}, function (response) {

               $(".image_refresh_div").html(response);
            });
   

    })
 

});





$(document).ajaxComplete(function() {
    
    $(".card-body").on("click", '.remove-btn', function(event) {
        var form = $(this).closest("form");
        Swal.fire({
            title: "Silmek istediğinize emin misiniz?",
            text: "Bu işlem geri alınamaz!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet, Kaydı Sil",
            cancelButtonText: "Vazgeç"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    

    $(".card-body").on("sortupdate", '.sortable',  function(event, ui){
     
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var $data = $(this).sortable("serialize");
        var $data_url = $(this).data("url");
        console.log(csrfToken)
        console.log($data)
        console.log($data_url)
        $.post($data_url,{data:$data,_token: csrfToken,},function(response){
    
            console.log(response)
        });
    });

    $(".sortable").sortable();




});



function openTab(event, tabId) {

      var i, tabcontent, tablinks;

      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }

      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].classList.remove("active");
      }

      document.getElementById(tabId).style.display = "block";
      event.currentTarget.classList.add("active");


}



