CKEDITOR.plugins.add('footnote',
{
    init: function(editor)
    {
    	var pluginName = 'footnote';
        CKEDITOR.dialog.add(pluginName, this.path + 'dialogs/footnote.js');
        editor.addCommand(pluginName, new CKEDITOR.dialogCommand(pluginName));
        editor.ui.addButton('Footnote',
            {
                label: 'Footnote or Citation',
                command: pluginName
            });
    }
});
CKEDITOR.ui.addButton( 'footnote',
		{
			label : editor.lang.common.footnote,
			command : 'footnote',
			icon: this.path + 'images/footnote.jpg'
		});
buttons:[{
    type:'button',
    id:'someButtonID', /* note: this is not the CSS ID attribute! */
    label: 'Button',
    onClick: function(){
       //action on clicking the button
    	alert('hello I am footnote!!');
    }
},CKEDITOR.dialog.okButton, CKEDITOR.dialog.cancelButton],