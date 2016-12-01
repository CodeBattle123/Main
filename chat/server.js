'use strict';
let express = require('express');
let app = express();
let http = require('http').Server(app);
let io = require('socket.io')(http);

io.on('connection', function (socket) {
    console.log('we are connected');
    socket.on('new-message', function (msg){
        console.log(msg);
        io.emit('receive-message', msg);
    });
    socket.on('test', function(){
        console.log('mounted')
    })
});

http.listen('3000', function(){
    console.log('we have a connection');
});
