"use strict";
CKEDITOR.on('instanceCreated', function (event) {
  const editor = event.editor,
    element = editor.element;
    event.language = 'en';
    event.uiColor = '#AADC6E';
    event.height = '200px';
    config.toolbar = [
        {
            name: 'basicstyles',
            items: ['Bold', 'Italic', 'Underline', 'CopyFormatting', 'RemoveFormat', 'Format', 'Font', 'FontSize', 'NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        }
    ];
  // Customize editors for headers and tag list.
  // These editors do not need features like smileys, templates, iframes etc.
  if (element.is('h1', 'h2', 'h3') || element.getAttribute('id') == 'taglist') {
    // Customize the editor configuration on "configLoaded" event,
    // which is fired after the configuration file loading and
    // execution. This makes it possible to change the
    // configuration before the editor initialization takes place.
    editor.on('configLoaded', function () {

      // Remove redundant plugins to make the editor simpler.
      editor.config.removePlugins = 'colorbutton,find,flash,font,' +
        'forms,iframe,image,newpage,removeformat,' +
        'smiley,specialchar,stylescombo,templates';

      // Rearrange the toolbar layout.
      editor.config.toolbarGroups = [{
        name: 'editing',
        groups: ['basicstyles', 'links']
      }, {
        name: 'undo'
      }, {
        name: 'clipboard',
        groups: ['selection', 'clipboard']
      }, {
        name: 'about'
      }];
    });
  }
});

