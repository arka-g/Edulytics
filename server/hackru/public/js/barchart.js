(function(){

	    var margin = {top: 20, right: 20, bottom: 30, left: 70},
            width = 560 - margin.left - margin.right,
            height = 500 - margin.top - margin.bottom;  

        var x = d3.scale.ordinal()
            .rangeRoundBands([0, width], .1);

        var y = d3.scale.linear()
            .range([height, 0]);

        var xAxis = d3.svg.axis()
            .scale(x)
            .orient("bottom");

        var yAxis = d3.svg.axis()
            .scale(y)
            .orient("left")
            .ticks(10,".0%")

        var tip = d3.tip()
          .attr('class', 'd3-tip')
          .offset([-10, 0])
          .html(function(d) {
            return "<strong>Mark:</strong> <span style='color:red'>" + d.mark +"%" + "</span>";
          })

        var svg = d3.select("#chart")
            .append("svg")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.left + margin.right)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
       
        svg.call(tip);

        d3.json("/misc/data.json", function(json) {
    
            var data = json;
    		
            x.domain(data.map(function(d) { return d.assessment_id; }));
            y.domain([0, 1]);
            //d3.max(data, function(d) { return d.mark; })
    
           // bars
              svg.append("g")
                  .attr("class", "y axis")
                  .call(yAxis)
                  .append("text")
                  .attr("transform", "rotate(-90)")
                  .attr("dy", ".71em")
                  .style("text-anchor", "end")
                  .text("marks");

           		svg.append("g")
                .attr("class","x axis")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis);

              	svg.selectAll(".bar")
                .data(data)
                .enter().append("rect")
                	.attr("class", "bar")
                	.attr("x", function(d) {return x(d.assessment_id); })
                	.attr("width", x.rangeBand())
                	.attr("y", function(d) { return y(d.mark); })
                	.attr("height", function(d) { return height - y(d.mark); })
                	.on('mouseover', tip.show)
            		.on('mouseout', tip.hide);
 				
            	d3.selectAll(".add-data")
            	.on("click", function() {
            		obj = {
            			"assessment_id": "test",
            			"mark": 0.5
            		}

            		data.push(obj)
            		console.log(data)
            		x.domain(data.map(function(d) { return d.assessment_id; }));

              		var bars = svg.selectAll(".bar").data(data)

              		bars.transition()
              			.attr("x", function(d) {return x(d.assessment_id); })
            			.attr("width", x.rangeBand())            			
            			.attr("y", function(d) { return y(d.mark); })
                		.attr("height", function(d) { return height - y(d.mark); })

                	bars.enter()
                		.append("rect")
                		.attr("class", "bar")
               			.attr("x", function(d) {return x(d.assessment_id); })
            			.attr("width", x.rangeBand())
            			.attr("y", function(d) { return y(d.mark); })
                		.attr("height", function(d) { return height - y(d.mark); })
            			.attr("fill","#6baed6").attr("r",5)
            			.on('mouseover', tip.show)
            			.on('mouseout', tip.hide);

            		svg.selectAll("g.x.axis")
            		.transition()
        			.call(xAxis);
            		//refreshGraph()
            	})
            	//refreshGraph()

        });
function d() {
  d.mark = +d.mark;
  return d;
}
})();