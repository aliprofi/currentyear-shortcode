(function() {
    tinymce.create('tinymce.plugins.currentyear', {
        init : function(ed, url) {
            ed.addButton('currentyear', {
                title : 'Вставить текущий год',
                icon: 'dashicon dashicons-calendar-alt',
                onclick : function() {
                    ed.insertContent('[currentyear]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('currentyear', tinymce.plugins.currentyear);
})();
