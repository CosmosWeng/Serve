// convert form data to json
$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();

  $.each(a, function() {
    if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || '');
    } else {
      o[this.name] = this.value || '';
    }
  });
  if (localStorage.getObject('user')) {
    o['_sess'] = localStorage.getObject('user')['_sess'];
  }
  return o;
};

$(document).on('.dsd', 'dasd', function() {});
