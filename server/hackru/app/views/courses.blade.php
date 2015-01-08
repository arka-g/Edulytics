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
                  @if (Auth::check())
                  <h1>Hey man, you're logged in!</h1>
                  <h4>Your email is {{Auth::user()->email}}</h4>
                  <h5>Your first name is {{Auth::user()->first_name}}</h5>
                  <h5>Your last name is {{Auth::user()->last_name}}</h5>
                  @endif
                  <div class = "jumbotron">
                     <p>
                        Select a course: 
                        <select class = "select-custom" name="course">
                           <option value="List of McMaster Courses">List of McMaster Courses</option>
                           @foreach ($courses as $course)
                           <option value="{{$course->id}}">{{$course->course_name}}</option>
                           @endforeach
                        </select>
                     </p>
                     <br>  
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
               <div class = "col-lg-12">
                  <h1 class = "page-header">Pie Chart</h1>
                  <div id = "piechart">
                     <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.4/d3.min.js"></script>
                     <script>
                        var width = 960,
                            height = 500,
                            radius = Math.min(width, height) / 2;
                        
                        var color = d3.scale.ordinal()
                            .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);
                        
                        var arc = d3.svg.arc()
                            .outerRadius(radius - 10)
                            .innerRadius(0);
                        
                        var pie = d3.layout.pie()
                            .sort(null)
                            .value(function(d) { return d.user_assessment_grade.weight_percent; });
                        
                        // var svg = d3.select("#piechart")
                        var svg = d3.select("body").append("svg")
                            .attr("width", width)
                            .attr("height", height)
                          .append("g")
                            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");
                        
                        d3.json("http://localhost:9999/markweight", function(json) {
                          var data = json;
                          data.forEach(function(d) {
                            d.user_assessment_grade.weight_percent = +d.user_assessment_grade.weight_percent;
                          });
                        
                          var g = svg.selectAll(".arc")
                              .data(pie(data))
                              .enter().append("g")
                              .attr("class", "arc");
                        
                          g.append("path")
                              .attr("d", arc)
                              .style("fill", function(d) { return color(d.data.user_assessment_grade.assessment_type); });
                        
                          g.append("text")
                              .attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")"; })
                              .attr("dy", ".35em")
                              .style("text-anchor", "middle")
                              .text(function(d) { return d.data.user_assessment_grade.assessment_type; });
                        
                        });
                     </script>
                  </div>
               </div>
            </div>
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