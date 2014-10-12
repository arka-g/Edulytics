<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="utf-8">
       <title>D3 Test</title>
       <link rel="stylesheet" type="text/css" href="style.css">
       <script type="text/javascript" src="d3/d3.js"></script>
       <script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
   </head>
   <body>
       
       <script type="text/javascript">
       console.log('das')
        JSONData = [
                     { "id": 3, "created_at": "Sun May 05 2013", "amount": 12000},
                     { "id": 1, "created_at": "Mon May 13 2013", "amount": 2000},
                     { "id": 2, "created_at": "Thu Jun 06 2013", "amount": 17000},
                     { "id": 4, "created_at": "Thu May 09 2013", "amount": 15000},
                     { "id": 5, "created_at": "Mon Jul 01 2013", "amount": 16000}
                   ]
                   debugger
           (function(){
                      

                 var data = JSONData.slice()
                 var format = d3.time.format("%a %b %d %Y")
                 var amountFn = function(d) { return d.amount }
                 var dateFn = function(d) { return format.parse(d.created_at) }

                 var x = d3.time.scale()
                   .range([10, 280])
                   .domain(d3.extent(data, dateFn))

                 var y = d3.scale.linear()
                   .range([180, 10])
                   .domain(d3.extent(data, amountFn))
                 
                 var svg = d3.select("#demo").append("svg:svg")
                 .attr("width", 300)
                 .attr("height", 200)

                 svg.selectAll("circle").data(data).enter()
                  .append("svg:circle")
                  .attr("r", 4)
                  .attr("cx", function(d) { return x(dateFn(d)) })
                  .attr("cy", function(d) { return y(amountFn(d)) }) 
               })();
       </script>
   </body>
</html>
RED