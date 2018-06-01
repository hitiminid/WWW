<?php 

require_once("setup.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/comments.css">
    <link rel="stylesheet" href="css/main_style.css">
    <link rel="stylesheet" href="css/grid.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-MML-AM_CHTML' async></script>
    <title>Example</title>
</head>
<body>
    <div id="app">
        <div id="comment-section">
            <div id="comment-section-header">
                <div class="left-element">
                    <p>Comments:</p>
                </div>
                <div class="right-element">
                    <select id="comments-sort-type">
                        <option value="1">Data (od najstarszych)</option>
                        <option value="2">Data (od najnowszych)</option>
                        <option value="3">Autor: A-Z</option>
                        <option value="4">Autor: Z-A</option>
                    </select>
                </div>
            </div>
            <div id="comment-section-body">
                <div class="comment">
                    <div class="comment-header">
                        <div class="children">
                            <div class="image-panel">
                                <img src="./img/avatar_placeholder.png">
                            </div>
                            <div class="comment-info">
                                <h6 class="comment-author">John Doe!</h6>
                                <h6 class="comment-date">14.12.1996</h6>
                            </div>
                        </div>
                    </div>
                    <div class="comment-body"> 
                        <p class="comment-text">
                            Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, 
                            Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, 
                            Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, 
                            Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, 
                            Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, Lorem Ipsum, 
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div id='create-comment-field'>
            <form action='/php/database_utilities/submit_comment.php' method='POST'>
                <div class='row'>
                    <input id='comment-author-input-field' class='comment-input-field' type='text' name='displayName' placeholder='Podpis'>
                    <input id='email-input-field' class='comment-input-field' type='text' name='displayName' placeholder='e-mail'>
                </div>
                <div>
                    <input id='comment-title-input-field' class='comment-input-field' type='text' name='commentName' placeholder='Tytuł Komentarza'>
                </div>
                <div>
                    <textarea id='comment-text-area' placeholder='Miejsce na Twój komentarz' required name='commentText' class='comment-input-field'></textarea>            
                </div>
                <div id='captcha-field' class='row'>
                    <div id='captcha-question-field'>
                        <p id='captcha-question'>\( x^2 + y^2 = \)</p>
                    </div>
                    <div id='captcha-answer-field'>
                        <input id='captcha-answer' type='text' name='captcha'>
                    </div>
                </div>
                <div id='submit-comment-field' style='display:flex;'>
                    <div id='attach-avatar-field'  class='col-3'>
                        <div id='attach-icon'></div>
                        <input type='text' id='avatar-input-field' placeholder='Link do Twojego avatara'/>
                    </div>
                    <div id='submit-comment-button-field' class='col-1'>
                        <div id='submit-comment-button' style='width:100px; height:100px;'>WYŚLIJ</div>
                    </div>
                </div>
            </form>         
        </div>            
    </div>
</body>
<script src="js/comments.js"></script>

</html>