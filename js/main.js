const TypingText = document.querySelector('.typed-text');
const AutoTyping = document.querySelector('.TypeCursor');

const textArray = ['i am an IT Support & Web Developer'];
const typingDelay = 200;
const erasingDelay = 100;
const newTextDelay = 2000;
let textArrayIndex = 0;
let charIndex = 0;

function type() {
	if (charIndex < textArray[textArrayIndex].length) {
		if (!AutoTyping.classList.contains('typing')) AutoTyping.classList.add('typing');
		TypingText.textContent += textArray[textArrayIndex].charAt(charIndex);
		charIndex++;
		setTimeout(type, typingDelay);
	} else {
		AutoTyping.classList.remove('typing');
		setTimeout(erase, newTextDelay);
	}
}

function erase() {
	if (charIndex > 0) {
		if (!AutoTyping.classList.contains('typing')) AutoTyping.classList.add('typing');
		TypingText.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
		charIndex--;
		setTimeout(erase, erasingDelay);
	} else {
		AutoTyping.classList.remove('typing');
		textArrayIndex++;
		if (textArrayIndex >= textArray.length) textArrayIndex = 0;
		setTimeout(type, typingDelay + 1100);
	}
}

document.addEventListener('DOMContentLoaded', function () {
	if (textArray.length) setTimeout(type, newTextDelay + 250);
});

// smooth scrolling
$(document).ready(function () {
	let scroll_link = $('.scroll');

	//smooth scrolling -----------------------
	scroll_link.click(function (e) {
		e.preventDefault();
		let url = $('body').find($(this).attr('href')).offset().top - 50;
		$('html, body').animate(
			{
				scrollTop: url,
			},
			700
		);
		$(this).parent().addClass('active');
		$(this).parent().siblings().removeClass('active');
		return false;
	});
});

// Covid
$(document).ready(function () {
	var d = new Date();
	var month = new Array();
	month[0] = 'Januari';
	month[1] = 'Februari';
	month[2] = 'Maret';
	month[3] = 'April';
	month[4] = 'Mei';
	month[5] = 'Juni';
	month[6] = 'Juli';
	month[7] = 'Agustus';
	month[8] = 'September';
	month[9] = 'Oktober';
	month[10] = 'November';
	month[11] = 'Desember';

	$('#date').html(d.getDate() + ' ' + month[d.getMonth()] + ' ' + d.getFullYear());
	$.ajax({
		url: 'https://api.kawalcorona.com/indonesia/',
		success: function (result) {
			$('#positif').html(result[0].positif);
			$('#sembuh').html(result[0].sembuh);
			$('#meninggal').html(result[0].meninggal);
		},
	});
});
