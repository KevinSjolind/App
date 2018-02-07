$(document).ready(function() {
//if (sessionStorage.getItem('splashScreen') !== 'true') {
  var quote = "What can you do the man is a god";
  var author = "EemeliTV";

  var quotes = [
    {
      quote: "citat2",
      author: "Author2"
    },
    {
      quote: "citat1",
      author: "Author1"
    },
    {
      quote: "citat3",
      author: "Author3"
    },
  ];
  var randomQuote = quotes[Math.floor(Math.random() * quotes.length)];

  $('body').prepend('<header id="splashScreen"></header>');
  $('#splashScreen').prepend('<blockquote></blockquote>');
  $('blockquote').prepend('<p id="quote"></p>');
  $('blockquote').append('<footer id="author"></footer>');
  $('#quote').html(randomQuote.quote);
  $('#author').html(randomQuote.author);
//  $("#splashScreen").show().delay(2500).fadeOut();
  sessionStorage.setItem('splashScreen', 'true');
//}
});
