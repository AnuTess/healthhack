from bokeh.models import CustomJS, ColumnDataSource, HoverTool
from bokeh.plotting import hplot, figure, output_file, show

output_file("progress.html")

#a1c data
x = [1,2,3,4,5,6]
y = [46,43,45,44,41,38]

#intervention-result data
i = [-5,-5,-5,-5,-5,0,5,0,0]
r = [-18,-15,-12,-10,-7,0,-4,5,10]

TOOLS = "reset,save,hover"

p1 = figure(title="intervention-result data",tools=TOOLS)
p1.circle(i,r,color=["red","green","blue","purple","orange","gray","yellow","gray","gray"],size=50,alpha=0.6)
p1.xaxis.axis_label="failure ----> success"
p1.yaxis.axis_label="past ----> future"

p2 = figure(title="a1c values",tools=TOOLS)
p2.line(x,y,color="gray",line_width=3,line_color="gray",line_alpha=0.6)
p2.circle(x,y,color=["red","green","blue","purple","orange","yellow"],size=35,alpha=0.6)
p2.line([6,7,8,9],[38,38,38,38],line_color="gray",line_dash="dashed",line_width=3,line_alpha=0.6)
p2.xaxis.axis_label="Lab Result"
p2.yaxis.axis_label="a1C (mg/dL)"

hover1 = p1.select(dict(type=HoverTool))
hover1.tooltips = [
        ("Trial #","$x"),
        ("Success","y/n")
        ]

hover2 = p2.select(dict(type=HoverTool))
hover2.tooltips = [
        ("Blood Measurement","$x"),
        ("a1C Level","$y")
        ]

layout = hplot(p1,p2)

show(layout)
