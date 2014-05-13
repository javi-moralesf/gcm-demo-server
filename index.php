<!DOCTYPE html>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/foe.css" />
</head>
<body>

<div class="container">

    <header>
        <h1>Push Notifications<span>Powered by Google Cloud Messaging</span></h1>
    </header>

    <div class="wrapper">
        <section>
            <h2>Connected devices</h2>
            <ul class="list" style="width: 300px; max-height: 300px; overflow-y:  scroll">
              <?php require 'device-list.php'; ?>
            </ul>
        </section>
        <section>
            <button onclick="send('direct')" style="min-width: 250px; margin-bottom: 7px" id="send_direct" class="progress-button"
                    data-style="rotate-angle-top"
                    data-perspective
                    data-horizontal>Send message</button>
            <button onclick="send('broadcast')" style="min-width: 250px" id="send_broadcast" class="progress-button"
                    data-style="rotate-angle-top" data-perspective
                    data-horizontal>Broadcast</button>
            <h2>Options</h2>
            <ul class="list">
                <li><input type="checkbox" id="hide_notification" name="option_hidden" value="true" /> Hide notification</li>
                <li><input type="checkbox" id="enable_sound" name="option_sound" value="true" /> Enable sound</li>
                <li><input type="checkbox" id="enable_icon" name="option_icon" value="true" /> Change icon</li>
            </ul>
        </section>

        <div class="logo">
            <img src="img/focusonemotions.png" alt="" id="logo">
            <p class="note">Javier Morales + Orestes Carracedo<br />Barcelona Android User Group - May 2014</p>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/progressButton.js"></script>
<script type="text/javascript" src="js/foe.js"></script>
<script type="text/javascript" src="buttons.js"></script>
</body>
</html>
