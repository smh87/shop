<?php
class Upload {
	//URL middleware GET req by genre og programtype
	public $geturl ="https://feed.entertainment.tv.theplatform.eu/f/jGxigC/bb-all-pas?form=json&byTags=genre:action&byProgramType=movie";
	//product typ e.g. movie, series
	public $prodtype;
	//movie og serie genre
	public $genre;

	public $responsedataFromMiddleWare;


	//constructor
	function __construct($prodtype,$genre) {
		$this->prodtype = $prodtype;
		$this->genre = $genre;

		//get request from middleware
		$curl = curl_init();

		curl_setopt_array($curl, array(
					CURLOPT_URL => "https://feed.entertainment.tv.theplatform.eu/f/jGxigC/bb-all-pas?form=json&byTags=genre:$genre&byProgramType=$prodtype",
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'GET',
					));

		$this->responsedataFromMiddleWare = curl_exec($curl);

		//post data to site
		$this->post_data($this->responsedataFromMiddleWare);




		curl_close($curl);


		//print "In BaseClass constructor\n";
	}


	//post data to woocom-site
	function post_data($jsonResponse){
		//decode json to array
		$response1=json_decode($jsonResponse,true);
		//echo $response1["entries"][1]["title"];

		foreach($response1["entries"] as $i){
			//echo $i["title"].;




			$postfields= [
				'create' => [
					[
						'name' => $i["title"],
						'type' => 'simple',
						'regular_price' => '2',
						'virtual' => true,
						'downloadable' => true,
						'downloads' => [
							[

							]
						],
						'categories' => [
							[
								'id' => 19
							],
							[
								'id' => 18
							]
						],
						'images' => [
							[   "id"=> 16,
						"date_created"=> "2024-03-19T01:29:01",
						"date_created_gmt"=> "2024-03-19T01:29:01",
						"date_modified"=> "2024-03-19T01:29:01",
						"date_modified_gmt"=> "2024-03-19T01:29:01",
						"src"=> "https://localhost:8181/wp-content/uploads/2024/03/movie.png",
						"name"=> "movie",
						"alt"=> ""
							]
						],
						"attributes"=> [
							[
								"id"=> 0,
						"name"=> "Release year",
						"slug"=> "Release year",
						"position"=> 0,
						"visible"=> true,
						"variation"=> false,
						"options"=> [
							$i["plprogram\$year"]
						]
							]

						]]]];
						//post to woocom. site data from middleware 
						
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, 'https://localhost:8181/wp-json/wc/v2/products/batch');
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
						curl_setopt($ch, CURLOPT_POST, 1);
						// Edit: prior variable $postFields should be $postfields;
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postfields));
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // On dev server only!

						curl_setopt($ch, CURLOPT_USERPWD, 'ck_c31af6be21e9ae6a87a766624e2fb276a5f86169'.':'.'cs_94c8c7af1201c893cada96409b80ecca333dffb4');	
						$result = curl_exec($ch);
						echo $result;


		}
	}

	function __destruct() {
		//print "Destroying " . __CLASS__ . "\n";
	}
} 
$actionMovies = new Upload("movie","action");
//$ComedyMovies = new Upload("series","comedy");
//$actionMovies->post_data($actionMovies->$responsedataFromMiddleWare);
?>
