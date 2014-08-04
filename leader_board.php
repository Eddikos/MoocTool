<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOOC Tool Leader Board</title>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css">
        .leaderboard{
            text-align: center;
            margin: 30px;
            width: 900px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }
        .progressBar{
            width: 130px;
        }
    </style>
    
    <script type="text/javascript">
    </script>
    
  </head>
  <body>
    
    <div class="leaderboard">
        <h3>LeaderBoard</h3>
        <table class="table table-hover text-center table-striped" id="amigos">
            <tr>
                <th>Number</th>
                <th>Average</th>
                <th>Total Steps Completed</th>
                <th>First Visit</th>
                <th>Last Visit</th>
                <th>Days to complete</th>
                <th>Total Correct</th>
                <th>Number of Attempts</th>
                <th>Average Attempts per correct answer</th>
                <th>Progress through course</th>
            </tr>
            
            <script>
               $.getJSON("leaderandquizresponse.json",
                function(data){
                    
                    data.sort(function (obj1, obj2){
                        return obj2.average - obj1.average;
                    });
                    
                    var i = 1;
                    $.each(data, function(index,user){
                      var progress = parseFloat(Math.round(user.average_completed_per_week * 100) / 100).toFixed(2);
                      var averageAttempts = parseFloat(Math.round(user.average_attempts_per_correct_answer * 100) / 100).toFixed(2);
                      content = '<tr>' 
                      content += '<td>' + i + '</td>';
                      content += '<td>' + progress+ '</td>';
                      content += '<td>' + user.total_steps_completed + '</td>';
                      content += '<td>' + user.first_visit + '</td>';
                      content += '<td>' + user.last_visit + '</td>';
                      content += '<td>' + user.days_to_complete + '</td>';
                      content += '<td>' + user.total_questions_answered_correctly + '</td>';
                      content += '<td>' + user.number_of_attempts + '</td>';
                      content += '<td>' + averageAttempts + '</td>';
                      content += '<td class="progressBar"> <div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: ' + progress + '%;">' + progress + '%</div></div></td>';
                      content += '</tr>';
                      i++;
                      $(content).appendTo("#amigos");
                    });
                });
            </script>
        </table>
    </div>
          
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
