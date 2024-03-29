<h1 class="container  p-5" style="outline: 1px dotted;">Survey</h1>
<style>
    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1%;
    }

    .ING {
        display: grid;
        grid-template-columns: 4fr 1fr;
        margin: 6px;
        border-bottom: 1px dotted ;
       
    }
    dialog {
        
        width: 100%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        
    }
    iframe {
        width: 100%;
        height: 100%;
    }
</style>
<div class="container p-2" style="outline: 1px solid;">
    <div>
        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;"> Survey List</h2> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">Create</button>

        </div>
        <?php
        $directory = "Surveymaker/action/surveys";

        // Get the list of files and directories
        $contents = scandir($directory);
        
        // Loop through the array of file names and directory names
        echo <<<HTML
            <div class="accordion" id="accordionExample">
                <hr>
        HTML;
        $count = 1;
        foreach ($contents as $item) {
            if ($item !=='.' && $item !=='..') {

                $surv = explode('.',$item );
                echo '   <div class="accordion-item">
                            <h4 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'.$count.'" aria-expanded="false" aria-controls="collapseOne'.$count.'">
                             <b>'.$count.' .</b> '.  $surv[0].'
                            </button>
                            </h4>
                            <div id="collapseOne'.$count.'" class="accordion-collapse collapse" data-bs-parent="#accordionExample'.$count.'" style="">
                                    <div class="accordion-body">
                                      '. html_entity_decode(file_get_contents('Surveymaker/action/surveys/'.$item )).'
                                    </div>
                            </div>
                        </div>';
                $count++;
            }
        }
        echo <<<HTML
            
            </div>
            HTML;

        ?>
    </div>

    <div>

        <div style="display: flex; flex-direction: column   ;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Customer Response </h2>
        </div>
        <p>1</p>
    </div>

</div>


<div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
    
      <div class="modal-body">
<iframe src="Surveymaker/index.html" frameborder="0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

