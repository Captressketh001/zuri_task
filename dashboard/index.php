<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Course</title>
</head>

<body>
    <!-- HTML code to add new courses to the database -->
    <main>
        <div class="container">
            <h2>Dashboard</h2>
            <div>
                <form action="add-course.php" method="POST">
                    <label for="email">Course Title</label>
                    <div>
                        <input type="text" name="course-name">
                    </div>
                    <label for="password">Course Code</label>
                    <div>
                        <input type="text" name="title">
                    </div><br>
                    <input type="submit" value="Add Course" name="submit">
                </form>
            </div>
        </div>
    </main>
</body>
</html>