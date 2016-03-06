var main = function() {

   // Possible Problems (viz2)
    var sample_data3 = [
    {"value": 120, "name": "Diabetes"},
    {"value": 70, "name": "Anemia"},
    {"value": 40, "name": "Usage of Vitamin supplements"},
    {"value": 15, "name": "High cholestrol levels"},
    {"value": 5, "name": "Kidney Disease"},
    {"value": 5, "name": "Liver Disease"}
  ]
  // instantiate d3plus
  var visualization = d3plus.viz()
    .container("#viz2")  // container DIV to hold the visualization
    .data(sample_data3)  // data to use with the visualization
    .type("tree_map")   // visualization type
    .id("name")         // key for which our data is unique on
    .size("value")      // sizing of blocks
    .draw()             // finally, draw the visualization!

};
   
   // Higher risk for (viz3)
    var sample_data = [
    {"name": "Greater risk for", "size": 10},
    {"name": "Mental Health Problems", "size": 12},
    {"name": "Eye complications", "size": 30},
    {"name": "Hypertension", "size": 26},
    {"name": "Gum disease", "size": 12},
    {"name": "Heart Problems", "size": 26},
    {"name": "Kidney Disease", "size": 11},
  ]
  // create list of node positions
  var positions = [
    {"name": "Greater risk for", "x": 10, "y": 15},
    {"name": "Eye complications", "x": 12, "y": 24},
    {"name": "Mental Health Problems", "x": 16, "y": 18},
    {"name": "Hypertension", "x": 26, "y": 21},
    {"name": "Gum disease", "x": 13, "y": 4},
    {"name": "Heart Problems", "x": 31, "y": 13},
    {"name": "Kidney Disease", "x": 19, "y": 8},
  ]
  // create list of node connections
  var connections = [
    {"source": "Heart Problems", "target": "Hypertension"},
    {"source": "Greater risk for", "target": "Eye complications"},
    {"source": "Greater risk for", "target": "Hypertension"},
    {"source": "Greater risk for", "target": "Mental Health Problems"},
    {"source": "Greater risk for", "target": "Gum disease"},
    {"source": "Greater risk for", "target": "Heart Problems"},
    {"source": "Greater risk for", "target": "Kidney Disease"}
  ]
  // instantiate d3plus
  var visualization = d3plus.viz()
    .container("#viz3")  // container DIV to hold the visualization
    .type("network")    // visualization type
    .data(sample_data)  // sample dataset to attach to nodes
    .nodes(positions)   // x and y position of nodes
    .edges(connections) // list of node connections
    .size("size")       // key to size the nodes
    .id("name")         // key for which our data is unique on
    .draw()   
  
  // Things you can do 
  var connections2 = [
    {"source": "Current", "target": "Past"},
    {"source": "Exercise", "target": "Past"},
    {"source": "Less Sugar", "target": "Future"},
    {"source": "Medication", "target": "Future"},
    {"source": "Current", "target": "Future"},
    {"source": "Weight Loss", "target": "Past"},
    {"source": "Proper Diet", "target": "Past"}
  ]
  // instantiate d3plus
  var visualization = d3plus.viz()
    .container("#viz4")  // container DIV to hold the visualization
    .type("rings")      // visualization type
    .edges(connections2) // list of node connections
    .focus("Current")     // ID of the initial center node
    .draw()             // finally, draw the visualization!
   

$(document).ready(main);
