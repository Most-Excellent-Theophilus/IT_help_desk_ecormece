<h1 class="container p-5 " style="outline: 1px dotted;">Inquiries</h1>
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
</style>
<div class="container p-2" style="outline: 1px solid;">
    <div>
        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Create Category</h2> <button class="btn btn-primary">Create</button>

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
                                <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle btn-sm rounded-0 p-1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item delete_data" href="">Update</a></li>
                                    <li><a class="dropdown-item delete_data" href="">Delete</a></li>
                                </ul>
                            </div>
                        </div>

            HTML;
        }


        ?>
    </div>

    <div>

        <div style="display: flex;">
            <h2 style="flex-grow: 2; border-bottom:1px solid;">Customer Inquiries </h2>
        </div>
        <p>1</p>
    </div>

</div>