const express = require('express');
const app = express();
const PORT = process.env.PORT || 5000;
const path = require('path');
var session = require('express-session');

// const connectionString = process.env.DATABASE_URL || 'postgres://postgres:password@choreboard-pg:5432/postgres';
// const pool = new Pool({connectionString: connectionString});

app
	.set("port", PORT)
;

app
	.use(express.static(path.join(__dirname, 'public')))
	.use(express.json())
	.use(express.urlencoded( {extended:true} ))
	.use('/', logRequest)
	.use('/login', logRequest)
	.use('/logout', logRequest)
	.use(session({
		secret: 'keyboard cat',
		resave: false,
		saveUninitialized: true
	}))
;

// routing rules
app
	.get('/', (req, res) => res.sendFile(path.join(__dirname+'/public/test.html')))
	.get('/getServerTime', verifyLogin, getServerTime)
;

app
	.post("/login", login)
	.post("/logout", logout)
;

// start listening
app.listen(app.get("port"), function() {
	console.log("Listening on port" + app.get("port"));
})

function login(req, res) {
	var username = req.body.username;
	var password = req.body.password;
	if(username === 'admin' && password === 'password') {
		console.log("success username = ", username)
		console.log("success password = ", password)
		if(!req.session.username){
			req.session.username = username;
			console.log("session username = ", req.session.username)
		}
		res.status(200).json({success: true});
	} else {
		res.status(500).json({success: false});
		console.log("failed username = ", username)
		console.log("failed password = ", password)
	}

}

function logout(req, res) {
	if(req.session.username) {
		console.log("logging out ...");
		req.session.destroy(function(err) {
			console.log("logged out");
			if (err) {
				console.log(err);
				console.log("there was an error");
			}
		});
		res.status(200).json({success: true});
	} else {
		res.status(500).json({success: false});
		console.log("cannot logout");
	}
}

function getServerTime(req, res) {
	var time = new Date();
	res.status(200).json({success: true, time: time});
}

function logRequest(req, res, next){
	console.log("Received a request for: " + req.url);
	next();
}

function verifyLogin(req, res, next){
	if(req.session.username) {
		next();
	} else {
		res.status(401).json({success: false});
		console.log("Not logged in");
	}
}
