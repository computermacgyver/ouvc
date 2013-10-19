jQuery(document).ready(function($) {

$('#gcf').gCalFlow({
  calid: 'sjft45afbqbv91pudr1sfctgbk@group.calendar.google.com',
  auto_scroll: false,
  link_title: true, /*Caendar title has link*/
  link_item_title: false,
  globalize_fmt_datetime: "dddd', 'dd' 'MMM' 'yyyy' 'HH':'mm",
  globalize_fmt_date: "dddd', 'MMM' 'dd",
  globalize_fmt_time: "HH':'mm",
  globalize_fmt_monthday: "MMM",
  group_by_day: true,
  maxitem: 10,
  callback: function(){
	$(".gcf-item-block:contains('M1')").addClass("event-m1");
	$(".gcf-item-block:contains('M2')").addClass("event-m2");
	$(".gcf-item-block:contains('MNVL')").addClass("event-mnvl");
	$(".gcf-item-block:contains('W1')").addClass("event-w1");
	$(".gcf-item-block:contains('W2')").addClass("event-w2");
	$(".gcf-item-block:contains('WNVL')").addClass("event-wnvl");
 }

});

function cleanHTML(txt) {
	txt=txt.replace(/<img [^>]*>/g,"");
	txt=txt.replace(/<a [^>]*>/g,"");
	txt=txt.replace(/<\/a>/g,"");
	//txt=txt.replace(/<link[^>]*>/g,"");
	return txt;
}

//Uses YQL to avoid cross-site issues
$.ajax({
    url: "http://www.volleyballengland.org/competitions/national_volleyball_league/league_tables?comp=VE1&division=VE24880327",
    type: 'GET',
	xpath: "//div[@class='leaguetablehold']/table",
    success: function(res) {
    	var txt=cleanHTML(res.responseText);
        $("#mnvl").html(txt);
		$("#mnvl tr:contains('Oxford')").addClass("highlight");
    }
});




$.ajax({
    url: "http://www.volleyballengland.org/competitions/national_volleyball_league/league_tables?comp=VE1&division=VE42626507",
    type: 'GET',
	xpath: "//div[@class='leaguetablehold']/table",
    success: function(res) {
    	var txt=cleanHTML(res.responseText);
        $("#wnvl").html(txt);
		$("#wnvl tr:contains('Oxford')").addClass("highlight");
    }
});


$.ajax({
    url: "http://www.bucs.org.uk/bucscore/EmbedLeague.aspx?id=2607",
    type: 'GET',
    xpath: "//div[@class='main-table']/table",
    success: function(res) {
    	var txt=cleanHTML(res.responseText);
        $("#m1").html(txt);
		$("#m1 tr:contains('Oxford')").addClass("highlight");
    }
});

$.ajax({
    url: "http://www.bucs.org.uk/bucscore/EmbedLeague.aspx?id=2622",
    type: 'GET',
    xpath: "//div[@class='main-table']/table",
    success: function(res) {
    	var txt=cleanHTML(res.responseText);
        $("#w1").html(txt);
		$("#w1 tr:contains('Oxford')").addClass("highlight");
    }
});



});

