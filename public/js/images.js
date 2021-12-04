function setFirst() {
    $(".other-images .btn-danger").first().off('click').click((event) => {
        if($(".other-images").children().length > 1) {
            $(event.target).parents(".clone").remove();
            setFirst();
        }
    });
}

$(document).ready(() => {
  setFirst();

  $(".btn-success").click(() => { 
    $(".other-images .clone").first().clone().appendTo(".other-images");
    $(".other-images .clone input").last().val('');
    $(".other-images .btn-danger").last().click((event) => { 
        $(event.target).parents(".clone").remove();
    });
  });
});