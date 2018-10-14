<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Quickstart - Basic</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- New Task Form-->
<form action="/task-store.php" method="POST" class=""form-horizontal>
    <!-- {{csrf_field}}-->
    <?php csrf_field($session); ?>
    <!-- Task Name-->
    <div class="form-froup">
        <label for="task-name" class="col-sm-3 control-label">Task</label>
        <div class="col-sm-6">
            <input type="text" name="name" id="task-name" class="form-control">
        </div>
    </div>

    <!-- Add Task Button-->
    <div class="form-group">
        <div class="col-sm-offset-3 colsm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i>Add Task
            </button>
        </div>
    </div>
</form>
</body>