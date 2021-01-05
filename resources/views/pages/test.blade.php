<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .im-modal-chat {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 10000; /* Sit on top */
            padding-top: 10px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .im-modal-chat-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .im-modal-close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .im-modal-close:hover,
        .im-modal-close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .im-video-rooms{
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            justify-content: center;
        }
        .im-video-room{
            max-width: 45%;
            height: 200px;
            width: 45%;
            flex: 0 0 45%;
            margin: 1rem;
            background: red;
            position: relative;
        }
        .im-room-group-btn{
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30px;
        }
        .im-room-btns{
            background: gold;
            height: inherit;
            width: 100px;
            margin: 0 auto;
        }
        .im-room-btns:after {
            content: "";
            clear: both;
            display: table;
        }
        .im-room-btns button {
            background-color: #4CAF50; /* Green background */
            border: 1px solid green; /* Green border */
            color: white; /* White text */
            cursor: pointer; /* Pointer/hand icon */
            float: left; /* Float the buttons side by side */
            height: inherit;
            width: 50%;
        }
        .im-room-btns button:not(:last-child) {
            border-right: none; /* Prevent double borders */
        }

        /* Add a background color on hover */
        .im-room-btns button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>

<h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<div id="im-modal-chat" class="im-modal-chat">
    <!-- Modal content -->
    <div class="im-modal-chat-content">
        <span class="im-modal-close" onclick="window.imVideoApi.room.destroySession()">&times;</span>
        <div class="im-video-rooms">
            <div class="im-video-room" id="im_videolocal">
                <div class="im-room-group-btn">
                    <div class="im-room-btns">
                        <button>1</button>
                        <button>1</button>
                    </div>
                </div>
            </div>
            <div class="im-video-room" id="im_videoremote1">

            </div>
            <div class="im-video-room" id="im_videoremote2">

            </div>
            <div class="im-video-room" id="im_videoremote3">

            </div>
            <div class="im-video-room" id="im_videoremote4">

            </div>
            <div class="im-video-room" id="im_videoremote5">

            </div>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("im-modal-chat");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("im-modal-close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>
