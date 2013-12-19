var app = {
    initialize: function() {
        this.bind();
    },
    bind: function() {
        document.addEventListener('deviceready', this.deviceready, false);
    },
    deviceready: function() {
        // note that this is an event handler so the scope is that of the event
        // so we need to call app.report(), and not this.report()
        app.report('deviceready');
    },
    report: function(id) { 
        console.log("report:" + id);
        // hide the .pending <p> and show the .complete <p>
        document.querySelector('#' + id + ' .pending').className += ' hide';
        var completeElem = document.querySelector('#' + id + ' .complete');
        completeElem.className = completeElem.className.split('hide').join('');
    }
};

$(document).on('deviceready', function(){
	
	function loadBugs() {
		var bugs = $('#bugs ul').empty();
		s
		$.ajax({
			type: 'GET',
			url: 'http://www.argosapps.fr/prototyperetro/addcom.php?&jsoncallback=?',
			dataType: 'JSONp',
			timeout: 5000,
			success: function(data) {
				alert('�a marche !!!');
				$.each(data, function(i,item){
					bugs.append('<li>'+item.title)
				});
			},
			error: function(data) {
				alert('�a marche POOO !!!');
				bugs.append('<li>There was an error loading the bugs');
			}
		});
	}
	
	$('#add-bug form').submit(function(){
		var loading = $(this).find('input[type="submit"]');
		loading.addClass('loading');
		
		var postData = $(this).serialize();

		$.ajax({
			type: 'POST',
			data: postData,
			url: 'http://www.argosapps.fr/prototyperetro/addcom.php',
			success: function(data){
				loadBugs();

			//	$('#bugs').addClass('current');
			//	$('#add-bug').removeClass('current');

				loading.removeClass('loading');
				console.log('Bug added!');
			},
			error: function(){
				loading.removeClass('loading');
				console.log('There was an error');
			}
		});

		return false;
	});
	
	//change .tap to .click for browser testing [OK man, PhM]
	$('.button').tap(function(e){
		var nextPage = $(e.target.hash);
		var currentPage = $('.page.current');

		if (nextPage.attr('id') != currentPage.attr('id')) {
			nextPage.addClass('current');
			currentPage.removeClass('current');
		}

		return false;
	});
	
	loadBugs();
	
});