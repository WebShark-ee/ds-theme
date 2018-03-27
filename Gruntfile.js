module.exports = function(grunt) {
    grunt.initConfig({
        copy: {
            main: {
                files: [{
                        expand: true,
                        cwd: 'src/',
                        src: ['*'],
                        dest: 'app/',
                        filter: 'isFile'
                    }, {
                        expand: true,
                        cwd: 'src/js',
                        src: ['main.js'],
                        dest: 'assets/js',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        cwd: 'src/img',
                        src: ['*'],
                        dest: 'app/img',
                        filter: 'isFile'
                    },
                    {
                        expand: true,
                        cwd: 'bower_components/font-awesome/fonts',
                        src: ['*'],
                        dest: 'app/fonts',
                        filter: 'isFile'
                    }
                   
                ]

            }
        },

        concat: {
            js: {
                src: [
                    'bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
                    'bower_components/ekko-lightbox/dist/ekko-lightbox.js',
                    'bower_components/flexslider/jquery.flexslider-min.js'
                ],
                dest: 'app/js/complete.js'
            },
            css: {
                src: [
                    'src/css/style.css',
                    'bower_components/ekko-lightbox/dist/ekko-lightbox.min.css',
                    'bower_components/flexslider/flexslider.css',
                    'app/css/main.css',
                ],
                dest: 'style.css'
            }
        },


        uglify: {
            my_target: {
                files: {
                    'assets/js/complete.js': ['app/js/complete.js']
                }
            }
        },
        sass: { // Task
            dist: { // Target
                options: { // Target options
                    style: 'expanded',
                    'sourcemap': 'none',
                    'style': 'compressed'

                },
                files: { // Dictionary of files
                    'app/css/main.css': 'src/css/main.scss',
                    'assets/css/main.css': 'src/css/main-voyager.scss',

                }

            }
        },

        watch: {

            css: {
                files: ['src/css/main.scss', 'src/css/main-voyager.scss'],
                tasks: ['sass', 'concat:css'],
            },

            html: {
                files: ['src/*'],
                tasks: ['copy'],
            },

            js: {
                files: ['src/js/main.js'],
                tasks: ['copy'],
            },

            img: {
                files: ['src/img/*'],
                tasks: ['copy'],
            }

        }
    });

    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['copy', 'concat', 'uglify', 'sass' ]);
};