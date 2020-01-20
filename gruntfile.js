module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
  	watch: {
	  scripts: {
	    files: ['sass/*.scss','js_working/core_custom.js'],
	    tasks: ['sass','cssmin', 'jsconcat'],
	    options: {
	      atBegin: true,
	    },
	  }
	},
	sass: {
	    dist: {
	      options: { 
	        style: 'expanded'
	      },
	      files: { 
	        'css/all.css': 'sass/style.scss'
	      }
	    },
	  },
	  concat: {
	    dist: {
	      files: {
	        'js/jscompiled.js': ['js_working/modernizr.js', 'js_working/superfish.js','js_working/jquery.scrollpoint.js', 'js_working/fitVids.js', 'js_working/owl/owl.carousel.js', 'js_working/owl/owl.navigation.js', 'js_working/owl/owl.video.js', 'js_working/owl/owl.autoplay.js', 'js_working/owl/owl.lazyload.js', 'js_working/owl/owl.autoheight.js', 'js_working/owl/owl.animate.js', 'js_working/owl/owl.hash.js', 'js_working/owl/owl.autorefresh.js', 'js_working/jquery.auto-complete.js', 'js_working/jquery.lazy.min.js', 'js_working/inviewport.jquery.js'],
	        'js/core_custom.js': ['js_working/core_custom.js'],
	      },
	    },
	  },
	  uglify: {
	    my_target: {
	      files: {
	        'js/core_custom.js': ['js/core_custom.js'],	        
	        'js/jscompiled.js': ['js/jscompiled.js'],
	      },
	    },
	  },
	  autoprefixer: {
	    multiple_files: {
	      	expand: true,
      		flatten: true,
      		src: 'css/*.css',
      		dest: 'css/'
	    },
		},
	  cssmin: {
		minify: {
		    expand: true,
		    cwd: 'css/',
		    src: ['*.css'],
		    dest: 'css/',
		},
	},
  });

  // Load plugins
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  // task(s)
  grunt.registerTask('compile', ['watch']);
  grunt.registerTask('jsconcat', ['concat', 'uglify']);
  grunt.registerTask('minifyjs', ['uglify']);
  grunt.registerTask('minifycss', ['cssmin']);
  grunt.registerTask('alltasks', ['sass', 'concat', 'uglify', 'cssmin','autoprefixer', 'svgprep']);
  grunt.registerTask('sendtostaging', ['sass', 'concat', 'uglify', 'cssmin', 'svgprep', 'ftp-deploy']);
};