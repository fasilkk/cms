Pongo.VM = {

	settingsViewModel: function() {
		var self = this;
		self.pageName = ko.observable($('#name').val());
		self.slugBase = ko.observable($('#slug-base').val());		
		self.slugLast = ko.computed(function() {
			var name = self.pageName();
			
			return name.toLowerCase()
					   .replace(/[^\w ]+/g,'')
					   .replace(/ +/g,'-');
		});
		self.slugFull = ko.computed(function() {
			return self.slugBase() + '/' + self.slugLast();
		});
		self.pageState = ko.observable($('input[name=is_valid]').is(':checked'));
		self.pageStatus = ko.computed(function() {
			return self.pageState() ? 'label-success' : 'label-danger';
		});
		self.pageStatusLabel = ko.computed(function() {
			return self.pageState() ? 'online' : 'offline';
		});
	};

};

$(function() {

	ko.applyBindings(new Pongo.VM.settingsViewModel());

});