<h1 class="container p-5">Surveys</h1>
<?php
$directory = "Surveymaker/action/surveys";

// Get the list of files and directories
$contents = scandir($directory);

// Loop through the array of file names and directory names
echo <<<HTML
            <div class="accordion container" id="accordionExample">
                <hr>
        HTML;
$count = 1;
foreach ($contents as $item) {
    if ($item !== '.' && $item !== '..') {

        $surv = explode('.', $item);
        echo '   <div  class="accordion-item">
                            <h4 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne' . $count . '" aria-expanded="false" aria-controls="collapseOne' . $count . '">
                             <b>' . $count . ' .</b> ' .  $surv[0] . '
                            </button>
                            </h4>
                            <div id="collapseOne' . $count . '" class="accordion-collapse collapse" data-bs-parent="#accordionExample' . $count . '" style="">
                           
                                    <div class="accordion-body" id="formname'.$count.'">
                                    <h1 class="p-3" id="source'.$count.'"> by :' . $_SESSION['auth']['username'] . '</h1>
                                      ' . html_entity_decode(file_get_contents('Surveymaker/action/surveys/' . $item)) . '
                                    </div>
                            <button class="btn btn-primary " onclick="savethisdoc'.$count.'()"  >Respond</button>

                            </div>
                        </div>
                        <script>
                        function savethisdoc'.$count.'() {
                          
                            var data = document.getElementById("formname'.$count.'")
                            data=data.outerHTML

                           
                                var xhr = new XMLHttpRequest();

                                var url = "check.php";
                                var params = "param1=" + data + "&name=" + "' . $_SESSION['auth']['username'] . '_' .  $surv[0] . '"
                                xhr.open("POST", url, true);

                                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        const response = JSON.parse(xhr.responseText);
                                        alert(response.status + " " + response.message)
                                    }
                                };

                                xhr.send(params);

                            } 

                    </script>
                        
                        ';
        $count++;
    }
}
echo <<<HTML
            
            </div>
            HTML;

?>

