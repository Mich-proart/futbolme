var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
    res.send('<h1>Futbolme Socket</h1>');
});

io.on('connection', function(socket){
    console.log('PC connected');

    socket.on('disconnect', function(){
        console.log('PC disconnected');
    });

    socket.on('refrescarHome', function(data){
        console.log('refrescarHome escuchado por servidor!');
        console.log(data);
        io.emit('refrescarHome', data);
    });

});

http.listen(3000, function(){
    console.log('listening on *:3000');
});