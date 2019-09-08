$(function() {
    "use strict";
    $('.year-calendar').pignoseCalendar({
        theme: 'blue', // light, dark, blue,
        reversed: true,
        date: moment(new Date().toJSON().slice(0,10).replace(/-/g,'/')),
        format: 'YYYY-MM-DD',
		weeks: [
			'الأحد',
			'الاثنين',
			'الثلاثاء',
			'الأربعاء',
			'الخميس',
			'الجمعة',
			'السبت'
		],
		monthLong: [
			'يناير',
			'فبراير',
			'مارس',
			'إبريل',
			'مايو',
			'يونيو',
			'يوليو',
			'أغسطس',
			'سبتمبر',
			'أكتوبر',
			'نوفمبر',
			'ديسمبر'
		],
		months: [
			'1',
			'2',
			'3',
			'4',
			'5',
			'6',
			'7',
			'8',
			'9',
			'10',
			'11',
			'12'
		],
		controls: {
			ok: 'OK',
			cancel: 'Cancel'
		}
    });

    $('input.calendar').pignoseCalendar({
        format: 'YYYY-MM-DD' // date format string. (2017-02-02)
    });;

});

