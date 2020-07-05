module.exports = function (grunt) {
    grunt.initConfig({

        concat: {
            options: {
                separator: '',
            },

            default: {
                src: ['js/popper.min.js', 'js/bootstrap.min.js', 'js/global.js', 'js/c3.js', 'js/custom.js', 'js/form_wizard.js', 'js/evaluate.js', 'js/charts.js', 'js/dirty.js'],
                dest: 'dist/built.js',
            },

            calendar: {
                src: ['js/student-dtr.js'],
                dest: 'dist/calendar.js',
            },

            table: {
                src: ['js/dataTable.js'],
                dest: 'dist/datatable.js',
            }
        },

        uglify: { 
            default: {
                src: 'dist/built.js',
                dest: 'dist/output.min.js'
            },

            calendar: {
                src: 'dist/calendar.js',
                dest: 'dist/calendar.min.js'
            },

            table: {
                src: 'dist/datatable.js',
                dest: 'dist/datatable.min.js'
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('js', ['concat', 'uglify']);
};