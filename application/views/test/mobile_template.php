<!doctype html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
  <meta charset="utf-8">
  <title>keypress demo</title>
  <style>
  fieldset {
    margin-bottom: 1em;
  }
  input {
    display: block;
    margin-bottom: .25em;
  }
  #print-output {
    width: 100%;
  }
  .print-output-line {
    white-space: pre;
    padding: 5px;
    font-family: monaco, monospace;
    font-size: .7em;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<form>
  <fieldset>
    <label for="target">Type Something:</label>
    <input id="target" type="text">
  </fieldset>
</form>
<button id="other">
  Trigger the handler
</button>
<script src="https://api.jquery.com/resources/events.js"></script>
 
<script>
var xTriggered = 0;
$( "#target" ).keypress(function( event ) {
  if ( event.which == 13 ) {
     event.preventDefault();
  }
  xTriggered++;
  var msg = "Handler for .keypress() called " + xTriggered + " time(s).";
  $.print( msg, "html" );
  $.print( event );
});
 
$( "#other" ).click(function() {
  $( "#target" ).keypress();
});
</script>
 
</body>
</html>