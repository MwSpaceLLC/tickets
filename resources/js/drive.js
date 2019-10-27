tinymce.PluginManager.add('drive', function (editor, url) {
    var openDialog = function () {
        return editor.windowManager.open({
            title: 'Local Drive Media',
            body: {
                type: 'panel',
                items: [
                    {
                        type: 'input',
                        name: 'title',
                        label: 'Title'
                    },
                    {
                        type: 'urlinput',
                        filetype: 'file',
                        name: 'title',
                        label: 'Title'
                    }
                ]
            },
            buttons: [
                {
                    type: 'cancel',
                    text: 'Close'
                },
                {
                    type: 'submit',
                    text: 'Save',
                    primary: true
                }
            ],
            onSubmit: function (api) {
                var data = api.getData();
                // Insert content when the window form is submitted
                editor.insertContent('Title: ' + data.title);
                api.close();
            }
        });
    };

    // Add a button that opens a window
    editor.ui.registry.addButton('drive', {
        icon: 'link',
        tooltip: 'File from drive',
        onAction: function () {
            // Open window
            openDialog();
        }
    });

    // Adds a menu item, which can then be included in any menu via the menu/menubar configuration
    editor.ui.registry.addMenuItem('drive', {
        text: 'Local Drive Media',
        onAction: function () {
            // Open window
            openDialog();
        }
    });

    return {
        getMetadata: function () {
            return {
                name: "Example plugin",
                url: "http://exampleplugindocsurl.com"
            };
        }
    };
});