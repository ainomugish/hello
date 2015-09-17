$(document).ready(function() {
    function doSubscribe() {

    }

    $('#mainform').submit(function(){
        var messageinput = $('#message');
        message = new Paho.MQTT.Message(messageinput.val());
        message.destinationName = "/can/"+$('#name').val();
        messageinput.val('');
        messageinput.focus();
        client.send(message);
        return false;
    });


    function doDisconnect() {
        client.disconnect();
    }

    // Web Messaging API callbacks
    var onSuccess = function(value) {
        $('#status').toggleClass('connected',true);
        $('#status').text('Success');
    }

    var onConnect = function(frame) {
        $('#status').toggleClass('connected',true);
        $('#status').text('Connected');
        client.subscribe("/can/#");
        //var form = document.getElementById("example");
        //form.connected.checked= true;
    }
    var onFailure = function(error) {
        $('#status').toggleClass('connected',false);
        $('#status').text("Failure");
    }

    function onConnectionLost(responseObject) {
        //var form = document.getElementById("example");
        //form.connected.checked= false;
        //if (responseObject.errorCode !== 0)
        alert(client.clientId+"\n"+responseObject.errorCode);
    }

    function onMessageArrived(message) {
        $('#messagelist').append("<div class=\"Area\"><div class=\"R\"></div><div class=\"text R textR\">"/*+ message.destinationName+ "->" */+message.payloadString + "</div></div></div>");
        //$('#messagelist').append('<div class="message__bubble--send"></div><li>'+message.destinationName+ '->' +message.payloadString+'</li></div>');
        //var form = document.getElementById("example");
        //form.receiveMsg.value = message.payloadString;
    }

    var client;
    var r = Math.round(Math.random()*Math.pow(10,5));
    var d = new Date().getTime();
    var cid = r.toString() + "-" + d.toString()

    client = new Paho.MQTT.Client("localhost", 3000, cid );
    client.onConnect = onConnect;
    client.onMessageArrived = onMessageArrived;
    client.onConnectionLost = onConnectionLost;
    client.connect({onSuccess: onConnect, onFailure: onFailure});

});
