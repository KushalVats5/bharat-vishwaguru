<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>
<body>
    <h1>Classic editor</h1>
    <textarea name="content" class="editor">
        &lt;p&gt;This is some sample content.&lt;/p&gt;
    </textarea>
    <textarea name="content2" class="editor">
        &lt;p&gt;This is some sample content.&lt;/p&gt;
    </textarea>
    <textarea name="content3" class="editor">
        &lt;p&gt;This is some sample content.&lt;/p&gt;
    </textarea>
    <textarea name="content4" class="editor">
        &lt;p&gt;This is some sample content.&lt;/p&gt;
    </textarea>
    <script>
       

        var allEditors = document.querySelectorAll('.editor');
        for (var i = 0; i < allEditors.length; ++i) {
          ClassicEditor.create(allEditors[i]);
        }
    </script>
</body>
</html>

<?php
  /* $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:8000/api/v1/oauth/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYHOST =>false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "grant_type=passport&client_id=2&client_secret=TYaAwUyXOOpXJ5hj51VJvKBHgdWL31kiULgXN3T7",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded"
    ),
  ));
  $response = curl_exec($curl);
      
      curl_close($curl);
  
      return response(['data' => $response, 'message' => 'Account created successfully!', 'status' => true]); */
?>

<?php
// if(isset($_POST['ifsc'])) {
    $ifsc = 'INDB0001064';
    $json = @file_get_contents(
        "https://ifsc.razorpay.com/".$ifsc);
    $arr = json_decode($json);
  
    if(isset($arr->BRANCH)) {
        echo '<pre>';
        echo "<b>Bank:-</b>".$arr->BANK;
        echo "<br/>";
        echo "<b>Branch:-</b>".$arr->BRANCH;
        echo "<br/>";
        echo "<b>Centre:-</b>".$arr->CENTRE;
        echo "<br/>";
        echo "<b>District:-</b>".$arr->DISTRICT;
        echo "<br/>";
        echo "<b>State:-</b>".$arr->STATE;
        echo "<br/>";
        echo "<b/>Address:-</b>".$arr->ADDRESS;
        echo "<br/>";
    }
    else {
        echo "Invalid IFSC Code";
    }
// }

function get_http_response_code($theURL) {
    $headers = get_headers($theURL);
    return substr($headers[0], 9, 3);
}
print_r(get_http_response_code('http://127.0.0.1:8000/images/product/jxEpsk_1599415355.jpg'));
if(intval(get_http_response_code('http://127.0.0.1:8000/images/product/jxEpsk_1599415355.jpg')) < 400){
echo "File exists, huzzah!";
}else{
    echo "File Not exists, huzzah!";
}

$url = "http://127.0.0.1:8000/images/product/jxEpsk_1599415355.jpg";
$imgHeaders = @get_headers( str_replace(" ", "%20", $url) )[0];
print_r($imgHeaders);
?>