<?php
//Feed URLs
$feeds = array(
    "https://e00-marca.uecdn.es/rss/futbol/primera-division.xml",
    "https://futbol.as.com/rss/futbol/primera.xml"
);

//Read each feed's items
$entries = array();
foreach($feeds as $feed) {
    $xml = simplexml_load_file($feed);
    $entries = array_merge($entries, $xml->xpath("//item"));
}

//Sort feed entries by pubDate
usort($entries, function ($feed1, $feed2) {
    return strtotime($feed2->pubDate) - strtotime($feed1->pubDate);
});


#var_dump($entries);

$noticias = [];

foreach ($entries as $entry) {
    $categorias = [];
    foreach ($entry->category as $categoria) {
        $categorias[] = (string) $categoria;
    }

    $noticia = [
        'title' => (string) $entry->title,
        'description' => (string) $entry->description,
        'link' => (string) $entry->link,
        'categorias' => $categorias,
        'guid' => (string) $entry->guid,
        'pubDate' => (string) $entry->pubDate,
    ];

    $noticias[] = $noticia;
}

var_dump($noticias);