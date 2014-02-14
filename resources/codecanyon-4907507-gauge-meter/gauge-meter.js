/**
 * GaugeMeter
 * Author: Mark Homans
 * Email: mark.homans@gmail.com
 * Date: 2013-06-09
 */
function GaugeMeter(settings)
{
    var defaults =
    {
        MinValue        : 0,        //Min value
        MaxValue        : 100,      //Max value
        Text            : "",       //text in the middle
        Animate         : true,
        AnimTime        : 500,      //duration of animation in miliseconds
        Refreshrate     : 12,       //lower is smoother
        StartEazingAt   : 0.5,      //start to eaze at nth of value (lower = smoother eaze)
        EazeForce       : 1.02,     //eaze reduced by nth of step (higher = faster stop)
        NoDataText      : "No data",//text to show when no data is found,
        GaugeColors     : ["rgb(255,0,0)",
                           "rgb(255,165,0)",
                           "rgb(34,139,34)",
                           "rgb(0,128,0)",
                           "rgb(0,100,0)"
                          ],
        GaugeSegments   : {
                            BorderColor: 'rgb(64,62,68)',
                            BorderWidth: 2
                          },
        Panel           : {
                            BackgroundColor : "rgba(145,190,211,0.15)",
                            BorderColor     : "rgb(145,190,211)",
                            BorderWidth     : 1,
                            Margin          : 7,
                            Radius          : 5
                          },
        HideOuterBorder :  false,
        OuterBorder     : {
                            BorderWidth     : 1,
                            BorderColor     : "rgb(145,190,211)",
                            BackgroundColor : "rgba(145,190,211,0.3)",
                            Radius          : 10
                          },
        Needle          : {
                            BorderWidth: 1,
                            BorderColor: "rgb(0,0,0)",
                            BackgroundColor: "rgb(255,74,74)"
                          },
        NeedlePivot     : {
                            BorderWidth: 1,
                            BorderColor: "rgb(78,101,112)",
                            BackgroundColor: "rgb(205,224,226)"
                          },
        FontColor: "rgb(78,101,112)",
        Font : '10px Arial'
                          
    };
    
    if(!("ElementId" in settings))
        throw "ElementId not found!";
    	
    var div = document.getElementById(settings.ElementId);
    if(div==null)
        throw "object [" + settings.ElementId + "] does not exist";
    var div_var = parseFloat(div.innerText || div.textContent);
    div.innerHTML = '';

    var canvas = document.createElement("canvas");
    div.appendChild(canvas);

    canvas.width = div.offsetWidth;//180;
    canvas.height = canvas.width * 0.6;//108;
    
    //multiply all sizes by this figure
    var sizePercent = canvas.width / 180;
    
    if(navigator.appName=="Microsoft Internet Explorer")
    {
        var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
        re.exec(navigator.userAgent)
        if(parseFloat(RegExp.$1) <9)
            G_vmlCanvasManager.initElement(canvas);
    }
    var c = canvas.getContext("2d");
	
    var center = canvas.width / 2,
        height = canvas.height,
        width = canvas.width,
        needlePointHeight = canvas.height-25*sizePercent;

    //choose between settings & defaults
    var Colors = settings.GaugeColors || defaults.GaugeColors;
    if(Colors.length==0)
        Colors = defaults.Colors;
    if(settings.FlipColours)
        Colors.reverse();

    var GaugeSegments = settings.GaugeSegments || defaults.GaugeSegments;
    GaugeSegments.BorderColor = GaugeSegments.BorderColor || defaults.GaugeSegments.BorderColor;
    GaugeSegments.BorderWidth = GaugeSegments.BorderWidth == undefined?  defaults.GaugeSegments.BorderWidth : GaugeSegments.BorderWidth;
        
    var Panel = settings.Panel || defaults.Panel;
    Panel.BackgroundColor = Panel.BackgroundColor || defaults.Panel.BackgroundColor;
    Panel.BorderColor = Panel.BorderColor || defaults.Panel.BorderColor;
    Panel.BorderWidth = Panel.BorderWidth == undefined ? defaults.Panel.BorderWidth : Panel.BorderWidth;
    Panel.Margin = (Panel.Margin || defaults.Panel.Margin) * sizePercent;
    Panel.Radius = Panel.Radius || defaults.Panel.Radius;
    
    var HideOuterBorder = settings.HideOuterBorder || defaults.HideOuterBorder;
    
    var OuterBorder = settings.OuterBorder || defaults.OuterBorder;
    OuterBorder.BackgroundColor = OuterBorder.BackgroundColor || defaults.OuterBorder.BackgroundColor;
    OuterBorder.BorderColor = OuterBorder.BorderColor || defaults.OuterBorder.BorderColor;
    OuterBorder.BorderWidth = OuterBorder.BorderWidth || defaults.OuterBorder.BorderWidth;
    OuterBorder.Radius = OuterBorder.Radius || defaults.OuterBorder.Radius;
    
    var Needle = settings.Needle || defaults.Needle;
    Needle.BackgroundColor = Needle.BackgroundColor || defaults.Needle.BackgroundColor;
    Needle.BorderColor = Needle.BorderColor || defaults.Needle.BorderColor;
    Needle.BorderWidth = Needle.BorderWidth || defaults.Needle.BorderWidth;
    
    var NeedlePivot = settings.NeedlePivot || defaults.NeedlePivot;
    NeedlePivot.BackgroundColor = NeedlePivot.BackgroundColor || defaults.NeedlePivot.BackgroundColor;
    NeedlePivot.BorderColor = NeedlePivot.BorderColor || defaults.NeedlePivot.BorderColor;
    NeedlePivot.BorderWidth = NeedlePivot.BorderWidth || defaults.NeedlePivot.BorderWidth;
    
    var FontColor = settings.FontColor || defaults.FontColor;
    var Font = settings.Font || defaults.Font;

    if(settings.NoData)
    {
        DrawBackground();
        c.fillStyle = "rgba(255,255,255,0.7)";
        roundRect(c, 5, 5, width-10, height-10, 10, true, false);
        c.font = "bold 14px Arial";
        c.textAlign = "center";
        c.fillStyle = "rgb(0,0,0)";
        c.fillText(settings.NoDataText || defaults.NoDataText, center, 40);
        return;
    }
	
    if(!("Value" in settings) && !div_var)
        throw "No value defined for GaugeMeter ["+settings.ElementId+"]";
	
    var Value = div_var || settings.Value, 
        MinValue = settings.MinValue || defaults.MinValue,
        MaxValue = settings.MaxValue || defaults.MaxValue;
        
    var CurValue = MinValue;
    
    this.SetValue = function(Value)
    {
        settings.Value = Value;
        
        if(settings.Animate || (settings.Animate==undefined && defaults.Animate))
        {
            var Refreshrate = settings.Refreshrate || defaults.Refreshrate,
            AnimTime = settings.AnimTime || defaults.AnimTime,
            StartEazingAt = settings.StartEazingAt || defaults.StartEazingAt,
            EazeForce = settings.EazeForce || defaults.EazeForce;

            var forwards = Value > CurValue;
            var step = (Value-CurValue) / (AnimTime / Refreshrate);
            var min_step = step / 3;
            var easepoint = CurValue + ((Value - CurValue) /2);

            var interval = setInterval (
                function()
                {
                    DrawBackground();
                    if(forwards)
                    {
                        //eazing
                        if(CurValue >= easepoint)
                        {
                            step /= EazeForce;
                            if(step<min_step)
                                step=min_step;
                        }
                        //ending
                        if(CurValue >= Value)
                        {
                            CurValue = Value;
                            clearInterval(interval);
                        }

                        DrawValue(CurValue);
                        CurValue += step;
                    }else
                    {
                        //eazing
                        if(CurValue <= easepoint)
                        {
                            step /= EazeForce;
                            if(step>min_step)
                                step=min_step;
                        }
                        //ending
                        if(CurValue <= Value)
                        {
                            CurValue = Value;
                            clearInterval(interval);
                        }

                        DrawValue(CurValue);
                        CurValue += step;
                    }
                
                }, 
                Refreshrate 
            );
        }
        else
        {
            DrawBackground();
            DrawValue(Value);
        }
    }
    
    this.SetValue(Value);
	
    function DrawBackground()
    {
        var margin = Panel.Margin;//+5;
    
        //clear all to start with
        c.clearRect(0,0,canvas.width,canvas.height)
        
        if(!HideOuterBorder)
        {
            //outer border
            c.fillStyle = OuterBorder.BackgroundColor;
            c.strokeStyle = OuterBorder.BorderColor;
            c.lineWidth = OuterBorder.BorderWidth;
            roundRectHollow(c, 5, 5, width-10, height-10, margin, OuterBorder.Radius, Panel.Radius, true, true, false);
        }
        
        //inner panel
        c.fillStyle = Panel.BackgroundColor;
        c.strokeStyle = Panel.BorderColor;
        c.lineWidth = Panel.BorderWidth;
        roundRect(c, 5+margin, 5+margin, width-10-(2 * margin), height-10-(2 * margin), 5, true, Panel.BorderWidth);

        //Texts
        c.font = Font;
        c.textAlign = "center";
        c.fillStyle = FontColor;
        c.fillText(settings.MinLabel || settings.MinValue || defaults.MinValue, center-50 * sizePercent, height - 25 * sizePercent);
        c.fillText(settings.MaxLabel || settings.MaxValue || defaults.MaxValue, center+50 * sizePercent, height - 25 * sizePercent);

        c.fillText(settings.Text || defaults.Text, center, 65 * sizePercent);
        

        //Arcs		
        c.lineWidth = GaugeSegments.BorderWidth;
        c.strokeStyle = GaugeSegments.BorderColor;
        
        var part = 140 / Colors.length;
        
        for(var i=0; i<Colors.length; i++)
        {
            c.fillStyle = Colors[i];
            var from = -160 + (part*i);
            var to = from + part;
            DrawArcPart(from,to);
        }
        
    }
    function DrawArcPart(StartAngle,EndAngle)
    {
        c.beginPath();
        c.arc(center,needlePointHeight,65*sizePercent,
        StartAngle * Math.PI / 180,
        EndAngle * Math.PI / 180,
        false);
        c.arc(center,needlePointHeight,55*sizePercent,
        EndAngle * Math.PI / 180,
        StartAngle * Math.PI / 180,
        true);
        c.closePath();
        if(GaugeSegments.BorderWidth)
            c.stroke();
        c.fill();
    }
	
    function DrawValue(value)
    {
        var min = MinValue,
            max = MaxValue,
            val = value;
        if(min<0)
        {
            max += Math.abs(min);
            val += Math.abs(min);
            min = 0;
        }
        var rotation = (140 * (val/(max - min)))-70;

        c.save();

        //bepaal de nieuwe x y zodat we kunnen rotaten
        c.translate(center, needlePointHeight);

        //rotate het gehele scherm
        c.rotate(rotation * Math.PI / 180);

        //zet de x y terug naar wat het was
        c.translate(-center, -needlePointHeight);


        c.beginPath();
        c.fillStyle = Needle.BackgroundColor;
        c.strokeStyle = Needle.BorderColor;
        c.lineWidth = Needle.BorderWidth;
        c.moveTo(center-2*sizePercent,needlePointHeight);
        c.lineTo(center,20*sizePercent);
        c.lineTo(center+2*sizePercent,needlePointHeight);
        c.closePath();
        c.stroke();
        c.fill();

        c.restore();

        c.beginPath();
        c.fillStyle = NeedlePivot.BackgroundColor;
        c.strokeStyle = NeedlePivot.BorderColor;
        c.lineWidth = NeedlePivot.BorderWidth;
        c.arc(center, needlePointHeight, 5, 0, 2 * Math.PI, false);
        if(NeedlePivot.BorderWidth)
            c.stroke();
        c.fill();
        
        c.fillStyle = FontColor;
        c.fillText(settings.Value, center, 50 * sizePercent);
    }
	
    function roundRect(ctx, x, y, width, height, radius, fill, stroke)
    {
        if (typeof stroke == "undefined" )
            stroke = true;
      
        if (typeof radius === "undefined")
            radius = 5;
      
        ctx.beginPath();
        ctx.moveTo(x + radius, y);
        ctx.lineTo(x + width - radius, y);
        ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
        ctx.lineTo(x + width, y + height - radius);
        ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
        ctx.lineTo(x + radius, y + height);
        ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
        ctx.lineTo(x, y + radius);
        ctx.quadraticCurveTo(x, y, x + radius, y);
        
        ctx.closePath();
        if (stroke)
            ctx.stroke();
        if (fill)
            ctx.fill();
                
    }
    function roundRectHollow(ctx, x, y, width, height, margin, radius_outer, radius_inner, fill, outer_stroke, inner_stroke)
    {
        if (typeof outer_stroke == "undefined" )
            outer_stroke = false;
        if (typeof inner_stroke == "undefined" )
            inner_stroke = false;
      
        if (typeof radius_inner === "undefined")
            radius_inner = 5;
        if (typeof radius_outer === "undefined")
            radius_outer = 5;
      
        ctx.beginPath();
        
        ctx.moveTo(x + radius_outer, y);
        ctx.lineTo(x + width - radius_outer, y);
        ctx.quadraticCurveTo(x + width, y, x + width, y + radius_outer);
        ctx.lineTo(x + width, y + height - radius_outer);
        ctx.quadraticCurveTo(x + width, y + height, x + width - radius_outer, y + height);
        ctx.lineTo(x + radius_outer, y + height);
        ctx.quadraticCurveTo(x, y + height, x, y + height - radius_outer);
        ctx.lineTo(x, y + radius_outer);
        ctx.quadraticCurveTo(x, y, x + radius_outer, y);
        
        x += margin;
        y += margin;
        height -= margin*2;
        width -= margin*2;
        
        ctx.moveTo(x + radius_inner, y);
        ctx.quadraticCurveTo(x, y, x, y + radius_inner);
        ctx.lineTo(x, y + radius_inner);
        ctx.lineTo(x, y + height - radius_inner);
        ctx.quadraticCurveTo(x, y + height, x + radius_inner, y + height);
        ctx.lineTo(x + radius_inner, y + height);
        ctx.lineTo(x + width - radius_inner, y + height);
        ctx.quadraticCurveTo(x + width, y + height, x + width, y + height - radius_inner);
        ctx.lineTo(x + width, y +radius_inner);
        ctx.quadraticCurveTo(x + width, y, x + width - radius_inner, y);
        ctx.lineTo(x + radius_inner, y);

        ctx.closePath();
        
        if (fill)
            ctx.fill();
            
        if (outer_stroke && inner_stroke)
            ctx.stroke();
        else if(outer_stroke)
            roundRect(ctx, x-margin, y-margin, width+margin*2, height+margin*2, radius_outer, false, true);
        else if(inner_stroke)
            roundRect(ctx, x, y, width, height, radius_outer, false, true);
        
                
    }
}
