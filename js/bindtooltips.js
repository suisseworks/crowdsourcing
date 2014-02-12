/**
 * Created by Matthias Malek on 13/12/13.
 */



    // Notice the use of the each() method to acquire access to each elements attributes
$('a[tooltip]').each(function()
{
    //$(this).addClass('helpcursor')
    $(this).qtip({
        content: $(this).attr('tooltip'), // Use the tooltip attribute of the element for the content
        show: 'mouseover',
        hide: 'mouseout',
        position: {
            corner: {
                target: 'topRight',
                tooltip: 'bottomLeft'
            }
        },
        style: { name: 'green'}
        /*
       style: {
            width: 300,
            padding: 15,
            background: '#89b850',
            color: 'white',
            textAlign: 'left',
            border: {
                width: 7,
                radius: 5,
                color: 'lightgray'
            },
            tip: 'bottomLeft',
            name: 'dark' // Inherit the rest of the attributes from the preset dark style
        }
        */

    });
});
