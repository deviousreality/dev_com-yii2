'use strict';

/**
 * Grunt Module
 */

module.exports = function (grunt) {

    // Show elapsed time after tasks run
    require('time-grunt')(grunt);
    // Load all Grunt tasks
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        cms: {
            scss: {
                main: 'application/assets/scss'
            },
            js: {
                main: 'asset/js',
                lib: 'asset/js/lib'
            },

            dist: {
                css: 'public_html/dist/css',
                js: 'public_html/dist/js',
                backend_css: 'public_html/admin/dist/css',
                backend_js: 'public_html/admin/dist/js',
            }
        },
        watch: {
            sass: {
                files: ['<%=cms.scss.main %>/{,*/}*.{scss, sass}'],
                tasks: ['sass:dist_backend']
            },
            scsslint: {
                files: ['<%= cms.scss.main %>/{,*/}*.{scss, sass}'],
                tasks: ['scsslint']
            },
            uglify: {
                files: ['<%= cms.js.main %>/{,**/}*.js'],
                tasks: ['uglify:lib', 'uglify:dist']
            },
            jshint: {
                files: ['<%= cms.js.lib %>/{,**/}*.js'],
                tasks: ['jshint']
            }
        },
        scsslint: {
            allFiles: [
                '<%= cms.scss.main %>/{,*/}*.scss',
            ],
            options: {
                config: '.scss-lint.yml',
                reporterOutput: 'scss-lint-reporter.xml',
                colorizeOutput: true
            }
        },
        sass: {
/*
            dist_frontend: {
                options: {
                    style: 'compressed'
                },
                files: [{
                    expand: true,
                    cwd: '<%= cms.scss.main %>',
                    src: ['{,*!/}*.scss'],
                    dest: [
                        '<%= cms.dist.css %>'
                    ],
                    ext: '.min.css'
                }]
            },
*/
            dist_backend: {
                options: {
                    style: 'compressed'
                },
                files: [{
                    expand: true,
                    cwd: '<%= cms.scss.main %>',
                    src: 'backend.scss', //['{,*/}*.scss'],
                    dest:
                        '<%= cms.dist.backend_css %>',

                    ext: '.min.css'
                }]
            }
        },
        uglify: {
            dist: {
                options: {
                    sourceMap: true
                },
                files: [{
                    expand: true,
                    cwd: '<%= cms.js.main %>',
                    src: [
                        '**/*.js',
                        '!<%= cms.js.lib %>/*.js',
                        '!**/*.min.js'
                    ],
                    dest: [
                        '<%= cms.dist.js %>',
                        '<%= cms.dist.backend_js %>',
                    ],
                    ext: '.min.js'
                }]
            },
            lib: {
                options: {
                    sourceMap: true,
                    mangle: false
                },
                files: {
                    '<%= cms.dist.js %>/main.min.js': [
                    //    '<%= cms.js.lib %>/button-toggle.js',
                    //    '<%= cms.js.lib %>/collapse.js',
                    //    '<%= cms.js.lib %>/modal.js'
                    ],
                    '<%= cms.dist.backend_js %>/main.min.js': [
                    ]
                }
            }
        },
        copy: {
            js: {
                expand: true,
                cwd: '<%= cms.vendor.js %>',
                src: '**',
                dest: '<%= cms.dist.js %>/vendor',
                flatten: false,
                filter: 'isFile'
            },
            css: {
                expand: true,
                cwd: '<%= cms.vendor.css %>',
                src: '**',
                dest: '<%= cms.dist.css %>/vendor',
                flatten: false,
                filter: 'isFile'
            },
            backend_css: {
                expand: true,
                cwd: '<%= cms.vendor.css %>',
                src: '**',
                dest: '<%= cms.dist.backend_css %>/vendor',
                flatten: false,
                filter: 'isFile'
            },
            tinymce: {
                expand: true,
                cwd: 'node_modules',
                src: 'tinymce/**',
                dest: '<%= cms.dist.backend_js %>/vendor',
                flatten: false
            }
        },
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                reporter: require('jshint-stylish')
            },
            all: [
                '<%= cms.js.lib %>/{,**/}*.js'
            ]
        }
    });
    grunt.registerTask('build', 'Minify Sass and Javascript', [
       // 'sass:dist_frontend',
        'sass:dist_backend',
        //'uglify:lib',
        'uglify:dist'
    ]);

    grunt.registerTask('check', 'Lints Sass and Javascript', [
        'scsslint',
        'jshint'
    ]);

    grunt.registerTask('move', 'Copy vendor files', [
        //'copy:js',
        //'copy:css'
        'copy:tinymce'
    ]);

    grunt.registerTask('default', 'Lint, Minify, and Watch', [
        'check',
        'build',
        'move',
        'watch'
    ]);
};

