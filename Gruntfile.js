module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['public/css/foundation/scss/'],
        sourceMap: true
      },
      dist: {
        options: {
          outputStyle: 'nested'
        },
        files: {
          'public/css/style.css': 'scss/style.scss', 'public/css/admin.css': 'scss/admin.scss'
        }        
      }
    },    
    // cssmin: {
    //   target: {
    //     files: {
    //       'public/css/style.min.css': 'public/css/style.css'
    //     }
    //   }
    // },
    // uglify: {
    //   target: {
    //     options: {
    //       sourceMap: true
    //     },
    //     files: {
    //         'public/js/script.min.js': ['public/bower/jQuery/dist/jquery.min.js', 'public/bower/bootstrap/assets/javascripts/bootstrap.js', 'public/js/jquery.customSelect.min.js', 'public/js/script.js']
    //     }
    //   }
          
    // },
    // imagemin: {
    //  png: {
    //    options: {
    //      optimizationLevel: 7 //Compression level
    //    },
    //    files: [{
    //      expand: true, //Dynamic expansion
    //      cwd: 'public/images/',
    //      src: ['**/*.png'],
    //      dest: 'public/images/',
    //      ext: '.png'
    //      }]
    //  },
    //  jpg: {
    //    options: {
    //      progressive: true //Lossless or progressive conversion
    //    },
    //    files: [{
    //      expand: true,
    //      cwd: 'public/images/',
    //      src: ['**/*.jpg'],
    //      dest: 'public/images/',
    //      ext: '.jpg'
    //    }]
    //  }
    // },
    watch: {
      grunt: { files: ['Gruntfile.js'] },
      sass: {
        files: 'scss/**/*.scss',
        tasks: ['sass']
      }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  // grunt.loadNpmTasks('grunt-contrib-cssmin');
  // grunt.loadNpmTasks('grunt-contrib-uglify');
  // grunt.loadNpmTasks('grunt-contrib-imagemin');

  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['build','watch']);
}