<head>
        <meta charset="utf-8">
        <title>D3 Test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <script type="text/javascript" src ="/js/angular.min.js"></script>
        <script type="text/javascript" src = "/js/app.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
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
                <a class="navbar-brand" >Mcmaster Student Hub</a>
            </div>
            <!-- /.navbar-static-side -->
        </nav>
      </div>

      <div class = "col-lg-12">
        <div class = "container">
        <div class = "col-lg-6"> 
        <div id = "chart"></div>

      </div>
      <div class = "col-lg-6" ng-app = "store">
         <div class="form-group">
            <label class="control-label">Add Name</label>
            <input type="text" class="form-control" name="add" />
          </div>
          <div class="form-group">
            <label class="control-label">Add Mark</label>
            <input type="number" class="form-control" name="mark" />
          </div>
          <button type="submit" class="btn btn-primary btn-label-left add-data">
              <span><i class="fa fa-clock-o"></i></span>
                Submit
          </button>
     <!--      <div ng-controller = "formController as formto">
            <h1> {{formto.product.assessment_id}} </h1>
            <h2> {{formto.product.mark}} </h2>
          </div> -->


        </div>
      </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.4/d3.min.js"></script>
      <script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
      <script type="text/javascript" src = "/js/barchart.js"></script>
    </body>