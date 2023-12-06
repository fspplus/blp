<?php 
$curl = curl_init();
echo "Running .. <br>";
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://hanwhalife.co.id/wp-json/wp/v2/slider_bucketlistpla?per_page=1",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "Postman-Token: d0d82909-a649-479f-948a-4b03824fb00a",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response, true);
        $sliders = array();
        $items = array();
        $ctr = 0;
        foreach($data as $slider) {
            $sliders[$ctr]['title'] = $slider['title']['rendered'];
            $sliders[$ctr]['img'] = $$slider['better_featured_image']['media_details']['sizes']['large']['source_url'];
            $ctr += 1;
        }
        //return $sliders;
    }
    //return $sliders;

?>