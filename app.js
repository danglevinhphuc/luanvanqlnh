var express = require('express');//mat dinh yeu cau module express
var app = express();//mat dinh goi den express
var server = require('http').createServer(app);//mat dinh
var io = require('socket.io').listen(server);//mat dinh goi den thu muc socket.io va lang nghe port cua server la 3000
const tableChoose = []; // bien luu ma ban da chon de su dung 
app.get("/",function(req,res,next){
	res.send("Connecting");
});
server.listen(process.env.PORT ||3000);//mat dinh

io.sockets.on('connection', function(socket){// goi den connect trong thu muc socket.io thi phan index.html phai co script trong html tuc la tao ket noi
	console.log("Da co nguoi ket noi",socket.id);
	socket.on('disconnect',function(data){
		console.log("Da co roi ket noi",socket.id);
	});
	if(tableChoose.length){// kiem tra neu tableChoose ton tai
		io.sockets.emit('send table choose',tableChoose);
	}
	socket.on('send choose table',function(data){
		//phat 1 su kien tu server den client. 
		tableChoose.push(data);// luu giu ma vao bien 
		// xoa trung
		io.sockets.emit('send table choose',tableChoose);
	});
});