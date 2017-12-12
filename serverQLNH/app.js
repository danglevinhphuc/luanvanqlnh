var express = require('express');//mat dinh yeu cau module express
var app = express();//mat dinh goi den express
var server = require('http').createServer(app);//mat dinh
var io = require('socket.io').listen(server);//mat dinh goi den thu muc socket.io va lang nghe port cua server la 3000
var request = require('request');// goi den ham request de su dung http truyen post get den local:8000
const tableChoose = []; // bien luu ma ban da chon de su dung 
const itemChoose = [] ; // bien luu danh sach ban goi mon
const idBan =[];
const itemDone = [];// mang luu lai noi dung khi dau bep hoan thanh cong viec gui den phuc vu
app.get("/",function(req,res,next){
	res.send("Connecting");
});
server.listen(process.env.PORT ||3000);//mat dinh
console.log("connecting");
io.sockets.on('connection', function(socket){// goi den connect trong thu muc socket.io thi phan index.html phai co script trong html tuc la tao ket noi
	console.log("Da co nguoi ket noi",socket.id);
	socket.on('disconnect',function(data){
		console.log("Da co roi ket noi",socket.id);
	});
	/***kiem tra neu tableChoose ton tai**/
	if(tableChoose.length){
		io.sockets.emit('send table choose',tableChoose);
	}/***END kiem tra tableChoose ***/
	/***Kiem tra danh sach mon an da chon co ton tai hay khong **/
	if(itemChoose.length){
		let data = {
			itemChoose: itemChoose,
			idBan  : idBan
		};
		io.sockets.emit('send item choose from server',data);
	}
	/** Kiem tra co ton tai mon an hoan thanh khong co thi gui den client **/
	if(itemDone.length){
		io.sockets.emit("send item done load to client form server",itemDone);
	}
	socket.on('send choose table',function(data){
		//phat 1 su kien tu server den client. 
		tableChoose.push(data);// luu giu ma vao bien 
		// xoa trung
		io.sockets.emit('send table choose',tableChoose);
	});
	// nhan du lieu goi danh sach mon an
	socket.on('send item from client',function(data){
		itemChoose.push(data);		
		io.sockets.emit('send item from server',data);
	});
	// nhan mon an hoan thanh tu client gui den phuc vu
	socket.on("send item to serve from client",function(data){
		//console.log(data);
		if(idBan.indexOf(data.idban) == -1){
			idBan.push(data.idban);
			itemDone.push(data);
			io.sockets.emit('send item move table from server',data);
		}
	});
	/* NHAN ID BAN DE XOA MANG LUU DU LIEU MA DAU BEP GUI HOAN THANH
		KHI PHUC VU XAC NHAN  ***/
	socket.on("send idBan from server",function(data){
		let position = -1;		
		// tao vong lap de tim vi tri co idBan trung vs mang
		for(let i = 0 ; i < itemDone.length ; i++){
			let dataIdBan = itemDone[i];
			if(dataIdBan['idban'] == data){
				position = i;
				console.log(dataIdBan);
			}
		}
		if(position != -1){
			console.log(position);
			// neu ton tai thi xoa vi tri trong mang itemDone
			itemDone.splice(position, 1);
		}
	});
	/**TAT THIET BI **/
	socket.on("turn off device from client",function(data){
		if(data){
			// reset lai bien toan cuc luu gia tri
			if(tableChoose.length){tableChoose.splice(0,tableChoose.length)}
			if(itemChoose.length){itemChoose.splice(0,itemChoose.length)}
			if(idBan.length){idBan.splice(0,idBan.length)}
			if(itemDone.length){itemDone.splice(0,itemDone.length)}
			// gui du lieu den client de xoa localStogate
			io.sockets.emit("turn off device from server",1);
		}
	});
	/*** EXIT TALBE **/
	socket.on("send exit from client",function(data){
		let position = tableChoose.indexOf(data);
		if(position != -1){
			// neu ton tai thi xoa vi tri trong mang itemDone
			tableChoose.splice(position, 1);
		}
	});
});