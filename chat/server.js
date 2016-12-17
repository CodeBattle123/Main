'use strict';
let socket = require( 'socket.io' );
let express = require( 'express' );
let http = require( 'http' );
let app = express();
let server = http.createServer( app );

let io = socket.listen( server );

io.sockets.on( 'connection', function( client ) {
    console.log( "We have connection" );

    client.on( 'message', function( data ) {
        console.log( 'Message received ' + data);

        //client.broadcast.emit( 'message', { name: data.name, message: data.message } );
        io.sockets.emit( 'message');
    });
});

server.listen( 8080 );
