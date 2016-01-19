$(document).ready(function() {
    function doSubscribe() {

    }
    var r=0;
    $(function() {
        $('#input-box').focus();
    });

    /*$('.input-box').submit(function(){
        var messageinput = $('#textarea');
        message = new Paho.MQTT.Message(messageinput.val());
        message.destinationName = "/"+$('#receiver').val()+"/";
        messageinput.val('');
        messageinput.focus();
        client.send(message);
        return false;
    });*/


        $(document).on('keypress','textarea', function(e){

            var element_id = $(this).attr('data-parentid');
            var id = $(this).attr('data-parent');

            if((e.keyCode || e.which) == 13) { //Enter keycode
                console.log($(this).find('textarea'));

                console.log(element_id);
                console.log(id);
                var messageinput = $('#t-area'+element_id);
                message = new Paho.MQTT.Message(messageinput.val());
                console.log(message.payloadString);
                //messageinput.outerHTML.hasOwnProperty('popup-messages').innerHTML.append("<li><span class=\"left\">"+ message.payloadString +"</span><div class=\"clear\"></div></li>");
                //$("#msg-list").append("<li><span class=\"left\""+messageinput.val()+"</span><div class=\"clear\"></div></li>");
                $('#msg-list'+element_id).append("<li><span class=\"right\">"+messageinput.val()+"</span><div class=\"clear\"></div></li>");
                message.qos =1;
                r=id;
                console.log(message.id);
                message.destinationName = "/"+$('#id'+id).val();
                console.log(message.destinationName);
                messageinput.val('');
                messageinput.focus();
                client.send(message);
                return false;

            }
        });


    /*$("textarea").keyup(function(e){
        if((e.keyCode || e.which) == 13) { //Enter keycode
            if($(this).hasClass("first"))
                alert("first ta clicked");element_id
            else
                alert("the other ta clicked");
        }
    });*/


    function doDisconnect() {
        client.disconnect();
    }

    // Web Messaging API callbacks
    var onSuccess = function(value) {
        $('#status').toggleClass('connected',true);
        $('#status1').text('Success');
    }

    var onConnect = function(frame) {
        $('#status').toggleClass('status__indicator--online',true);
        $('#status1').text('ONLINE');
        var tx = $('#user_id').val();
        console.log(tx);
        //var tx = document.getElementById("user_id").value;
        client.subscribe("/"+tx);
        //var form = document.getElementById("example");
        //form.connected.checked= true;
    }
    var onFailure = function(error) {
        $('#status').toggleClass('status__indicator',false);
        $('#status1').text("Failed to connet");
    }

    function onConnectionLost(responseObject) {
        //var form = document.getElementById("example");
        //form.connected.checked= false;
        if (responseObject.errorCode !== 0)
        alert(client.clientId+"\n"+responseObject.errorCode+"\n"+"Disconnected");
    }

    function onMessageArrived(message) {

        console.log(r);
        var receiver = $('#user_id').val();
        $('#msg-list'+receiver).append("<li><span class=\"left\">"+ message.payloadString +"</span><div class=\"clear\"></div></li>");
        //$('.popup-messages').append("<div class=\"message--send\"><div class=\"message__bubble--send\"><p>"+ message.payloadString + "</p></div><figure class=\"message__avatar\"><img src=\"\" /></figure></div><div class=\"cf\"></div>");
        //$('#messagelist').append('<div class="message__bubble--send"></div><li>'+message.destinationName+ '->' +message.payloadString+'</li></div>');
        //var form = document.getElementById("example");
        //form.receiveMsg.value = message.payloadString;
    }

    var client;
    var r = Math.round(Math.random()*Math.pow(10,5));
    var d = new Date().getTime();
    var cid = $('#user_id').val();//r.toString() + "-" + d.toString();

    /*var mosca = require("./");
    var server = new mosca.Server({
        http: {
            port: 3000,
            bundle: true,
            static: './',
            clientId: cid
        }
    });*/
    //options = new MqttConnectOptions();


    client = new Paho.MQTT.Client("localhost", 3000, cid );
    client.onConnect = onConnect;
    client.onMessageArrived = onMessageArrived;
    client.onConnectionLost = onConnectionLost;
    client.connect({onSuccess: onConnect, onFailure: onFailure, keepAliveInterval:360000});

});
