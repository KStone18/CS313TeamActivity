// const express = require('express')
// const path = require('path')
// const PORT = process.env.PORT || 5000

// express()
//   .use(express.static(path.join(__dirname, 'public')))
//   .set('views', path.join(__dirname, 'views'))
//   .set('view engine', 'ejs')
//   .get('/', (req, res) => res.render('pages/index'))
//   .listen(PORT, () => console.log(`Listening on ${ PORT }`))
var express = require('express');
var app = express();
const path = require('path')


const { Pool } = require("pg");

const connectionString = process.env.DATABASE_URL || "postgres://ta_user:ta_pass@localhost:5432/familyhistory";

const pool  = new Pool({connectionString: connectionString});


app.set('port', (process.env.PORT || 5000));
app.set('views', path.join(__dirname, 'views'))
app.use(express.static(__dirname + '/public'));

app.set('view engine', 'ejs')

app.get('/', (req, res) => res.render('pages/index'))

app.get('/getPerson', function(request, response) {
	getPerson(request, response);
});

app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});
	
function getPerson(request, response) {
	var id = request.query.id;
	// id = 1;
	getPersonFromDb(id, function(error, result) {
		// This is the callback function that will be called when the DB is done.
		// The job here is just to send it back.

		// Make sure we got a row with the person, then prepare JSON to send back
		if (error || result == null || result.length != 1) {
			response.status(500).json({success: false, data: error});
		} else {
			var person = result[0];
			response.status(200).json(result[0]);
			response.send(result[0]);
		}
	});
}


function getPersonFromDb(id, callback) {
	console.log("Getting person from DB with id: " + id);

	// Set up the SQL that we will use for our query. Note that we can make
	// use of parameter placeholders just like with PHP's PDO.
	var sql = "SELECT id, first, last, birthdate FROM person WHERE id = $1::int";

	// We now set up an array of all the parameters we will pass to fill the
	// placeholder spots we left in the query.
	var params = [id];


	// This runs the query, and then calls the provided anonymous callback function
	// with the results.
	pool.query(sql, params, function(err, result) {
		// If an error occurred...
		if (err) {
			console.log("Error in query: ")
			console.log(err);
			callback(err, null);
		}

		// Log this to the console for debugging purposes.
		console.log("Found result: " + JSON.stringify(result.rows));


		// When someone else called this function, they supplied the function
		// they wanted called when we were all done. Call that function now
		// and pass it the results.

		// (The first parameter is the error variable, so we will pass null.)
		callback(null, result.rows);
	});

} // end of getPersonFromDb

