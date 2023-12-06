<?php
    header('Content-Type: application/x-httpd-php');
    include 'connectdb.php';
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata, TRUE); 
    if($request['auth'] == NULL || !isset($request['auth'])){
        $stmt = $conn->prepare("SELECT * FROM faq_content;");
        $stmt->execute();
        $stmt->store_result();
       /* Get the number of rows */
       $num_of_rows = $stmt->num_rows;
       /* Bind the result to variables */
       $stmt->bind_result($faq_id, $faq_category, $faq_question, $faq_answer, $faq_active);

       
       while ($stmt->fetch()) {
           $result["result"][] = [
              'master_id' => $faq_id,
              'master_event_id' => $faq_category,
              'master_name' => $faq_question,
              'master_nim' => $faq_answer,
              'master_work' => $faq_active
            ];
       }
    }
    $resultJson = json_encode($result);
echo $resultJson."connect";
ini_set("log_errors", 1);
ini_set("error_log", "err.txt");
?>
<h1>The <code> echo ($_POST['test'])</code> is</h1>
<hr>
<code><?php echo htmlentities($_POST['test']); ?></code>
<hr>