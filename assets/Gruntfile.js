module.exports = function (grunt) {
    grunt.initConfig({

        concat: {
            options: {
                separator: '',
            },
            dist: {
                src: ['js/popper.min.js', 'js/bootstrap.min.js', 'js/global.js', 'js/c3.js', 'js/custom.js', 'js/form_wizard.js', 'js/evaluate.js', 'js/charts.js', 'js/dirty.js'],
                dest: 'dist/built.js',
            },
        },

        uglify: { 
            my_target: {
                files: {
                    'dist/output.min.js': ['dist/built.js']
                }
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('js', ['concat', 'uglify']);
};