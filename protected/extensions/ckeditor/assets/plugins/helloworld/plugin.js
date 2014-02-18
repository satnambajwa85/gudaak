CKEDITOR.plugins.add('helloworld',
    {
        requires : ['iframedialog'],
        init : function(editor) {
            var pluginName = 'helloworld';
            var mypath = this.path;
            editor.ui.addButton(
                'helloworld.btn',
                {
                    label : "My Plug-in",
                    command : 'helloworld.cmd',
                    icon : mypath + 'footnote.jpg'
                }
            );
            var cmd = editor.addCommand('helloworld.cmd', {exec:showDialogPlugin});
            CKEDITOR.dialog.addIframe(
                'helloworld.dlg',
                'Hello Title',
                mypath + 'helloworld.html',
                400,
                300,
                function(){
                }
            );
        }
    }
);

function showDialogPlugin(e){
    e.openDialog('helloworld.dlg');
}