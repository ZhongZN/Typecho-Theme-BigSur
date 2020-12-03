<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
html,
body {
    height: 100%;
    overflow: hidden;
}
body {
    /*background: #3a7bd5;
    background-image: -webkit-radial-gradient(top, circle cover, #00d2ff 0%, #3a7bd5 80%);*/
    display: flex;
    justify-content: center;
    align-items: center;
}
* {
    box-sizing: border-box;
}
textarea,
input,
button {
    outline: none;
}
.window-button,
.window .buttons .close,
.window .buttons .minimize,
.window .buttons .maximize {
    padding: 0;
    margin: 0;
    margin-right: 4px;
    width: 12px;
    height: 12px;
    background-color: gainsboro;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    color: rgba(0, 0, 0, 0.5);
}
.window {
    animation: bounceIn 1s ease-in-out;
    width: 640px;
}
.window .handle {
    height: 22px;
    background-color:white;
    /*linear-gradient(0deg, #d8d8d8, #ececec);*/
    border-top: 1px solid white;
    border-bottom: 1px solid #b3b3b3;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    color: rgba(0, 0, 0, 0.7);
    font-family: Helvetica, sans-serif;
    font-size: 13px;
    line-height: 22px;
    text-align: center;
}
.window .buttons {
    position: absolute;
    float: left;
    margin: 0 8px;
}
.window .buttons .close {
    background-color: #ff6159;
}
.window .buttons .minimize {
    background-color: #ffbf2f;
}
.window .buttons .maximize {
    background-color: #25cc3e;
}
.window .console {
    padding: 4px;
    background-color: black;
    opacity: 0.7;
    height: 218px;
    color: white;
    font-family: 'Source Code Pro', monospace;
    font-weight: 200;
    font-size: 14px;
    white-space: pre;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    overflow-y: auto;
}
.window .console::after {
    content: "|";
    animation: blink 2s steps(1) infinite;
}
.prompt {
    color: #bde371;
}
.path {
    color: #5ed7ff;
}
@keyframes blink {
    50% {
        color: transparent;
    }
}
@keyframes bounceIn {
    0% {
        transform: translateY(-1000px);
    }
    60% {
        transform: translateY(200px);
    }
    100% {
        transform: translateY(0px);
    }
}
</style>
</head>
<body>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro:200' rel='stylesheet' type='text/css'>
<div class="container">
    <div class="window">
        <div class="handle">
            <div class="buttons">
                <button class="close">
                </button>
                <button class="minimize">
                </button>
                <button class="maximize">
                </button>
            </div>
            <span class="title"></span>
        </div>
        <div class="console"></div>
    </div>
</div>
<script>
$(document).ready(function() {
    var title = $(".title");
    var console = $(".console");
    var path = "~";
    var command = "";
    var commands = [{
        "name": "clear",
        "function": clearConsole
    }, {
        "name": "help",
        "function": help
    }];

    function help() {
        console.append("There is no help... MUAHAHAHAHA. >:D\n");
    }

    function clearConsole() {
        console.text("");
    }

    function processCommand() {
        var isValid = false;
        for (var i = 0; i < commands.length; i++) {
            if (command == commands[i].name) {
                commands[i].function();
                isValid = true;
                break;
            }
        }

        if (!isValid) {
            console.append("root: command not found: " + command + "\n");
        }
    }

    function displayPrompt() {
        console.append("<span class=\"prompt\">➜</span> ");
        console.append("<span class=\"path\">" + path + "</span> ");
    }

    $(document).keydown(function(e) {
        if (e.keyCode == 8 && e.target.tagName != 'INPUT' && e.target.tagName != 'TEXTAREA') {
            e.preventDefault();
            if (command !== "") {
                command = command.slice(0, -1);
                console.html(console.html().slice(0, -1));
            }
        }
    });

    $(document).keypress(function(e) {
        e = e || window.event;
        var keyCode = typeof e.which == "number" ? e.which : e.keyCode;
        if (e.which == 13) {
            console.append("\n");
            processCommand();
            displayPrompt();
            command = "";
        } else {
            var keyString = String.fromCharCode(keyCode);
            console.append(keyString);
            command += keyString;
        }
    });

    // Set the window title
    title.text("Terminal")

    // Get the date for our fake last-login
    var date = new Date().toString();
    date = date.substr(0, date.indexOf("GMT") - 1);

    // Display last-login and promt
    console.append("Last login: " + date + " \n");
    displayPrompt();
});
</script>
</body>
</html>