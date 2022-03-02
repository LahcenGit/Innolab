

$(document).ready(function(){

    
    $('.add-product').click(e => {
      let that = e.currentTarget;
      e.preventDefault();
      $.ajax({
        method: $(that).attr('method'),
        url: $(that).attr('href'),
        data: $(that).serialize()
      })
      .done((data) => {
        $('#detail').html(data);
        $('#add-product-modal').modal('show');
      })
      .fail((data) => {
        console.log(data);
      });
    });



})