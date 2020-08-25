$(function() {
   $('body')
       .on('click','.random', randomQuote)
       .on('click','.qotd', quotd);
});

function randomQuote() {
    displayQuote("quotes/random");
}
function quotd() {
    displayQuote("quotes/quotd")
}
function displayQuote(path){
    $.get( path, function( data ) {
    let quote = JSON.parse(data)
    $('.qotd-body').html(quote.text);
    $('.qotd-author').html(quote.author);
    });

}
