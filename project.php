<?php
include_once 'header.php';


?>
    <link rel="stylesheet" href="project.css">
    <div class="table-container">
          <h1 class="title"><a style="color:white ;">task</a> <a style="color:#30221E;">list</a></h1>
          <a href="formular.php">
            <button type="button" class="Lbutton"><span class="spon"></span>add <span class="fa fa-plus-circle"></span></button>
          </a>
          <table class="table" >
            <thead>
                <tr>
                    <th>Task name</th>
                    <th>poster name</th>
                    <th >Dead line</th>
                    <th >Task holder</th>
                    <th >Description</th>
                    <th >State</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'list.inc.php';
                ?>
            </tbody>

          </table>
    </div>
    <?php
   include_once 'footer.php';
    ?>
</body>
</html>