<h1 class="container p-5">Inquiries</h1>
<style>
    .container {
        display: grid;
        gap: 1%;
    }

    .ING {
        display: grid;
        grid-template-columns: 4fr 1fr;
        margin: 6px;
        border-bottom: 1px dotted;

    }

    dialog {
        max-width: 700px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
<div class="container p-2" style="outline: 1px solid;">
    <div>
        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">My Inquiries</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">Make</button>

        </div>

        <div class="accordion" id="accordionExample">

            <hr>
              <?php  
              $Inq = Inquiries::index();

              foreach ($Inq['data'] as $key => $value) {
               if ($value['customer_id']==$_SESSION['auth']['id']) {
                echo '   <div class="accordion-item">
                <h4 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'. $value['id'].'" aria-expanded="false" aria-controls="collapseOne'. $value['id'].'">
                    '. $value['inquiry'].'
                    </button>
                </h4>
                <div id="collapseOne'. $value['id'].'" class="accordion-collapse collapse" data-bs-parent="#accordionExample'. $value['id'].'" style="">
                    <div class="accordion-body">
                    '. $value['cont'].'
                    </div>
                </div>
            </div>'    ;
  }

         
               }
           
                    
                    ?>
            <hr>


        </div>

    </div>


</div>

<div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalFullscreenLabel">Full screen modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Actions.php?a=POST&source=Inquiries&method=store&do=make Inquiry&from=<?php echo $_GET['path']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="customer_id" value="<?= $_SESSION['auth']['id'] ?>">
                    <?php

                    $InqList = InquiryLists::index();
                    foreach ($InqList['data'] as $key => $value) {

                        echo <<<HTML

               
                            <div style="display: flex;   ">
                                <p><input type="radio" id="staff" name="inquiry" value="{$value['ename']}"> {$value['ename']}</p>
         
                                <p class="blockquote-footer" style='align-self: end; '>$ {$value['price']} <cite title="Source Title"> {$value['desc']}</cite></p>
                            </div>
                           

            HTML;
                    }
                    ?>
                    <textarea id="summernote" name="cont" id="" cols="60" rows="10" placeholder="Start typing ..."></textarea>
                    <script>
                        $('#summernote').summernote({
                            placeholder: 'Start typing ...',
                            tabsize: 2,
                            height: 250,
                            toolbar: [
                                ['style', ['style']],
                                ['font', ['bold', 'underline', 'clear']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['table', ['table']],
                                ['insert', ['link', 'picture']],
                                // ['insert', ['link', 'picture', 'video']],
                                // ['view', ['fullscreen', 'codeview', 'help']]
                            ]
                        });
                    </script>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>