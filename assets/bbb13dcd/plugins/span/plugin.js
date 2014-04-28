CKEDITOR.plugins.add('span',
{
    init: function(editor)
    {
		
        var pluginName = 'span';
      // CKEDITOR.dialog.add(pluginName, this.path + 'dialogs/span.js');
        editor.addCommand(pluginName, new CKEDITOR.dialogCommand(pluginName));
        editor.ui.addButton('Span',
            {
                label: 'span',
                command: pluginName,
				icon: CKEDITOR.plugins.getPath('span') + 'images/span.png'
            });
			CKEDITOR.dialog.add(pluginName,this.path+"dialogs/insert.php")
    }
});
