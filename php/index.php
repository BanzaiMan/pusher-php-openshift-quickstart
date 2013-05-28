<?php
require_once( 'config.php' );
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Hello World using Pusher on OpenShift</title>
  <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
  <div class="brand">
    <a href="http://pusher.com">
      <img class="brand-image"
        alt="Pusher logo"
        src="img/pusher.png">
    </a>
    <a href="http://openshift.com">
      <img class="brand-image"
        alt="OpenShift logo"
        src="img/openshift.png">
    </a>
  </div>
  <h1>
    Hello World using Pusher on OpenShift
  </h1>
  <h2>
    How to get started
  </h2>
  <ul>
    <li>Sign up for a free Pusher account via <a href="http://pusher.com/signup">http://pusher.com/signup</a></li>
    <li>Take a note of your application credentials: <code>app_id</code>, <code>app_key</code> and <code>app_secret</code></li>
    <li>Replace the values in <code>php/config.php</code> with the credentials</li>
    <li>Deploy your Pusher application
      <pre>
        git add .
        git commit -m "my first commmit"
        git push origin master
      </pre>
    </li>
  </ul>
  <p>
    Once the above steps have been completed click this button to trigger an event on every web browser with this page open:
  </p>
  
  <div class="action">
    <button id="trigger">Trigger Hello World</button>
  </div>

  <p>For more information check out the <a href="https://github.com/pusher/pusher-php-openshift-quickstart">Pusher on OpenShift README</a>.</p>
  

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="//d3dy5gmtp8yhk7.cloudfront.net/2.0/pusher.min.js"></script>
  <script>
    // Log debug information to the JavaScript console, if possible
    Pusher.log = function( msg ) {
      if( window.console && window.console.log ) {
        window.console.log( msg );
      }
    };

    // Create new Pusher instance and connect
    var pusher = new Pusher( "<?php echo( APP_KEY ) ?>" );

    // Subscribe to the channel that the event will be published on
    var channel = pusher.subscribe( 'test-channel' );

    // Bind to the event on the channel and handle the event when triggered
    channel.bind( 'test-event', function( data ) {
      // For now, alert the message.
      alert( data.message );
    } );

    // Listen for click events on the button element
    $('#trigger').click( function() {
      // Make AJAX call to invoke trigger.php.
      // This will broadcast the Hello World message to anybody with the page open.
      $.get( 'trigger.php' );
    } );
  </script>
</body>
</html>
