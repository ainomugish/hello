$(document).ready(function() {
    function doSubscribe() {

    }

    $('#mainform').submit(function(){
        var messageinput = $('#messagebox');
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
        $('#status1').text('Success');
    }

    var onConnect = function(frame) {
        $('#status').toggleClass('status__indicator--online',true);
        $('#status1').text('ONLINE');
        client.subscribe("/can/#");
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
        //if (responseObject.errorCode !== 0)
        alert(client.clientId+"\n"+responseObject.errorCode+"\n"+"Disconnected");
    }

    function onMessageArrived(message) {
        $('#messagelist').append("<div class=\"message--send\"><div class=\"message__bubble--send\"><p>"+ message.payloadString + "</p></div><figure class=\"message__avatar\"><img src=\"\" /></figure></div><div class=\"cf\"></div>");
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
