<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
        

    <title>School Hub</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href='{{URL::action("courses")}}'>McMaster Student Hub</a>
            </div>
        

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default dropdown-toggle" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>

                        <li>
                            <a class="active" href='{{URL::action("courses")}}'>Courses</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->

        <!-- Page Content -->
       <div id="page-wrapper">
           <div class="row">
               <div class="col-lg-12">
                {{ Form::open(array('url' => 'courses/save')) }}
                   <h1 class="page-header">Add a Course</h1>
                   <div class = "jumbotron">
                       <p> Select a course: 
                        
                           <select class = "select-custom" name="course">

                               <option value="List of McMaster Courses">List of McMaster Courses</option>
                               @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->course_name}}</option>
                               @endforeach
                           </select>
                       
                       </p><br>  
                <div class = "col-lg-12">
                   <input type= "submit" class="btn btn-default dropdown-toggle" type="button">
                       <div class = "form-horizontal" role = "form">
                       </div>
                   </div>
                </div>
           
                {{ Form::close() }}
               </div>

                <div class = "col-lg-12">
                    <h1 class = "page-header">Courses Added</h1>
                    <div class = "well">
                        <ul name = "user">
                            <div class = "col-md-12">
                            @foreach($usercourse as $user)
                            <div class = "col-md-4">
                                <li value = "{{$user->id}}">
                                    <a href = '/assessment/{{$user->course_id}}'>{{$user->course->course_name}}</a>
                                </li>
                            </div>
                            @endforeach
                         </div>
                        </ul>
                    </div>
                </div> 
           
           </div>
           <!-- /.row -->



             



       </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>

