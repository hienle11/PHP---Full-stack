<?php
    function paging_module($pageNumber, $pageSize, $totalItems, $pageUrl) {
        echo "<div class='pagination'>";
        
        $totalPages = ceil($totalItems / $pageSize); // get the total pages   
        $startPage = $pageNumber - 3;          // get the first page can be clicked in range of current page
        $endPage= $pageNumber + 4;             // get the last page can be clicked in range of current page


        if ($pageNumber > 1) {
            $prevPage = $pageNumber -1 ;
            echo "<a href='{$pageUrl}page={$prevPage}&size={$pageSize}'>&laquo;</a>";
        }


        // this for loop is to display all the "page" buttons
        for ($i = $startPage; $i < $endPage; $i++) {
            if (($i > 0) && ($i <= $totalPages)) { // make sure that the page is always greater than 0 and not go pass the total page
                if ($i == $pageNumber) { // if it is the current page, disable href tag and add active class
                    echo "<a href='javascript::void()' class='active'>{$i}</a>";
                } else {
                    echo "<a href='{$pageUrl}page={$i}&size={$pageSize}'>{$i}</a>";
                }
            } 
        }


        if ($pageNumber < $totalPages) {
            $nextPage = $pageNumber + 1;
            echo "<a href='{$pageUrl}page={$nextPage}&size={$pageSize}'>&raquo;</a>";
        }

        echo "</div>";
    }
?>