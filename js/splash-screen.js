$(document).ready(function() {
if (sessionStorage.getItem('splashScreen') !== 'true') {
  var quote = "What can you do the man is a god";
  var author = "EemeliTV";

  var quotes = [
    {
      quote: "Yesterday you said tomorrow. Just do it.",
      author: "Nike"
    },
    {
      quote: "I could agree with you but then we’d both be wrong",
      author: "Harvey Specter"
    },
    {
      quote: "Reality is wrong, dreams are for real.",
      author: "Tupac"
    },
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
