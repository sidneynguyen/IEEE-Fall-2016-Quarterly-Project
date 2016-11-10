<!-- Global contains the functions and appearance that you want to have
available on every page. Here, I have the function for connecting to
Mongo and the header image. I recommend also creating a navbar file and
including it at the bottom, so that all of your pages have the same menu
bar. -->

<style>
/* embedded css. I usually make a separate file for css, but for something
simple like this, it is valid to put style tags at the top */
	img {
		display: block;
		height: 190px;
		margin-right: auto;
		margin-left: auto;
		margin-bottom: 0;
	}
</style>

<?php // declare a PHP block.
	date_default_timezone_set('America/Los_Angeles');

	// get a reference to your mlab database. Call this function in pages
	// which use mongo
	function connectMongo() {
		$connection = new MongoClient("mongodb://admin:admin@ds161475.mlab.com:61475/algae");
		$database = $connection->qpdemo;
		$collection = $database->qp;
		return $collection;
	}
?>
		
<br><hr><br> <!-- I like whitespace. <br> =>linebreak, <hr> =>dividing line -->
