<?php
function bookComponent($bkName, $bkText, $bkImg,$bookId)
{
    $element = "
    <div class=\"col-12 col-sm-6 col-lg-4 my-3 gap-3 d-flex justify-content-center\">
    <form action=\"index.php\" method=\"post\">
        <div class=\"card shadow bk_card\" style=\"width: 15rem;\">
            <img src=\"$bkImg\" class=\"card-img-top bkimg\" alt=\"dsa\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">$bkName</h5>
                <p class=\"card-text\">$bkText</p>
                <button type=\"submit\" name=\"add\" class=\"btn btn-warning\">Add to Cart</button>
                <input type='hidden' name='book_id' value='$bookId'>
            </div>
        </div>
    </form>
</div>
    ";
    echo $element;
}

function cartElement($bkName, $bkText, $bkImg, $bookId){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$bookId\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$bkImg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$bkName</h5>
                                <small class=\"text-secondary\">Provider: School Library</small>
                                <h5 class=\"pt-2\">$bkText</h5>
                            </div>
                            <div class=\"col-md-3 py-5\">
                            <button type=\"submit\" class=\"btn btn-primary mx-2\" name=\"remove\">Remove</button>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}
