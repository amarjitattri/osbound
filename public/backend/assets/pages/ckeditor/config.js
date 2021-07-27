/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    config.language = 'en';
    config.height = '100%';
    config.toolbar = [
        {
            name: 'basicstyles',
            items: ['Bold', 'Italic', 'Underline', 'CopyFormatting', 'RemoveFormat', 'Format', 'Font', 'FontSize', 'NumberedList', 'BulletedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        }
    ];
};
