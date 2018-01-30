$(document).foundation();

/* adding styling for youtube iframe in articles */
$(' iframe').wrap('<div class="embedded" />');
$('.embedded').wrap('<div class="video" />');

function toggleClass(theClass) {
   $('.' + theClass).toggleClass('toggle');
}

$(document).ready(function(e) {
    $(".calculator form :input").change(function() {

      var amout = calc();
      $('#total-price').html(addCommas(amout.toFixed(2)));

    });

    $('.calculator form .slider').on('moved.zf.slider', function() {

      var amout = calc();
      $('#total-price').html(addCommas(amout.toFixed(2)));

    });
});

function calc(){

   var count = 0;

   $(".calculator form :input").each(function() {
       if($(this).is(':checked')){
          count += parseFloat($(this).val());
          $(".calculator form .price-q-" + $(this).data('question-nr')).removeClass('active');
          $(".calculator form .price-a-" + $(this).data('question-nr') + "-" + $(this).data('answer-nr')).addClass('active');
       }
       if($(this).hasClass('slider-val')){
          answer = parseFloat($(this).val()) * parseFloat( $("#" + $(this).attr('id') + '-weight' ).val());
          count += answer;
          $(".total-answer-" + $(this).data('answer-nr')).html("&euro; " + addCommas(answer.toFixed(2)) );
          console.log($(this).data('answer-nr'));
       }
   });

   return count;
}

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}
