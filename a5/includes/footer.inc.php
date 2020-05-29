
<?php
function end_module($is_footer = False)
{   

    $footer = <<<"OUTPUT"
    <footer>
        <div>
            Phone: +84 123456789 <br>
            Contact Email: cinemax@gmail.com <br>
            Address: 130 Tran Nguyen Han, Nha Trang, Khanh Hoa, Vietnam <br>
            <a href="https://github.com/s3695516/wp.git" style="color: yellow" target="_blank">Git Hub Repo Link - Click Here
                </Cick> </a>
        </div>
        <hr style="border-color: #F0C14B; margin: 20px 0px;">
        <div>
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            Group 11: Le Quang Hien - s3695516 and Dang Ba Minh - s3685119. 
        </div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
            Programming course at RMIT University in Melbourne, Australia.
        </div>

    </footer>
    
    OUTPUT;
    $html = <<<"OUTPUT"
   
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        </body>
    </html>
OUTPUT;

    if ($is_footer) {
        echo $footer . $html;
    }else {
        echo $html;
    }
    
}

?>

