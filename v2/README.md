# Arrancar nodejs + socket.io

Solo primera vez

`sudo npm install forever -g`

Para arrancar cuando se apaga el servidor

`forever start node-futbome/index.js`

Para ver los procesos activos de nodejs (para matarlo)

`ps aux | grep index.js`

`/Applications/XAMPP/htdocs/futbolme-slim/node-futbolme  (( staging ))  >ps aux | grep index.js`

_cristiantorrijoslazaro  7833   0,0  0,0  4408548    772 s005  S+    9:13AM   0:00.00 grep index.js_

_cristiantorrijoslazaro  7684   0,0  0,1  5375084  34388   ??  S     9:12AM   0:00.21 /usr/local/bin/node /Applications/XAMPP/xamppfiles/htdocs/futbolme-slim/node-futbolme/index.js_

_cristiantorrijoslazaro  7679   0,0  0,1  5350648  38904   ??  Ss    9:11AM   0:00.29 /usr/local/bin/node /usr/local/lib/node_modules/forever/bin/monitor index.js_


# En las páginas que queramos utilizar socket.io

`<script type="text/javascript" src="http://localhost:3000/socket.io/socket.io.js"></script>`

`<script type="text/javascript">
     var ioSocketUrl = '{{ baseUrlSocketIo }}';
 </script>`
 
 `if (typeof io == 'function') {
      var socket = io.connect(ioSocketUrl);
  }`
  
Emitir
  
`var data = {
  a : jQuery('#a').val(),
  b : jQuery('#b').val()
};
var jsonData = JSON.stringify(data);
socket.emit('nombreAccionAEmitir', jsonData);`

Escuchar emisiones

`var socket = io.connect(ioSocketUrl);
 socket.on('nombreAccionAEscuchar', function(jsonData){
     var data = JSON.parse(jsonData);
     console.log(data);
 });`