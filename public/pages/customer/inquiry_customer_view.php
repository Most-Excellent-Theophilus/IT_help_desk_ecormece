<h1 class="container p-5">Inquiries</h1>
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
        max-width: 700px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
<div class="container p-2" style="outline: 1px solid;">
    <div>
        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Make Inquiry</h2> 

        </div>
    
        <?php
        $InqList = InquiryLists::index();
        foreach ($InqList['data'] as $key => $value) {
            echo <<<HTML

                <div class="ING">
                            <div style="display: flex;   ">
                                <p>{$value['id']} .</p> {$value['ename']}<p></p>
                                <p class="blockquote-footer" style='align-self: end; '>$ {$value['price']} <cite title="Source Title"> {$value['desc']}</cite></p>
                            </div>
                            <div class="btn-group" role="group">
                            <button  class="btn btn-primary">Make</button>
                            </div>
                        </div>

            HTML;
        }


        ?>
    </div>

    <div>

        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">My Inquiries </h2>
        </div>
        <p>1</p>
    </div>

</div>

