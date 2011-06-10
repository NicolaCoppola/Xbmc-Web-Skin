<?php 

/* ---------------------------------------------------------------
|
| INIZIO FREAMWORK 
| AUTORE   : Nicola Coppola
| VERSIONE : 0.1
| 
| Supporto : mac86project.altervista.org/xmbc
|
--------------------------------------------------------------- */

// Restituisce tutti i comandi che si possono inviare tramite Json
			
function jsoncomandi(){

	require('config_freamwork.php');
	
	$json = '{ "jsonrpc": "2.0", "method": "JSONRPC.Introspect" , "id": 1 }';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = commands
	
};


/* ---------------------------------------------------------------
|
| Inizio parte rigurdante il player - Stato - in esecuzione . 
|
--------------------------------------------------------------- */

// Funzioni Player attivi 

function statoplayer(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "Player.GetActivePlayers", "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = movie
	
};

			// Funzioni Player attivi : Audio
			
			function audioplayer(){
			
				require('config_freamwork.php');
				
				$json = '{"jsonrpc": "2.0", "method": "AudioPlayer.State", "id": 1}';
				
				$chiamata = curl_init();
				curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($chiamata, CURLOPT_POST          ,1);
				curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
				curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
				curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
				$json = curl_exec($chiamata);
				curl_close($chiamata);	
				return $json;
				
				// id = movie
				
			};
			
			// Funzioni Player attivi : Video
			
			function videoplayer(){
			
				require('config_freamwork.php');
				
				$json = '{"jsonrpc": "2.0", "method": "VideoPlayer.State", "id": 1}';
				
				$chiamata = curl_init();
				curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($chiamata, CURLOPT_POST          ,1);
				curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
				curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
				curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
				$json = curl_exec($chiamata);
				curl_close($chiamata);	
				return $json;
				
				// id = movie
				
			};
			
			// Funzioni Item play now
			
			function playnowAudio(){
			
				require('config_freamwork.php');
				
				$json = '{"jsonrpc": "2.0", "method": "AudioPlaylist.GetItems", "params": { "fields": ["title", "artist", "genre", "track", "duration", "year", "rating", "playcount" , "thumbnail" , "file" ] }, "id": 1}';
				
				$chiamata = curl_init();
				curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($chiamata, CURLOPT_POST          ,1);
				curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
				curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
				curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
				$json = curl_exec($chiamata);
				curl_close($chiamata);	
				return $json;
				
				// id = movie
				
			};
			
			function playnowVideo(){
			
				require('config_freamwork.php');
				
				$json = '{"jsonrpc": "2.0", "method": "VideoPlaylist.GetItems", "params": { "fields": [ "studio", "genre", "director", "trailer", "tagline", "plot", "plotoutline", "title", "originaltitle", "lastplayed", "runtime", "year", "playcount", "rating", "thumbnail", "fanart" , "file"] }, "id": 1}';
				
				$chiamata = curl_init();
				curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($chiamata, CURLOPT_POST          ,1);
				curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
				curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
				curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
				$json = curl_exec($chiamata);
				curl_close($chiamata);	
				return $json;
				
				// id = movie
				
			};
			

/* ---------------------------------------------------------------
|
| Inizio parte rigurdante la categoria video . 
|
--------------------------------------------------------------- */


// Funzioni Video Library : film

function film(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "VideoLibrary.GetMovies", "params": { "limits": { "start": 0 }, "fields": [ "studio","genre", "director", "trailer", "tagline", "plot", "plotoutline", "title", "originaltitle", "lastplayed", "runtime", "year", "playcount", "rating", "thumbnail", "fanart" , "file" ], "sort": { "method": "sorttitle", "ignorearticle": true } }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = movie
	
};


			// Funzioni Video Library : Stagioni TY
			
			function stagioni(){
			
				require('config_freamwork.php');
				
				$json = '{"jsonrpc": "2.0", "method": "VideoLibrary.GetTVShows", "params": { "fields": ["genre", "plot", "title", "lastplayed", "episode", "year", "playcount", "rating", "thumbnail", "fanart" ,"studio", "mpaa", "premiered"] }, "id": 1}';
			
				$chiamata = curl_init();
				curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($chiamata, CURLOPT_POST          ,1);
				curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
				curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
				curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
				$json = curl_exec($chiamata);
				curl_close($chiamata);
				return $json;
				
				// id = tvshows
				
			};
			
						// Funzioni Video Library : Stagioni TY --> Episodi
						
						function stagioniepisodi(){
						
						
							require('config_freamwork.php');
							
							
		
							
							$json ='{"jsonrpc": "2.0", "method": "VideoLibrary.GetSeasons", "params": { "fields": [ "season", "showtitle", "playcount", "episode", "thumbnail", "fanart" ], "tvshowid" : '.$_GET['season'].' }, "id": 1}';
							
							
							$chiamata = curl_init();
							curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
							curl_setopt($chiamata, CURLOPT_POST          ,1);
							curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
							curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
							curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
							$json = curl_exec($chiamata);
							curl_close($chiamata);
							return $json;
							
							// nome = seasons 
							// id   = season
							
							/*--------------------------------
							|
							| ?season=1
							|
							--------------------------------*/
							
							
						};
			
										// Funzioni Video Library : Stagioni TY --> Episodi --> video episodi
										
										function stagioniepisodifile(){
										
										
											require('config_freamwork.php');
											
											
											$json =  '{"jsonrpc": "2.0", "method": "VideoLibrary.GetEpisodes", "params": { "fields": [ "title", "plot", "votes", "rating", "writingcredits", "firstaired", "playcount", "runtime", "director", "productioncode", "season", "episode", "showtitle", "lastplayed", "thumbnail", "file" , "fanart" ], "season" : '.$_GET['season'].' , "tvshowid" : '.$_GET['episodes'].'  }, "id": 1}';
							
											
											$chiamata = curl_init();
											curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
											curl_setopt($chiamata, CURLOPT_POST          ,1);
											curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
											curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
											curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
											$json = curl_exec($chiamata);
											curl_close($chiamata);
											return $json;
											
											// nome = season
											// id   = episodes
											
											/*--------------------------------
											|
											| ?season=1&episodes3
											|
											--------------------------------*/
											
										};

// Funzioni Video Library : TY --> Plugin --> VNSI server

function vnsi(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "Files.GetDirectory", "property": {"directory": "pvr://channels/tv/all/"}, "id": "1"}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = files
	
};
			
			// Funzioni Video Library : TY --> Plugin --> VNSI server Recording
			
			function vnsirec(){
			
				require('config_freamwork.php');
				
				$json = '{"jsonrpc": "2.0", "method": "Files.GetDirectory", "property": {"directory": "pvr://recordings/"}, "id": "1"}';
				
				$chiamata = curl_init();
				curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($chiamata, CURLOPT_POST          ,1);
				curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
				curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
				curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
				$json = curl_exec($chiamata);
				curl_close($chiamata);	
				return $json;
				
				// id = files
				
			};


// Funzioni Video Library : Video musicali

function videomusicali(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "VideoLibrary.GetMusicVideos","params": { "fields": ["fanart" , "thumbnail" , "file"] }, "id": 1}';
	
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = files
	
};


/* ---------------------------------------------------------------
|
| Inizio parte rigurdante la categoria Audio . 
|
--------------------------------------------------------------- */


// Funzioni Audio Library : Canzoni

function canzoni(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "AudioLibrary.GetSongs", "params": { "fields": ["title", "artist", "genre", "track", "duration", "year", "rating", "playcount" , "thumbnail" , "file"] }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = songs
	
};

// Funzioni Audio Library : Artisti

function artisti(){

	require('config_freamwork.php');
	
	$json1 = '{"method":"AudioLibrary.GetArtists","id":23,"jsonrpc":"2.0","params":{"fields":["style","instrument","mood","born","formed","genre","died","disbanded","yearsactive","fanart","thumbnail"]}}}';
	
	$json = '{"jsonrpc": "2.0", "method": "AudioLibrary.GetArtists", "params":{"fields":["style","instrument","mood","born","formed","genre","died","disbanded","yearsactive","fanart","thumbnail"] }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = artists
	
};

			// Funzioni Audio Library : Artisti --> canzoni 
			
			function artisticnazoni(){
			
				require('config_freamwork.php');
				
				$json = '{"jsonrpc": "2.0", "method": "AudioLibrary.GetSongs", "params": { "fields": ["title", "artist", "genre", "track", "duration", "year", "rating", "playcount" , "thumbnail" , "file"], "artistid" : '.$_GET['artistid'].' }, "id": 1}';
				
				$chiamata = curl_init();
				curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($chiamata, CURLOPT_POST          ,1);
				curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
				curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
				curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
				$json = curl_exec($chiamata);
				curl_close($chiamata);	
				return $json;
				
				// id = songs
				
				/*--------------------------------
				|
				| ?artistid=
				|
				--------------------------------*/
				
			};



// Funzioni Audio Library : Album

function album(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "AudioLibrary.GetAlbums", "params": { "limits": { "start": 0 }, "fields": ["description", "theme", "mood", "style", "type", "label", "artist", "genre", "rating", "title", "year", "thumbnail" , "fanart"], "sort": { "method": "artist" } }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = albums
	
};

			// Funzioni Audio Library : Album
			
			function albumcanzoni(){
			
				require('config_freamwork.php');
				
				
				$json = '{"jsonrpc": "2.0", "method": "AudioLibrary.GetSongs", "params": { "fields": ["title", "artist", "genre", "track", "duration", "year", "rating", "playcount" , "thumbnail" , "file"], "albumid" : '.$_GET['albumid'].' }, "id": 1}';
				
				$chiamata = curl_init();
				curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
				curl_setopt($chiamata, CURLOPT_POST          ,1);
				curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
				curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
				curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
				$json = curl_exec($chiamata);
				curl_close($chiamata);	
				return $json;
				
				// id = albums
				
				/*--------------------------------
				|
				| ?albumid=
				|
				--------------------------------*/
				
			};

// Funzioni Audio Library : Generi Audio <<----esperimento

function generiaudio(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "AudioLibrary.GetGenres", "property": { "start": 0, "fields": ["album_description", "album_theme", "album_mood", "album_style", "album_type", "album_label", "album_artist", "album_genre", "album_rating", "album_title"] }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = albums
	
};


// Funzioni Audio Library : TY --> Plugin --> VNSI server Radio

function vnsiradio(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "Files.GetDirectory", "property": {"directory": "pvr://channels/radio/all/"}, "id": "1"}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = files
	
};

/* ---------------------------------------------------------------
|
| Inizio parte rigurdante la categoria Immagini . 
|
--------------------------------------------------------------- */


// Funzioni Immagini Library : Entro nella categoria immagini

function Immagini(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "Files.GetSources", "property": { "media" : "pictures" }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = shares
	
};

// Funzioni Immagini Library : Sfoglio le directory che contengono le immagini 

function dirImmagini(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "Files.GetDirectory", "property": { "media" : "pictures", "directory":"'.$_GET['directory'].'" }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = directories
	
	/*--------------------------------
	|
	| ?directory=
	|
	--------------------------------*/
	
};


/* ---------------------------------------------------------------
|
| Inizio parte rigurdante la navigazione delle cartelle / file . 
|
--------------------------------------------------------------- */

// Funzioni Sfoglia Media 

function media(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "Files.GetSources", "property": { "media" : "'.$_GET['media'].'" }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = shares
	
	/*--------------------------------
	|
	| ?media=video
	| ?media=pictures
	| ?media=music
	|
	--------------------------------*/
	
	
};


function dirmedia(){

	require('config_freamwork.php');
	
	$json = '{"jsonrpc": "2.0", "method": "Files.GetDirectory", "property": { "media" : "'.$_GET['media'].'", "directory":"'.$_GET['directory'].'" }, "id": 1}';
	
	$chiamata = curl_init();
	curl_setopt($chiamata, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($chiamata, CURLOPT_POST          ,1);
	curl_setopt($chiamata, CURLOPT_URL           ,$hostjsonrpc);
	curl_setopt($chiamata, CURLOPT_USERPWD       ,"$username:$password");
	curl_setopt($chiamata, CURLOPT_POSTFIELDS    ,$json);
	$json = curl_exec($chiamata);
	curl_close($chiamata);	
	return $json;
	
	// id = directories
	// id = files
	
	/*--------------------------------
	|
	| ?media=video&directory=
	| ?media=pictures&directory=
	| ?media=music&directory=
	|
	--------------------------------*/
	
	// UTILIZZO :
	
	
	/*
	
	<?php
	
	dirmedia();
	$curl    = dirmedia("$json");
	$array   = json_decode($curl,true);
	$results = $array['result']["directories"];
	
	foreach ($results as $value){ 
		// vostro codice 
		echo "questo è un direcotory ";
		echo $value['label'];
		
	}
	
	$results = $array['result']["files"];
	
	foreach ($results as $value){ 
		// vostro codice 
		echo "questo è un file ";
		echo $value['label'];
	}
	
	?>
	
	*/
	
};








//--------------------------------------------------------------------------------------------------------------------------------- UTILIZZO FREAMWORK

// utilizzo 

/*

dirmedia();

$curl    = dirmedia("$json");

echo $curl;

$array   = json_decode($curl,true);
$results = $array['result']["files"];
echo "<br/>";
echo "<br/>";
	
	foreach ($results as $value)
	
	{
	
	echo $value['file'];
	echo "<br/>";
	echo $value['description'];
	//echo "<br/><br/>";
	
	
}

	
*/
?>


