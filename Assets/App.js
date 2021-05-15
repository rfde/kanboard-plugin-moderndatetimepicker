// Override Kanboard.App.Prototype.datepicker
// from /assets/js/src/App.js
Kanboard.App.prototype.datePicker = function() {
	var bodyElement = $("body");
	var dateFormat = bodyElement.data("js-date-format");
	var timeFormat = bodyElement.data("js-time-format");
	
	// revert the conversion from /app/Helper/AppHelper.php
	var dateFormatFlatpickr = dateFormat.replace("mm", "m").replace("yy", "Y").replace("dd", "d");
	var timeFormatFlatpickr = timeFormat.replace("HH", "H").replace("mm", "i").replace("tt", "K");
	var timeFormat24h = !timeFormatFlatpickr.includes("K");
	
	// locale
	var jsLanguageCode = $("html").attr("lang");
	var locale = getFlatpickrLanguageCode(jsLanguageCode);
	
	// workaround: flatpickr has no en-GB locale; in this case, use the
	// default english locale and set the first day of week to Monday (1)
	if (locale == "default" && jsLanguageCode == "en-GB") {
		locale = {firstDayOfWeek: 1};
	}
	
	// Datetime picker
	$(".form-datetime").flatpickr({
		locale: locale,
		time_24hr: timeFormat24h,
		defaultHour: 0,
		enableTime: true,
		dateFormat: dateFormatFlatpickr + " " + timeFormatFlatpickr
	});
	// Datepicker
	$(".form-date").flatpickr({
		locale: locale,
		enableTime: false,
		dateFormat: dateFormatFlatpickr
	});
};

function getFlatpickrLanguageCode(jsLanguageCode) {
	switch (jsLanguageCode) {
		case "cs": return "cs";
		case "ca": return "cat";
		case "da": return "da";
		case "de": return "de";
		case "en-GB": return "default";
		case "en": return "default";
		case "es": return "es";
		case "fr": return "fr";
		case "it": return "it";
		case "hr": return "hr";
		case "hu": return "hu";
		case "nl": return "nl";
		case "no": return "no";
		case "pl": return "pl";
		case "pt": return "pt";
		case "pt-BR": return "pt";
		case "ro": return "ro";
		case "ru": return "ru";
		case "sr": return "sr";
		case "fi": return "fi";
		case "sk": return "sk";
		case "sv": return "sv";
		case "tr": return "tr";
		case "uk": return "uk";
		case "ko": return "ko";
		case "zh-CN": return "zh";
		case "zh-TW": return "zh_tw";
		case "ja": return "ja";
		case "th": return "th";
		case "id": return "id";
		case "el": return "gr";
		case "fa": return "fa";
		case "vi": return "vn";
		case "bs": return "bs";
		case "mk": return "mk";
		case "my": return "my";
		default: return "default";
	}
}