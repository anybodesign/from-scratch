let ias = new InfiniteAjaxScroll('#posts_list', {
	item: '.post-block',
	next: '.next',
	pagination: document.getElementById('posts_nav'),
	spinner: {
		element: '.spinner',
		delay: 600,
		show: function(element) {
		  element.style.display = 'block'; // default behaviour
		},
		hide: function(element) {
		  element.style.display = 'none'; // default behaviour
		}
	},
	trigger: {
		element: '#post_trigger',

		when: function(pageIndex) {
			return true;
		},
		show: function(element) {
		  element.style.display = 'block'; // default behaviour
		},
		hide: function(element) {
		  element.style.display = 'none'; // default behaviour
		}
	},
	loadOnScroll: false	
});

ias.on('last', function() {
  let el = document.querySelector('.no-more');

  el.style.display = 'block';
});