<?php session_start();

include_once("header.php");

$type = "Prüfung";
$category = "gemischt";

$max = get_max($category,$type);
$q_min_max = get_qMinMax($category,$type);
$tt = get_tts($q_min_max[0]);


?>

    <script type="text/javascript">
        var type= "Pruefung";
        var cat = "Gemischt";

        const id = <?=get_id($q_min_max[0]);?>

        const rnd = "Pruefung";

        var first_id = "<?php echo $q_min_max[0]; ?>";

    </script>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="rid" style="display:none;"><?php echo $q_min_max[0]; ?></div>
    <div class="jumbotron" id="lernmodusfrage">
        <div class="container">
            <div id="inner">
                <h2>Exam mode</h2>
                <p>Question: <span id="q"><?php get_question($q_min_max[0]); ?></span></p>
            </div>

        </div>
    </div>


    <div class="container">
        <div id="container_move">
            <div class="row">
                <div class="col-md-5">
                    <?php include("eingabehilfe.php"); ?>
                    <div class="form">
                        <?php include("loesung_eingabefeld.php"); ?>
                    </div>
                    <div class="answer_box" id="ab"></div>
                    <h4 style="margin-top: 70px;">Question <span id="qnr">1</span> / <span id="max">10</span></h4>
                    <div class="next">
                        <?php output_next_button(10); ?>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Formulary
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <img src="../bilder/formelsammlung.jpg">      </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


<?php
include("footermz.php");
?>