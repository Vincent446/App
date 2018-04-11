$(document).ready(function() {
  if(sessionStorage.getItem('splashScreen') !== 'true') {
    var quotes = [
      {
        quote: "Don't cry beacuse it's over, smile beacuse it happend.",
        author: "Dr. Seuss"
      },
      {
        quote: "Be yourself, everyone else is already taken.",
        author: "Oscar Wilde"
      },
      {
        quote: "So many books, so little time.",
        author: "Frank Zappa"
      },
      {
        quote: "You only live once, but if you do it right, once is enough.",
        author: "Mae West"
      },
      {
        quote: "If you tell the truth, you don't have to remember anything.",
        author: "Mark Twain"
      },
      {
        quote: "Without music, life would be a mistake.",
        author: "Friedrich Nietzsche"
      }
    ];

  var randomQuote = quotes[Math.floor(Math.random() * quotes.length)];


  $('body').prepend('<header id="splashScreen"></header>');
  $('#splashScreen').prepend('<blockquote></blockquote>');
  $('blockquote').prepend('<p id="quote"></p>');
  $('blockquote').append('<footer id="author"></footer>');
  $('#quote').html(randomQuote.quote);
  $('#author').html(randomQuote.author);
  $("#splashScreen").show().delay(2500).fadeOut();
  sessionStorage.setItem('splashScreen', 'true');

}
});
