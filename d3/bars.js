// var margin ={top:50, right:30, bottom:30, left:40},
//     width=960-margin.left - margin.right, 
//     height=500-margin.top-margin.bottom;

// // scale to ordinal because x axis is not numerical
// var x = d3.scale.ordinal().rangeRoundBands([0, width], .11);

// //scale to numerical value by height
// var y = d3.scale.linear().range([height, 0]);

// var chart = d3.select(".chart")  
//               .append("svg")  //append svg element inside .chart
//               .attr("width", width+(2*margin.left)+margin.right)    //set width
//               .attr("height", height+margin.top+margin.bottom);  //set height
// var xAxis = d3.svg.axis()
//               .scale(x)
//               .orient("bottom");  //orient bottom because x-axis will appear below the bars

// var yAxis = d3.svg.axis()
//               .scale(y)
//               .orient("left");


// d3.json("/d3/data.json", function(error, data){
//   x.domain(data.map(function(d){ return d.timestamp}));
//   y.domain([0, d3.max(data, function(d){return d.amount})]);
  
//   var bar = chart.selectAll("g")
//                     .data(data)
//                   .enter()
//                     .append("g")
//                     .attr("transform", function(d, i){
//                       return "translate("+x(d.timestamp)+", 0)";
//                     });
  
//   bar.append("rect")
//       .attr("y", function(d) { 
//         return y(d.amount); 
//       })
//       .attr("x", function(d,i){
//         return x.rangeBand()+(margin.left/4);
//       })
//       .attr("height", function(d) { 
//         return height - y(d.amount); 
//       })
//       .attr("width", x.rangeBand());  //set width base on range on ordinal data

//   bar.append("text")
//       .attr("x", x.rangeBand()+margin.left )
//       .attr("y", function(d) { return y(d.amount) -10; })
//       .attr("dy", ".75em")
//       .text(function(d) { return d.amount; });
  
//   chart.append("g")
//         .attr("class", "x axis")
//         .attr("transform", "translate("+margin.left+","+ height+")")        
//         .call(xAxis);
  
//   chart.append("g")
//         .attr("class", "y axis")
//         .attr("transform", "translate("+margin.left+",0)")
//         .call(yAxis)
//         .append("text")
//         .attr("transform", "rotate(-90)")
//         .attr("y", 6)
//         .attr("dy", ".71em")
//         .style("text-anchor", "end")
//         .text("amount");
// });

// function type(d) {
//     d.timestamp = +d.timestamp; // coerce to number
//     return d;
//   }

var width = 960,
    height = 500;

var y = d3.scale.linear()
    .range([height, 0]);

var chart = d3.select(".chart")
    .attr("width", width)
    .attr("height", height);

d3.json("/d3/data.json", type, function(error, data) {
  y.domain([0, d3.max(data, function(d) { return d.value; })]);

  var barWidth = width / data.length;

  var bar = chart.selectAll("g")
      .data(data)
    .enter().append("g")
      .attr("transform", function(d, i) { return "translate(" + i * barWidth + ",0)"; });

  bar.append("rect")
      .attr("y", function(d) { return y(d.value); })
      .attr("height", function(d) { return height - y(d.value); })
      .attr("width", barWidth - 1);

  bar.append("text")
      .attr("x", barWidth / 2)
      .attr("y", function(d) { return y(d.value) + 3; })
      .attr("dy", ".75em")
      .text(function(d) { return d.value; });
});

function type(d) {
  d.value = +d.amount; // coerce to number
  return d;
}