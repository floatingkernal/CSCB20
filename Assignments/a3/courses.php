<!DOCTYPE html>
<html>
    <head>
        <title>My Exam Timetable</title>
        <meta charset="utf-8" />

        <!-- Links to provided files.  Do not change these links -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="myjava.js" type="text/javascript"></script>

        <!-- Link to your CSS file that you should edit -->
        <link href="exams.css" type="text/css" rel="stylesheet" />
    </head>

    <body>
        <div id="frame">
            <header>  <!-- new HTML5 page-section structure element -->
                <h2>UTSC Winter 2017 Final Exam Timetable</h2>
            </header>

            <div id="main">
                <!-- ADD YOUR CODE HERE -->
                <table id="table" align="center">
                    <tr>
                        <th></th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Instructor</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                    <tr>
                        
                    </tr>
                </table>
                <form action="courses.php" id="form">
                    <fieldset>
                        <legend>Search Exams</legend>
                        <input type="text" name="course" placeholder="Course Name" id="userin">
                        <input type="submit" name="search" value="Search" id="submitbtn">  
                        <select id="select">
                            <option value="0">Select Courses</option>
                        </select>
                        <input type="button" name="reset" value="Reset" id="resetbtn">
                    </fieldset>
                </form>
            </div>


        </div>
    </body>
</html>
