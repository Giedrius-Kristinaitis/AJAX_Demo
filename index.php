<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX</title>
    <style>
        /*
         *
         * I KNOW THAT CSS SHOULD BE KEPT IN A SEPERATE FILE
         * BUT FOR THE SAKE OF SIMPLICITY IT IS HERE
         *
         */
        body {
            text-align: center;
        }

        .button {
            width: 256px;
            padding: 16px;
            border: none;
            background-color: #00f;
            color: white;
            font-weight: 100;
            font-size: 1.5em;
        }

        .button:hover {
            background-color: #00a;
        }

        .button:active {
            background-color: #005;
        }

        #string {
            margin: 32px;
            padding: 32px;
            border: 5px dotted black;
            font-weight: 150;
            font-size: 2em;
            font-family: Arial;
        }

        #person {
            list-style-type: none;
            margin-right: 40px;
        }
    </style>
</head>
<body>
    <h1>Welcome to random stuff generator</h1>
    <button class="button" onclick="generateString()">Generate String</button>
    <p><small>All strings are generated on the server and retrieved using AJAX</small></p>
    <p id="string"></p>

    <hr/>
    <br/>
    <button class="button" onclick="getPerson()">Get Person</button>
    <p> <small>The person object is retrieved from the server in JSON format using AJAX</small> </p>
    <ul id="person"></ul>
    
    <script src="script.js"></script>
</body>
</html>