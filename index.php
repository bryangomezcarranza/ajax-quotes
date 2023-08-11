<html>
  <head>
    <title>AJAX Quotes</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Tulpen+One&display=swap');
    @import url('https://fonts.googleapis.com/css2family=Qwitcher+Grypen:wght@700&display=swap');

            /* CSS to hide the quote container initially and apply fade-in animation */
        #quoteContainer {
            display: none;
            font-size:xx-large;
            text-shadow: 4px 4px 4px #aaa;
        }

        /* CSS for the fade-in animation */
        .fade-in {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

    </style>
  </head>
  <body>
    <h1>AJAX Quotes </h1>
    <h2>Welcome to our page! The primary feature of this page is a continuous loop of inspiring quotes presented below. Upon loading, a dynamic function comes into action, showcasing a quote and seamlessly cycling through an array of thought-provoking statements. Our presentation of these quotes is accompanied by an elegant fade-in animation, enhancing the visual experience. As each quote transitions, a smooth fade-out and fade-in effect is employed, seamlessly ushering in the next piece of wisdom. Additionally, we offer a diverse selection of fonts, with each new quote being displayed in a distinctive typeface. We trust you'll enjoy this immersive journey of inspiration!</p>
      <p>See the quotes below!</p>
   
    <div id="quoteContainer">Quotes go here</div>
    <script>

      var counter = 0;
      
      function getRandomQuote(){

        var fonts = ["Shadows Into Light", "Tulpen One", "Qwitcher Grypen"]
       // create ajax object 
        var xhr = new XMLHttpRequest();

        // target the server page 
        xhr.open('GET', 'random_quotes.php', true);

        // On success
        xhr.onload = function(){
          if(xhr.status >= 200 && xhr.status < 300) { // show data
           // document.querySelector("#quoteContainer").innerText = xhr.responseText;
            
            var quoteContainer = document.querySelector("#quoteContainer");
            quoteContainer.innerText = xhr.responseText;
            // add font fmaily 
            quoteContainer.style.fontFamily = fonts[counter];
            counter++;

            if (counter >= fonts.lenght) {
              counter = 0; 
            }
            
            quoteContainer.style.display = "block";
            quoteContainer.classList.add("fade-in");
            setTimeout(function(){
              quoteContainer.classList.remove("fade-in");
            }, 1000);
          } else {
            document.querySelector("#quoteContainer").innerText = "Failed to fetch quote." + xhr.status;
          }
        };
        // On error
        xhr.onerror = function(){
          alert("Oh oh! There was an error");
        };
  
        // Write data 
        xhr.send();
      }

      function displayRandomQuote(){
        // Retrive quote
        getRandomQuote();

        // Loop every 5 seconds 
        setInterval(getRandomQuote,5000)
      }
      
      displayRandomQuote();
      
    </script>
  </body>
</html>
