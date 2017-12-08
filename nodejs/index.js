var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var port = process.env.PORT || 3000;
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('auction', function() {
    console.log('Redis: test-channel subscribed');
});

redis.on('message', function(channel, message) {
    console.log('Redis: Message on ' + channel + ' received!');
    console.log(message);
    message = JSON.parse(message);
    console.log(message.bid);
    io.emit("auction", message);
});

io.on('connection', function(socket) {
    // io.emit('chat message', "Hello World;");
    console.log('a user connected');
    socket.on('disconnect', function() {
        console.log('user disconnected');
    });
});

http.listen(port, function() {
    console.log('listening on *:' + port);
});