<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Vanarts</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <header class="row align-middle">
            <div class="col col-3">
                <div class="logo"><img src="vanarts-logo.svg"></div>
            </div>
            <div class="col col-9">
                <?php include "weather.php"; ?>
                <div class="weather col-4 push-right">
                    <div class="row">
                        <div class="col col-6">
                        <form method="get">
                                <select name="selectCity">
                                    <option value="Vancouver">Vancouver</option>
                                    <option value="New York">New York</option>
                                    <option value="Copenhagen">Copenhagen</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <button type="submit" name="submitCity">Change City</button>
                            </div>
                        </form>
                    </div>
                    <div><h2 class="city_name"><?php echo $city; ?></h2></div>
                    <div class="row">
                        <div class="col col-4"><p class="tempreture"><?php echo round($current_temp)."℃"; ?></p></div>
                        <div class="col col-8 wInfo">
                            <p>Wind Speed: <?php echo $speed.$speedUnit; ?></p>
                            <p>Wind Direction: <?php echo $direction; ?></p>
                            <p>Current Weather: <?php echo $desc_con; ?></p>
                            <p class="wDate"><?php echo $last_update; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="addButton"><button data-component="modal" data-target="#my-modal">Add New Class</button></div>
                <!-- inside modal box -->

                <div id="my-modal" class="modal-box hide">
                    <div class="modal">
                        <form method="get" action="generate_xml.php" class="form">
                            <div class="form-item">
                                <label>Title</label>
                                <input type="text" name="newTitle" class="w50" required>
                            </div>
                            <div class="form-item">
                                <label>Instructor</label>
                                <input type="text" name="newInstructor" class="w50" required>
                            </div>
                            <div class="form-item">
                                <select class="w50" name="newDay" required>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label>Hours</label>
                                <input type="text" name="newHour" class="w50" required>
                            </div>
                            <div class="form-item">
                                <label>Short Description</label>
                                <textarea rows="6" name="newDiscription" required></textarea>
                            </div>
                            <div class="form-item">
                                <button type="submit" name="submit">Add Class</button>
                                <button class="button secondary outline" data-action="modal-close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

            <table id="class_table" class="bordered"></table>
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="js/kube.min.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        <script src="https://use.fontawesome.com/bb1dc29a78.js"></script>
    </body>
</html>
