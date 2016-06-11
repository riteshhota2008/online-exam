<?php
require 'core/init.php';
session_start();

if($general->logged_in()){

    if(isset($_SESSION['user_name'])){
        $record=$users->userData($_SESSION['user_name']);
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Title</title>

            <!-- Compiled and minified CSS -->
            <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

            <style>
                @media only screen and (max-width: 768px)	{
                    .card {
                        display: none;
                    }
                }
            </style>

            <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

        </head>
        <body>

        <div class="row" style="padding-top: 20px">
            <form class="col s8" action="question_check.php" method="post">
                <div class="col s12 m4" style="position: fixed;">
                    <div class="card">
                        <div class="card-image">
                            <img src="images/sample-1.jpg">
                            <span class="card-title">Ritesh Hota</span>
                        </div>
                        <div class="card-content">
                            <p>Web Developer, UI/UX Designer, Entrepreneur, Open Source Developer, Perfectionist, Freelance Developer, Avid Gamer
                            </p><br>
                            <table class="bordered">
                                <!-- <thead>
                                 <tr>
                                     <th data-field="id">Department</th>
                                     <th data-field="name">Year</th>
                                     <th data-field="price">Email</th>
                                     <th data-field="contact">Contact No.</th>
                                 </tr>
                                 </thead> -->

                                <tbody>
                                <tr>
                                    <hr>
                                    <td><strong>Dept.</strong> :</td>
                                    <td>CSE</td>
                                </tr>
                                <tr>
                                    <td><strong>Year</strong> :</td>
                                    <td>2nd Year</td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong> :</td>
                                    <td>riteshhota.2008@gmail.com</td>
                                </tr>
                                <tr>
                                    <td><strong>Contact No.</strong> :</td>
                                    <td>9551631252</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--<div class="card-action">
                            <a href="#">This is a link</a>
                        </div>-->
                    </div>
                </div>
                <div class="col s12 m8" style="position: relative;margin-left: 53%">
                    <div class="card-panel" style="width: 150%">
                <span class="black-text" style="margin-left: 20px">Q.1) What is the size of boolean variable?
                </span>
                        <div class="row" style="display: flex;margin-left: 45px;margin-top: 10px">
                            <p>
                                <input class="with-gap" name="question_1" value="a" type="radio" id="test1"  />
                                <label for="test1">8 Bit</label>
                            </p>
                            <p>
                                <input class="with-gap" name="question_1" value="b" type="radio" id="test2"  />
                                <label for="test2">16 Bit</label>
                            </p>
                            <p>
                                <input class="with-gap" name="question_1" value="c" type="radio" id="test3"  />
                                <label for="test3">32 Bit</label>
                            </p>
                            <p>
                                <input class="with-gap" name="question_1" value="d" type="radio" id="test4"  />
                                <label for="test4">64 Bit</label>
                            </p>
                        </div>

                        <div class="row" style="margin-left: 20px">
                            <p>Q.2) What is the default value of int variable?</p>
                            <div class="input-field col s7">
                                <input placeholder="Answer" id="question_2" name="question_2" type="text" class="validate" style="margin-left: 20px">
                                <label for="question_2"></label>
                            </div>
                        </div>
                <span class="black-text" style="margin-left: 20px">Q.3) What is the size of boolean variable?
                </span>
                        <div class="row" style="display: flex;margin-left: 45px;margin-top: 10px">
                            <p>
                                <input class="with-gap" name="question_3" value="a" type="radio" id="test5"  />
                                <label for="test5">8 Bit</label>
                            </p>
                            <p>
                                <input class="with-gap" name="question_3" value="b" type="radio" id="test6"  />
                                <label for="test6">16 Bit</label>
                            </p>
                            <p>
                                <input class="with-gap" name="question_3" value="c" type="radio" id="test7"  />
                                <label for="test7">32 Bit</label>
                            </p>
                            <p>
                                <input class="with-gap" name="question_3" value="d" type="radio" id="test8"  />
                                <label for="test8">64 Bit</label>
                            </p>
                        </div>

                        <div class="row" style="margin-left: 20px">
                            <p>Q.4) What is the default value of int variable?</p>
                            <div class="input-field col s7">
                                <input placeholder="Answer" id="question_4" name="question_4" type="text" class="validate" style="margin-left: 20px">
                                <label for="question_4"></label>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 20px">
                            <p>Q.5) What is the default value of int variable?</p>
                            <div class="input-field col s7">
                                <input placeholder="Answer" id="question_5" name="question_5" type="text" class="validate" style="margin-left: 20px">
                                <label for="question_5"></label>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 20px">
                            <p>Q.6) What is the default value of int variable?</p>
                            <div class="input-field col s7">
                                <input placeholder="Answer" id="question_6" name="question_6" type="text" class="validate" style="margin-left: 20px">
                                <label for="question_6"></label>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 20px">
                            <p>Q.7) What is the default value of int variable?</p>
                            <div class="input-field col s7">
                                <input placeholder="Answer" id="question_7" name="question_7" type="text" class="validate" style="margin-left: 20px">
                                <label for="question_7"></label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="submit" style="margin-left: 50px">Submit<i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        </body>
        </html>

        <?php
    }else{echo ":(";}
}else{ ?>
    <h1>Please Login First</h1>
<?php }?>