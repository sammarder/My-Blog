sudo apt-get install curl libcurl3 libcurl3-dev php5-curl
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
$data = json_decode($res);
print_r($data->data->children[0]->data->subreddit);
print_r(count($data->data->children));
foreach($data->data->children as $child){
    print_r($child->data->title." by ".$child->data->author." (".$child->data->url.")\n");
}
